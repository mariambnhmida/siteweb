<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Instructeur</title>
    <!-- plugins:css -->

    <link href="{{asset('site/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('site/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('adminn/vendors/simple-line-icons/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/css/vendor.bundle.base.css')}}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('adminn/vendors/select2/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('adminn/vendors/select2-bootstrap-theme/select2-bootstrap.min.css')}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{asset('adminn/css/style.css')}}" />
    <link rel="shortcut icon" href="{{asset('adminn/images/favicon.png')}}" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:../../partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="index.html">
            <img src="{{asset('log1/img/ok.png')}}"class="logo-dark" />
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
                  <p class="mb-0 font-weight-medium float-left">Vous avez r????ue {{$count}} message(s)</p>
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
                <img class="img-xs rounded-circle ml-2" src="{{ asset('/'. Auth::user()->profile_photo_path)}}" alt="Profile image">

                <span class="font-weight-normal">{{ Auth::user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">

                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{route('ShowEditcompte',['id'=>Auth::user()->id])}}"><i class="dropdown-item-icon icon-user text-primary"></i> Mon compte <span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item"  href="{{route('showinbox')}}"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages <span class="badge badge-pill badge-danger">{{$count}}</span></a>
                <a class="dropdown-item"  href="{{ route('logout') }}"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"><i class="dropdown-item-icon icon-power text-primary" ></i>D??connexion</a>
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
                    <img class="img-xs rounded-circle" src="{{ asset('/'. Auth::user()->profile_photo_path)}}" alt="profile image" >
                    <div class="dot-indicator bg-success"></div>
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
                  <span class="menu-title">Mes Formations</span>
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

              </li>
              <li class="nav-item">
              <a class="nav-link"  href="{{ route('contact') }}" >
               <span class="menu-title">Questions et R??ponses</span>
               <i class="icon-envelope-letter menu-icon"></i>
                </a>
              </li>

              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('ShowEditcompte',['id'=>Auth::user()->id])}}">
                  <span class="menu-title">Param??tres du compte</span>
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
                      <h5 class="mb-0">Ajouter un nouveau chapitre de votre formation</h5>
                      <p class="ml-auto mb-0">Les titres de sujet sont affich??s publiquement chaque fois que n??cessaire. <i class="icon-bulb"></i></p>
                    </div>
                    <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">

                    </div>
                  </div>
                </div>
              </div>
              <!-- Quick Action Toolbar Ends-->
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                  <div class="card-body">
                    <form class="forms-sample"  method="post" action="{{route('addpartiepost')}}" enctype="multipart/form-data" >
                        @csrf
                      <input type="text" name="user_id" value="{{Auth::user()->id}}" hidden>
                      <input type="hidden" name="formation_id" value="{{$formations->id}}">
                      <input type="text" name="etatp" value="Ferm??" hidden>
                      <div class="form-group">
                        <h4 >Chaque formation peut contenir un ou plusieurs chapitre.</h4><br>
                        <br>
                        <label for="exampleInputUsername1">Titre du chapitre *</label>
                        <input type="text" class="form-control" name="nom" placeholder="ajouter un titre" required>
                        <div>
                         @if ($errors->has('nom'))
                         <strong style="color: red;">{{$errors->first('nom')}}</strong>
                         @endif</div>
                     </div>
                      <div class="form-group">
                        <label for="exampleInputUsername1">Description du chapitre *</label>
                        <textarea type="text" class="form-control"name="descp" placeholder="ajouter une description" required>
                        </textarea>
                        <div>
                         @if ($errors->has('descp'))
                         <strong style="color: red;">{{ $errors->first('descp') }}</strong>
                         @endif</div>
                      </div>

                      <div class="form-group">
                        <label for="exampleInputConfirmPassword1">Vid??o de nouveau chapitre *</label>
                        <input type="file" class="form-control" name="video"  required>
                        <div>
                         @if ($errors->has('video'))
                         <strong style="color: red;">{{ $errors->first('video') }}</strong>
                         @endif</div>

                      </div>
                      <br>

                      <div class="custom-control custom-switch">
                        <input type="checkbox" class="custom-control-input" name="gratuite" id="customSwitch1" >
                        <label class="custom-control-label" for="customSwitch1">Gratuit?? *</label>
                      </div>
                      <br>
                      <button  type="submit" class="btn btn-success pull-right">Ajouter</button>
                      <a href="{{route('redirects')}}"button class="btn btn-light">Annuler</button></a>
                    </form>
                  </div>
                </div>
              </div>
          <!-- content-wrapper ends -->
          <!-- partial:../../partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ??  2021/2022</span>

          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{asset('adminn/vendors/js/vendor.bundle.base.js')}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset('adminn/vendors/select2/select2.min.js')}}"></script>
    <script src="{{asset('adminn/vendors/typeahead.js/typeahead.bundle.min.js')}}"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset('adminn/js/off-canvas.js')}}"></script>
    <script src="{{asset('adminn/js/misc.js')}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="{{asset('adminn/js/typeahead.js')}}"></script>
    <script src="{{asset('adminn/js/select2.js')}}"></script>
    <!-- End custom js for this page -->
  </body>
</html>
