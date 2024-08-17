<?php

namespace App\Http\Controllers;

use App\Models\Article;
use view;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    //
    public function index()
    {
        // $data= [
        //     ["id"=>1,"title"=>"Article One"],
        //     ["id"=>2,"title"=>"Article Two"]
        // ];
        // $data= Article::all();
        // dd("test");
        $data = Article::latest()->paginate(5);
        return view("articles.index", ["articles" => $data]);
    }
    public function detail($id)
    {
        $data = Article::find($id);
        return view("articles.detail", ["article" => $data]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect("/articles")->with("info","Article deleted!");
    }
    public function add()
    {
        $data = [
            ["id" => 1, "name" => "News"],
            ["id" => 2, "name" => "Tech"],
            ["id" => 3, "name" => "Other"],
        ];
        return view("articles.add", ["categories" => $data]);
    }
    public function create()
    {
        $validator = validator(request()->all(), [
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect("articles");
    }

    public function edit($id){
        $article = Article::findOrFail($id);
        $data = [
            ["id" => 1, "name" => "News"],
            ["id" => 2, "name" => "Tech"],
            ["id" => 3, "name" => "Other"],
        ];
        return view("articles.edit", ["categories" => $data,"article"=>$article]);

    }
    public function update( $id){
        $article = Article::findOrFail($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect("/articles");
    }
}
//

