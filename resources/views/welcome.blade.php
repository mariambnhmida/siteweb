<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>E-learning</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
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
        <h1 class="text-light"><a href="/"><span><img src="log1/img/tee.png"></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="/">Accueil</a></li>
          <li><a class="nav-link scrollto" href="#about">À propos</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#team">Formateurs</a></li>
          <li class="dropdown"><a href="#"><span>Catégories</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="{{route('allformation')}}">Tous les catégories</a></li>
              @foreach ($cats as $cat)
              <li class="dropdown">
                <a href="{{route('wformation',$cat->id)}}">
                    <span>{{$cat->nom}}</span>
                    <i class="bi bi-chevron-right"></i>
                </a>
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
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="{{ route('login') }}">Connexion</a></li>
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
          <h1>Une meilleure expérience  avec nous !</h1>
          <h2>E-learning est une plate-forme en ligne qui vous rapproche des principaux formateurs talentueux  et vous aide à apprendre les compétences les plus enrichissantes tout au confort de votre maison. </br>C'est une nouvelle génération 100% en ligne.</h2>
        <div>
            <button type="button" class="btn btn-outline-danger">
               + de
            @foreach ( $pojects as $pro)
            {{$pro->views}}
          @endforeach  Visiteurs
          <i class="bi bi-eye menu-icon"></i>
        </button>

                <button type="button" class="btn btn-outline-danger">
                    <a href="{{asset('site/assets/img/pub.mp4')}} "class="portfolio-lightbox" >Commencer</a>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-up-right-square-fill" viewBox="0 0 16 16">
                        <path d="M14 0a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12zM5.904 10.803 10 6.707v2.768a.5.5 0 0 0 1 0V5.5a.5.5 0 0 0-.5-.5H6.525a.5.5 0 1 0 0 1h2.768l-4.096 4.096a.5.5 0 0 0 .707.707z"/>
                      </svg>
                </button>
         </div>

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
                  Améliorer des vies grâce à l'apprentissage
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
                  <p><a href="#team">Trouvez les formateurs adéquats</a></p>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-person-plus-fill"></i>
                  <h4>Parriner un ami, recevez une récompense</h4>
                  <p> <a href="{{route('showparrain')}}"> Invitez vos proches et gagnez des jetons pour commencer une formation !</a></p>
                </div>
                <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                    <i class="bi bi-search"></i>
                    <h4>Systéme d'aide à la décision</h4>
                  <p><a href="{{route('competence')}}">  Créer votre compte pour trouver des formations qualifiantes !</a></p>
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
          <h2> Consultez nos derniers chiffres.</h2>
          <p>Nous continuons à grandir
            Notre communauté mondiale et notre catalogue de formations s'agrandissent chaque jour.</p>
        </div>

        <div class="row">
          <div class="col-md-3 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-person-check"></i></div>
              <h4 class="title"><a href="">Nombre de formateurs</a></h4>
              <p class="title">{{$count}}</p>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-mortarboard"></i></div>
              <h4 class="title"><a href="">Nombre d'apprenants</a></h4>
              <p class="title">{{$count1}}
            </p>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
              <div class="icon"><i class="bi bi-menu-button-wide-fill"></i></div>
              <h4 class="title"><a href="">Nombre de formations</a></h4>
              <p class="title">{{$count2}}</p>
            </div>
          </div>

          <div class="col-md-3 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box">
                <div class="icon"><i class="bi bi-bookmark-check"></i></div>
              <h4 class="title"><a href="">Nombre de participants</a></h4>
              <p class="title">{{$count3}}</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Portfolio Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Abonnements</h2>
            <p>Découvrez les excellents abonnements  que nous offrons</p>
          </div>
          <div class="row">
          @php
              $x = 0;
          @endphp
              @foreach ($abonnements as $abonnement)
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="{{$x+=100}}">
              <div class="icon-box">
                  <div class="icon"><img src="{{asset('site/assets/img/money1.png')}}" class="img-fluid"></div>
                <h4 class="title">{{$abonnement->nom}}</h4>
                <p class="description"> Description : {{$abonnement->desca}}</p>
                <p class="description"> Nombre de jeton : {{$abonnement->jeton}}</p>
                <p class="description">Prix d'abonnement: {{$abonnement->prix}}.000 dt</p>
                <div>
                  <a href="{{route('checkout',['id'=>$abonnement->id])}}" class="btn-get-started scrollto">Payer en ligne<i class="bi bi-cart3"></i></a>
                </div>
              </div>
          </div>
          @endforeach
          </div>
        </div>
      </section><!-- End Services Section -->
  <!-- ======= Portfolio Section ======= -->
  <section id="portfolio" class="portfolio">
    <div class="container" data-aos="fade-up">
    </div>
  </section><!-- End Portfolio Section -->
  <!-- ======= Services Section ======= -->
 <section id="services" class="services section-bg">
    <div class="container" data-aos="fade-up">
      <div class="section-title">
        <h2>Formations recommandées pour vous</h2>
        <p>Commençons notre apprentissage</p>
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
            <p class="description">Niveau : {{$formation->niveau}} <br> ,en ligne et à votre rythme</p>
            <p class="description"> Prix : {{$formation->abonnement->jeton}} Jetons</p>
            <p>Note : {{\ DB::table('notes')->where('formation_id',$formation->id)->sum('note')*5 /100}}/5  <img src="{{asset('site/assets/img/stars.gif')}}" class="img-fluid animated" width="100" height="10"></p>
                <a href="{{route('detailsformation',['id'=>$formation->id])}}" class="btn-get-started scrollto">Détails
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
                <div class="section-title" data-aos="fade-up">
                    <h2>Nos Formateurs</h2>
                    <p>Experts et hautement qualifiés</p>
                  </div>
                  <div align="center">
                  <p>  Nous croyons que pour converger le meilleur, vous devez apprendre et suivre le meilleur</p>
                  </div>
            <div class="row">
                @foreach ($users as $user)
                    <div class="col-xl-3 col-lg-4 col-md-6" data-aos="zoom-in" data-aos-delay="200">
                        <div class="member">
                          <img src="{{$user->profile_photo_path}}" class="img-fluid">
                          <div class="member-info">
                            <div class="member-info-content">
                                <a href="{{route('forma',$user->id)}}">
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
          <p>Tracez votre chemin vers la réussite. Connectez-vous pour bénéficier de nos formations .</p>
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
                <p> Tunis,Tunisia</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>Elearning@gmail.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Téléphone:</h4>
                <p>+216 25 643 563</p>
              </div>

              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102239.58355570477!2d10.073237311417355!3d36.794862417055896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis!5e0!3m2!1sfr!2stn!4v1643329592405!5m2!1sfr!2stn"  frameborder="0" style="border:0; width: 100%; height: 290px;" allowfullscreen></iframe>
        </div>

          </div>

          <div class="col-lg-7 mt-5 mt-lg-0 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
            <form action="{{route('createcontactus')}}" method="post" role="form" class="php-email-form">
                {{csrf_field()}}
              <div class="row">
                <div class="form-group col-md-6">
                  <label for="name">Votre Nom</label>
                  <input type="text" name="nom" class="form-control" id="nom" placeholder="Entrer votre nom" required>
                </div>
                <div class="form-group col-md-6 mt-3 mt-md-0">
                  <label for="name">Votre Email</label>
                  <input type="email" class="form-control" name="email" id="email" placeholder=" Entrer votre Email" required>
                </div>
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
                <div class="sent-message">Votre message a été envoyé. Merci !</div>
              </div>
              <div class="text-center"><button type="submit" class="btn btn-warning" style="color:rgb(252, 252, 252);"  style="background-color:rgb(255, 143, 7);">Envoyer Message</button></div>
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
        <p>Questions fréquemment posées</p>
      </div>
      <ul class="faq-list" data-aos="fade-up" data-aos-delay="100">
        <li>
          <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">Inscription aux formations et accès à vie<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq1" class="collapse" data-bs-parent=".faq-list">
            <p>
                E-learning est une plate-forme en ligne qui vous rapproche des principaux formateurs talentueux et vous aide à apprendre les compétences les plus enrichissantes tout au confort de votre maison ,avec notre plate-forme une nouvelle génération 100% en ligne.
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">Modes de paiement ?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq2" class="collapse" data-bs-parent=".faq-list">
            <p>
                La meilleure façon de paiement est d'utiliser votre catre bancaire .
            </p>
          </div>
        </li>

        <li>
          <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Parriner un ami, recevez une récompense? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
                Recommender nos services à vos proches et à chaque nouveau parrainage validé vous Gagnez des jetons pour commencer un leçon.
                Lorsqu'un de vos amiss'inscrit à notre site et acheter un abonement,vous recevrez un jeton cadeau.
            </p>
          </div>
        </li>
        <li>
          <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">Comment nous contacter ? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
          <div id="faq3" class="collapse" data-bs-parent=".faq-list">
            <p>
              La meilleure façon de nous contacter est de contacter notre équipe d'assistance. Nous aimerions entendre vos questions, préoccupations et commentaires sur nos services.
            </p>
          </div>
        </li>
      </ul>
    </div>
  </section>
  <!-- End F.A.Q Section -->
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
            <div class="row">
              <div class="col-lg-3 col-md-6 footer-contact">
                <h3><img src="log1/img/tee.png" width="280" height="100" alt="Logo"></h3>
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
              <li><i class="bx bx-chevron-right"></i> <a href="#">À propos de nous</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="{{ route('showparrain') }}">Gagnez jetons</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Conditions d'utilisation</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Politique de confidentialité</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos Services</h4>
            <ul>
                @foreach ($cats as $cat)
                <li>
                     <i class="bx bx-chevron-right"></i>
                    <a href="{{route('wformation',$cat->id)}}">
                        <span>{{$cat->nom}}</span>
                    </a>
                  @endforeach
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Nos réseaux sociaux</h4>

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
        &copy; Copyright <strong><span>Maryem Ben Hmida</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/ninestars-free-bootstrap-3-theme-for-creative/ -->
      </div>
    </div>
  </footer><!-- End Footer -->


  <!-- Vendor JS Files -->
  <script src="{{asset('site/assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('site/assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('site/assets/vendor/php-email-form/validate.js')}}"></script>
  <!-- Template Main JS File -->
  <script src="{{asset('site/assets/js/main.js')}}"></script>
  <script>
      var botmanWidget = {

          introMessage: "Aslema ✋! E-learning est une plate-forme en ligne qui vous rapproche des principaux formateurs talentueux et vous aide à apprendre les compétences les plus enrichissantes tout au confort de votre maison ,avec notre plate-forme une nouvelle génération 100% en ligne.",
          title:'E-learning',

    mainColor:'#eb5d1e',
    aboutText: 'Envoyer message',
    bubbleBackground:'#eb5d1e',
    headerTextColor: '#fff',
    bubbleAvatarUrl: '/t1.gif'
      };
  </script>

  <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>

</body>
</html>
