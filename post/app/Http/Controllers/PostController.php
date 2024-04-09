<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $post = DB::table('posts')->get();

        return view('post.index', ['posts'=> $post]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('post.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // $validator = Validator::make($request->all(),[
        //     'title' => "required|unique|min:5|max:100",
        //     'description' => "require|min:10|max|50",
        // ]);

        // //check validator fails

        // if($validator-> fails()){
        //     return redirect()-> back()-> withErrors($validator)->withInput();
        // }

        // Kiểm tra điều kiện của validation
        if (empty($request->title) || strlen($request->title) < 5 || strlen($request->title) > 100) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Title must be between 5 and 100 characters.']);
        }

        // Kiểm tra sự duy nhất của title
        $existingPost = DB::table('posts')->where('title', $request->title)->first();
        if ($existingPost) {
            return redirect()->back()->withInput()->withErrors(['title' => 'Title must be unique.']);
        }

        if (empty($request->description) || strlen($request->description) < 10 || strlen($request->description) > 50) {
            return redirect()->back()->withInput()->withErrors(['description' => 'Description must be between 10 and 50 characters.']);
        }


        /// if the validator pass   insert new post use query builder

        $postId = DB::table('post')-> insertGetId([
            'title'=> $request-> title,
            'description'=> $request -> description,
            'created_at' => now(),
            'updated' => now(),
        ]);


        return redirect()->route('posts.index') -> with('success', 'Post created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
