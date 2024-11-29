<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Season;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('seasons')->pagenate(6);
        $message = "商品一覧";
        return view('index', compact('products', 'message'));
    }
    
    public function create() 
    {
        return view('index');
    }

    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();
        $imagePath = $request->file('image')->store('images', 'public');
 
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'image' => $imagePath,
            'description' => $validated['description'], 
        ]);

        $product->seasons()->attach($validated['season']);
        return redirect()->route('products.index');
    }
    
    public function edit($productId)
    {
        $product = Product::with('seasons')->findOrFail($productId);
        return view('edit', compact('product'));
    }
    
    public function update(StoreProductRequest $request, $productId)
    {
        $validated = $request->validated();
        $product = Product::findOrFail($productId);
        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $product->image = $imagePath;
        }
        
        $product->name = $validated['name'];
        $product->price = $validated['price'];
        $product->description = $validated['description'];
        $product->save();
        
        $product->seasons()->sync($validated['season']);
        return redirect()->route('products.index');
    }
    
    public function search(Request $request)
    {
        $query = $request->input('query');
        $products = Product::where('name', 'like', "%{$query}%")->get();
        $message = ""{{ $name }}"の商品一覧" . $query;
        return view('index', compact('products', 'message'));
    }

    public function sort(Request $request)
    {
        $order = $request->input('order', 'asc');
        $products = Product::orderBy('price', $order)->get();
        $message = "商品一覧" . $query;
        return view('index', compact('products', 'message'));
    }

}
