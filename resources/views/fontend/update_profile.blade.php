@extends('fontend.index')
@include('fontend.header')
@section('content')

<section>
		<div class="block no-padding">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="inner-header">
							<h2>Edit Profile</h2>
							<ul class="breadcrumbs">
								<li><a href="#" title="">Home</a></li>
								<li><a href="#" title="">Page</a></li>
								<li>Edit Profile</li>
							</ul>
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
					@if (Session::has('success'))
					  <div class="alert alert-success">
					    <p>{{Session::get('success')}}</p>
					  </div>
					@endif
					<div class="col-md-10 col-md-offset-1">
						<div class="edit-profile-sec">
							<form action="{{route('update.profile.info')}}" method="post" enctype="multipart/form-data">
								{{csrf_field() }}
								<div class="form-profile">
									<div class="row">
										<div class="col-md-12">
											<div class="change-my-dp">
												<img src="{{$profile->photo}}" alt="" />
													<input type="file" placeholder="First Name" name="photo" value="{{$profile->photo}}">
											</div>
										</div>
										<div class="col-md-12">
											<h3>About You</h3>
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="First Name" name="first_name" value="{{$profile->first_name}}">
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="Last Name" name="last_name" value="{{$profile->first_name}}">
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="alitfn58@gmail.com" name="email" value="{{$profile->email}}">
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="3032 40302 202" name="number" value="{{$profile->number}}">
										</div>
										<div class="col-md-12">
											<textarea name="description">{{$profile->description}}</textarea>
										</div>
										<div class="col-md-12">
											<h3>Social</h3>
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Facebook" name="facebook" value="{{$profile->facebook}}" />
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Youtube" name="youtube" value="{{$profile->youtube}}"/>
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Twitter"name="twitter" value="{{$profile->twitter}}" />
										</div>
										<div class="col-md-6">
											<input type="text" placeholder="Linkedin" name="linkin" value="{{$profile->linkin}}" />
										</div>
										<!-- <div class="col-md-12">
											<h3>Change Your Password</h3>
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="Current Password" />
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="New Password" />
										</div>
										<div class="col-md-12">
											<input type="text" placeholder="Confirm New Password" />
										</div> -->
									</div>
								</div>
								<div class="submission-btns">
									<button type="submit">Save Changes</button>
									<a href="#" title="">Cancel</a>
								</div>
							</form>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
