<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'availability' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'product_category' => [
                'required',
                Rule::exists('categories', 'id'), // Ensure the category exists in the 'categories' table
            ],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'product_name.required' => 'Product name is required.',
            'product_description.required' => 'Product description is required.',
            'product_price.required' => 'Product price is required.',
            'availability.required' => 'Availability is required.',
            'quantity.required' => 'Quantity is required.',
            'product_category.required' => 'Product category is required.',
            'product_category.exists' => 'The selected product category does not exist in the database.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->availability = $request->availability;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('product.index');
    }

    public function edit($id)
    {
        $product = Product::where("id", $id)->first();
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $product_id)
    {
        $rules = [
            'product_name' => 'required|string|max:255',
            'product_description' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'availability' => 'required|string',
            'quantity' => 'required|integer|min:1',
            'product_category' => [
                'required',
                Rule::exists('categories', 'id'), // Ensure the category exists in the 'categories' table
            ],
        ];

        $validator = Validator::make($request->all(), $rules, [
            'product_name.required' => 'Product name is required.',
            'product_description.required' => 'Product description is required.',
            'product_price.required' => 'Product price is required.',
            'availability.required' => 'Availability is required.',
            'quantity.required' => 'Quantity is required.',
            'product_category.required' => 'Product category is required.',
            'product_category.exists' => 'The selected product category does not exist in the database.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $product = Product::where("id", $product_id)->first();
        $product->product_name = $request->product_name;
        $product->product_category = $request->product_category;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->availability = $request->availability;
        $product->quantity = $request->quantity;
        $product->save();

        return redirect()->route('product.index');
    }

    public function destroy($product_id)
    {
        $product = Product::findOrFail($product_id);
        $product->delete();

        return redirect()->route('product.index');
    }
}
