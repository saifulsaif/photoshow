
@extends('admin.app')
@section('content')

<div class="data-table-area">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="data-table-list">
                       <div class="basic-tb-hd">
                           <h2>My Image Gallery</h2>
                           @if (Session::has('danger'))
                             <div class="alert alert-danger">
                               <p>{{Session::get('danger')}}</p>
                             </div>
                           @endif
                           @if (Session::has('success'))
                             <div class="alert alert-success">
                               <p>{{Session::get('success')}}</p>
                             </div>
                           @endif
                           <p style="margin-bottom: 0px;float: right;color: white;"><button class="btn notika-btn-teal waves-effect"data-toggle="modal" data-target="#myModaltwo"><i class="notika-icon notika-plus"></i>Add</button>

                           </p>
                       </div>
                       <div class="modal fade" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                      <form action="{{route('save.photo')}}" method="post" enctype="multipart/form-data">
                  											   {{csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Add  Image</h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                              <select style="width:100%;" name="category_id">
                                                              @foreach($categorys as $cat)
                                                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                              @endforeach
                                                            </select>
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="title" placeholder="Title" type="text" class="form-control">
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="photo" type="file" class="form-control">
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="modal-footer">
                                                 <button class="btn btn-success notika-btn-success">Save</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                                </div>

                       <div class="table-responsive">
                           <table id="data-table-basic" class="table table-striped">
                               <thead>
                                   <tr>
                                       <th>S/L</th>
                                       <th>Date</th>
                                       <th>Author</th>
                                       <th>Category</th>
                                       <th>Title</th>
                                       <th> Image</th>
                                       <th>Option</th>
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
                                          $cat = \DB::table('categories')->where('id',$photo->category_id)->first();
                                          @endphp
                                            <img style="border-radius: 50%;height: 55px;width: 55px;margin-top: 16px;margin-left: 10px" src="{{asset($photos->photo)}}" alt="">
                                       </td>
                                       <td>{{$cat->name}}</td>
                                       <td>{{$photo->title}}</td>
                                       <td><img  style="background-color:#00c292;" src="{{asset($photo->photo)}}" alt="" /></td>
                                       <td><button style="background: #00BCD4;color:white;" class="btn notika-btn-teal waves-effect"data-toggle="modal" data-mytitle="{{$photo->id}}" id="edit"  data-target="#myModalthree"><i class="notika-icon notika-edit"></i></button>
                                        <a href="{{ route('delete.photo', $photo->id) }}"> <button class="btn btn-danger danger-icon-notika waves-effect"><i class="notika-icon notika-trash"></i></button></td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                       <div class="modal fade" id="myModalthree" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                    <form action="{{route('slider.save')}}" method="post" enctype="multipart/form-data">
                                          {{csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Add Slide Image</h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="slider_image" type="file" class="form-control">
                                                              </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            <div class="modal-footer">
                                                 <button class="btn btn-success notika-btn-success">Save</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                  </form>
                                </div>
                   </div>
               </div>
           </div>
       </div>
   </div>

   <script>

     $('#edit').on('show.bs.modal', function (event) {
         var button = $(event.relatedTarget)
         var title = button.data('mytitle')
         console.log(title);

         var modal = $(this)
         modal.find('.modal-body #title').val(title);
         modal.find('.modal-body #des').val(description);
         modal.find('.modal-body #cat_id').val(cat_id);
   })
   </script>
@endsection
