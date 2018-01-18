<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products_tags extends Model
{
	protected $fillable = ['id_tag','id_product'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'products_tags';

	public function product()
	{
		return $this->hasOne('App\Product', 'id', 'id_product');
	}

	public function tag()
	{
		return $this->hasOne('App\Tag', 'id', 'id_tag');
	}
}
