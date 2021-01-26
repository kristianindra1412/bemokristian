<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class App extends Model
{
    use HasFactory;
	protected sqldump() {
		Spatie\DbDumper\Databases\MySql::create()
			->setDbName(env('DB_DATABASE'))
			->setUserName(env('DB_USERNAME'))
			->setPassword(env('DB_PASSWORD'))
			->dumpToFile('bemokristian_sqldump.sql');	
	}
}
