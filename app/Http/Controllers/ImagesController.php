<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImagesController extends Controller
{
	public static function upload($request)
	{
		if ($request->hasFile('image')) 
		{
			$file = $request->file('image');

			if (empty($file)) 
			{
				return false;
			}

			$path = $file->store('images', 'images');
			return $path;
		}
		else
		{
			return false;
		}
	}
}
