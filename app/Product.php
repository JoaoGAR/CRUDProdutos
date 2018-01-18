<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Tag;
use App\Products_tags;


class Product extends Model
{
	protected $fillable = ['title','description','image','stock'];
	protected $guarded = ['id', 'created_at', 'update_at'];
	protected $table = 'products';

	public function tags()
	{
		return $this->belongsToMany('App\Tag', 'products_tags', 'id_product', 'id_tag');
	}
}
