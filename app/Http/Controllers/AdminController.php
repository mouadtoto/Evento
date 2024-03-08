<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(){
        $data = Category::get();
        $users= User::where('role' , '<>' , 'Admin')->get();
        $events = Event::get();
        return view('admin' , ['data'=>$data , 'users'=>$users , 'events'=>$events]);
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
    public function update(Request $request){
        $id = $request->id;
        $name = $request->name;
        Category::where('id',$id)->update([
            'name'=> $name, 
        ]);
        return $this->index()->with('categoryupdated' , 'Category updated succesfully');
    }
    public function restrictUser($id){
        User::where('id',$id)->update([
            'isRestricted'=> 1 , 
        ]);
        return $this->index();
    }
    public function unrestrictUser($id){
        User::where('id',$id)->update([
            'isRestricted'=> 0 , 
        ]);
        return $this->index();
    }
}
