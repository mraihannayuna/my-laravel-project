<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *3
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // "SELECT title, content FROM posts"
        // $posts = Post::where('active', true)->get();
                $posts = Post::active()
                                // ->withTrashed()
                                ->get();

                     // ->select('id', 'title', 'content', 'created_at')

        // dd($posts);
        $data = [
            'posts' => $posts,
        ];
        return view('posts.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        $content = $request->input('content');

        // $posts = Storage::get('posts.txt');

        // $posts = explode("\n", $posts);

        // $new_post = [
        //     count($posts) + 1,
        //     $title,
        //     $content,
        //     date("Y-m-d H:i;s")
        // ];

        // $new_post = implode(",", $new_post);

        // array_push($posts, $new_post);

        // $posts = implode("\n", $posts);

        // Storage::put('posts.txt', $posts);

        Post::insert([
            'title' => $title,
            'content' => $content,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $posts = Storage::get('posts.txt');
        // $posts = explode("\n", $posts);
        // $selected_post = array();
        // foreach($posts as $p) {
        //     $p = explode(",", $p);
        //     if ($p[0] == $id) {
        //         $selected_post = $p;
        //     }
        // }\\

            // ? SELECT * FROM posts WHERE id = $id
        // $selected_post = Post::selectedById($id)->first();
         $selected_post = Post::selectedById($id)->first();
                // $selected_post = Post::findOrfail($id)->first();

        // $selected_post = DB::table('posts')
            // ->select('id', 'title', 'content', 'created_at')
            // ->where('id', $id)
            // ->first();

        $view_data = [
            'posts' => $selected_post
        ];
        return view('posts.show', $view_data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $posts = Post::selectedById($id)->first();
                    // ->select('id','title','content','created_at')
                    // ->where('id', $id)
                    // ->first();
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.edit', $view_data);
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
        $title = $request->input('title');
        $content = $request->input('content');

        // "UPDATE ...   WHERE id = $id"
        Post::selectedById($id)
            ->update([
                'title' => $title,
                'content' => $content,
                'updated_at' => date('Y-m-d H:i:s'),
            ]);

        return redirect("posts/{$id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
                Post::selectedById($id)->delete();
        // Post::where('id', $id)
        //     ->where('id', $id)
        //     ->delete();

        return redirect('posts');

    }

    public function trash() {

        $trash_item = Post::onlyTrashed()->get();

        $data = [
            'posts' => $trash_item,
        ];

        return view('posts.recylebin', $data);

    }

}
