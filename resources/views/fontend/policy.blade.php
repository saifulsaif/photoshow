@extends('fontend.index')
@include('fontend.header')
@section('content')

	<section>
		<div class="block gray ">
			<div class="container">
				<div class="row">
					<div class="col-md-12 column">
						<div class="terms-sec">
							<h3 class="mini-title">Privacy And Policy</h3>
							<div class="terms">
							@php echo'<div class="terms">'.$policy->text.'</div>'; @endphp
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

@endsection
