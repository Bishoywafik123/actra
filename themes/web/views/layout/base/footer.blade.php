	<!-- Start Footer Area -->
	<div class="footer-area pt-100 pb-70">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-lg-4 col-sm-12">
					<div class="single-footer-widget">
						<a href="{{route('web.home')}}">
							<img src="{{asset('themes/web/assets/images/logo-f.png')}}" alt="Image">
						</a>

						<p style="white-space: pre-line;    overflow-wrap: break-word;">{{ $option['app_description'] }}</p>	
					</div>
				</div>

				<div class="col-lg-2 col-sm-6">
					<div class="single-footer-widget">
						<h3>{{__('quick links')}} </h3>

						<ul class="import-link">
							<li>
								<a href="{{ route('web.page',['page'=>'about']) }}">
									{{__('about us')}}
								</a>
							</li>
							<li>
								<a href="{{ route('web.services') }}">
									{{__('Services')}}
								</a>
							</li>
							<li>
								<a href="{{ route('web.categories') }}">
									{{__('products')}} 
								</a>
							</li>
							<li>
								<a href="{{ route('web.news') }}">
									{{__('news')}}  
								</a>
							</li>
							<li>
								<a href="{{ route('web.cookies') }}">
									{{__('cookies')}}  
								</a>
							</li>
							<li>
								<a href="{{ route('web.request_quote') }}">
									{{__('join us')}} 
								</a>
							</li>
							<li>
								<a href="{{route('web.contact')}}">
									{{__('contact us')}} 
								</a>
							</li>
						</ul>
					</div>
				</div>

				<div class="col-lg-2 col-sm-6">
					<div class="single-footer-widget">
						<h3>{{__('our products')}}</h3>

						<ul class="import-link">
							@foreach($categories as $category)
							<li><a href="{{ route('web.category.show',['slug'=>$category->slug,'id'=>$category->id]) }}">{{$category->name}} </a></li>
							@endforeach
						</ul>
					</div>
				</div>

				<div class="col-lg-4 col-sm-12">
					<div class="single-footer-widget">
						<h3>{{__('contact us')}} </h3>
						<ul class="address-link">
							<li>
								<i class="ri-phone-line"></i>
								<a href="tel:{{ $option['phone1'] }} ">{{ $option['phone1'] }} </a>
							</li>
							<li>
								<a href="mailto:{{ $option['email1'] }}">
									<i class="ri-mail-line"></i>
									<span>{{ $option['email1'] }}</span>
								</a>
							</li>
							<li>
								<i class="ri-map-pin-line"></i>
								{{__('technical office')}}: {{ __('Building 27B Ismailia Street, Kafr Abdo, Alexandria') }}
							</li>
							<li>
								<i class="ri-map-pin-line"></i>
								{{__('factory 19')}}: {{ __('Plot 19, Second Industrial Zone, New Nubaria City, Abu Al Matamir Center, Beheira')}} .
							</li>
							<li>
								<i class="ri-map-pin-line"></i>
								{{__('factory 277')}}: {{ __('Plot 277 Second Industrial Zone, New Noubaria City, Abu Al Matamir Center, Beheira')}} . 
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Footer Area -->

	<!-- Start Copy Right Area -->
	<div class="copy-right-area">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-8">
					<p class="copyright">{{ __('©2024 Copyright All Rights Reserved ACTRA | Powered by')}} <a href="https://egydesigner.com" target="_blank" > EGYdesigner </a></p>
				</div>

				<div class="col-lg-4">
					<ul class="copy-right-icon">
						<li><a href="{{ $option['facebook'] }}" target="_blank"><i class="ri-facebook-fill"></i></a></li>
						<li><a href="{{ $option['twitter'] }}" target="_blank" > <i class="ri-twitter-fill"></i> </a></li>
						<li><a href="{{ $option['instgram'] }}" target="_blank" > <i class="ri-instagram-fill"></i></a></li>
						<li><a href="{{ $option['linkedin'] }}" target="_blank"><i  class="ri-linkedin-box-fill"></i></a></li>
						<li><a href="https://api.whatsapp.com/send?text=Hello&phone={{ $option['whatsapp'] }}" target="_blank"><i class="ri-whatsapp-fill"></i></a></li>
						<li><a href="{{ $option['youtube'] }}" target="_blank" ><i class="ri-youtube-fill"></i></a></li>

					</ul>
				</div>
			</div>
		</div>
	</div>
	<!-- End Copy Right Area -->
	
	<!-- Start Go Top Area -->
	<div class="go-top">
		<i class="ri-arrow-up-s-fill"></i>
		<i class="ri-arrow-up-s-fill"></i>
	</div>
	<!-- End Go Top Area -->



