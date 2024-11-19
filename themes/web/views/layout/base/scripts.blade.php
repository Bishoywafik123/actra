<!-- Jquery Min JS -->
        
<script>
    window.onload = function() {
document.getElementById("preloader").style.display = "none";
document.getElementById("content").style.display = "block";
};
    </script>


@if(app()->getLocale()=='ar')
<script src="{{asset('themes/web/ar/assets/js/jquery.min.js')}}"></script> 
<!-- Bootstrap Bundle Min JS -->
<script src="{{asset('themes/web/ar/assets/js/bootstrap.bundle.min.js')}}"></script>
<!-- Meanmenu Min JS -->
<script src="{{asset('themes/web/ar/assets/js/meanmenu.min.js')}}"></script>
<!-- Owl Carousel Min JS -->
<script src="{{asset('themes/web/ar/assets/js/owl.carousel.min.js')}}"></script>
<!-- Wow Min JS -->
<script src="{{asset('themes/web/ar/assets/js/wow.min.js')}}"></script>
<!-- Magnific Popup Min JS -->
<script src="{{asset('themes/web/ar/assets/js/magnific-popup.min.js')}}"></script>
<!-- Appear Min JS --> 
<script src="{{asset('themes/web/ar/assets/js/appear.min.js')}}"></script>
<!-- Odometer Min JS --> 
<script src="{{asset('themes/web/ar/assets/js/odometer.min.js')}}"></script>
<!-- Form Validator Min JS -->
<script src="{{asset('themes/web/ar/assets/js/form-validator.min.js')}}"></script>
<!-- Contact JS -->
<script src="{{asset('themes/web/ar/assets/js/contact-form-script.js')}}"></script>
<!-- Ajaxchimp Min JS -->
<script src="{{asset('themes/web/ar/assets/js/ajaxchimp.min.js')}}"></script>
<!-- Custom JS -->
<script src="{{asset('themes/web/ar/assets/js/custom.js')}}"></script>

@else
    <script src="{{asset('themes/web/assets/js/jquery.min.js')}}"></script> 
    <!-- Bootstrap Bundle Min JS -->
    <script src="{{asset('themes/web/assets/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Meanmenu Min JS -->
    <script src="{{asset('themes/web/assets/js/meanmenu.min.js')}}"></script>
    <!-- Owl Carousel Min JS -->
    <script src="{{asset('themes/web/assets/js/owl.carousel.min.js')}}"></script>
    <!-- Wow Min JS -->
    <script src="{{asset('themes/web/assets/js/wow.min.js')}}"></script>
    <!-- Magnific Popup Min JS -->
    <script src="{{asset('themes/web/assets/js/magnific-popup.min.js')}}"></script>
    <!-- Appear Min JS --> 
    <script src="{{asset('themes/web/assets/js/appear.min.js')}}"></script>
    <!-- Odometer Min JS --> 
    <script src="{{asset('themes/web/assets/js/odometer.min.js')}}"></script>
    <!-- Form Validator Min JS -->
    <script src="{{asset('themes/web/assets/js/form-validator.min.js')}}"></script>
    <!-- Contact JS -->
    <script src="{{asset('themes/web/assets/js/contact-form-script.js')}}"></script>
    <!-- Ajaxchimp Min JS -->
    <script src="{{asset('themes/web/assets/js/ajaxchimp.min.js')}}"></script>
    <!-- Custom JS -->
    <script src="{{asset('themes/web/assets/js/custom.js')}}"></script>

@endif


  <script>window.addEventListener('load', function() {
const preloader = document.querySelector('.preloader');
preloader.style.display = 'none';
});
</script>

<script>
window.onload = function() {
document.getElementById('cookieConsent').style.display = 'block';
};

document.getElementById('acceptCookies').onclick = function() {
// Store consent
document.getElementById('cookieConsent').style.display = 'none';
};

document.getElementById('rejectCookies').onclick = function() {
// Store rejection
document.getElementById('cookieConsent').style.display = 'none';
};
</script>
