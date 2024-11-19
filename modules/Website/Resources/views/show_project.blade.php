@extends('web_theme::layout.main')

@section('content')


		<!-- Start Page Title Area -->
		<div class="page-title-area bg-2">
			<div class="container">
				<div class="page-title-content">
					<h2>{{ $project->title }}</h2>

					<ul>
						<li>
							<a href="{{route('web.home')}}">
								{{ __('Home') }} 
							</a>
						</li>

						<li class="active">{{ $project->title }}</li>
					</ul>
				</div>
			</div>

			<div class="page-bg-shape">
				<img src="{{asset('themes/web/assets/images/page-bg/page-bg-shape.png')}}" alt="Image">
			</div>
		</div>
		<!-- End Page Title Area -->

		<!-- Start Product Details Area -->
		<section class="product-details-area ptb-100">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-lg-6 col-md-12">
						<div class="product-details">
							<div class="image-container">
								<img src="{{asset('system/storage/app/public/project/img/'.$project->main_photo)}}" style="    width: 100%;" alt="Product Image" class="main-image">
								<div class="magnifier"></div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 col-md-12">
						<div class="product-details-desc ml-15">
							<h3>{{ $project->title }}</h3>
							<p style="overflow-wrap: break-word;white-space: pre-line;">{{ $project->title }}</p>
							<button type="submit" class="default-btn" >
								<a href="{{ route('web.contact') }}" target="_blank" style="color: white;">{{ __('Send an inquiry') }}</a>
							</button>
						</div>
					</div>

					<div class="col-lg-12 col-md-12">
						<div class="tab product-details-tab">
							<div class="row">
								<div class="col-lg-12 col-md-12">
									<ul class="tabs">
										<li>
											{{ __('Product Description') }}
										</li>
										<li>
											{{ __('Product Specifications')}}
										</li>
									</ul>
								</div>

								<div class="col-lg-12 col-md-12">
									<div class="tab_content">
										<div class="tabs_item">
											<div class="product-details-tab-content">
												<p style="overflow-wrap: break-word;white-space: pre-line">
													{{ $project->description }}
												</p>
												
											</div>
										</div>

										<div class="tabs_item">
											<div class="product-details-tab-content">
												{{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Libero blanditiis quo fugiat magni accusamus exercitationem! Voluptate, deleniti quae. Libero iusto minus, nulla excepturi quidem reprehenderit blanditiis eligendi exercitationem nesciunt ad! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sequi temporibus deserunt mollitia natus esse, sunt fuga quos. Autem quasi error quisquam architecto fuga suscipit atque voluptatibus nobis impedit nulla. Officia ercitationem. Lorem ipsum dolor, sit amet consectetur adipisicing elit. Officia quaerat maxime laudantium obcaecati qui? Magni officiis fugit, dolorem mollitia eius similique accusantium nostrum possimus consectetur laudantium distinctio aliquid delectus assumenda? Lorem ipsum dolor sit amet consectetur adipisicing elit. Maxime earum deleniti, quaerat rerum corporis quis iste veritatis quia aliquam totam autem? Repellendus elit</p> --}}

												@if(count($project->options)>0)
												<table class="fixed_headers" >
													<thead>
													  <tr>
														<tr><th colspan="3" style="text-align: center;">{{ __('How to use') }} </th></tr>
														<th class="col-1">{{ __('Name') }}</th>
														<th  class="col-2">{{ __('Color') }}</th>
														<th  class="col-3">{{ __('Description') }}</th>
													  </tr>
													</thead>
													<tbody>

														@foreach($project->options as $option)
													  <tr>
														<td>{{ $option->name }}</td>
														<td>{{ $option->color }}</td>
														<td>{{ $option->description }}</td>
													  </tr>
											
													  	@endforeach
													  
													</tbody>
												  </table>							
												
												  @endif


												</div>

										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
				</div>
			</div>
		</section>
		<!-- End Product Details Area -->




	
@endsection



@section('pageScripts')

<script>
	document.querySelectorAll('.image-container').forEach(container => {
		const magnifier = container.querySelector('.magnifier');
		const img = container.querySelector('img');
	
		container.addEventListener('mousemove', (e) => {
			const { left, top, width, height } = container.getBoundingClientRect();
			const x = (e.clientX - left) / width * 100;
			const y = (e.clientY - top) / height * 100;
	
			magnifier.style.backgroundImage = `url(${img.src})`;
			magnifier.style.backgroundSize = `${width * 2}px ${height * 2}px`; 
			magnifier.style.left = `${e.clientX}px`; 
			magnifier.style.top = `${e.clientY}px`; 
			magnifier.style.backgroundPosition = `${x}% ${y}%`; 
		});
	
		container.addEventListener('mouseenter', () => {
			magnifier.style.display = 'block'; 
		});
	
		container.addEventListener('mouseleave', () => {
			magnifier.style.display = 'none'; 
		});
	});
	
	
	</script>

	@endsection