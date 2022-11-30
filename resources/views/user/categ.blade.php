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
  <link href="{{asset('partie/assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('partie/assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('partie/assets/vendor/animate.css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
    <link href="{{asset('partie/assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="{{asset('partie/assets/css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Mentor - v4.7.0
    * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->


</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1 class="text-light"><a href="{{route('redirects')}}"><span>E-LEARNING</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="{{route('allformation')}}">Formations </a></li>
          <li class="dropdown"><a href="#"><span>Catégories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
                <li>
                    <a href="{{route('allformation')}}">Tous les catégories</a>
                  </li>
                @foreach ($cats as $cat)
                <li class="dropdown"><a href="{{route('categ',$cat->id)}}"><span>{{$cat->nom}}</span> <i class="bi bi-chevron-right"></i></a>
                  <ul>
                    @foreach ($cat->scats as $scat)
                    <li><a href="{{route('categ',$scat->id)}}">{{$scat->nom}}</a></li>
                    @endforeach
                  </ul>
                  @endforeach
                </li>
              </ul>
          </li>
          <li><a class="nav-link scrollto" href="#team">Formateurs</a></li>
          <li><a class="nav-link scrollto" href="{{route('showabonnement')}}">Abonnement</a></li>
          <li class="nav-item dropdown">

              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">Notifications </p>
                  <span class="badge badge-pill badge-primary float-right">voir tous</span>
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail"></div>
                </a>
              </div>
            </li>
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
                    <span class="badge badge-pill badge-primary float-right">voir tous</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark">votre nombre totale de jetons est : <br>{{ Auth::user()->jeton}} </p>
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
                    <p class="mb-0 font-weight-medium float-left">Notifications </p>
                    <span class="badge badge-pill badge-primary float-right">voir tous</span>
                  </a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item preview-item">
                    <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark">votre nombre totale de formations est : <br>{{$count}} </p>
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
      <a class="dropdown-item"href="{{route('listparrainage')}}"><i class="bi bi-people-fill text-primary"></i>Mes parrains : <span class="badge badge-pill badge-danger">{{$countparr}}</span></a>
      <a class="dropdown-item"href="{{route('Showjetons')}}"><i class="bi bi-cash-coin text-primary"></i>Mes jetons : <span class="badge badge-pill badge-danger">{{ Auth::user()->jeton}}</span></a>
      <a class="dropdown-item"  href="{{route('msg')}}"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages : <span class="badge badge-pill badge-danger"> {{$countmsg}}</span></a>
      <a class="dropdown-item" href="{{route('ShowEditcompteU',['id'=>Auth::user()->id])}}"><i class="dropdown-item-icon icon-user text-primary"></i> Mon compte : <span class="badge badge-pill badge-danger">1</span></a>
      <a class="dropdown-item"href="{{route('historiqueachats')}}"><i class="bi bi-cart-check text-primary"></i>Historique d'achats</a>
      <a class="dropdown-item"  href="{{ route('logout') }}"
       onclick="event.preventDefault();
       document.getElementById('logout-form').submit();">
      <i class="dropdown-item-icon icon-power text-primary" ></i>Déconnexion</a>
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

  <main id="main">
      <!-- ======= Services Section ======= -->
 <section id="courses" class="courses">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Une large sélection de formations</h2>
          <p>Commençons notre apprentissage</p>
        </div>
        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12">
            <center>
            <a data-filter="*" class="filter-active" href="{{route('allformation')}}"  style="color:hsl(35, 100%, 47%);">Consulter tous les Formations en ligne</a>
          </div>
        </div>
     </div>
    <div class="container aos-init aos-animate" data-aos="fade-up">
      <div class="row aos-init aos-animate" data-aos="zoom-in" data-aos-delay="50">
        @foreach ($formations as $formation)
        <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
          <div class="course-item">
            <img src="{{asset('/'.$formation->image)}}" class="img-fluid" alt="...">
            <div class="course-content">
              <div class="d-flex justify-content-between align-items-center mb-3">
                @foreach ($cats as $cat )
                @if ($cat->id == $formation->cat_id)
                <h4><a href="{{route('categ',$cat->id)}}"  style="color:black"> {{$cat->nom}} </a></h4>
                @endif
                @endforeach
                @foreach ($abonnements  as $ab )
                @if ($ab->id == $formation->abonnement_id)
                <p class="price"> {{$ab->jeton}} Jetons</p>
                @endif
                @endforeach
              </div>
               <h3><a href="{{route('detailsformation',['id'=>$formation->id])}}">{{$formation->nom}} </a></h3>
              <p>{{$formation->descf}}</p>
              <p> Niveau : {{$formation->niveau}} , en ligne et à votre rythme.</p>
              <p>Note : {{\ DB::table('notes')->where('formation_id',$formation->id)->sum('note')*5 /100}}/5 <img src="{{asset('site/assets/img/etoiles.gif')}}" class="img-fluid animated" width="70" height="10"></p>

              <div class="trainer d-flex justify-content-between align-items-center">
                <div class="trainer-profile d-flex align-items-center">
                    @foreach ($users  as $user )
                    @if ($user->id == $formation->user_id)
                  <img src="{{asset($user->profile_photo_path)}}" class="img-fluid">
                  <span> {{$user->name}}</span>
                  @endif
                  @endforeach
                </div>
                <div class="trainer-rank d-flex align-items-center">
                  <i class="bx bx-user"></i>&nbsp;{{\DB::table('achatformations')->where('formation_id',$formation->id)->count()}}
                  &nbsp;&nbsp;
                </div>
              </div>
            </div>
          </div>

        </div> <!-- End Course Item-->
        @endforeach

      </div>
    </div>
  </section>
        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
          <div class="container">

            <div class="section-title" data-aos="fade-up">
              <h2>Formateurs</h2>
              <p>Nos formateurs sont toujours là pour vous aider</p>
            </div>
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="member">
                          <img src="{{asset($user->profile_photo_path)}}" class="img-fluid" alt=""  >
                          <div class="member-info">
                            <div class="member-info-content">
                              <a href="{{route('formateur',$user->id)}}">
                              <h4>{{$user->name}}</h4>
                              <span>{{$user->email}}</span>
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

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">

      <div class="container">
        <div class="row">
          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>E-LEARNING</h3>
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
              <li><i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i> <a href="#">Accueil</a></li>
              <li><i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i> <a href="#">À propos de nous</a></li>
              <li><i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i> <a href="{{ route('showparrain') }}">Gagnez jetons</a></li>
              <li><i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i> <a href="#">Conditions d'utilisation</a></li>
              <li><i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i> <a href="#">Politique de confidentialité</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos services</h4>
            <ul>
                @foreach ($cats as $cat)
                <li>
                     <i class="bx bx-chevron-right"  style="color:hsl(35, 100%, 47%);"></i><a href="{{route('categ',$cat->id)}}"><span>{{$cat->nom}}</span></a>
                    </li>
                  @endforeach
            </ul>
          </div>
          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos réseaux sociaux</h4>
            <div class="social-links mt-3"  style="color:hsl(35, 100%, 47%);">
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

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center" style="background-color:hsl(35, 100%, 47%);"><i class="bi bi-arrow-up-short"></i></a>

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
    <!-- Vendor JS Files -->
  <script src="{{asset('partie/assets/vendor/purecounter/purecounter.js')}}"></script>
  <script src="{{asset('partie/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('partie/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('partie/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('partie/assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{asset('partie/assets/js/main.js')}}"></script>


</body>

</html>
