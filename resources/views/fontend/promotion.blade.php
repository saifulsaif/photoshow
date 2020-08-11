@extends('fontend.index')
@include('fontend.header')
@section('content')

	<section>
		<div class="block gray ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<h3 class="mini-title">Latest News And Promition</h3>
						<div class="grids-listings">
							<div class="row">
								@foreach($promotions as $pro)
								<div class="col-md-4 col-sm-6 col-xs-12">
									<div class="listing-box">
										<div class="listing-box-thumb">
											<span class="price-list">New</span>
											<img src="{{$pro->photo}}" alt="" />
											<div class="listing-box-title">
												<!-- <h3><a href="#" title="">{{$pro->title}}</a></h3> -->
												<!-- <span>Los Angeles /  Sillicon Valley </span>	 -->
												<span>{{$pro->title}} </span>
											</div>
										</div>
										<div class="listing-rate-share">
											<div class="rated-list">
											<a target="_blank" href="{{$pro->link}}">	<span>{{$pro->link}}</span></a>
											</div>
										</div>
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
		</div>
	</section>

@endsection
