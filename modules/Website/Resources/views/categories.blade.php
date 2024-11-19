@extends('web_theme::layout.main')

@section('content')

		<!-- Start Page Title Area -->
		<div class="page-title-area bg-9">
			<div class="container">
				<div class="page-title-content">
					<h2>{{__('Products')}}</h2>

					<ul>
						<li>
							<a href="{{route('web.home')}}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{ __('Products') }}</li>
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
					@if(count($categories)>0)
						
					@foreach($categories as $cat)
					<div class="col-lg-4 col-sm-6">
						<div class="single-product">
							<div class="product-img">
								<img src="{{ asset($cat->photo_path) }}" style="width:100%;" alt="images">
	
								<ul class="social-icon">								
									<li>
										<a href="{{ route('web.category.show',['slug'=>$cat->slug,'id'=>$cat->id]) }}">
											<i class="ri-eye-fill"></i>
										</a>
									</li>
								</ul>
							</div>
						
							<div class="product-content">
								<h3>
									<a href="{{ route('web.category.show',['slug'=>$cat->slug,'id'=>$cat->id]) }}">
										{{ $cat->name }}
									</a>
								</h3>
							
							</div>
						</div>
					</div>
					@endforeach

					@else


					@foreach($category->products as $index => $product)
					<div class="col-lg-4 col-sm-6">
						<div class="single-product">
							<div class="product-img">
								<img src="{{ asset('system/storage/app/public/project/img/'.$product->main_photo) }}" style="width:100%;height: 290px;" alt="images">
	
								<ul class="social-icon">								
									<li>
										<a href="{{ route('web.product.show',[$product->category->slug,$product->slug,$product->id]) }}">
											<i class="ri-eye-fill"></i>
										</a>
									</li>
								</ul>
							</div>
						
							<div class="product-content">
								<h3>
									<a href="{{ route('web.product.show',[$product->category->slug,$product->slug,$product->id]) }}">
										{{$product->title}}
									</a>
								</h3>
							
							</div>
						</div>
					</div>

					@endforeach

					@endif
				</div>
			</div>
		</section>
		<!-- End Products Area -->

    
@endsection





