<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Column extends Model
{
    use HasFactory;
	protected $table = 'column';	
    public function card() {
        return $this->hasMany(Card::class);
    }
	public function organize() {
		$cols = $this->orderby('column_position','asc')->get();
		$pos = 1;
		foreach($cols as $col) {
			$col->column_position = $pos++;
			$col->save();
		}
	}
}
