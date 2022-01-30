<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\AbstractList;

class BlogController extends Controller
{
    public function index(){

        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            $query->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(7);

        return view('welcome',compact('articles'));
    }

    public function  detail($slug){
        $article = Article::where("slug",$slug)->first();
        if(empty($article)) {
            return abort(404);
        }
        return view('blog.detail',compact('article'));
    }

    public function baseOnCategory(Request $request,$slug){
        $articles = Article::when(isset(request()->search),function ($query){
            $search = request()->search;
            $query->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->where("category_id",$request->baseOnCategory)->with(['user','category'])->latest("id")->paginate(7);
        return view('welcome',compact('articles'));
    }

    public function baseOnUser($id){
        $articles = Article::where("user_id",$id)->when(isset(request()->search),function ($query){
            $search = request()->search;
            $query->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
        })->with(['user','category'])->latest("id")->paginate(7);
        return view('welcome',compact('articles'));
    }

    public function baseOnDate($date){
        $articles = Article::all();
//          $createdArticle = array();
//          $articleBol = false;
//          $createdDate = [];
//          foreach ($articles as $key => $article)
//          {
//               $createdArticle[] = $article->created_at->format('Y-m-d');
//               if($createdArticle[$key] == $date) {
//                   $articleBol = true ;
//                   global $createdDate;
//                   $createdDate = $createdArticle[$key];
//               }
//          }
//          if($articleBol == true) {
              $articles = Article::where("created_at",$date)->when(isset(request()->search),function ($query){
                  $search = request()->search;
                  $query->orwhere("title","like","%$search%")->orwhere("description","like","%$search%");
              })->with(['user','category'])->latest("id")->paginate(7);
              return view('welcome',compact('articles'));

          }
//    }
}
