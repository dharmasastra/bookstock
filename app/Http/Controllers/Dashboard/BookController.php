<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Datatables;
use App\Book;
use App\Category;
use Auth;


class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.posts.list');
    }

    public function dataBuku()
    {
        $user = Auth::user();

        $scope = $user->role == 'ADMIN' ? Book::with('categories') : $user->books()->with('categories');

        return Datatables::of($scope->with("user"))
        ->addColumn('action', function ($book) 
        {
            $html = '';
            $html .= '<a href="'.route("posts.show", ["isbn"=>$book->isbn_no]).'" class="btn btn-xs btn-info" >Preview</a>'; 
            $html .= '<a href="'.route("posts.edit", ["isbn"=>$book->isbn_no]).'" class="btn btn-xs btn-primary">Edit</a>';
            $html .= '<a href="'.route("posts.destroy", ["isbn"=>$book->isbn_no]).'" class="btn btn-xs btn-delete delete">Delete</a>'; 
            
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
        $categories = Category::all();
        return view('dashboard.posts.add')
        ->with('categories', $categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */ 
    public function store(Request $request)
    {

        $insertCategory = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);

        if($insertCategory){
            $category_id = $insertCategory->id;
            if($request->hasFile('book_image')){
                $imageFile = $request->file('book_image');
                $book_cover = str_slug($request->book_name).uniqid().'.'.$imageFile->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/media/', $imageFile, $book_cover);
            }
            
            $fields = [
                'book_name' => $request->book_name,
                'book_cover' => $book_cover,
                'author' => $request->author,
                'isbn_no' => $request->isbn_no,
                'format' => $request->format,
                'publication_date' => $request->publication_date,
                'category_id' => $insertCategory->id,
                'language' => $request->language,
                'publisher' => $request->publisher,
                'book_price' => $request->book_price,
                'stock' => $request->stock,
                'user_id' => Auth::user()->id,
            ];
            
            $insert = Book::create($fields);
            if ($insert) {
                return redirect()
                ->to(route('posts.index'))
                ->with('message', 'Book is successfully saved');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($isbn)
    {
        $post = Book::where('isbn_no', $isbn)->with('user')->first();
        $categories = Category::all();
        return view('dashboard.posts.index')
        -> with(['post'=>$post])
        -> with('categories', $categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($isbn)
    {
        $post = Book::where('isbn_no', $isbn)->first();
        $categories = Category::all();
        return view('dashboard.posts.edit')
        -> with(['post'=>$post])
        -> with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $isbn)
    {
        $insertCategory = Category::firstOrCreate([
            'category_name' => $request->category_name
        ]);


        if($insertCategory){
            $category_id = $insertCategory->id;
            $book = Book::where('isbn_no', $isbn)->first();
            if($request->hasFile('book_image')){
                $imageFile = $request->file('book_image');
                $book_cover = str_slug($request->book_name).uniqid().'.'.$imageFile->getClientOriginalExtension();
                Storage::disk('local')->putFileAs('public/media/', $imageFile, $book_cover);
            } else {
                $book_cover = $book->book_cover;
            }

            $fields = [
                'book_name' => $request->book_name,
                'book_cover' => $book_cover,
                'author' => $request->author,
                'isbn_no' => $request->isbn_no,
                'isbn13_no' => $request->isbn13_no,
                'publication_date' => $request->publication_date,
                'category_id' => $insertCategory->id,
                'language' => $request->language,
                'publisher' => $request->publisher,
                'book_price' => $request->book_price,
                'stock' => $request->stock,
                'user_id' => Auth::user()->id,
            ];
            
            $insert = $book->update($fields);
            if ($insert) {
                return redirect()
                ->to(route('posts.index'))
                ->with('message', 'Book is successfully saved');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($isbn)
    {   
        $post =  Book::where('isbn_no', $isbn)->first();
        $deleteImage = Storage::disk('local')->delete('public/media/'.$post->book_cover);
        $execute = $post->delete();
    }
}
