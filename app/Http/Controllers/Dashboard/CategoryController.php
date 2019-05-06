<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Datatables;
use App\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.categories.list');
    }
    public function dataCategory()
    {
        return Datatables::of(Category::query())
        ->addColumn('action', function ($categories) {
            $html = '<a href="'.route("categories.edit", ["id"=>$categories->id]).'" class="btn btn-xs btn-primary">Edit</a>';
            $html .= '<a href="'.route("categories.destroy", ["id"=>$categories->id]).'" class="btn btn-xs btn-delete" id="delete">Delete</a>'; 
            return $html;
        })
        ->addIndexColumn()
        ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.categories.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name'=> 'required|string'
        ]);
        $category = [
            'category_name'=> $request->category_name
        ];
        $insert = Category::firstOrCreate($category);
        if($insert){
            return redirect()->back()->with(['message'=>'Category Succesfully Added']);
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
    public function edit($category)
    {
        $editCateogory = Category::find($category);
        return view('dashboard.categories.edit')
        ->with(['category'=>$editCateogory]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'category_name'=> 'required|string'
        ]);
        $fields = [
            'category_name'=> $request->category_name
        ];
        $query = Category::find($category);
        $update = $query->update($fields);
        if($update){
            return redirect()->to(route('categories.index'))->with(['message'=>'Category Succesfully Added']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        $query = Category::find($category);
        $execute = $query->delete(); 
    }
}
