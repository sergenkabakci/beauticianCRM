<!doctype html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1">
    <meta name="description" content="Portal">
    <title>Giriş Yap</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet">
	<link href="{!! url('assets/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! url('assets/css/style.min.css') !!}" rel="stylesheet">
	
	
</head>
<body class="" style="background-image: url({!! url('assets/premium/boxed-bg/polygon/bg/3.jpg') !!});">
    <div id="root" class="root front-container">
  
		<section id="content" class="content">
            <div class="content__boxed w-100 min-vh-100 d-flex flex-column align-items-center justify-content-center">
                <div class="content__wrap">

                    <!-- Login card -->
                    <div class="card shadow-lg">
                        <div class="card-body">

                            <div class="text-center">
                                <h1 class="h3">Portala Hoş geldiniz! 👋</h1>
                                <p>Hemen başlamak için giriş yap.</p>
                            </div>
							@include('layouts.partials.messages')
                            <form class="mt-4" action="{{ route('login.perform') }}" method="POST">
								@csrf
                                <div class="mb-3">
                                    <input type="text" name="username" class="form-control" placeholder="E-posta" autofocus value="{{ old('username') }}">
                                </div>

                                <div class="mb-3">
                                    <input type="password" name="password" class="form-control" placeholder="Şifre">
                                </div>

                                <div class="form-check">
                                    <input id="_dm-loginCheck" class="form-check-input" type="checkbox" name="benihatirla">
                                    <label for="_dm-loginCheck" class="form-check-label">
                                        Beni Hatırla
                                    </label>
                                </div>

                                <div class="d-grid mt-5">
                                    <button class="btn btn-primary btn-lg" type="submit">Giriş Yap</button>
                                </div>
                            </form>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="../../front-pages/password-reminder/" class="btn-link text-decoration-none">Şifremi unuttum</a>
                             
                            </div>

                          

                        </div>
                    </div>
                   
                </div>
            </div>
        </section>
          
	</div>
	
	
	<script src="{!! url('assets/js/bootstrap.min.js') !!}" defer></script>
    <script src="{!! url('assets/js/main.min.js') !!}" defer></script>
</body>
</html>