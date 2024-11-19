@extends('web_theme::layout.main')

@section('content')


		<!-- Start Page Title Area -->
		<div class="page-title-area bg-2">
			<div class="container">
				<div class="page-title-content">
					<h2>{{__('Services')}}</h2>

					<ul>
						<li>
							<a href="{{ route('web.home') }}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{__('Services')}}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- End Fetcher Services Area -->
		<section class="fetcher-servicess-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center">
					<div class="row">
						
						@foreach($services as $service)
						<div class="col-lg-6 col-sm-6">
							<div class="single-product">
								<div class="product-img">
									<img src="{{asset($service->photo_path)}}" alt="images">
		
									<ul class="social-icon">								
										<li>
											<a href="{{ route('web.service.show',['slug'=>$service->slug]) }}">
												<i class="ri-eye-fill"></i>
											</a>
										</li>
									</ul>
								</div>
							
								<div class="product-content">
									<h3>
										<a href="{{ route('web.service.show',['slug'=>$service->slug]) }}">
											{{ $service->title }}
										</a>
									</h3>
								
								</div>
							</div>
						</div>

						@endforeach
			
				
					</div>


				</div>
			</div>
		</section>
		<!-- End Fetcher Services Area -->



@endsection


