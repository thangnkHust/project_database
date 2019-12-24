<!DOCTYPE HTML>
<html>

{{-- Nhung head --}}
<head>
    @include('web/elements/head')
</head>

<body>

	<div id="fb-root"></div>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			@include('web/elements/navigation')
        </nav>
        
        {{-- Nhung menu --}}
		@yield('slider')

		<div id="colorlib-intro">
            
            {{-- Phan le cua cua home page --}}
            @yield('content')

            {{-- Nhung subscribe --}}
            <div id="colorlib-subscribe" class="subs-img" style="background-image: url({{asset('front_page/images/img_bg_2.jpg')}});" data-stellar-background-ratio="0.5">
                @include('web/elements/subscribe')
            </div>

            {{-- Nhung footer --}}
			<footer id="colorlib-footer">
				@include('web/elements/footer')
			</footer>
		</div>

		<div class="gototop js-top">
			<a href="#" class="js-gotop">
				<i class="icon-arrow-up2"></i>
			</a>
		</div>
	</div>

        {{-- Nhung script --}}
		@include('web/elements/script')

</body>

</html>