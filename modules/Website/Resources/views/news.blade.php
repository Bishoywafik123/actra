@extends('web_theme::layout.main')

@section('content')


		<!-- Start Page Title Area -->
		<div class="page-title-area bg-7">
			<div class="container">
				<div class="page-title-content">
					<h2>{{ __('Our News') }}</h2>
					<ul>
						<li>
							<a href="{{ route('web.home') }}">
								{{ __('Home') }} 
							</a>
						</li>
						<li class="active">{{ __('Our News') }}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Latest News Area -->
		<section class="latest-news-area blog-page pt-100 pb-70">
			<div class="container">
				<div class="row">

					@foreach($news as $new)
					<div class="col-lg-4 col-md-6">
						<div class="single-blog">
							<div class="blog-img">
								<img src="{{ asset($new->photo) }}" style="height: 290px;" alt="Image">
								<a href="{{ route('web.news.show',['slug'=>$new->slug,'id'=>$new->id]) }}" class="read-more-icon">
									<i class="ri-arrow-right-line"></i>
								</a>
							</div>

							<div class="blog-content">
								<h3>
									<a href="{{ route('web.news.show',['slug'=>$new->slug,'id'=>$new->id]) }}">
										{{ $new->title }}
									</a>
								</h3>
								<p>{{ Str::limit($new->content,40,'...') }}</p>
							</div>
						</div>
					</div>

					<br>
					<br>
					@endforeach

					<!--
					<div class="col-lg-12">
						<div class="text-center">
							<button class="default-btn">
								Load More
								<i class="ri-arrow-right-line"></i>
							</button>
						</div>
					</div>
					-->
					
					{{-- <div class="col-12">
						<div class="pagination-area">
							<a href="#" class="prev page-numbers">
								<i class="ri-arrow-left-line"></i>
							</a>
							<span class="page-numbers current" aria-current="page">1</span>
							<a href="#" class="page-numbers">2</a>
							<a href="#" class="page-numbers">3</a>
							
							<a href="#" class="next page-numbers">
								<i class="ri-arrow-right-line"></i>
							</a>
						</div>
					</div> --}}

				</div>
			</div>
		</section>
		<!-- End Latest News Area -->

    
@endsection


