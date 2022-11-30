<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title> Instructeur</title>
    <!-- plugins:css -->
    <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
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
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{asset('log1/img/ok.png')}}"alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('adminn/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex"> Espace Formateur</h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">


            <li class="nav-item dropdown">
              <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <i class="icon-speech"></i>
                <span class="count">{{$count}}</span>
              </a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                <a class="dropdown-item py-3">
                  <p class="mb-0 font-weight-medium float-left">Vous avez réçue {{$count}} message(s)</p>
                  <a href="{{route('showinbox')}}">
                  <span class="badge badge-pill badge-primary float-right">Voir tous</span>
                  </a>
                </a>
                <div class="dropdown-divider"></div>
                @foreach($contactas as $cont)
                <a class="dropdown-item preview-item">
                  <div class="preview-thumbnail">
                    @foreach($users as $user)
                    @if ($user->id == $cont->user_id)
                    <img src="{{$user->profile_photo_path  }}" alt="image" class="img-sm profile-pic">
                  </div>
                  <div class="preview-item-content flex-grow py-2">
                    <p class="preview-subject ellipsis font-weight-medium text-dark">{{$user->name}} </p>
                    @endif
                    @endforeach
                    <p class="font-weight-light small-text"> {{$cont->objet}}</p>
                    @endforeach
                  </div>
                </a>
              </div>
            </li>

            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="{{ Auth::user()->profile_photo_path  }}" alt="Profile image">

                <span class="font-weight-normal">{{ Auth::user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">

                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email}}</p>
                </div>
                <a class="dropdown-item"><i class="dropdown-item-icon icon-user text-primary"></i> Mon compte <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"  href="{{route('showinbox')}}"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages <span class="badge badge-pill badge-danger">{{$count}}</span></a>
                <a class="dropdown-item"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary" ></i>Déconnexion</a>
              </div>
            </li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf
         </form>
          </ul>
          <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
        </div>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
              <li class="nav-item nav-profile">
                <a href="#" class="nav-link">
                  <div class="profile-image">
                    <img class="img-xs rounded-circle" src="{{ Auth::user()->profile_photo_path  }}" alt="profile image" >

                  </div>
                  <div class="text-wrapper">
                    <p class="profile-name">{{ Auth::user()->name }}</p>
                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <p class="designation">Formateur</p>
                  </div>
                  </div>
                  <div class="icon-container">
                    <i class="icon-bubbles"></i>
                    <div class="dot-indicator bg-danger"></div>
                  </div>
                </a>
              </li>

              <li class="nav-item nav-category">
                <a class="nav-link" href="{{ route('dashboard') }}">
                  <span class="menu-title">Tableau de Bord</span>
                  <i class="icon-screen-desktop menu-icon"></i>
                </a>
              </li>

              <li class="nav-item nav-category">
                <span class="nav-link">Gestion</span></li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('listformation') }}">
                  <span class="menu-title">Mes formations</span>
                  <i class="icon-layers menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('mesgains') }}">
                  <span class="menu-title">Mes gains</span>
                  <i class="icon-wallet menu-icon"></i>
                </a>
              </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('showhistorique') }}">
                      <span class="menu-title">Consulter Historiques </span>
                      <i class="bi bi-folder-check menu-icon"></i>
                    </a>
                  </li>
              <li class="nav-item">
              <a class="nav-link"  href="{{ route('contact') }}" >
               <span class="menu-title">Questions et Réponses</span>
               <i class="icon-envelope-letter menu-icon"></i>
                </a>
              </li>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('ShowEditcompte',['id'=>Auth::user()->id])}}">
                  <span class="menu-title">Paramétres du compte</span>
                  <i class="icon-settings menu-icon"></i>
                </a>
              </li>
            </ul>
          </nav>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0"> Page contact </h5>
                    </br>
                    <p class="ml-auto mb-0">Ici, vous pouvez contacter l'administrateur<i class="icon-bulb"></i></p>
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                            <button type="button" class="btn btn-outline-warning btn-icon-text">
                                <a href="{{ route('showinbox') }}"  style="color:rgb(18, 16, 16)">
                                    <i class="icon-envelope-open"></i> Consulter boite de réception
                                 </a>
                           </button>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-10 text-center mb-6">
                    <div class="info">
                        <div class="email">
                          <i class="bi bi-envelope"></i>
                          <h4>Email:</h4>
                          <p>{{Auth::user()->email}}</p>
                        </div>
                    </div>
				</div>
			</div>
			<div class="row justify-content-center">
					<div class="wrapper">

                        <div class="row no-gutters mb-5">
							<div class="col-md-7">
									<div id="form-message-warning" class="mb-4"></div>
                                    <br>
									<form  method="POST" action="{{route('createcontact')}}"  class="contactForm">
									@csrf
                                    <br>
                                    <div class="row">
											<div class="col-md-12" >
                                                <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                                            <div class="col-md-8">
												<div class="form-group" style="border:0; width: 110%; height: 80px;">
													<label class="label" for="subject">Objet</label>
													<input type="text" class="form-control" name="sujet" placeholder="Objet" required>
                                               </div>
                                            </div>
											<div class="col-md-8">
												<div class="form-group" style="border:0; width: 110%; height: 100px;" >
													<label class="label" for="#">Message</label>
													<textarea name="msg" class="form-control"  cols="30" rows="4" placeholder="Nouveau message"></textarea>
												</div>
											</div>
											<div class="col-md-8">
												<center>
                                                    <div class="form-group">
													<input type="submit" value="Envoyer Message" class="btn btn-warning">
													<div class="submitting"></div>
												    </div>
                                                </center>
											</div>
                                            <div class="col-md-10" >
                                            <div >
                                          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d102239.58355570477!2d10.073237311417355!3d36.794862417055896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12fd337f5e7ef543%3A0xd671924e714a0275!2sTunis!5e0!3m2!1sfr!2stn!4v1643329592405!5m2!1sfr!2stn"  frameborder="0" style="border:0; width: 200%; height: 290px;" allowfullscreen></iframe>
                                         </div>
                                            </div>
                                    </div>
										</div>
									</form>
							    </div>
						        </div>
							</div>
						</div>
					</div>

			</div>
		</div>
	</section>
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2021/2022<br>
              </span>
            </div>
          </footer>
          <!-- partial -->

    <!-- container-scroller -->
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
    <script src="{{asset('contactt/js/jquery.min.js')}}"></script>
  <script src="{{asset('contactt/js/popper.js')}}"></script>
  <script src="{{asset('contactt/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('contactt/js/jquery.validate.min.js')}}"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="{{asset('contactt/js/google-map.js')}}"></script>
  <script src="{{asset('contactt/js/main.js')}}"></script>
  </body>
</html>
