<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.css" />
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
                <div class="fxt-transformY-40 fxt-transition-delay-1">
                    <center><h2>Créer votre compte </h2></center>
                </div>
                <form method="POST" action="{{ route('registeru') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-2">
                            <input type="text" id="name" class="form-control"  name="name" :value="old('name')" required autofocus placeholder="* Nom et Prénom">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="email" class="form-control"   name="email" :value="old('email')" required autofocus placeholder="* Email">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="phone" class="form-control"  name="phone" :value="old('phone')" required autofocus placeholder="* Téléphone">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="cv" class="fxt-label">*Télécharger votre Cv </label>
                        <div class="fxt-transformY-50 fxt-transition-delay-3">
                            <input type="file" class="form-control" name="cv" :value="old('cv')" required autofocus >
                        </div>
                    </div>
                    <div class="form-group">
                        <label>*Télécharger votre photo de profile</label>
                        <input type="file" id="before_crop_image" name="profile_photo_path" class="form-control" placeholder="Entrer un ficher (Image/Pdf)" accept="image/*" required autofocus>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input id="password" type="password" class="form-control"name="password" style="text-align: left"   value="{{ __('password') }}" required autocomplete="current-password">
                            <i toggle="#password"  style="text-align: left"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="fxt-transformY-50 fxt-transition-delay-4">
                            <input  type="password" class="form-control"name="password_confirmation" style="text-align: left" value="{{ __('password_confirmation') }}" required autocomplete="current-password"placeholder="*Confirmer Mot de passe">
                            <i toggle="#password"  style="text-align: left"></i>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="role" value="2" >
                      </div>
                    <div class="form-group">
                       <center> <div class="fxt-transformY-50 fxt-transition-delay-5">
                            <button type="submit" class="fxt-btn-fill">S'inscrire</button>
                            <button type="submit" class="fxt-btn-fill"> <a href="login" style="color:hsl(60, 100%, 100%);" >Retour</a></button>

                        </div></center>
                    </div>
                </form>
            </div>
            <div class="fxt-style-line">
                <div class="fxt-transformY-50 fxt-transition-delay-6">
                    <a href="{{route('welcome')}}">
                    <h3>Accueil</h3>
                    </a>
                </div>
            </div>

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

<div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">×</button>
    <h4 class="modal-title">Crop & Resize Upload Image in PHP with Ajax</h4>
    </div>
    <div class="modal-body">
    <div class="row">
    <div class="col-md-8 text-center">
    <div id="image_demo" style="width:350px; margin-top:30px"></div>
    </div>
    <div class="col-md-4" style="padding-top:30px;">
    <br />
    <br />
    <br/>
    <button class="btn btn-success crop_image">Save</button>
    </div>
    </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    </div>
    </div>
    </div>
    </div>
    <script>
    $(document).ready(function(){
    $image_crop = $('#image_demo').croppie({
    enableExif: true,
    viewport: {
    width:200,
    height:200,
    type:'square' //circle
    },
    boundary:{
    width:300,
    height:300
    }
    });
    $('#before_crop_image').on('change', function(){
    var reader = new FileReader();
    reader.onload = function (event) {
    $image_crop.croppie('bind', {
    url: event.target.result
    }).then(function(){
    console.log('jQuery bind complete');
    });
    }
    reader.readAsDataURL(this.files[0]);
    $('#imageModel').modal('show');
    });
    $('.crop_image').click(function(event){
    $image_crop.croppie('result', {
    type: 'canvas',
    size: 'viewport'
    }).then(function(response){
    $.ajax({
    url:"{{url('save-crop-image')}}",
    type:'POST',
    data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': response},
    success:function(data){
    $('#imageModel').modal('hide');
    alert('Crop image has been uploaded');
    }
    })
    });
    });
    });
    </script>

