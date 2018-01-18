<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Product;
use App\Products_tags;


class Tag extends Model
{
	protected $fillable = ['name'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'tags';

	public function products()
	{
		return $this->belongsToMany('App\Product', 'products_tags', 'id_tag', 'id_product');
	}
}
