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
use\DB;
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
      $categorys = DB::table('categories')->limit(8)->get();
      $sliders = DB::table('sliders')->get();
      $promotions = DB::table('promotions')->limit(5)->orderBy('id','DESC')->get();
      $photos = DB::table('photos')->limit(6)->orderBy('id', 'DESC')->get();
      $settings = DB::table('settings')->find('1');
      return view('fontend.home',compact('categorys','settings','sliders','photos','promotions'));
    }
    public function photo(){
      $settings = DB::table('settings')->find('1');
      $categorys = DB::table('categories')->get();
      $photos = DB::table('photos')->orderBy('id', 'DESC')->paginate(12);
      return view('fontend.photo',compact('categorys','settings','photos'));
    }
   public function photoView($id,$category_id){
      $settings = DB::table('settings')->find('1');
      $photos = DB::table('photos')
                ->select('*')
                ->where('photos.id',$id)
                ->get();
      $related_photos = DB::table('photos')
                ->where('category_id',$category_id)
                ->get();
      $related_tags = DB::table('tags')
                ->where('photo_id',$id)
                ->get();
      return view('fontend.photo-view',compact('settings','photos','related_photos','related_tags'));
    }
    public function searchPhoto(Request $request){
      $settings = DB::table('settings')->find('1');
      $categorys = DB::table('categories')->get();
      $photos='';
      if($request->category!=''&&$request->keyword!=''){
        $photos = DB::table('photos')
                ->where('title','like','%' . $request->keyword . '%')
                ->orWhere('category_id',$request->category)
                ->orderBy('id', 'DESC')
                ->get();
      }elseif($request->category==''&&$request->keyword==''){
        $photos = DB::table('photos')
                ->orderBy('id', 'DESC')
                ->get();
      }elseif($request->category!=''){
        $photos = DB::table('photos')
                ->where('category_id',$request->category)
                ->orderBy('id', 'DESC')
                ->get();
      }elseif($request->keyword!=''){
        $photos = DB::table('photos')
                ->where('title','like','%' . $request->keyword . '%')
                ->orderBy('id', 'DESC')
                ->get();
      }
      return view('fontend.photo',compact('categorys','settings','photos'));


    }
    public function video(){
      $settings = DB::table('settings')->find('1');
      return view('fontend.video',compact('settings'));
    }
    public function promotion(){
      $promotions = DB::table('promotions')->orderBy('id','DESC')->get();
      $settings = DB::table('settings')->find('1');
      return view('fontend.promotion',compact('settings','promotions'));
    }
    public function contact(){
      $settings = DB::table('settings')->find('1');
      return view('fontend.contact',compact('settings'));
    }
    public function profile(){
      $user_id=Auth::user()->id;
      $categorys = DB::table('categories')->get();
      $settings = DB::table('settings')->find('1');
      $photos = DB::table('photos')->where('user_id',$user_id)->get();
      $profile = Profile::where('user_id',$user_id)->first();
      return view('fontend.profile',compact('settings','categorys','photos','profile'));
    }
      public function terms(){
      $terms = DB::table('terms')->orderBy('id','DESC')->first();
      $settings = DB::table('settings')->find('1');
      return view('fontend.terms',compact('settings','terms'));
    }
    public function policy(){
      $policy = DB::table('policy')->orderBy('id','DESC')->first();
      $settings = DB::table('settings')->find('1');
      return view('fontend.policy',compact('settings','policy'));
    }

}
