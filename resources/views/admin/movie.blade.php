
@extends('admin.app')
@section('content')
<div class="form-element-area">
       <div class="container">
         <form action="{{route('movie.update')}}" method="post" enctype="multipart/form-data">
               {{csrf_field() }}

           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="form-element-list">
                       <div class="basic-tb-hd">
                           <h2>Movie Banner For Apps </h2>
                         </div>

                         <div class="row">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="form-group float-lb">
                                     <div class="nk-int-st" >
                                          <a href="#"><img style="background-color: #00c292;" src="{{asset($movies->banner)}}" alt="" /></a>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                             <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                 <div class="form-group float-lb">
                                     <div class="nk-int-st">
                                         <input name="banner" type="file" value="{{$movies->banner}}" class="form-control">
                                         <input name="id" type="hidden" value="{{$movies->id}}" class="form-control">
                                     </div>
                                 </div>
                             </div>
                         </div>
                       <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group float-lb">
                                   <div class="nk-int-st">
                                       <input type="text" name="title" value="{{$movies->title}}" class="form-control"><br/>
                                       <label style="top: -14px;" class="nk-label">Movie Title</label>
                                   </div>
                               </div>
                           </div>
                       </div>
                       <div class="row">
                           <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                               <div class="form-group float-lb">
                                   <div class="nk-int-st">
                                       <input type="text" name="link" value="{{$movies->link}}" class="form-control"><br/>
                                       <label style="top: -14px;" class="nk-label">Movie Link</label>
                                   </div>
                               </div>
                           </div>
                       </div>

                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="float:right;">
                             <div class="form-example-int">
                                 <button class="btn btn-success notika-btn-success">Update</button>
                             </div>
                         </div>
                      </div>
               </div>
           </div>

        </form>
       </div>
   </div>
@endsection
