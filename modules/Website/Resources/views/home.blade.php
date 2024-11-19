@extends('web_theme::layout.main')

@section('content')

	<!-- Start Hero Slider Area -->
	<div class="section">
		<video class="responsive-video" autoplay muted loop>
			<source src="{{ asset('system/storage/app/public/video_slider/' . $option['video']) }}" type="video/mp4">
				{{ __('Your browser does not support the video tag.') }}
		</video>
	</div>
	
	<!-- End Hero Slider Area -->

	<!-- Start About Area -->
	<section class="about-area ptb-100">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-6">
					<div class="about-img pr-15">
						<img src="{{ asset('themes/web/assets/images/about-img.png') }}" alt="{{ __('Image') }}">

						<div class="year">
							<img src="{{ asset('themes/web/assets/images/year.png') }}" alt="{{ __('Image') }}">
						</div>

						<div class="year-shape">
							<img src="{{ asset('themes/web/assets/images/year-shape.png') }}" alt="{{ __('Image') }}">
						</div>
					</div>
				</div>

				<div class="col-lg-6">
					<div class="about-content pl-15">
						<span class="top-title">{{ __('about us') }}</span>
						<h2>{{ __('ACTRA For Chemical Industries') }}</h2>
						
						<p style="white-space: pre-line;">{{ Str::limit($option['about'], 500, '...') }}</p>
				
						<a href="{{ route('web.page', ['page' => 'about']) }}" class="default-btn">
							{{ __('more about us') }}
							<i class="ri-arrow-right-line"></i>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End About Area -->

	<!-- Start Product Area -->
	<section class="latest-project-slider-area style-two pt-100 pb-100">
		<div class="container">
			<div class="section-title">
				<span class="top-title">{{ __('our products') }}</span>
				<h2>{{ __("We'll Love To Show Our Product") }}</h2>
			</div>

			<div class="latest-project-slider-two owl-carousel owl-theme">
				@foreach($products as $product)
				<div class="single-latest-project">
					<img src="{{ asset('system/storage/app/public/project/img/' . $product->main_photo) }}" style="height: 416px;" alt="{{ __('Image') }}">

					<div class="project-slider-content">
						<a href="{{ route('web.product.show', [$product->category->slug, $product->slug, 'id' => $product->id]) }}">
							<i class="ri-arrow-right-line"></i>
						</a>

						<h3>
							<a href="{{ route('web.product.show', [$product->category->slug, $product->slug, 'id' => $product->id]) }}">
								{{ $product->title }}
							</a>
						</h3>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>
	<!-- End Product Area -->

	<section class="fetcher-services-area ptb-100">
		<div class="container">
			<div class="section-title">
				<span class="top-title">{{ __('why choose us') }}</span>
				<h2>{{ __('We Are Different Than Others') }}</h2>
			</div>
			<div class="row">
				@foreach($whies as $why)
				<div class="col-lg-3 col-sm-6">
					<div class="single-fetcher-services">
						<img src="{{ asset('system/storage/app/public/why/img/' . $why->photo) }}" style="width: 77px; height: 77px;" alt="{{ __('Image') }}">

						<h3>
							<a style="overflow-wrap: break-word;" href="#">
								{{ $why->name }}
							</a>
						</h3>

						<p style="white-space: pre-line; overflow-wrap: break-word;">{{ $why->description }}</p>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

	<!-- Start Latest News Area -->
	<section class="latest-news-area pt-100 pb-70">
		<div class="container-fluid">
			<div class="row">
				<div class="col-lg-4">
					<div class="blog-title-content">
						<span class="top-title">{{ __('latest news') }}</span>
						<h2>{{ __('Read Our Latest Blog To Stay Up-To-Date') }}</h2>

						<a class="default-btn" href="{{ route('web.news') }}">
							{{ __('view more') }}
							<i class="ri-arrow-right-line"></i>
						</a>
					</div>
				</div>

				<div class="col-lg-8">
					<div class="blog-slider owl-carousel owl-theme">
						@foreach($newses as $news)
						<div class="single-blog">
							<div class="blog-img">
								<img src="{{ asset($news->photo) }}" style="width: 314px; height: 219px;" alt="{{ __('Image') }}">

								<a href="{{ route('web.news.show', [$news->slug, 'id' => $news->id]) }}" class="read-more-icon">
									<i class="ri-arrow-right-line"></i>
								</a>
							</div>

							<div class="blog-content">
								<h3>
									<a href="{{ route('web.news.show', [$news->slug, 'id' => $news->id]) }}">
										{{ $news->title }}
									</a>
								</h3>
								<p>{{ Str::limit($news->content, 20, '...') }}</p>
							</div>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- End Latest News Area -->

	@if(!session()->has('cookie_accepted'))
	<div id="cookieConsent" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background: #fff; padding: 20px; border: 3px solid #276431; z-index: 1000; color: #000000; text-align: center; max-width: 90%; width: auto; height: auto; border-radius: 25px;">
		<p style="font-size: 14px;">{{ __('Welcome to ACTRA For Chemical Industries') }}, <br> {{ __('We use cookies to ensure you get the best experience') }}.</p>
		<a href="{{ route('web.cookies') }}" class="default-btn" style="display: block; margin: 5px 0;"><span>{{ __('Learn more') }}</span></a>
		<a href="#" id="acceptCookies" class="default-btn" style="display: block; margin: 5px 0;"><span>{{ __('Accept') }}</span></a>
		<a href="#" id="rejectCookies" class="default-btn" style="display: block; margin: 5px 0;"><span>{{ __('Reject') }}</span></a>
	</div>
	@endif
@endsection

@section('pageScripts')
<script>
	document.getElementById('acceptCookies').addEventListener('click', function() {
		fetch('{{ route('web.accept.cookie') }}', { method: 'POST', headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'} });
	});
</script>
@endsection
