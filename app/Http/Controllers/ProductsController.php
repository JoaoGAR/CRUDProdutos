<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Tag;
use App\Products_tags;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        $top_tags = Products_tags::raw('SELECT count(*) as top_tags, id_tag FROM products_tags GROUP BY id_tag ORDER BY top_tags DESC')->limit(10)->get();

        $data = array(
            'products' => $products,
            'top_tags' => $top_tags
            );

        return view('products.products', $data);
    }


    public function upload($request)
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::get();
        return view('products.create', compact('tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'title' => 'required|min:6',
            'description' => 'max:4000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5000',
            'stock' => 'required',
            ],
            [
            'title.required' => 'É necessário informar o produto.',
            'title.min' => 'É necessário informar um título de no mínimo, 6 caracteres.',
            'description.max' => 'São permitidos apenas 4000 caracteres.',
            'image.required' => 'É necessário definir a imagem do produto.',
            'image.mimes' => 'Formato de imagem inválido, os formatos aceitos são: JPG, JPEG, PNG e GIF.',
            'image.max' => 'Tamanho máximo da imagem foi extrapolado, imagens de no máximo 5MB.',
            'stock.required' => 'É necessário informar a quantidade em estoque.',
            ]);

        $product = new Product;

        $product->title = $request->title;
        $product->description = $request->description;
        $product->stock = $request->stock;
        $product->image = explode("/", self::upload($request))[1];

        if($product->image)
        {
            $product->save();

            foreach($request->tags as $tag)
            {
                $products_tags = new Products_tags;

                $products_tags->id_tag = $tag;
                $products_tags->id_product = $product->id;

                $products_tags->save();
            }

            return back()->with('success', 'Produto cadastrado com sucesso!')->withInput($request->input());
        }
        else
        {
            return back()->withErrors(['O upload não foi concluído com êxito.'])->withInput($request->input());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $tags = Tag::get();

        $data = array(
            'product' => $product,
            'tags' => $tags
            );

        return view('products.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|min:6',
            'description' => 'max:4000',
            'image' => 'required|mimes:jpg,jpeg,png,gif|max:5000',
            'stock' => 'required',
            ],
            [
            'title.required' => 'É necessário informar o produto.',
            'title.min' => 'É necessário informar um título de no mínimo, 6 caracteres.',
            'description.max' => 'São permitidos apenas 4000 caracteres.',
            'image.required' => 'É necessário definir a imagem do produto.',
            'image.mimes' => 'Formato de imagem inválido, os formatos aceitos são: JPG, JPEG, PNG e GIF.',
            'image.max' => 'Tamanho máximo da imagem foi extrapolado, imagens de no máximo 5MB.',
            'stock.required' => 'É necessário informar a quantidade em estoque.',
            ]);

        $product = Product::findOrFail($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->stock = $request->stock;

        $product->save();

        foreach($request->tags as $tag)
        {
            $products_tags = new Products_tags;

            $products_tags->id_tag = $tag;
            $products_tags->id_product = $product->id;

            $products_tags->save();
        }

        return redirect()->route('products.index')->with('success', 'Produto editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        $product->delete();

        $products = Product::orderBy('created_at', 'desc')->paginate(12);
        return redirect()->route('products')->with('success','Produto deletado com sucesso!');
    }
}
