@extends('fontend.index')
@include('fontend.header')
@section('content')
<section>
		<div class="block no-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-header">
							<h2>Contact Us</h2>
							<ul class="breadcrumbs">
								<li><a href="#" title="">Home</a></li>
								<li><a href="#" title="">Page</a></li>
								<li>Contact us</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray no-padding">
			<div class="row">
				<div class="col-md-12">
					<div class="contact-map">
						<div id="map-container">
						    <div id="map_div">&nbsp;</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<section>
		<div class="block gray">
			<div class="container">
				<div class="row">
					<div class="col-md-8 column">
						<h3 class="mini-title">Form</h3>
						<div class="contactus-form"  id="contact">
							<div id="message"></div>
							<form method="post" action="contact.php" name="contactform" id="contactform">
								<div class="row">
									<div class="col-md-6"><input name="name" type="text" id="name" placeholder="Name" /></div>
									<div class="col-md-6"><input  name="email" type="text" id="email" placeholder="Email"  /></div>
									<div class="col-md-12"><input type="text" placeholder="Subject" /></div>
									<div class="col-md-12"><textarea name="comments" id="comments" placeholder="Message"></textarea></div>
									<div class="col-md-12"><input type="submit" id="submit" value="send message" /></div>
								</div>
							</form>
						</div>
					</div>
					<div class="col-md-4 column">
						<div class="contact-info-box">
							<h3 class="mini-title">Contact Information</h3>
							<div class="contact-box">
								<ul>
									<li>
										<i class="la la-map-marker"></i>
										<h4>Address</h4>
										<span>{{$settings->address}}</span>
									</li>
									<li>
										<i class="la la-phone"></i>
										<h4>Phone Number</h4>
										<span>{{$settings->phone}}</span>
									</li>
									<li>
										<i class="la la-envelope-o"></i>
										<h4>Email</h4>
										<span>{{$settings->gmail}}</span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
