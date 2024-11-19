@extends('web_theme::layout.main')

@section('content')

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-7">
			<div class="container">
				<div class="page-title-content">
					<h2>{{__('Contact')}}</h2>

					<ul>
						<li>
							<a href="{{route('web.home')}}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{__('Contact')}}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Contact Area -->
		<section class="main-contact-area pt-100 pb-100">
			<div class="container">
				<form action="{{ route('web.mail.send') }}" method="POST" enctype="multipart/form-data">
					@csrf
					
					<div class="row">
						<div class="col-lg-6">
							<div class="contact-img">
								
							</div>
						</div>

						<div class="col-lg-6">
							<div class="p-wrap">
								<h3>{{ __('Get In Touch') }}</h3>
								<p>{{ __('You can dream, create, design, and build the most wonder ful place in the')}}</p>
								
								<input type="hidden" name="type" value="touch">
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="{{__('Full Name')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
			
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="email" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="{{__('Email')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
			
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="phone" id="phone_number" required="" data-error="Please enter your number" class="form-control" placeholder="{{__('Phone No')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
			
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="country" id="msg_subject" class="form-control" required="" data-error="Please enter your country" placeholder="{{__('Country')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="zone" id="msg_subject" class="form-control" required="" data-error="Please enter your zone" placeholder="{{__('Zone')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="{{__('Subject')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-12 col-sm-12">
										<div class="form-group">
											<input type="text" name="type_activity" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="{{__('Type Of Activity')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
			
									<div class="col-12">
										<div class="form-group">
											<textarea name="message" class="form-control" id="message" cols="30" rows="8" required data-error="Write your message" placeholder="{{__('Your Message')}}"></textarea>
											<div class="help-block with-errors"></div>
										</div>
									</div>			
			
									<div class="col-lg-12 col-md-12">
										<button type="submit" class="default-btn">
											<span>{{ __('Send message') }}</span>
										</button>
										<div id="msgSubmit" class="h3 text-center hidden"></div>
										<div class="clearfix"></div>
									</div>
								</div>

								<div class="contact-shape">
									<img src="{{asset('themes/web/assets/images/video-shape-2.png')}}" alt="">
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</section>
		<!-- End Contact Area -->

		<!-- Start Contact Info Area -->
		<div class="contact-info-area pt-100 pb-70">
			<div class="container">
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="contact-info-single">
							<img src="{{asset('themes/web/assets/images/icon/icon-22.png')}}" alt="Image">
							<a href="tel: {{ $option['phone1'] }}">{{ $option['phone1'] }}</a>

							<div class="info-shape">
								<img src="{{asset('themes/web/assets/images/info-shape.png')}}" alt="Image">
							</div>
						</div>
					</div>

					<div class="col-lg-4 col-md-6">
						<div class="contact-info-single">
							<img src="{{asset('themes/web/assets/images/icon/icon-23.png')}}" alt="Image">
							<a href="mailto:{{ $option['email1'] }}">
								<i class="ri-mail-line"></i>
								<span>{{ $option['email1'] }}</span>
							</a>
							<div class="info-shape">
								<img src="{{asset('themes/web/assets/images/info-shape.png')}}" alt="Image">
							</div>
						</div>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="contact-info-single">
							<img src="{{asset('themes/web/assets/images/icon/icon-21.png')}}" alt="Image">
							<p>{{__('Technical office')}}: <br>  {{__('Building 27B Ismailia Street, Kafr Abdo, Alexandria')}} <br> <br> </p>

							<div class="info-shape">
								<img src="{{asset('themes/web/assets/images/info-shape.png')}}" alt="Image">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
							<iframe src="https://www.google.com/maps/embed?pb=!1m13!1m8!1m3!1d852.9609241778676!2d29.952998!3d31.2250595!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzHCsDEzJzMwLjAiTiAyOcKwNTcnMDguOCJF!5e0!3m2!1sar!2seg!4v1726747744882!5m2!1sar!2seg" width="417" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="row justify-content-center">
					
					<div class="col-lg-4 col-md-6">
						<div class="contact-info-single">
							<img src="{{asset('themes/web/assets/images/icon/icon-21.png')}}" alt="Image">
							<p>{{__('Factory')}} 19: <br>{{__('Plot 19, Second Industrial Zone, New Nubaria City, Abu Al Matamir Center, Beheira')}} .</p>

							<div class="info-shape">
								<img src="{{asset('themes/web/assets/images/info-shape.png')}}" alt="Image">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3432.139822308222!2d30.0844288848703!3d30.658190981663164!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDM5JzI5LjUiTiAzMMKwMDQnNTYuMSJF!5e0!3m2!1sar!2seg!4v1726748593609!5m2!1sar!2seg" width="417" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
				<div class="row justify-content-center">
					<div class="col-lg-4 col-md-6">
						<div class="contact-info-single">
							<img src="{{asset('themes/web/assets/images/icon/icon-21.png')}}" alt="Image">
							<p>{{__('Factory')}} 277: <br>{{__('Plot 277 Second Industrial Zone, New Noubaria City, Abu Al Matamir Center, Beheira')}} .</p>

							<div class="info-shape">
								<img src="{{asset('themes/web/assets/images/info-shape.png')}}" alt="Image">
							</div>
						</div>
					</div>
					<div class="col-lg-4 col-md-6">
						<iframe src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d3432.1832764515098!2d30.086179284870386!3d30.65696718166367!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zMzDCsDM5JzI1LjEiTiAzMMKwMDUnMDIuNCJF!5e0!3m2!1sar!2seg!4v1726748703687!5m2!1sar!2seg" width="417" height="250" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
				</div>
			</div>
		</div>
		<!-- End Contact Info Area -->




	
@endsection


