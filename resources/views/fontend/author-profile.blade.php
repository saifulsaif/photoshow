@extends('fontend.index')
@include('fontend.header')
@section('content')

<section>
	<div class="block gray ">
		<div class="container">
			<div class="row">
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
				<div class="col-md-12 column">
					<div class="shoping-detail-sec">
						<div class="row">
							<div class="col-md-9 col-ms-6">
								<div class="row">
									<div class="col-md-4 col-ms-4" style="text-align:center;">
										@php
										$author_photo= App\Profile::where('user_id',$id)->first();
										$author_follower= App\Follower::where('followers',$author_photo->id)->get();
										$followers=0;
										foreach($author_follower as $follow){
											$followers++;
										}
										@endphp
										<!-- {{url('/user/profile')}}/{{$author_photo->user_id}} -->
										<div class="review-avatar"> <a href="{{url('/author-profile')}}/{{$author_photo->id}}"> <img style="border-radius: 50%;height: 176px;width: 176px;" src="{{asset('/'.$author_photo->photo)}}" alt=""> </a></div>

										<h4 style="font-size: 24px;margin: 16px;">{{$author_photo->first_name}}{{$author_photo->last_name}}</h4>
										<div class="social">
											<div class="shop-share">
												<span>Social Media </span>
												<a href="{{$author_photo->twitter}}" title=""><i class="la la-twitter"></i></a>
												<a href="{{$author_photo->youtube}}" title=""><i class="la la-youtube"></i></a>
												<a href="{{$author_photo->linkin}}" title=""><i class="la la-linkedin"></i></a>
												<a href="{{$author_photo->facebook}}" title=""><i class="la la-facebook"></i></a>
											</div>
										</div>
									</div>
									<div class="col-md-2 col-ms-4">
										 <h5>Follower</h5>
										 @if($followers>1000)
                       @php $followers=($followers/1000); @endphp
											 <span>{{$followers}}K	 Follows</span>
										 @else
										 <span>{{$followers}}  Follows</span>
										 @endif
									</div>
									<div class="col-md-2 col-ms-4">

										<h5> Upload</h5>

									</div>
									<div class="col-md-2 col-ms-4">

										<h5> Download</h5>

									</div>
									<div class="col-md-2 col-ms-4">

										<h5>Following</h5>

									</div>
								</div>
								<div class="single-product-gallery">
								</div>
							</div>
							<div class="col-md-3 col-ms-6">
								<div class="single-product-info-a">
									<button type="button" id="button" class="follow">Follow</button>
								</div>
							</div>
							<div class="col-md-12 column">

								<div class="filter-bar">
									<span style="color: #1c2027;float: left;font-family: Roboto;font-size: 15px;margin: 11px 0;font-weight: 500;">Upload Photos</span>
								</div>
						<div class="product-sec">
							<div class="products-box">
								<div class="row">


									<div class="col-md-3 col-sm-6 col-xs-12">
										@foreach($related_photos as $photo)
										@if($photo->id%4==0)
										<div class="product-box">
											<div class="product-thumb">
												<img src="{{'http://www.freedownloadimage.com/'.$photo->photo}}" alt="" />

											</div>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==1)
										<div class="product-box">
											<div class="product-thumb">
												<img src="{{'http://www.freedownloadimage.com/'.$photo->photo}}" alt="" />

											</div>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==2)
										<div class="product-box">
											<div class="product-thumb">
												<img src="{{'http://www.freedownloadimage.com/'.$photo->photo}}" alt="" />

											</div>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==3)
										<div class="product-box">
											<div class="product-thumb">
												<img src="{{'http://www.freedownloadimage.com/'.$photo->photo}}" alt="" />

											</div>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
								</div>
							</div>
							<div class="pagination">

								<ul>
										<span style="color:red;">{{$related_photos->links()}}</span>
								</ul>
							</div>
						</div>
					</div>
						</div>
					</div><!-- Shoping Detail Sec -->
				</div>
			</div>
		</div>
	</div>
</section>
<script>
			$(document).on('click', '#button', function(e){
			$.ajax({
				alert('work');

			});
			});
</script>
@endsection
