
@extends('admin.app')
@section('content')
<!-- Start Status area -->
<div class="notika-status-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30" style="background-color: #00c292;">
                    <div class="website-traffic-ctn" >
                        <h2><span class="counter" style="color:white;font-size: 40px;font-weight: 600;">{{$total_photos}}</span></h2>
                        <p style="color:white;"> Photos</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30"style="background-color: #00c292;">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter" style="color:white;font-size: 40px;font-weight: 600;">{{$promotions}}</span></h2>
                        <p style="color:white;"> Promotions</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30"style="background-color: #00c292;">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter" style="color:white;font-size: 40px;font-weight: 600;">{{$admin_users}}</span></h2>
                        <p style="color:white;">Admin Users</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="wb-traffic-inner notika-shadow sm-res-mg-t-30 tb-res-mg-t-30 dk-res-mg-t-30"style="background-color: #00c292;">
                    <div class="website-traffic-ctn">
                        <h2><span class="counter" style="color:white;font-size: 40px;font-weight: 600;">{{$users}}</span></h2>
                        <p style="color:white;">Users</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Status area-->
<!-- Start Sale Statistic area-->
<div class="sale-statistic-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <h3>All Photos </h3>
              <div class="table-responsive">
                  <table id="data-table-basic" class="table table-striped">
                      <thead>
                          <tr>
                              <th>S/L</th>
                              <th>Date</th>
                              <th>Author</th>
                              <th>Category</th>
                              <th>Title</th>
                              <th>Tags</th>
                              <th> Image</th>
                          </tr>
                      </thead>
                      <tbody>
                        @php $i=1; @endphp
                        @foreach($all_photos as $photo)
                          <tr>
                              <td>{{$i++}}</td>
                              <td>{{$photo->created_at}}</td>
                              <td>
                                 @php
                                 $photos = \DB::table('profiles')->find(1);
                                 $cat = \DB::table('categories')->find(1);
                                 @endphp
                                   <img style="border-radius: 50%;height: 55px;width: 55px;margin-top: 16px;margin-left: 10px" src="{{asset($photos->photo)}}" alt="">
                              </td>
                              <td>{{$cat->name}}</td>
                              <td>{{$photo->title}}</td>
                               <td>
                               @php
                                 $tags = \DB::table('tags')->where('photo_id',$photo->id)->get();

                               @endphp
                               @foreach($tags as $tag)
                                 <p>{{$tag->tag}}</p>
                               @endforeach
                              </td>
                              <td><img  style="background-color:#00c292;height: 100px;width:250px;" src="{{asset($photo->photo)}}" alt="" /></td>
                            </tr>
                          @endforeach
                      </tbody>
                  </table>
                  <div class="pagination">

                     <ul>
                         <span style="color:red;">{{$all_photos->links()}}</span>
                     </ul>
                   </div>
              </div>
            </div>
        </div>
    </div>
</div>

@endsection
