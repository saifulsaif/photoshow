<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use\setting;
use App\Category;
use App\Slider;
use App\Photo;
use App\Profile;
use App\Promotion;
use App\Follower;
use App\Like;
use\DB;
use\Str;
use\Storage;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
  {



    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(){
        if( Auth::user()){
           if(Auth::user()->role=='admin'){
             return redirect()->route('admin');
           }
        }
      //  return Str::slug('hello i am your bou');
      $settings = DB::table('settings')->find('1');
      $seo_title=$settings->title;
      $seo_description= '';
      $keyword='';
      $categorys = DB::table('categories')->limit(8)->get();
      $sliders = DB::table('sliders')->get();
      $promotions = DB::table('promotions')->limit(5)->orderBy('id','DESC')->get();
      // $photo = DB::table('photos')->distinct()->get(['category_id']);
      // echo '<pre>';
      // print_r($photo);
      // exit;
      $photos = DB::table('photos')
              ->distinct('category_id')
              ->limit(9)
              ->orderBy('id', 'DESC')
              ->get();
      return view('fontend.home',compact('categorys','settings','sliders','photos','promotions','seo_title','seo_description','keyword'));
    }
    public function photo(){
      $settings = DB::table('settings')->find('1');
      $seo_title= $settings->title;
      $seo_description= '';
      $keyword='';
      $categorys = DB::table('categories')->get();
      $photos = DB::table('photos')->orderBy('id', 'DESC')->paginate(20);
      $photo_count= DB::table('photos')
                ->count('id');
      return view('fontend.photo',compact('categorys','settings','photos','photo_count','seo_title','seo_description','keyword'));
    }
   public function authorProfile($id){
   $settings = DB::table('settings')->find('1');
   $seo_title= $settings->title;
      $related_photos = DB::table('photos')
                ->where('user_id',$id)
                ->paginate(12);
      $upload = DB::table('photos')
                ->where('user_id', '=', $id)
                ->count('id');
      $followers = DB::table('followers')
                ->where('followers', '=', $id)
                ->count('id');
      $following = DB::table('followers')
                ->where('following', '=', $id)
                ->count('id');
      return view('fontend.author-profile',compact('followers','following','settings','related_photos','id','upload','seo_title','seo_description','keyword'));
    }
   public function photoTag($tag){
     $settings = DB::table('settings')->find('1');
     $seo_title= $settings->title;
     $seo_description= '';
     $keyword='';
     $categorys = DB::table('categories')->get();
     $photos = DB::table('tags')
            ->join('photos','photos.id','=','tags.photo_id')
             ->where('tags.tag','like','%' . $tag . '%')
             ->orderBy('tags.id', 'DESC')
             ->paginate(20);
     $photo_count= DB::table('photos')
               ->count('id');
        // dd($photos);
     return view('fontend.photo',compact('categorys','settings','photos','photo_count','seo_title','seo_description','keyword'));
   }
   public function photoView($id,$category_id,$slug){

      $settings = DB::table('settings')->find('1');
      $title = DB::table('photos')
                ->select('*')
                ->where('photos.id',$id)
                ->first();
      $photos = DB::table('photos')
                ->select('*')
                ->where('photos.id',$id)
                ->get();
      $dis = DB::table('photos')
                ->select('*')
                ->where('photos.id',$id)
                ->select('description')
                ->first();
             // dd($dis->description);    
      $related_photos = DB::table('photos')
                ->where('category_id',$category_id)
                ->paginate(12);
      $related_tags = DB::table('tags')
                ->where('photo_id',$id)
                ->get();
      $seo_title= $title->seo_title;
      $seo_description= $title->seo_description;
       $keyword=$title->seo_keywords;
       $description=$dis->description;
      return view('fontend.photo-view',compact('description','settings','photos','related_photos','related_tags','seo_title','seo_description','keyword'));
    }
    public function searchPhoto(Request $request){
      $settings = DB::table('settings')->find('1');
      $seo_title=$settings->title;
      $seo_description= '';
      $keyword='';
      $categorys = DB::table('categories')->get();
      $photos='';
      if($request->category!=''&&$request->keyword!=''){
        $photos = DB::table('photos')
                ->where('title','like','%' . $request->keyword . '%')
                ->orWhere('category_id',$request->category)
                ->orderBy('id', 'DESC')
                ->paginate(20);
      }elseif($request->category==''&&$request->keyword==''){
        $photos = DB::table('photos')
                ->orderBy('id', 'DESC')
                ->paginate(20);
      }elseif($request->category!=''){
        $photos = DB::table('photos')
                ->where('category_id',$request->category)
                ->orderBy('id', 'DESC')
                ->paginate(20);
      }elseif($request->keyword!=''){
        $photos = DB::table('photos')
                ->where('title','like','%' . $request->keyword . '%')
                ->orderBy('id', 'DESC')
                ->paginate(20);
      }
      return view('fontend.photo',compact('categorys','settings','photos','seo_title','seo_description','keyword'));


    }
    public function video(){
      $settings = DB::table('settings')->find('1');
      return view('fontend.video',compact('settings'));
    }
    public function promotion(){
      $settings = DB::table('settings')->find('1');
      $seo_title= $settings->title;
      $seo_description= '';
      $keyword='';
      $promotions = DB::table('promotions')->orderBy('id','DESC')->get();
      return view('fontend.promotion',compact('settings','promotions','seo_title','seo_description','keyword'));
    }
    public function contact(){
      $settings = DB::table('settings')->find('1');
      $seo_title= $settings->title;
      $seo_description= '';
      $keyword='';
      return view('fontend.contact',compact('settings','seo_title','seo_description','keyword'));
    }
    public function profile(){
      $settings = DB::table('settings')->find('1');
      $seo_title= $settings->title;
      $seo_description= '';
      $keyword='';
      $user_id=Auth::user()->id;
      $categorys = DB::table('categories')->get();
      $photos = DB::table('photos')->where('user_id',$user_id)->get();
      $profile = Profile::where('user_id',$user_id)->first();
      return view('fontend.profile',compact('settings','categorys','photos','profile','seo_title','seo_description','keyword'));
    }
      public function terms(){
        $settings = DB::table('settings')->find('1');
        $seo_title= $settings->title;
        $seo_description= '';
        $keyword='';
      $terms = DB::table('terms')->orderBy('id','DESC')->first();
      return view('fontend.terms',compact('settings','terms','seo_title','seo_description','keyword'));
    }
    public function policy(){
      $settings = DB::table('settings')->find('1');
      $seo_title= $settings->title;
      $seo_description= '';
      $keyword='';
      $policy = DB::table('policy')->orderBy('id','DESC')->first();
      return view('fontend.policy',compact('settings','policy','seo_title','seo_description','keyword'));
    }

    public function like(Request $request){
      $data= $request->input('id');
      $like = new Like;
      $like->photo_id=$data;
      $like->save();
      $numberOfLike = DB::table('likes')
    ->where('photo_id', '=', $data)
    ->count();
      return response()->json($numberOfLike);
    }

}
