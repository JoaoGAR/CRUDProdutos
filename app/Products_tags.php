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
		return $this->hasMany('App\Product', 'products', 'id_product', 'id');
	}

	public function tag()
	{
		return $this->hasMany('App\Tag', 'tags', 'id_tag', 'id');
	}
}
