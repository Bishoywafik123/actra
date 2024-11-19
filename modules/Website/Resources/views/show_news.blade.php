@extends('web_theme::layout.main')

@section('content')
	<!-- Start Page Title Area -->
	<div class="page-title-area bg-8">
		<div class="container">
			<div class="page-title-content">
				<h2>{{ $news->title }}</h2>

				<ul>
					<li>
						<a href="{{ route('web.home') }}">
							{{ __('Home') }} 
						</a>
					</li>

					<li class="active">{{ $news->title }}</li>
				</ul>
			</div>
		</div>

		<div class="page-bg-shape">
			<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
		</div>
	</div>
	<!-- End Page Title Area -->

	<section class="blog-details-area ptb-100">
		<div class="container">
			<div class="main-default-content">
				<div class="blog-info-card">
					<h2>{{ $news->title }}</h2>

					<img src="{{ asset($news->photo) }}" alt="Image">

				
				</div>

				<div class="gap-20"></div>

				<p style="overflow-wrap: break-word;white-space: pre-line;">{{ $news->content }}</p>

				
				{{-- <div class="tag-bar">
					<div class="row align-items-center">
						<div class="col-lg-6 col-md-6">
							<ul class="tag-list">
								<li>
									<a href="blog.html">Business</a>
								</li>
								<li>
									<a href="blog.html">Industry</a>
								</li>
								<li>
									<a href="blog.html">Success</a>
								</li>
							</ul>
						</div>
					</div>
				</div>	 --}}
				
				
			</div>
		</div>
	</section>
	
	
@endsection


