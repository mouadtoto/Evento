<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        $data = Category::get();
        return view('admin' , ['data'=>$data]);
    }
    public function storeCategory(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|unique:categories,name',
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()->with('failedcat' , 'Unable to add the category');
        } 
        $validated = $validator->validated();   
        Category::create([
            'name'=>$request->name,
        ]);
        return $this->index()->with('categoryadded', 'category added succesfully');
    }
    public function destroy(Request $request){
        $id = $request->cat_id;
        $cat = Category::find($id);
        if($cat){
            $cat->delete();
            return $this->index()->with('deleteCat' , 'category deleted succesfully');
        }else{
            return $this->index()->with('deleteCatfailed' , 'unable to delete category');
        }
    }
}
