@extends('web_theme::layout.main')

@section('content')

<!-- Start Page Title Area -->
<div class="page-title-area bg-8">
	<div class="container">
		<div class="page-title-content">
			<h2>{{ __('Cookies Policy') }}</h2>

			<ul>
				<li>
					<a href="{{route('web.home')}}">
						{{ __('Home') }}
					</a>
				</li>

				<li class="active">{{ __('Cookies Policy') }}</li>
			</ul>
		</div>
	</div>

	<div class="page-bg-shape">
		<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="{{ __('Image') }}">
	</div>
</div>
<!-- End Page Title Area -->

<!-- Start FAQ Area -->
<section class="faq-area ptb-100">
	<div class="container">			
		<div class="row align-items-center">
			<div class="col-lg-12">						
				<div class="faq-accordion">
					<div class="accordion">                               
					<h3 class="project-details__title">{{ __('What are cookies?') }}</h3>
					<p style="overflow-wrap: break-word;white-space: pre-line;">
					{{ $content }}
					</p>
				
					<h3>{{ __('Contact Us') }}</h3>
					<p>
						{{ __('If you have any questions about our Cookie Policy, please') }} <a href="{{route('web.contact')}}">{{ __('Contact Us') }}</a>.
					</p>
				
					</div>
				
				</div>
			</div>	
					
		</div>
	</div>
</section>
<!-- End FAQ Area -->



@endsection


