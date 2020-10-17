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
							<div class="col-md-4">
								<div class="row">
									<div class="col-md-3 col-ms-4">
										@foreach($photos as $photo)
										@php
										$author_photo= App\Profile::where('user_id',$photo->user_id)->first();
										$author_follower= App\Follower::where('followers',$author_photo->user_id)->get();
										$followers=0;
										foreach($author_follower as $follow){
											$followers++;
										}
										@endphp
										<!-- {{url('/user/profile')}}/{{$author_photo->user_id}} -->
										<div class="review-avatar"> <a href="{{url('/author-profile')}}/{{$author_photo->user_id}}"> <img style="border-radius: 50%;height: 65px;width: 65px;" src="{{asset('/'.$author_photo->photo)}}" alt=""> </a></div>
										@endforeach
									</div>
									<div class="col-md-6 col-ms-4">
										 <h5 style="font-size: 19px;">{{$author_photo->first_name}}{{$author_photo->last_name}}</h5>
										 @if($followers>1000)
                       @php $followers=($followers/1000); @endphp
											 <span>{{$followers}}K	 Follows</span>
										 @else
										 <span>{{$followers}}  Follows</span>
										 @endif
									</div>
									<div class="col-md-3 col-ms-4">

											<button type="button" id="button" class="follow">Follow</button>

									</div>
								</div>
								<div class="single-product-gallery">
								</div>
							</div>
							@foreach($photos as $photo)
							<div class="col-md-4">
								<div class="single-product-gallery">
									<ul class="single-product-images">

										<li><img style="padding:9px;" src="{{asset('/'.$photo->photo)}}" alt="" />

										</li>
								  	</ul>

								</div>
							</div>
							<div class="col-md-4">
								<div class="single-product-info-a">
									<a class="download" href="{{asset('/'.$photo->photo)}}" download title=""><i class="la la-download"></i> 	<span>Free Download</span></a>

								</div>
							</div>
						@endforeach
							<div class="col-md-12 column">
							    <div class="filter-bar">
								<h1>{{$photo->title}}</h1>		
								</div>
							    <div class="filter-bar">
									<span style="color: #1c2027;float: left;font-family: Roboto;font-size: 24px;margin: 11px 0;font-weight: 500;">Related Tags</span><br/>
								@foreach($related_tags as $tag)
								 <a class="rd__tag" data-track-action="medium-related-tags" data-track-label="tag" href="{{url('/photos/tag')}}/{{$tag->tag}}">{{$tag->tag}}</a>
								@endforeach
								</div>
								<div class="filter-bar">
									<span style="color: #1c2027;float: left;font-family: Roboto;font-size: 24px;margin: 11px 0;font-weight: 500;">Related Photos</span>
								</div>
						<div class="product-sec">
							<div class="products-box">
								<div class="row">


									<div class="col-md-3 col-sm-6 col-xs-12">
										@foreach($related_photos as $photo)
										@if($photo->id%4==0)
										<div class="product-box">
											<a  class="product-thumb" href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}">
													<img src="{{asset('/'.$photo->photo)}}" alt="" />
										  </a>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==1)
										<div class="product-box">
											<a  class="product-thumb" href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}">
													<img src="{{asset('/'.$photo->photo)}}" alt="" />
											</a>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==2)
										<div class="product-box">
											<a  class="product-thumb" href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}">
													<img src="{{asset('/'.$photo->photo)}}" alt="" />
											</a>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}" title="">{{$photo->title}}</a></h3>
										</div>
										@endif
										@endforeach
									</div>
									<div class="col-md-3 col-sm-6 col-xs-12">
									@foreach($related_photos as $photo)
									@if($photo->id%4==3)
										<div class="product-box">
											<a  class="product-thumb" href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}">
													<img src="{{asset('/'.$photo->photo)}}" alt="" />
										  </a>
											<h3><a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}/{{Str::slug($photo->title)}}" title="">{{$photo->title}}</a></h3>
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
