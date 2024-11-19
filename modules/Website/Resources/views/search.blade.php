@extends('web_theme::layout.main')

@section('content')


	<!-- Start Page Title Area -->
    <div class="page-title-area bg-7">
        <div class="container">
            <div class="page-title-content">
                <h2>{{ __('Search Page') }}</h2>

                <ul>
                    <li>
                        <a href="{{route('web.home')}}">
                            {{ __('Home') }} 
                        </a>
                    </li>

                    <li class="active">{{ __('Search Page') }}</li>
                </ul>
            </div>
        </div>

        <div class="page-bg-shape">
            <img src="assets/images/page-bg/page-bg-shape.png" alt="Image">
        </div>
    </div>
    <!-- End Page Title Area -->

    <!-- Start {{ __('Search Page') }} Area -->
    <section class="search-page-area ptb-100">
        <div class="container">
            <div class="sidebar-widget search">
                <form  class="search-form" action="{{ route('web.products') }}" method="GET"> 
                    @csrf
                    <input class="form-control" name="search" placeholder="Search here" type="text">
                    <button class="search-button" type="submit">
                        <i class="ri-search-line"></i>
                    </button>
                </form>	
            </div>
            {{-- <p class="search-result">
                About results
            </p> --}}
        </div>
    </section>
    <!-- End {{ __('Search Page') }} Area -->


@endsection


