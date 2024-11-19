@extends('web_theme::layout.main')

@section('content')


<!-- Start Page Title Area -->
<div class="page-title-area bg-1">
	<div class="container">
		<div class="page-title-content">
			<h2>{{__($title)}}</h2>

			<ul>
				<li>
					<a href="{{ route('web.home') }}">
						{{ __('Home') }}
					</a>
				</li>

				<li class="active">{{__($title)}}</li>
			</ul>
		</div>
	</div>

	<div class="page-bg-shape">
		<img src="{{ asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
	</div>
</div>
<!-- End Page Title Area -->

<!-- Start About Area -->
<section class="about-area ptb-100">
	<div class="container">
		<div class="row align-items-center">
			<div class="col-lg-6">
				<div class="about-img mb-0 pr-15">
					<img src="{{ asset('themes/web/assets/images/about-img.png')}}" alt="Image">

					<div class="year">
						<img src="{{ asset('themes/web/assets/images/year.png')}}" alt="Image">
					</div>

					<div class="year-shape">
						<img src="{{ asset('themes/web/assets/images/year-shape.png')}}" alt="Image">
					</div>
				</div>
			</div>

			<div class="col-lg-6">
				<div class="about-content pl-15">
					<span class="top-title">{{__($title)}}</span>
					{{-- <h2>{{__('We Are Modern Innovative Manufacturer Company')}}</h2> --}}
					<p style="overflow-wrap: break-word; white-space: pre-line">{{$content}}</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- End About Area -->


@endsection


