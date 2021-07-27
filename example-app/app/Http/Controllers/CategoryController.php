<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function AllCat(){

        //One way

        $categories = Category::latest()->paginate(5);

        //Second way
        // $categories = DB::table('categories')->latest()->paginate(5);

        //Third way
        // $categories = DB::table('categories')
        // ->join('users','categories.user_id','users.id')
        // ->select('categories.*','users.name')
        // ->latest()->paginate(5);

        $trashCat = Category::onlyTrashed()->latest()->paginate(3);

        return view('admin.category.index', compact('categories','trashCat'));
    }

    public function AddCat(Request $request){
            $validatedData = $request->validate([
                'category_name' => 'required|unique:categories|max:255',
            ],
            [
                'category_name.required' => 'Please Input Category Name',
                'category_name.max' => 'Category Must Be Less Than 255 Chars',
            ]);

            //One way

            Category::insert([
                'category_name' => $request->category_name,
                'user_id' => Auth::user()->id,
                'created_at' => Carbon::now()
            ]);

            //Second way

            // $category = new Category;
            // $category->category_name = $request->category_name;
            // $category->user_id = Auth::user()->id;
            // $category->save();

            //Third way

            // $category = Category::create([
            //     'category_name' => $request->category_name,

            //     'user_id' => Auth::user()->id,

            // ]);

            //Forth way

            // $data = array();
            // $data['category_name'] = $request->category_name;
            // $data['user_id'] = Auth::user()->id;
            // DB::table('categories')->insert($data);

            return Redirect()->back()->with('success', 'Category Inserted Successfully');
    }

    public function Edit($id){
        //First way

        // $categories = Category::find($id);

        //Second way

        $categories = DB::table('categories')->where('id',$id)->first();
        return view('admin.category.edit', compact('categories'));
    }

    public function Update(Request $request ,$id){

        //First way

        // $update = Category::find($id)->update([
        //     'category_name' => $request->category_name,
        //     'user_id' => Auth::user()->id
        // ]);
        
        //Second way

        $data = array();
        $data['category_name'] = $request->category_name;
        $data['user_id'] = Auth::user()->id;
        DB::table('categories')->where('id',$id)->update($data);

        return Redirect()->route('all.category')->with('success','Category Updated Successfull');

    }

    public function SoftDelete($id){
        $delete = Category::find($id)->delete();
        return Redirect()->back()->with('success', 'Category Soft Deleted Sucecessfully');
    }

    public function Restore($id){
        $delete = Category::withTrashed()->find($id)->restore();
        return Redirect()->back()->with('success', 'Restored Sucecessfully');
    }

    public function Pdelete($id){
        $delete = Category::onlyTrashed()->find($id)->forceDelete();
        return Redirect()->back()->with('success', 'Category Permanently Deleted Sucecessfully');
        }
}
