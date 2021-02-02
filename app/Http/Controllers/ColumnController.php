<?php

namespace App\Http\Controllers;
use App\Models\Column;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ColumnController extends Controller
{
	public function fetch() {
		$col = new Column;
		$col->organize();
		
		$res = Column::with(['card'=>function($q) {
				$q->orderby('card_position','ASC');
			}])
			->orderby('column_position','ASC')->get();
		return response($res->jsonSerialize());
	}

    public function index()
    {
		return response(Column::all()->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function ins(Request $request)
    {
		$max_x = Column::max('column_position');
		$col = new Column();
		$col->column_title = $request->column_title;
		$col->column_position = $max_x + 1;
		$col->save();
		$col->organize();
		return response($col->jsonSerialize(), Response::HTTP_CREATED);
    }

    public function upd($id, Request $request)
    {
		$col = Column::findOrFail($id);
		$col->organize();
		if ($request->column_title != null && $request->column_title != "") {
			$col->column_title = $request->column_title;
		}
		if (isset($request->move_x) && $request->move_x != "") {
			$dx = $request->move_x;
			$pos = $col->column_position;
			$x = $pos + $dx;
			$max_x = Column::max('column_position');
			if ($x > 0 && $x <= $max_x) {
				$col2 = Column::where('column_position',$x)->first();
				$col2->column_position = $pos;
				$col2->save();
				$col->column_position = $x;
			}
		}
		$col->save();		
		$col->organize();
		return response(null, Response::HTTP_OK);
	}

    public function del($id)
    {
		Column::destroy($id);
		$col = new Column();
		$col->organize();
		return response(null, Response::HTTP_OK);
	}	
}
