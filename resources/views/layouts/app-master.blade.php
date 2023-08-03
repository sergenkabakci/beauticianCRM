<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Portal">
    <title>Portal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
	@yield('css2')
	<link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/style.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/vendor/typeahead-js/typeahead.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/fontawesome/css/fontawesome.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/fontawesome/css/all.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/fontawesome/css/solid.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/font/premium-line-icons.min.css') !!}" rel="stylesheet">
	
	@yield('css')
	
</head>

<body class="jumping">

	<!-- PAGE CONTAINER -->
    <!-- ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ -->
    <div id="root" class="root mn--max hd--expanded">
	
		<section id="content" class="content">
		
			@yield('content')
		
          
			
			
			<!-- FOOTER -->
            <footer class="mt-auto">
                <div class="content__boxed">
                    <div class="content__wrap py-3 py-md-1 d-flex flex-column flex-md-row align-items-md-center">
                        <div class="text-nowrap mb-4 mb-md-0">Copyright &copy; 2023 <a href="#" class="ms-1 btn-link fw-bold">Portal</a></div>
                     
                    </div>
                </div>
            </footer>
            <!-- END - FOOTER -->

        </section>
	
		
		@include('layouts.partials.header')
		
		@include('layouts.partials.navbar')
		
		
 

	</div>
	
	<div class="scroll-container">
        <a href="#root" class="scroll-page rounded-circle ratio ratio-1x1" aria-label="Scroll button"></a>
    </div>
	
	<script src="{!! url('assets/js/jquery-3.6.3.min.js') !!}" ></script>
	<script src="{!! url('assets/js/bootstrap.bundle.min.js') !!}" ></script>
	<script src="{!! url('assets/vendor/typeahead-js/typeahead.js') !!}" ></script>
    <script src="{!! url('assets/js/main.min.js') !!}" ></script>
    <script src="{!! url('assets/js/perfect-scrollbar.min.js') !!}" ></script>
    <script src="{!! url('assets/js/search.js') !!}" ></script>
	@yield('script')
  </body>
</html>