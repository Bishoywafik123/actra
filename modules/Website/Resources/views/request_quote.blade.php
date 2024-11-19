@extends('web_theme::layout.main')

@section('content')
	


		<!-- Start Page Title Area -->
		<div class="page-title-area bg-7">
			<div class="container">
				<div class="page-title-content">
					<h2>{{__('Join Us')}}</h2>

					<ul>
						<li>
							<a href="{{ route('web.home') }}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{__('Join Us')}}</li>
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
								<p>{{ __('You can dream, create, design, and build the most wonder ful place in the') }}</p>
								
								<div class="row">
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="name" id="name" class="form-control" required="" data-error="Please enter your name" placeholder="{{__('Full Name')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="email" id="email" class="form-control" required="" data-error="Please enter your email" placeholder="{{__('Email')}}">
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
											<input type="text" name="msg_qualification" id="msg_qualification" class="form-control" required="" data-error="Please enter your Qualification" placeholder="{{__('Qualification')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="msg_job" id="msg_job" class="form-control" required="" data-error="Please enter your Job" placeholder="{{__('Job')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="msg_city" id="msg_city" class="form-control" required="" data-error="Please enter your City" placeholder="{{__('City')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="msg_experience" id="msg_experience" class="form-control" required="" data-error="Please enter your Years of experience" placeholder="{{__('Years of experience')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
									<div class="col-lg-6 col-sm-6">
										<div class="form-group">
											<input type="text" name="msg_subject" id="msg_subject" class="form-control" required="" data-error="Please enter your subject" placeholder="{{__('Subject')}}">
											<div class="help-block with-errors"></div>
										</div>
									</div>
<div class="col-lg-12 col-sm-12">
    <div class="form-group">
        <input type="file" name="activity_file" id="activity_file" class="form-control" required="">
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
											<span>{{__('Send message')}}</span>
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

@endsection


