
@extends('admin.app')
@section('content')

<div class="data-table-area">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="data-table-list">
                       <div class="basic-tb-hd">
                           <h2>All Images</h2>
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
                           <!-- <p style="margin-bottom: 0px;float: right;color: white;"><button class="btn notika-btn-teal waves-effect"data-toggle="modal" data-target="#myModaltwo"><i class="notika-icon notika-plus"></i>Add</button>

                           </p> -->
                             <a style="color:white; float:right;" href="{{route('add.image')}}"> <button type="button" class="btn notika-btn-teal waves-effect" name="button">add Images</button></a>
                       </div>
                          <div class="modal fade" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                        <form action="" method="post" enctype="multipart/form-data">
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
                                                              <select  class="form-control" style="width:100%;" name="category_id">
                                                              @foreach($categorys as $cat)
                                                              <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                              @endforeach
                                                            </select>
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="title" placeholder="Post Title" type="text" class="form-control">
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="photo" type="file" class="form-control" multiple>
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="seo_title" placeholder="SEO Title" type="text" class="form-control" required>
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                               <textarea name="seo_description" placeholder="SEO Description" type="text" class="form-control" required style="height:120px;"></textarea>
                                                              </div>
                                                        </div>
                                                        <div class="form-group float-lb">
                                                          <div class="table-responsive">
                                                               <table class="table table-bordered" id="dynamic_field">
                                                                    <tr>
                                                                         <td><input type="text" name="tag[]" placeholder="Enter New Tag" class="form-control name_list" /></td>
                                                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add Tag</button></td>
                                                                    </tr>
                                                               </table>
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
                                       <th>Tags</th>
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
                                       <td>
                                            <a href="{{ route('edit.photo', $photo->id) }}"> <button class="btn btn-info danger-icon-notika waves-effect"><i class="notika-icon notika-edit"></i></button>
                                        <a href="{{ route('delete.photo', $photo->id) }}"> <button class="btn btn-danger danger-icon-notika waves-effect"><i class="notika-icon notika-trash"></i></button>
                                        </td>
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
   <script>
 $(document).ready(function(){
      var i=1;
      $('#add').click(function(){
           i++;
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="tag[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
      });
      $(document).on('click', '.btn_remove', function(){
           var button_id = $(this).attr("id");
           $('#row'+button_id+'').remove();
      });
      $('#submit').click(function(){
           $.ajax({
                url:"name.php",
                method:"POST",
                data:$('#add_name').serialize(),
                success:function(data)
                {
                     alert(data);
                     $('#add_name')[0].reset();
                }
           });
      });
 });
 </script>
@endsection
