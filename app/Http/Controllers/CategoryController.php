<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Validator;

class CategoryController extends Controller
{
    public function index(){
        $categorys = Category::all();
        return view('category.index', compact('categorys'));
    }

    public function create(){

        return view('category.create');
    }
    public function store(Request $request){

        $rules = [
            'category_name'=> 'required|string',

        ];


        $validator = Validator::make($request->all(),$rules,$messages =[
            'category.required' => 'Empty form cannot submit',
        ]);

        if($validator->fails()){

            return redirect()->back()->withErrors($validator)->withInput();

        }

        //method1
        $category = new Category();
        $category->category_name = $request->category_name;
        $category->save();

        //method2
        // $category = Category::create($request->all());

        return redirect()->route('category.index');

    }
//     public function edit($id){
//          $category = Category::where("id", $id)->first();
//          return view('category.edit',compact(("category")));
//     }
//     public function update(Request $request,$category_id){
//         $rules = [
//             'category_name'=> 'required|string',

//         ];


//         $validator = Validator::make($request->all(),$rules,$messages =[
//             'category.required' => 'Empty form cannot submit',
//         ]);

//         if($validator->fails()){

//             return redirect()->back()->withErrors($validator)->withInput();

//         }

//         $category = Category::where("id", $category_id)->first();
//         $category->category_name = $request->category_name;

//         $category->save();

//         return redirect()->route('category.index');
//     }
//     public function destroy($category_id)
// {
//     $category = Category::findOrFail($category_id);
//     $category->delete();

//     return redirect()->route('category.index');
// }
}
