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
							<div class="col-md-3">
								<div class="single-product-gallery">
									<ul class="single-product-images">
										<li><img src="{{$profile->photo}}" alt="" />
										</li>
								  	</ul>
										<div class="single-product-info" style="margin-top:10px;">
											<a style="float:right;" href="{{route('update.profile')}}" title=""><i class="la la-edit"></i> 	<span>Update</span></a>
										</div>
								</div>
							</div>
							@php
							$user_id=Auth::user()->id;
							$points = App\Point::where('user_id',$user_id)->first();
							$money=$points->point/1000;
						 @endphp
							<div class="col-md-9">
								<div class="single-product-info">
									<div class="apply-coupons">
												<form>
													<input type="text" placeholder="{{$money}} Taka"readonly>
													<input type="submit" value="Withdaw Money">
												</form>

											</div>
									<h3>{{$profile->first_name}}{{$profile->first_name}}</h3>
									<div class="shop-category">
										<span>Number</span>
										<a href="#" title="">{{$profile->number}}</a>
									</div>
									<div class="shop-category">
										<span>Email</span>
										<a href="#" title="">{{$profile->email}}</a>
									</div>
									<div class="shop-category">
										<span>Categories</span>
										<a href="#" title="">Food</a>
										<a href="#" title="">Wine</a>
										<a href="#" title="">Drink</a>
									</div>
									<div class="shop-share">
										<span>Social Media </span>
										<a href="{{$profile->twitter}}" title=""><i class="la la-twitter"></i></a>
										<a href="{{$profile->youtube}}" title=""><i class="la la-youtube"></i></a>
										<a href="{{$profile->linkin}}" title=""><i class="la la-linkedin"></i></a>
										<a href="{{$profile->facebook}}" title=""><i class="la la-facebook"></i></a>
									</div>
									<p>{{$profile->description}}</p>

									<div class="custom-tabs">
										<div class="tab-sec">
											<ul class="nav nav-tabs">
													<li><a class="current" data-tab="description">Description</a></li>
													<li><a data-tab="information">Additional Information</a></li>
													<li><a data-tab="reviews">Reviews (1)</a></li>
											</ul>
											<div id="description" class="tab-content current">
												<div class="description">
													<p>{{$profile->description}}</p>
													</div>
											</div>
											<div id="information" class="tab-content">
												<ul class="additional-information">
													<li><strong>WEIGHT</strong><span>5 kg</span></li>
													<li><strong>DIMENSIONS</strong><span>10 x 20 x 15 </span></li>
												</ul>
											</div>
											<div id="reviews" class="tab-content">
												<div class="review-list-sec">
													<ul>
														<li>
															<div class="review-list">
																<div class="review-avatar"> <img src="http://placehold.it/90x90" alt="" /> </div>
																<div class="reviewer-info">
																	<h3><a href="#" title="">Jamies Giroux</a></h3>
																	<span>7 months ago</span>
																	<p>Donec nec tristique sapien. Aliquam ante felis, sagittis sodales diam sollicitudin, dapibus semper turpis</p>
																</div>
																<div class="reviewer-stars">
																	<b class="la la-star"></b>
																	<b class="la la-star"></b>
																	<b class="la la-star"></b>
																	<b class="la la-star"></b>
																	<b class="la la-star"></b>
																</div>
															</div>
														</li>
													</ul>
												</div>
												<div class="add-review-form">
													<div class="add-your-stars">
														<h5>Your Rating</h5>
														<div class="reviewer-stars">
															<b class="la la-star"></b>
															<b class="la la-star"></b>
															<b class="la la-star"></b>
															<b class="la la-star"></b>
															<b class="la la-star"></b>
														</div>
													</div>
													<form>
														<div class="row">
															<div class="col-md-6"><input type="file" placeholder="Name *" /></div>
															<div class="col-md-6"><input type="text" placeholder="Email *" /></div>
															<div class="col-md-12"><textarea placeholder="Comment *"></textarea></div>
															<div class="col-md-12"><button type="submit">SUBMIT YOUR REVIEW</button></div>
														</div>
													</form>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 column">
								<div class="filter-bar">
									<span>
										@php $i=0; @endphp
											@foreach($photos as $photo)
											@php $i++; @endphp
											@endforeach
											{{$i}}
										 Photos</span>
									<div class="open-filter-btns">
										<span class="close-filter"><i class="la la-close"></i> Close</span>
										<span class="open-filter"><i class="la la-camera"></i>Upload</span>
									</div>
									<div class="side-search-form with-filters">
										<form action="{{route('save.photo')}}" method="post" enctype="multipart/form-data">
											   {{csrf_field() }}
											<div class="row">
												<div class="col-md-4">
													<select data-placeholder="All Locations" name="category_id" class="chosen-select" tabindex="2">
											            <option value="All Locations">Select Category</option>
																	@foreach($categorys as $cat)
																	<option value="{{$cat->id}}">{{$cat->name}}</option>
																	@endforeach
											        </select>
												</div>
												<div class="col-md-4">
													<input type="text" name="title" class="input-style" placeholder="Image Title" />
												</div>
												<div class="col-md-4">
													<input type="file" name="photo" class="input-style" placeholder="Image Title" />
												</div>
												<div class="col-md-12">

												</div>
												<div class="col-md-12">
													<button type="submit">Upload</button>
												</div>
											</div>
										</form>
									</div>
								</div>
						<div class="product-sec">
							<div class="products-box">
								<div class="row">
									@foreach($photos as $photo)
									<div class="col-md-3 col-sm-6 col-xs-12">
										<div class="product-box">
											<div class="product-thumb">
												<img src="{{$photo->photo}}" alt="" />
													<a href="{{ route('delete.photo', $photo->id) }}" title=""><i style="margin-top: 5px;" class="la la-trash"></i></a>
											</div>
											<h3><a href="#" title="">{{$photo->title}}</a></h3>
										</div>
									</div>
									@endforeach
								</div>
							</div>
							<div class="pagination">
								<ul>
									<li class="prev"><a href=""><i class="la  la-arrow-left"></i></a></li>
									<li><a href="">1</a></li>
									<li><a class="active" href="">2</a></li>
									<li><a href="">3</a></li>
									<li><span class="delimeter">...</span></li>
									<li><a href="">22</a></li>
									<li class="next"><a href=""><i class="la  la-arrow-right"></i></a></li>
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
@endsection
