<?php

namespace App\Http\Controllers;
use\setting;
use App\Slider;
use App\Category;
use App\Photo;
use App\Profile;
use App\Promotion;
use App\Movie;
use App\User;
use\DB;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use  Illuminate\Pagination\Paginator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');

         if( Auth::user()){
            if(Auth::user()->role=='user'){
              return redirect()->route('home');
            }
         }


     }
    public function index(){
      if( Auth::user()){
         if(Auth::user()->role=='user'){
           return redirect()->route('home');
         }
      }
      $settings = DB::table('settings')->find('1');
      $admin_users = DB::table('users')->where('role','admin')->count();
      $users = DB::table('users')->where('role','user')->count();
      $total_photos = DB::table('photos')->count();
      $promotions = DB::table('promotions')->count();
      $all_photos = DB::table('photos')->orderBy('id', 'DESC')->paginate(10);
      $categorys = DB::table('categories')->get();
      //dd($total_photos);
      return view('admin.dashboard',compact('settings','total_photos','admin_users','users','promotions','all_photos','categorys'));
    }
    public function slider(){
      $sliders = DB::table('sliders')->get();
      $settings = DB::table('settings')->find('1');
      return view('admin.slider',compact('settings','sliders'));
    }
    public function sliderSave(Request $request){
      $image=$request->file('slider_image');
      if ($image) {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'images/slider/';
        $image->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $slider = new Slider;
        $slider->slider=$image_url;
        $slider->save();
      }
      return back();
    }
    public function sliderDelete($id){
      $slider = Slider::find($id);
      if(file_exists($slider->slider)){
        @unlink($slider->slider);
        }
       if(!is_null($slider)){
         $slider->delete();
       }
       session()->flash('success','Product Delete Successfully!');
       return back();
    }




    public function allPhoto()  {
      $all_photos = DB::table('photos')->orderBy('id', 'DESC')->paginate(10);
      $categorys = DB::table('categories')->get();
      $settings = DB::table('settings')->find('1');
      return view('admin.all_photo',compact('settings','all_photos','categorys'));
    }

    public function myPhoto(){
      $user_id=Auth::user()->id;
      $categorys = DB::table('categories')->get();
      $all_photos = DB::table('photos')->where('user_id',$user_id)->orderBy('id', 'DESC')->paginate(10);
      $settings = DB::table('settings')->find('1');
      return view('admin.my_photo',compact('settings','all_photos','categorys'));
    }
    public function addImage()  {
      $user_id=Auth::user()->id;
      $categorys = DB::table('categories')->get();
      $all_photos = DB::table('photos')->where('user_id',$user_id)->orderBy('id', 'DESC')->paginate(10);
      $settings = DB::table('settings')->find('1');
      return view('admin.add_image',compact('settings','all_photos','categorys'));
    }

    public function editPhoto($id)  {
      $categorys = DB::table('categories')->get();
      $settings = DB::table('settings')->find('1');
      $update_info = DB::table('photos as p')
                    ->join('categories as c','c.id','=','p.category_id')
                    ->where('p.id',$id)
                    ->select('p.*','c.id as category_id','c.name')
                    ->first();
                    // dd($update_info);
      return view('admin.edit_image',compact('settings','update_info','categorys'));
    }

    public function updatePhoto(Request $request)  {
    //return $request->all();
     $user_id=Auth::user()->id;
     $images=$request->file('photo');
     if ($images) {
       foreach($images as $image)  {
       $image_name = $image->getClientOriginalName();
       $upload_path = 'images/photo/';
       $image->move($upload_path, $image_name);
       $image_url = $upload_path.$image_name;
       DB::table('photos')
            ->where('id', $request->id)
            ->update([
              'title' => $request->title,
              'photo' => $image_url,
              'seo_title' => $request->seo_title,
              'seo_keywords' => $request->seo_keywords,
              'seo_description' => $request->seo_description,
              'description' => $request->description,
              'category_id' => $request->category_id,
              'user_id' => $user_id
            ]);
       // $tag=$request->tag;
       // if(!empty($tag)){
       //  foreach ($tag as $key => $n) {
       //
       //   DB::table('tags')->insert(
       //       ['tag' => $n, 'photo_id' => $request->id]
       //   );
       //  }
       // }
     }

     }else{
       DB::table('photos')
            ->where('id', $request->id)
            ->update([
              'title' => $request->title,
              'seo_title' => $request->seo_title,
              'seo_keywords' => $request->seo_keywords,
              'seo_description' => $request->seo_description,
              'description' => $request->description,
              'category_id' => $request->category_id,
              'user_id' => $user_id
            ]);
     }
     DB::table('Points')
     ->where('user_id', Auth::user()->id)
     ->increment('point',50);
      session()->flash('success','Photo Save Successfully!');
     return back();
    }




    public function category()  {
      $categorys = DB::table('categories')->paginate(10);
      $settings = DB::table('settings')->find('1');
      return view('admin.category',compact('settings','categorys'));
    }
    public function categorySave(Request $request){
      $image=$request->file('photo');
      if ($image) {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'images/category/';
        $image->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $category = new Category;
        $category->image=$image_url;
        $category->icon=$image_url;
        $category->name=$request->name;
        $category->save();
      session()->flash('success','Category Add Successfully!');
      }
      return back();
    }
    public function savePhoto(Request $request)  {
     $user_id=Auth::user()->id;
     $images=$request->file('photo');
     if ($images) {
       foreach($images as $image)  {
       $image_name = $image->getClientOriginalName();
       $upload_path = 'images/photo/';
       $image->move($upload_path, $image_name);
       $image_url = $upload_path.$image_name;
       $photo = new Photo;
       $photo->photo=$image_url;
       $photo->title=$request->title;
       $photo->seo_title=$request->seo_title;
       $photo->seo_keywords=$request->seo_keywords;
       $photo->seo_description=$request->seo_description;
       $photo->description=$request->description;
       $photo->category_id=$request->category_id;
       $photo->user_id=$user_id;
       $photo->save();
       $tag=$request->tag;
        foreach ($tag as $key => $n) {

         DB::table('tags')->insert(
             ['tag' => $n, 'photo_id' =>$photo->id]
         );
        }
       }

     }
     DB::table('Points')
     ->where('user_id', Auth::user()->id)
     ->increment('point',50);
      session()->flash('success','Photo Save Successfully!');
     return back();
   }
    public function categoryDelete($id){
      $category = Category::find($id);
      if(file_exists($category->image)){
        @unlink($category->image);
        }
       if(!is_null($category)){
         $category->delete();
       }
       session()->flash('danger','Category Delete Successfully!');
       return back();
    }

    public function Promotion(){
      $promotions = DB::table('promotions')->paginate(10);
      $settings = DB::table('settings')->find('1');
      return view('admin.promotion',compact('settings','promotions'));
    }
    public function promotionSave(Request $request){
      $image=$request->file('photo');
      if ($image) {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'images/promotion/';
        $image->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $promotion = new Promotion;
        $promotion->photo=$image_url;
        $promotion->link=$request->link;
        $promotion->title=$request->description;
        $promotion->save();
      session()->flash('success','Promotion Add Successfully!');
      }
      return back();
    }
    public function promotionDelete($id){
      $promotion = Promotion::find($id);
      if(file_exists($promotion->photo)){
        @unlink($promotion->photo);
        }
       if(!is_null($promotion)){
         $promotion->delete();
       }
       session()->flash('danger','Promotion Delete Successfully!');
       return back();
    }

      public function Users()  {
        $users = DB::table('profiles')
                    ->select('*')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->where('users.role','user')
                    ->get();
        $settings = DB::table('settings')->find('1');
        return view('admin.users',compact('settings','users'));
      }
      public function Admins()  {
        $users = DB::table('profiles')
                    ->select('*')
                    ->join('users', 'users.id', '=', 'profiles.user_id')
                    ->where('users.role','admin')
                    ->get();
        $settings = DB::table('settings')->find('1');
        return view('admin.admins',compact('settings','users'));
      }
      public function saveAdmin(Request $request){
      $user=User::create([
            'name' => $request->name,
            'lname' => $request->lname,
            'role' => $request->role,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        $data['first_name'] = $request->name;
        $data['photo'] = 'images/user/user.jpg';
        $data['last_name'] = $request->lname;
        $data['email'] = $request->email;
        $data['facebook'] = '#';
        $data['twitter'] = '#';
        $data['youtube'] = '#';
        $data['linkin'] = '#';
        $data['user_id'] =$user->id;
        Profile::create($data);
        session()->flash('success','Admin Add Successfully!');
        return back();
      }
      public function adminDelete($id){
          $user = User::find($id);
          $profile = Profile::where('user_id',$id)->first();
          if(file_exists($profile->photo)){
            @unlink($profile->photo);
            }
           if(!is_null($profile)){
             $profile->delete();
             $user->delete();
             session()->flash('danger','Admin Delete Successfully!');
           }
           return back();
        }


    public function setting()  {
        $settings = DB::table('settings')->find('1');
      return view('admin.setting', ['settings' => $settings]);
    }

    public function settingUpdate(Request $request){
      $image=$request->file('logo');
      $favicon=$request->file('favicon');
      if ($image) {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'images/logo/';
        $image->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $data['logo'] = $image_url;
        $data['title'] = $request->title;
        $data['header1'] = $request->header1;
        $data['header2'] = $request->header2;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['gmail'] = $request->gmail;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['footer'] = $request->footer;
        DB::table('settings')->where('id',$request->id)->update($data);
      }elseif($favicon){
        $image_name = $favicon->getClientOriginalName();
        $upload_path = 'images/logo/';
        $favicon->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $data['favicon'] = $image_url;
        $data['title'] = $request->title;
        $data['header1'] = $request->header1;
        $data['header2'] = $request->header2;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['gmail'] = $request->gmail;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['footer'] = $request->footer;
        DB::table('settings')->where('id',$request->id)->update($data);
      }else{
        $data['header1'] = $request->header1;
        $data['title'] = $request->title;
        $data['header2'] = $request->header2;
        $data['facebook'] = $request->facebook;
        $data['twitter'] = $request->twitter;
        $data['youtube'] = $request->youtube;
        $data['gmail'] = $request->gmail;
        $data['phone'] = $request->phone;
        $data['address'] = $request->address;
        $data['description'] = $request->description;
        $data['footer'] = $request->footer;
        DB::table('settings')->where('id',$request->id)->update($data);
      }

      return back();
    }
  public function movie()  {
        $settings = DB::table('settings')->find('1');
        $movies = DB::table('movie')->find('1');
      return view('admin.movie', ['movies' => $movies], ['settings' => $settings]);
    }
    public function settingMovie(Request $request){
      $image=$request->file('banner');
      if ($image) {
        $image_name = $image->getClientOriginalName();
        $upload_path = 'images/logo/';
        $image->move($upload_path, $image_name);
        $image_url = $upload_path.$image_name;
        $data['banner'] = $image_url;
        $data['link'] = $request->link;
        $data['title'] = $request->title;
        DB::table('movie')->where('id',$request->id)->update($data);
      }else{
        $data['link'] = $request->link;
        $data['title'] = $request->title;
        DB::table('movie')->where('id',$request->id)->update($data);
      }

      return back();
    }
  public function terms()  {
        $settings = DB::table('settings')->find('1');
          $terms = DB::table('terms')->orderBy('id','DESC')->first();
      return view('admin.terms', ['terms' => $terms], ['settings' => $settings]);
    }
    public function updateTerms(Request $request){
        $data['text'] = $request->text;
        DB::table('terms')->where('id',$request->id)->update($data);
        session()->flash('success','Terms And Condition Update Successfully!');
      return back();
    }

    public function policy()  {
        $settings = DB::table('settings')->find('1');
          $policy = DB::table('policy')->orderBy('id','DESC')->first();
      return view('admin.policy', ['policy' => $policy], ['settings' => $settings]);
    }
    public function updatePolicy(Request $request){
      $data['text'] = $request->text;
      DB::table('policy')->where('id',$request->id)->update($data);
      session()->flash('success','Privacy And Policy Update Successfully!');
    return back();

      return back();
    }

}
