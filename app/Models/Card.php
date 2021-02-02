<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
	protected $table = 'card';
    public function column() {
        return $this->belongsTo(Column::class);
    }	
	
	public function organize() {
		$cards = $this->orderby('column_id','asc')
			->orderby('card_position','asc')
			->get();
		$col = 0;
		foreach($cards as $card) {
			if ($col != $card->column_id) {
				$col = $card->column_id;
				$pos = 1;
			}
			$card->card_position = $pos++;
			$card->save();
		}
	}
}
