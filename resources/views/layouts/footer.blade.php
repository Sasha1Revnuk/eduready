<footer class="footer-area section_gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>@lang('lang.footer.menu')</h4>
                <ul>
                    @foreach($menu as $title => $url)
                        <li><a href="{{is_array($url) ? $url['hard'] : $url}}">{{$title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>@lang('lang.footer.categories')</h4>
                <ul>
                    @foreach($categories as $category)
                        <li><a href="{{'/category/' . $category->id}}">{{$category->title}}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-lg-4 col-md-6 single-footer-widget">
                <h4>@lang('lang.footer.address')</h4>
                <ul>
                    <li><b>@lang('lang.footer.titleStreet'):</b> @lang('lang.footer.street')</li>
                    <li><b>@lang('lang.footer.titleCity'):</b> @lang('lang.footer.city')</li>
                    <li><b>@lang('lang.footer.titleCountry'):</b> @lang('lang.footer.country')</li>
                    <li><b>@lang('lang.footer.titlePhone'):</b> @lang('lang.footer.phone')</li>
                </ul>
            </div>


        </div>
        <div class="row footer-bottom d-flex justify-content-between">
            <p class="col-lg-8 col-sm-12 footer-text m-0 text-white">
            @lang('lang.footer.copyright')
            </p>
            <div class="col-lg-4 col-sm-12 footer-social">
                <a href="https://www.facebook.com/kneu.edu.ua"><i class="ti-facebook"></i></a>
                <a href="https://twitter.com/KNEUofficial"><i class="ti-twitter"></i></a>
                <a href="https://www.youtube.com/user/kneucnannel/videos?view=1"><i class="ti-youtube"></i></a>
            </div>
        </div>
    </div>
</footer>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/owl-carousel-thumb.min.js')}}"></script>
<script src="{{asset('js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('js/mail-script.js')}}"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="{{asset('js/gmaps.min.js')}}"></script>
<script src="{{asset('js/theme.js')}}"></script>
</body>
</html>
