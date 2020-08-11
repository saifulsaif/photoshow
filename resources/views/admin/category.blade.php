
@extends('admin.app')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
<div class="data-table-area">
       <div class="container">
           <div class="row">
               <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                   <div class="data-table-list">
                       <div class="basic-tb-hd">
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
                           <h2> Image Category</h2>
                           <p style="margin-bottom: 0px;float: right;color: white;"><button class="btn notika-btn-teal waves-effect"data-toggle="modal" data-target="#myModaltwo"><i class="notika-icon notika-plus"></i>Add</button>

                           </p>
                       </div>
                       <div class="modal fade" id="myModaltwo" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                    <form action="{{route('category.save')}}" method="post" enctype="multipart/form-data">
                                          {{csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Add Category</h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="name" type="text" placeholder="Category Name" class="form-control">
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
                                       <th>Name</th>
                                       <th> Image</th>
                                       <th>Option</th>
                                   </tr>
                               </thead>
                               <tbody>
                                 @php $i=1; @endphp
                                 @foreach($categorys as $category)
                                   <tr>
                                       <td>{{$i++}}</td>
                                       <td>{{$category->created_at}}</td>
                                       <td>{{$category->name}}</td>
                                       <td><img  style="background-color:#00c292;" src="{{asset($category->image)}}" alt="" /></td>
                                       <td><button style="background: #00BCD4;color:white;" class="btn notika-btn-teal waves-effect"data-toggle="modal" data-id="{{$category->id}}" id="editff"  data-target="#myModal"><i class="notika-icon notika-edit"></i></button>
                                        <a href="{{url('/admin/catgory/delete')}}/{{$category->id}}"> <button class="btn btn-danger danger-icon-notika waves-effect"><i class="notika-icon notika-trash"></i></button></td>
                                   </tr>
                                   @endforeach
                               </tbody>
                           </table>
                       </div>
                       <div class="modal fade" id="myModal" role="dialog">
                                    <div class="modal-dialog modal-sm">
                                    <form action="{{route('slider.save')}}" method="post" enctype="multipart/form-data">
                                          {{csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <h2>Edit Category</h2>
                                                <div class="row">
                                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                        <div class="form-group float-lb">
                                                            <div class="nk-int-st">
                                                                <input name="id" type="text" id="id" class="form-control">
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
   $( document ).ready(function() {
    console.log( "ready!" );
     });

     $('#editffd').on('show.bs.modal', function (event) {
        console.log('modal open');
       var button = $(event.relatedTarget);
       //var id = button.data('id');
       var id='22';
       var modal = $(this);

        console.log('id');

       modal.find('.modal-body #id').val(id);
   })
    console.log('modal open');
   </script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
@endsection
