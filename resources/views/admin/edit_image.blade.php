
@extends('admin.app')
@section('content')
<div class="form-element-area">
       <div class="container">
         <form action="{{route('update.admin.photo')}}" method="post" enctype="multipart/form-data">
            {{csrf_field() }}
                 <h2>Update  Image</h2>
                 <div class="row">
                     <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                               <select  class="form-control" style="width:100%;" name="category_id">
                               <option value="{{$update_info->category_id}}">{{$update_info->name}}</option>
                               @foreach($categorys as $cat)
                               <option value="{{$cat->id}}">{{$cat->name}}</option>
                               @endforeach
                             </select>
                               </div>
                         </div>
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                                 <input name="title" value="{{$update_info->title}}" placeholder="Post Title" type="text" class="form-control">
                                 <input name="id" value="{{$update_info->id}}" placeholder="Post Title" type="hidden" class="form-control">
                               </div>
                         </div>
                         <div class="form-group float-lb">
                             <img  style="background-color:#00c292;height: 150px;width:250px;" src="{{asset($update_info->photo)}}" alt="" />
                         </div>
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                                 <input name="photo[]" type="file" value="{{$update_info->photo}}" ca class="form-control"  multiple="multiple">
                               </div>
                         </div>
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                                 <input name="seo_title" placeholder="SEO Title" value="{{$update_info->seo_title}}" type="text" class="form-control" required>
                               </div>
                         </div>
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                                <textarea name="seo_keywords" placeholder="SEO Keywords" type="text" class="form-control" required style="height:120px;">{{$update_info->seo_keywords}}</textarea>
                               </div>
                         </div>
                         <div class="form-group float-lb">
                             <div class="nk-int-st">
                                <textarea name="seo_description" placeholder="SEO Description" type="text" class="form-control" required style="height:120px;">{{$update_info->seo_description}}</textarea>
                               </div>
                         </div>
                         <div class="form-group float-lb">
                           <div class="html-editor">

                           </div>
                         </div>
                         <!-- <div class="form-group float-lb">
                           <div class="table-responsive">
                                <table class="table table-bordered" id="dynamic_field">
                                     <tr>

                                          <td><input type="text" name="tag[]" placeholder="Enter New Tag" class="form-control name_list" /></td>
                                          <td><button type="button" name="add" id="add" class="btn btn-success">Add Tag</button></td>
                                     </tr>
                                </table>
                           </div>
                         </div> -->

                     </div>
                 </div>
             <div class="modal-footer">
                  <button class="btn btn-success notika-btn-success">Update</button>
                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
             </div>
     </div>
   </form>
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
