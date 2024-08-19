<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
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
    public function detail(Article $id)
    {
        // $data = Article::find($id);
        // route model binding
        return view("articles.detail", ["article" => $id]);
    }

    public function delete($id)
    {
        $article = Article::find($id);
        $article->delete();
        return redirect("/articles")->with("info", "Article deleted!");
    }
    public function add()
    {
        $categories = Category::all();

        // $data = [
        //     ["id" => 1, "name" => "News"],
        //     ["id" => 2, "name" => "Tech"],
        //     ["id" => 3, "name" => "Other"],
        // ];
        return view("articles.add", compact("categories"));
    }
    public function create()
    {
        // $validator = validator(request()->all(), [
        //     'title' => 'required',
        //     'body' => 'required',
        //     'category_id' => 'required',
        // ]);
        // if ($validator->fails()) {
        //     return back()->withErrors($validator);
        // }
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $article = new Article();
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect("articles");
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        // $data = [
        //     ["id" => 1, "name" => "News"],
        //     ["id" => 2, "name" => "Tech"],
        //     ["id" => 3, "name" => "Other"],
        // ];
        $category = Category::all();
        return view("articles.edit", ["categories" => $category, "article" => $article]);

    }
    public function update($id)
    {
        request()->validate([
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required',
        ]);

        $article = Article::findOrFail($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->save();
        return redirect()->route("articles")->with("update", "update success!"); //name routing and flash message
    }
}
//

