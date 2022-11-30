<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Xmee | Login and Register Form Html Templates</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="log1/img/favicon.png">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('log1/css/bootstrap-rtl.min.css')}}">
    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('log1/css/fontawesome-all.min.css')}}">
    <!-- Flaticon CSS -->
    <link rel="stylesheet" href="{{asset('log1/font/flaticon.css')}}">
    <!-- Google Web Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('log1/style.css')}}">
</head>

<body>
    <style>
        input{
            text-align: left
        }
        label{
            text-align: left
        }
    </style>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->
    <div id="preloader" class="preloader">
        <div class='inner'>
            <div class='line1'></div>
            <div class='line2'></div>
            <div class='line3'></div>
        </div>
    </div>
    <section class="fxt-template-animation fxt-template-layout27" data-bg-image="log1/img/logo.png">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->
        <div class="fxt-content">
            <div class="fxt-header">
                <a href="#" class="fxt-logo"><img src="log1/img/ll.png" width="250" height="10"  alt="Logo"></a>
            </div>
            <div class="fxt-form">
                <div class="fxt-transformY-50 fxt-transition-delay-1">
                   <center> <h2>Créer votre compte </h2></center>
                </div>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                            <input type="text" id="name" class="form-control" name="name" :value="old('name')" required autofocus placeholder="* Nom et Prénom">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="email" class="form-control"  name="email" :value="old('email')" required autofocus placeholder="* Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input id="password" type="password" class="form-control"name="password"   value="{{ __('password') }}" required autocomplete="current-password"placeholder="*Mot de passe">
                            <i toggle="#password" ></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input  type="password" class="form-control"name="password_confirmation" value="{{ __('password_confirmation') }}" required autocomplete="current-password"placeholder="*Confirmer Mot de passe">
                            <i toggle="#password" ></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-5">
                           <center> <button type="submit" class="fxt-btn-fill">S'inscrire</button>
                           <button type="submit" class="fxt-btn-fill"> <a href="login" style="color:hsl(60, 100%, 100%);" >Retour</a></button></center>
                        </div>
                    </div>
                </form>
            </div>
            <div class="fxt-style-line">
                <div class="fxt-transformY-50 fxt-transition-delay-6">
                    <h3>Ou se connecter avec </h3>
                </div>
            </div>
            <ul class="fxt-socials">

                <li class="fxt-google fxt-transformY-50 fxt-transition-delay-9">
                    <a href="#" title="google"><i class="fab fa-google-plus-g"></i></a>
                </li>
            </ul>
        </div>
    </section>
    <!-- jquery-->
    <script src="log1/js/jquery-3.5.0.min.js"></script>
    <!-- Bootstrap js -->
    <script src="log1/js/bootstrap.min.js"></script>
    <!-- Imagesloaded js -->
    <script src="log1/js/imagesloaded.pkgd.min.js"></script>
    <!-- Particles js -->
    <script src="log1/js/particles.js"></script>
    <script src="log1/js/particles-2.js"></script>
    <!-- Validator js -->
    <script src="log1/js/validator.min.js"></script>
    <!-- Custom Js -->
    <script src="log1/js/main.js"></script>

</body>

</html>
