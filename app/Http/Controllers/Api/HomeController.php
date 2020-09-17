<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Photo;
use Illuminate\Support\Facades\DB;
use Datatables;


class HomeController extends Controller
{
  public function getPosts($id){
    $posts =DB::table('photos as p')
      ->leftJoin('likes as l','p.id','=','l.photo_id')
      ->leftJoin('comments as c','p.id','=','c.photo_id')
      ->leftJoin('profiles as pro','p.user_id','=','pro.user_id')
      ->select(DB::raw('count(l.photo_id) as total_likes,
        count(c.photo_id) as total_comments,
        p.id,p.title,
        p.photo,p.category_id,
        p.created_at,
        p.user_id,
        pro.photo as author_image,
        pro.first_name,
        pro.last_name'),
        DB::raw("count(IF(l.user_id = $id, l.user_id,0)) as user_like"))
      ->groupBy('p.id')
      ->groupBy('p.title')
      ->groupBy('p.photo')
      ->groupBy('p.category_id')
      ->groupBy('p.user_id')
      ->groupBy('p.created_at')
      ->groupBy('p.created_at')
      ->groupBy('pro.photo')
      ->groupBy('pro.first_name')
      ->groupBy('pro.last_name')
      ->paginate(10);
    // echo'<pre>';
    // print_r($posts);
    return response()->json($posts);
  }
}
