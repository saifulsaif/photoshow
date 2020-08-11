@extends('fontend.index')
@include('fontend.header')
@section('content')

<section>
		<div class="block gray remove-top">
			<div class="row">
				<div class="col-md-12">
					<div class="list-detail-sec">
						<ul class="list-detail-carousel" id="listing-detail-carousel">
							<li>
								<div class="list-detail-box">
									<img src="{{asset('images/slider/ld1.jpg')}}" alt="" />
									<div class="list-detail-info">
										<div class="directory-searcher" style="height: 60px;">
											<form action="{{route('search.photo')}}" method="post" enctype="multipart/form-data">
													 {{csrf_field() }}
				                <div class="field"><input name="keyword" type="text" placeholder="Keywords"></div>

				                <div class="field">
				                  <select data-placeholder="All Categories" name="category" class="chosen-select" tabindex="2">
				                          <option value="">All Categories</option>
																	@foreach($categorys as $cat)
 																 <option value="{{$cat->id}}">{{$cat->name}}</option>
 																 @endforeach
				                      </select>
				                </div>
				                <div class="field">
				                  <button type="submit"><i class="la la-search"></i>SEARCH</button>
				                </div>
				              </form>
				            </div>
										<h3>FIND YOUR BEST HERE.....</h3>
										<span></span>
										<span></span>
										<p></p>
										<div class="rated-list">

										</div>
										<ul class="list-detail-metas">

										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="list-detail-box">
									<img src="{{asset('images/slider/ld2.jpg')}}" alt="" />
									<div class="list-detail-info">
										<div class="directory-searcher" style="height: 60px;">
											<form action="{{route('search.photo')}}" method="post" enctype="multipart/form-data">
													 {{csrf_field() }}
				                <div class="field"><input type="text" name="keyword" placeholder="Keywords"></div>

				                <div class="field">
				                  <select data-placeholder="All Categories" name="category" class="chosen-select" tabindex="2">
				                          <option value="All Categories">All Categories</option>
																	<option value="All Categories">All Categories</option>
																	@foreach($categorys as $cat)
																 <option value="{{$cat->id}}">{{$cat->name}}</option>
																 @endforeach
				                      </select>
				                </div>
				                <div class="field">
				                  <button type="submit"><i class="la la-search"></i>SEARCH</button>
				                </div>
				              </form>
				            </div>
										<h3>FIND YOUR BEST HERE.....</h3>
										<span></span>
										<span></span>
										<p></p>
										<div class="rated-list">

										</div>
										<ul class="list-detail-metas">

										</ul>
									</div>
								</div>
							</li>
							<li>
								<div class="list-detail-box">
									<img src="{{asset('images/slider/ld3.jpg')}}" alt="" />
									<div class="list-detail-info">
										<div class="directory-searcher" style="height: 60px;">
											<form action="{{route('search.photo')}}" method="post" enctype="multipart/form-data">
													 {{csrf_field() }}
												<div class="field"><input type="text" name="keyword" placeholder="Keywords"></div>

												<div class="field">
													<select data-placeholder="All Categories" name="category" class="chosen-select" tabindex="2">
																	<option value="All Categories">All Categories</option>
																	@foreach($categorys as $cat)
																 <option value="{{$cat->id}}">{{$cat->name}}</option>
																 @endforeach
															</select>
												</div>
												<div class="field">
													<button type="submit"><i class="la la-search"></i>SEARCH</button>
												</div>
											</form>
				            </div>
										<h3>FIND YOUR BEST HERE.....</h3>
										<span></span>
										<span></span>
										<p></p>
										<div class="rated-list">

										</div>
										<ul class="list-detail-metas">

										</ul>
									</div>
								</div>
							</li>
						</ul>
						<div class="mian-listing-detail">
							<div class="container-flud">
								<div class="row">
									<div class="col-md-12 column">
										@guest
										<div class="filter-bar">
											<span style="color: #1c2027;float: left;font-family: Roboto;font-size: 24px;margin: 11px 0;font-weight: 500;">Free Download Photos </span>
										</div>
										@else
										<div class="filter-bar">
											<span> You have
												@php $i=0; @endphp
													@foreach($photos as $photo)
													@php $i++; @endphp
													@endforeach
													{{$i}}
												 photos here.</span>
											<div class="open-filter-btns">
												<span class="close-filter"><i class="la la-close"></i> Close</span>
												<span class="open-filter"><i class="la la-camera"></i>Upload</span>
											</div>
											<div class="side-search-form with-filters">
												<form action="{{route('search.photo')}}" method="post" enctype="multipart/form-data">
														 {{csrf_field() }}
													<div class="row">
														<div class="col-md-4">
															<select data-placeholder="All Locations" name="category_id" class="chosen-select" tabindex="2">
																			<option value="All Locations">Select Category</option>
																			<option value="1">hotel</option>
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
										@endguest
										<div class="row" style="margin-tor:30px;">
										 <div class="do-tonight-sec">
											 <div class="row">
											 @foreach($photos as $photo)
														 <div class="col-md-3">
															 <div class="dt-box">
																 <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{asset('/'.$photo->photo)}}" alt="" /></a>
																 <span>{{$photo->title}}</span>
															 </div>
														 </div>
														 @endforeach
											 </div>
											 <!-- <div class="row">
														 <div class="col-md-3">
														 @foreach($photos as $photo)
															 <div class="dt-box">
																 <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{asset('/'.$photo->photo)}}" alt="" /><span>{{$photo->title}}</span></a>
															 </div>
															 @endforeach
														 </div>
														 <div class="col-md-3">
														 @foreach($photos as $photo)
															 <div class="dt-box">
																 <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{asset('/'.$photo->photo)}}" alt="" /><span>{{$photo->title}}</span></a>
															 </div>
															 @endforeach
														 </div>
														 <div class="col-md-3">
														 @foreach($photos as $photo)
															 <div class="dt-box">
																 <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{asset('/'.$photo->photo)}}" alt="" /><span>{{$photo->title}}</span></a>
															 </div>
															 @endforeach
														 </div>
														 <div class="col-md-3">
														 @foreach($photos as $photo)
															 <div class="dt-box">
																 <a href="{{url('/photos/view')}}/{{$photo->id}}/{{$photo->category_id}}" title=""><img src="{{asset('/'.$photo->photo)}}" alt="" /><span>{{$photo->title}}</span></a>
															 </div>
															 @endforeach
														 </div>
											 </div> -->
										 </div>
									 </div>
									</div>
								</div>
								<div class="pagination">

									<ul>
											<span style="color:red;">{{$photos->links()}}</span>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
