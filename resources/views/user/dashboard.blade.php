<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-LEARNING</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
   <!-- Required meta tags -->
   <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{asset('adminn/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('adminn/vendors/daterangepicker/daterangepicker.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/chartist/chartist.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('adminn/css/style.css')}}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{asset('adminn/images/favicon.png')}}" />

  <!-- Favicons -->
  <link href="{{asset('site/assets/img/favicon.png')}}" rel="icon">
  <link href="{{asset('site/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('site/assets/vendor/aos/aos.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
  <link href="{{asset('site/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
 integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <!-- Template Main CSS File -->
  <link href="{{asset('site/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Ninestars - v4.7.0
  * Template URL: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{route('redirects')}}"><img src="{{asset('log1/img/tee.png')}}"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
            <li>
             <a  href="{{ route('web.search') }}">
                <div class="btn-group">
                    <button type="button" class="btn btn-outline-secondary">
                      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search-heart" viewBox="0 0 16 16">
                          <path d="M6.5 4.482c1.664-1.673 5.825 1.254 0 5.018-5.825-3.764-1.664-6.69 0-5.018Z"></path>
                          <path d="M13 6.5a6.471 6.471 0 0 1-1.258 3.844c.04.03.078.062.115.098l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1.007 1.007 0 0 1-.1-.115h.002A6.5 6.5 0 1 1 13 6.5ZM6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11Z"></path>
                      </svg>
                      <span class="visually-hidden">Button</span>
                    </button>
                </div>
             </a>
            </li>
          <li><a class="nav-link scrollto" href="{{route('allformation')}}">Formations </a></li>
          <li class="dropdown"><a href="#"><span>Cat??gories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li>
                  <a href="{{route('allformation')}}">Tous les cat??gories</a>
                </li>
              @foreach ($cats as $cat)
              <li class="dropdown"><a href="{{route('categ',$cat->id)}}"><span>{{$cat->nom}}</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                    @foreach ($cat->scats as $scat)
                    <center>
                    <p>Sujets populaires</p>
                    <li><a href="{{route('categ',$scat->id)}}">{{$scat->nom}}</a></li>
                    @endforeach
                </ul>
                @endforeach
              </li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#team">Formateurs</a></li>
          <li><a class="nav-link scrollto" href="{{route('showabonnement')}}">Abonnements</a></li>

            <li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                   <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cash-coin" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z"/>
                        <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z"/>
                        <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z"/>
                        <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z"/>
                      </svg>
                      <span class="badge badge-pill badge-danger">{{ Auth::user()->jeton}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                  <a class="dropdown-item py-3">
                    <p class="mb-0 font-weight-medium float-left">Notifications </p>
                    <span class="badge badge-pill badge-warning float-right">voir tous</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                        <p class="badge badge-success p-2">Nombre totale de jetons : {{ Auth::user()->jeton}} <i class="fas fa-add"></i> </p>
                      </div>
                  </a>
                </div>
              </li>

              <li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                    <span class="badge badge-pill badge-danger">{{ $count}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                  <a class="dropdown-item py-3">
                    <p class="mb-0 font-weight-medium float-left">vous avez {{$count}} formations </p>
                    <span class="badge badge-pill badge-warning float-right"> voir tous</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                        @foreach ($achatformations as $ff)
                          <div class="col-lg-2 ">
                            <img src="@if (isset($ff->formation_id)){{asset( $ff->formations->image)}} @endif " class="img-fluid animated" data-aos="zoom-in">
                          </div>
                        <p class="preview-subject ellipsis font-weight-medium text-dark" >@if (isset($ff->formation_id))<a href="{{route('detailsformation',['id'=>$ff->formations->id])}}"> {{$ff->formations->nom}}</a> @endif </p>
                        @endforeach
                    </div>
                   </a>
                </div>
              </li>
           <li>
            <a class="getstarted scrollto" href="{{ route('showparrain') }}" ><i class="icon-user-follow"></i> Parrainez vos amis</a>
           </li>
          <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="{{ asset('/'. Auth::user()->profile_photo_path)}}" >
                <span class="font-weight-normal">{{ Auth::user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">
                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email}}</p>
                </div>
                <a class="dropdown-item" href="{{route('mesformations')}}"><i class="bi bi-folder-check text-primary"></i>Mes formations : <span class="badge badge-pill badge-danger">{{ $count}}</span> </a>
                <a class="dropdown-item"href="{{route('listparrainage')}}"><i class="bi bi-people-fill text-primary"></i>Mes parrains : <span class="badge badge-pill badge-danger">{{ $countparr}}</span></a>
                <a class="dropdown-item"href="{{route('Showjetons')}}"><i class="bi bi-cash-coin text-primary"></i>Mes jetons : <span class="badge badge-pill badge-danger">{{ Auth::user()->jeton}}</span></a>
                <a class="dropdown-item"  href="{{route('msg')}}"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages : <span class="badge badge-pill badge-danger"> {{$countmsg}}</span></a>
                <a class="dropdown-item" href="{{route('ShowEditcompteU',['id'=>Auth::user()->id])}}"><i class="dropdown-item-icon icon-user text-primary"></i> Mon compte : <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"href="{{route('historiqueachats')}}"><i class="bi bi-cart-check text-primary"></i>Historique d'achats</a>
                <a class="dropdown-item"  href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                 document.getElementById('logout-form').submit();">
                <i class="dropdown-item-icon icon-power text-primary" ></i>D??connexion</a>
              </div>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1>Bienvenue Back {{ Auth::user()->name }} , pr??t pour votre prochaine le??on?</h1>
          <h2>Apprenez les comp??tences les plus demand??es pour les m??tiers d'aujourd'hui , avec notre plate-forme une nouvelle g??n??ration 100% en ligne.</h2>
          <br>
          <div>
            <button type="button" class="btn btn-outline-danger">
                <a href="{{asset('site/assets/img/pub.mp4')}} "class="portfolio-lightbox">Commencer</a>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                    <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z"/>
                  </svg>
            </button>          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img">
          <img src="{{asset('site/assets/img/img-hero.png')}}" class="img-fluid animated" alt="">
        </div>
      </div>
    </div>

  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="row justify-content-between">
          <div class="col-lg-5 d-flex align-items-center justify-content-center about-img">
            <img src="{{asset('site/assets/img/cvv.png')}}" class="img-fluid" alt="" data-aos="zoom-in">
          </div>
          <div class="col-lg-6 pt-5 pt-lg-0">
            <h3 data-aos="fade-up">Ce que nous offrons</h3>
            <p data-aos="fade-up" data-aos-delay="100">
                Am??liorer des vies gr??ce ?? l'apprentissage
            </p>
            <div class="row">
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                <i class="bi bi-emoji-heart-eyes"></i>
                <h4>Sujets tendances</h4>
                <p><a href="{{route('allformation')}}">Explorez les nouveaux sujets tendances</a></p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-person-check-fill"></i>
                <h4>Formateurs</h4>
                <p><a href="#team">Trouvez les formateurs ad??quats</a></p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-person-plus-fill"></i>
                <h4>Parriner un ami, recevez une r??compense</h4>
                <p> <a href="{{route('showparrain')}}">Invitez vos proches et gagnez des jetons pour commencer une formation !</a></p>
              </div>
              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <i class="bi bi-search"></i>
                <h4>Syst??me d'aide ?? la d??cision</h4>
              <p><a href="{{route('competence')}}">  Cr??er votre compte pour trouver des formations qualifiantes !</a></p>
            </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Abonnements</h2>
          <p>D??couvrez les excellents abonnements  que nous offrons</p>
        </div>
        <div class="row">
        @php
            $x = 0;
        @endphp
            @foreach ($abonnements as $abonnement)
        <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="{{$x+=100}}">
            <div class="icon-box">
                <div class="icon"><img src="{{asset('site/assets/img/money1.png')}}" class="img-fluid" ></div>
              <h4 class="title"><a href="">{{$abonnement->nom}}</a></h4>
              <p class="badge badge-success p-2">Description : {{$abonnement->desca}}<i class="fas fa-add"></i> </p>
              <p class="description"> Nombre de jeton : {{$abonnement->jeton}}</p>
              <p class="description">Prix d'abonnement: {{$abonnement->prix}}.000 dt</p>
              <div>
                <a href="{{route('checkout',['id'=>$abonnement->id])}}" class="btn-get-started scrollto">Payer en ligne
                    <img src="{{asset('site/assets/img/cart.gif')}}" class="img-fluid animated" alt="" width="30" height="30"></a>
              </div>
            </div>
        </div>
        @endforeach
        </div>
      </div>
    </section>
    <!-- End Services Section -->

 <!-- ======= Services Section ======= -->
 <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Formations recommand??es pour vous</h2>
        <p>Commen??ons notre apprentissage</p>
        <a data-filter="*" class="filter-active" href="{{route('allformation')}}">Tous les formations</a>
      </div>
      <div class="row">
      @php
          $x = 0;
      @endphp
 @if(isset($formations))
 @if(count($formations) > 0)
 @foreach ($formations as $formation)
      <div class="col-md-5 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="{{$x+=100}}">
          <div class="icon-box">
            <div class="icon"><img src="{{$formation->image}}" class="img-fluid" width="110" height="40" ></div>
            <h4 class="title"><a href="">{{$formation->nom}}</a></h4>
            <p class="description"> Formateur :
                @foreach($users as $user)
                    @if ($user->id == $formation->user_id)
                  {{$user->name}}
                    @endif
                @endforeach
            </p>
            <p class="badge badge-success p-2">Cette formation comprend : {{ \DB::table('parties')->where('formation_id',$formation->id)->count()}} Chapitre(s) <i class="fas fa-add"></i> <br> </p>
            <p class="description">Niveau : {{$formation->niveau}} <br> En ligne et ?? votre rythme</p>
            <p class="description"> Prix : {{$formation->abonnement->jeton}} Jetons</p>
            <p>Note : {{\ DB::table('notes')->where('formation_id',$formation->id)->sum('note')*5 /100}}/5 <img src="{{asset('site/assets/img/stars.gif')}}" class="img-fluid animated" width="100" height="10"></p>
                <a href="{{route('detailsformation',['id'=>$formation->id])}}" class="btn-get-started scrollto">D??tails
                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                       <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                       <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                     </svg>
            <div align="center">
               </a>
           </div>
        </div>
      </div>
      @endforeach
      @else
      <p>No result found!</p>
      @endif
      @endif
      </div>
    </div>
  </section><!-- End Services Section -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team">
      <div class="container">
        <div class="section-title" data-aos="fade-up">
          <h2>Nos Formateurs</h2>
          <p>Experts et hautement qualifi??s</p>
        </div>
        <div align="center">
        <p> ?? notre site, Nous croyons que pour converger le meilleur, vous devez apprendre et suivre le meilleur .</p>
        </div>
        <div class="row">
            @foreach ($users as $user)
                <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                    <div class="member">
                      <img src="{{$user->profile_photo_path}}" class="img-fluid">
                      <div class="member-info">
                        <div class="member-info-content">
                            <a href="{{route('formateur',$user->id)}}">
                                <h4>{{$user->name}}</h4>
                                <span>{{$user->email}}</span>
                              </a>
                        </div>
                <div class="social">
                  <a href="{{$user->cv}}"><i class="bi bi-file-earmark-person"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">
        <div class="container" data-aos="fade-up">
          <div class="section-title">
            <h2>Atteignez vos objectifs.</h2>
            <p>Tracez votre chemin vers la r??ussite et b??n??ficier de nos formations .</p>
          </div>
          <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper align-items-center">
              @foreach ($formations as $formation)
              <div class="swiper-slide">
                  <a href="{{route('detailsformation',['id'=>$formation->id])}}">
                  <img src="{{$formation->image}}" class="img-fluid">
                  </a>
              </div>
              @endforeach
            </div>
            <div class="swiper-pagination"></div>
          </div>
        </div>
      </section><!-- End Clients Section -->

    <!-- ======= Contact Us Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact </h2>
          <p>Contactez-nous pour commencer</p>
        </div>

        <div class="row">
          <div class="col-lg-5 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>TUNIS, TUNISIA</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Elearning@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>T??l??phone:</h4>
                <p>+216 25 643 563</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102239.58355570477!2d10.073237311417355!3d36.794862417055896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis!5e0!3m2!1sfr!2stn!4v1643329592405!5m2!1sfr!2stn"  frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
        </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="{{route('createcontact')}}" method="post" role="form" class="php-email-form">
                {{csrf_field()}}
              <div class="row">
                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
              </div>
              <div class="form-group mt-3">
                <label for="name">Email</label>
                <input type="mail" class="form-control" name="mail" placeholder="Email" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Sujet</label>
                <input type="text" class="form-control" name="sujet" id="sujet" placeholder="Sujet" required>
              </div>
              <div class="form-group mt-3">
                <label for="name">Message</label>
                <textarea class="form-control" name="msg" rows="10" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Encours</div>
                <div class="error-message"></div>
                <div class="sent-message">Votre message a ??t?? envoy??. Merci !</div>
              </div>
              <div class="text-center">
                <input type="submit" value="Envoyer Message" class="btn btn-warning" style="color:rgb(252, 252, 252);"  style="background-color:rgb(255, 143, 7);" >
              </div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Us Section -->

  </main><!-- End #main -->


    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>F.A.Q</h2>
            <p>Questions fr??quemment pos??es</p>
          </div>

          <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">

            <li>
              <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Inscription aux formations et acc??s ?? vie<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq1" class="collapse" data-bs-parent=".faq-list">
                <p>
                  E-learning est une plate-forme en ligne qui vous rapproche des principaux formateurs talentueux et vous aide ?? apprendre les comp??tences les plus enrichissantes tout au confort de votre maison ,avec notre plate-forme une nouvelle g??n??ration 100% en ligne.              </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Modes de paiement ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq2" class="collapse" data-bs-parent=".faq-list">
                <p>
                  La meilleure fa??on de paiement est d'utiliser votre catre bancaire .
                    </p>
              </div>
            </li>

            <li>
              <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Parriner un ami, recevez une r??compense? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                    Recommender nos services ?? vos proches et ?? chaque nouveau parrainage valid?? vous Gagnez des jetons pour commencer un le??on.
                    Lorsqu'un de vos amiss'inscrit ?? notre site et acheter un abonement,vous recevrez un jeton cadeau.
                </p>
              </div>
            </li>
            <li>
              <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Comment nous contacter ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
              <div id="faq3" class="collapse" data-bs-parent=".faq-list">
                <p>
                  La meilleure fa??on de nous contacter est de contacter notre ??quipe d'assistance. Nous aimerions entendre vos questions, pr??occupations et commentaires sur nos services.
                </p>
              </div>
            </li>
          </ul>
        </div>
      </section><!-- End F.A.Q Section -->
 <!-- ======= Footer ======= -->
 <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3><img src="{{asset('log1/img/tee.png')}}" width="280" height="100" alt="Logo"></h3>
            <p>
              Tunis,Tunisia <br>
              Plateforme  100% en ligne<br>
              <strong>Phone:</strong> +216 25 643 563<br>
              <strong>Email:</strong> info@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Liens utiles</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">?? propos de nous</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('showparrain') }}">Gagnez jetons</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conditions d'utilisation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politique de confidentialit??</a></li>
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos services</h4>
            <ul>
                @foreach ($cats as $cat)
                <li>
                     <i class="bx bx-chevron-right"></i><a href="{{route('categ',$cat->id)}}"><span>{{$cat->nom}}</span></a>
                    </li>
                  @endforeach
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos r??seaux sociaux</h4>
            <div class="social-links mt-3">
              <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
              <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container py-4">
      <div class="copyright">
        &copy; Copyright <strong><span>Maryem Ben Hmida </span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->

      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{asset('site/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/php-email-form/validate.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('site/assets/js/main.js')}}"></script>
    <!-- plugins:js -->
    <script src="{{asset('adminn/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('adminn/vendors/chart.js/Chart.min.js')}}"></script>
    <script src="{{asset('adminn/vendors/moment/moment.min.js')}}"></script>
    <script src="{{asset('adminn/vendors/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('adminn/vendors/chartist/chartist.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('adminn/js/off-canvas.js')}}"></script>
    <script src="{{asset('adminn/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('adminn/js/dashboard.js')}}"></script>
    <!-- End custom js for this page -->

</body>

</html>
