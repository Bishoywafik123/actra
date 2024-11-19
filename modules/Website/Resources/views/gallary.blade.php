@extends('web_theme::layout.main')

@section('content')


		<!-- Start Page Title Area -->
		<div class="page-title-area bg-9">
			<div class="container">
				<div class="page-title-content">
					<h2>{{ __('Our Gallery') }}</h2>

					<ul>
						<li>
							<a href="{{ route('web.home') }}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{ __('Our Gallery') }}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Products Area -->
		<section class="products-area products-area-page pt-100 pb-100">
			<div class="container">
			<div class="row">

				@foreach($gallaries as $gallary)
				<div class="col-lg-4 col-sm-6">
					<div class="single-product">
						<div class="product-img">
							<img src="{{ asset('system/storage/app/public/slider/img/'.$gallary->photo) }}" style="height: 290px;" alt="images">
							<ul class="social-icon">								
								<li>
									<a href="#" class="open-popup" data-image="{{ asset('system/storage/app/public/slider/img/'.$gallary->photo) }}">
										<i class="ri-eye-fill"></i>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
		
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

				   <div class="popup" id="image-popup">
				<span class="close-popup">&times;</span>
				<img class="popup-content" id="popup-img" alt="Popup Image">
			</div>
			</div>			
			</div>
		</section>
		<!-- End Products Area -->
    
@endsection


   
@section('pageScripts')

<script>
	document.querySelectorAll('.open-popup').forEach(item => {
		item.addEventListener('click', event => {
			event.preventDefault();
			const imageSrc = item.getAttribute('data-image');
			document.getElementById('popup-img').src = imageSrc;
			document.getElementById('image-popup').style.display = 'block';
		});
	});
	
	document.querySelector('.close-popup').addEventListener('click', () => {
		document.getElementById('image-popup').style.display = 'none';
	});
	
	window.onclick = function(event) {
		const popup = document.getElementById('image-popup');
		if (event.target == popup) {
			popup.style.display = "none";
		}
	}
	</script>

	@endsection