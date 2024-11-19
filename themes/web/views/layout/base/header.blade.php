
		<!-- Start Header Area -->
		<header class="header-area header-style-three">
			<!-- Start Top Header Area -->
			<div class="top-header-area">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
							<ul>
								<li>
									<a href="tel:{{ $option['phone1'] }}">
										<i class="ri-phone-line"></i>
										{{ $option['phone1'] }}
									</a>
								</li>
								<li>
									<i class="ri-map-pin-line"></i>
									{{ __('Building 27B Ismailia Street, Kafr Abdo, Alexandria') }}
								</li>
								<li>
									<a href="mailto:{{ $option['email1'] }}">
										<i class="ri-mail-line"></i>
										{{ $option['email1'] }}
									</a>
								</li>
							</ul>
						</div>

						<div class="col-lg-4">
							<ul class="float-right">
								<li>
									<div class="navbar-option-item navbar-option-language dropdown language-option"> 
										<button class="dropdown-toggle" type="button" id="language1" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
											<i class="ri-global-line"></i>
											
											<span class="lang-name">@if(app()->getLocale()=='en') English @endif @if(app()->getLocale()=='ar')العربيّة @endif @if(app()->getLocale()=='fr') Français @endif @if(app()->getLocale()=='ja') 简体中文 @endif</span>
										</button>
	
										<div class="dropdown-menu language-dropdown-menu" aria-labelledby="language1"> 

											@foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
											<a  class="dropdown-item" @if($localeCode=='fr' || $localeCode=='ja') href="#" @else href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" @endif>
												@if($localeCode=='en')
												<img src="{{asset('themes/web/assets/images/language/english.png')}}" alt="Image">
												English
												@elseif($localeCode=='ar')
												<img src="{{asset('themes/web/assets/images/language/arbic.png')}}" alt="Image">
												العربيّة
												@elseif($localeCode=='fr')
												<img src="{{asset('themes/web/assets/images/language/french.png')}}" alt="Image">
												Français ({{__('soon')}})
												@elseif($localeCode=='ja')
												<img src="{{asset('themes/web/assets/images/language/china.png')}}" alt="Image">
												简体中文 ({{__('soon')}})
												@endif 
											   </a>
											<br>
										  @endforeach


										</div>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- Start Top Header Area -->

			<!-- Start Navbar Area -->
			<div class="navbar-area navbar-area-style-three">
				<div class="mobile-responsive-nav">
					<div class="container">
						<div class="mobile-responsive-menu">
							<div class="logo">
								<a href="{{ route('web.home') }}">
									<img src="{{asset('themes/web/assets/images/logo.png')}}" alt="logo">
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="desktop-nav">
					<div class="container">
						<nav class="navbar navbar-expand-md navbar-light">
							<a class="navbar-brand" href="{{ route('web.home') }}">
								<img src="{{asset('themes/web/assets/images/logo.png')}}" alt="logo">
							</a>

							<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
								<ul class="navbar-nav m-auto">

									<li class="nav-item">
										<a href="{{ route('web.home') }}" class="nav-link active">
											{{__('home')}}
											 
										</a>
									
									</li>

						

									<li class="nav-item">
										<a href="{{ route('web.page',['page'=>'about']) }}" class="nav-link">
											{{__('About Us')}}
											<i class="ri-arrow-down-s-line"></i>
										</a>
										<ul class="dropdown-menu">
											<li class="nav-item"><a href="{{ route('web.page',['page'=>'mission']) }}">{{ __('Mission') }} </a></li>
											<li class="nav-item"><a href="{{ route('web.page',['page'=>'vision']) }}">{{ __('Vision')}} </a></li>
											<li class="nav-item"><a href="{{ route('web.services') }}">{{ __('Services')}}</a></li>
										</ul>
									</li>


									<li class="nav-item">
										<a href="{{ route('web.categories') }}" class="nav-link">
											{{__('products')}}  
											<i class="ri-arrow-down-s-line"></i>
										</a>

										<ul class="dropdown-menu">																														
											
											@foreach($categories as $category)
											@if(count($category->childreen)>0)

											<li class="nav-item">
												<a href="{{ route('web.category.show',['slug'=>$category->slug,'id'=>$category->id]) }}" class="nav-link">
													{{ $category->name }}
													<i class="ri-arrow-down-s-line"></i>
												</a>
		
												<ul class="dropdown-menu">
													@foreach($category->childreen as $child)

													<li class="nav-item">
														<a href="{{ route('web.category.show',['slug'=>$child->slug,'id'=>$child->id]) }}" class="nav-link">{{ $child->name }}</a>
													</li>

													@endforeach
											
												</ul>
											</li>

											@else
											<li class="nav-item">
												<a href="{{ route('web.category.show',['slug'=>$category->slug,'id'=>$category->id]) }}">{{$category->name}} </a>
											</li>
											@endif
											@endforeach
													
											

								

										</ul>
									</li>


						
									<li class="nav-item">
										<a href="#" class="nav-link">
											{{__('news')}}  
											<i class="ri-arrow-down-s-line"></i>
										</a>

										<ul class="dropdown-menu">
											<li class="nav-item">
												<a href="{{ route('web.news') }}" class="nav-link">{{__('news')}} </a>
											</li>
											<li class="nav-item">
												<a href="{{ route('web.gallary') }}" class="nav-link">{{__('gallery')}} </a>
											</li>
										</ul>
									</li>

									<li class="nav-item">
										<a href="{{ route('web.request_quote') }}" class="nav-link">
											{{__('join us')}} 										
										</a>						
									</li>

									<li class="nav-item">
										<a href="{{ route('web.contact') }}" class="nav-link">{{__('contact us')}} </a>
									</li>
								</ul>
								
								<div class="others-options">
									<ul>
										<li>
											<a href="{{ route('web.search') }}">
												<i class="ri-search-line" style="color:#545454 !important;"></i>
											</a>
										</li>
										<li>
											<a href="{{ route('web.contact') }}" class="default-btn">
												{{__('send an inquiry')}}
												<i class="ri-arrow-right-line"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</nav>
					</div>
				</div>

				<div class="others-option-for-responsive">
					<div class="container">
						<div class="dot-menu">
							<div class="inner">
								<div class="circle circle-one"></div>
								<div class="circle circle-two"></div>
								<div class="circle circle-three"></div>
							</div>
						</div>
						
						<div class="container">
							<div class="option-inner">
								<div class="others-options justify-content-center d-flex align-items-center">
									<ul>
										<li>
											<a href="{{ route('web.search') }}">
												<i class="ri-search-line"></i>
											</a>
										</li>
										<li>
											<a href="{{ route('web.contact') }}" class="default-btn">
												{{__('send an inquiry')}}
											
												<i class="ri-arrow-right-line"></i>
											</a>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- End Navbar Area -->
		</header>
		<!-- End Header Area -->


















		