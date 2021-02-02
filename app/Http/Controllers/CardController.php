<?php

namespace App\Http\Controllers;
use App\Models\Card;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CardController extends Controller
{
	public function fetch() {
		$card = new Card;
		$card->organize();
		
		$res = $card->orderby('column_id','asc')
			->orderby('card_position','asc')
			->get();
		return response($res->jsonSerialize());
	}

    public function index()
    {
		return response(Card::all()->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function ins(Request $request)
    {
		$col_id = $request->column_id;
		$max_x = Card::where('column_id',$col_id)->max('card_position');
		$card = new Card();
		$card->column_id = $col_id;
		$card->card_title = $request->card_title;
		$card->card_description = $request->card_description;
		$card->card_position = $max_x + 1;
		$card->save();
		$card->organize();
		return response($card->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function upd($id, Request $request)
    {
		$card = Card::findOrFail($id);
		$card->organize();
		$col_id = $card->column_id;
		if ($request->card_title != null && $request->card_title != "") {
			$card->card_title = $request->card_title;
		}
		if ($request->card_description != null && $request->card_description != "") {
			$card->card_description = $request->card_description;
		}
		if (isset($request->move_y) && $request->move_y != "") {
			$dy = $request->move_y;
			$pos = $card->card_position;
			$y = $pos + $dy;
			$max_y = Card::where('column_id',$col_id)->max('card_position');
			if ($y > 0 && $y <= $max_y) {
				$card2 = Card::where('column_id',$col_id)->where('card_position',$y)->first();
				$card2->card_position = $pos;
				$card2->save();
				$card->card_position = $y;
			}
		}
		if (isset($request->move_x) && $request->move_x != "") {
			$dx = $request->move_x;
			$pos = $card->column->column_position;
			$x = $pos + $dx;			
			$max_x = Column::max('column_position');
			
			if ($x > 0 && $x <= $max_x) {
				$col = Column::where('column_position',$x)->first();
				$col_id = $col->id;				
				$max_y = Card::where('column_id',$col_id)->max('card_position');
				
				$card->column_id = $col_id;
				$card->card_position = $max_y+1;
			}
		}		
		$card->save();		
		$card->organize();
		return response(null, Response::HTTP_OK);
	}

    public function del($id)
    {
		Card::destroy($id);
		$card = new Card();
		$card->organize();
		return response(null, Response::HTTP_OK);
	}
}
