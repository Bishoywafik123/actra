@extends('web_theme::layout.main')

@section('content')

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-3">
			<div class="container">
				<div class="page-title-content">
					<h2>{{__('Services Details')}}</h2>

					<ul>
						<li>
							<a href="{{ route('web.home') }}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{__('Services Details')}}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start {{__('Services Details')}} Area -->
		<section class="services-details-area ptb-100">
			<div class="container">
				<div class="services-details-content main-default-content">
					<img src="{{asset($service->photo_path)}}" alt="images">
					<h3>{{ $service->title }}</h3>

					<div class="gap-20"></div>

					<p style="overflow-wrap: break-word;white-space: pre-line;">{{ $service->description }}</p>
				
				</div>
			</div>
		</section>



@endsection


