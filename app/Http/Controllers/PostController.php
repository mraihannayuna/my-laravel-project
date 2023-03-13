<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            // "SELECT title, content FROM posts"
        $posts = DB::table('posts')
                    // ->select('id', 'title', 'content', 'created_at')
                    ->get();
        // dd($posts);
        $view_data = [
            'posts' => $posts,
        ];
        return view('posts.index', $view_data);
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

        DB::table('posts')->insert([
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

        $selected_post = DB::table('posts')
            // ->select('id', 'title', 'content', 'created_at')
            ->where('id', $id)
            ->first();

        $data = [
            'post' => $selected_post
        ];
        return view('posts.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        echo "ini adalah halaman edit data dari id = $id";
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
        // ? isinya proses ( logic )
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // ? isinya proses ( logic )
    }
}
