<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Admin</title>
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
            <img src="{{asset('log1/img/ok.png')}}" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{asset('adminn/images/logo-mini.svg')}}" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1">
          <h5 class="mb-0 font-weight-medium d-none d-lg-flex">Espace Administrateur </h5>
          <ul class="navbar-nav navbar-nav-right ml-auto">


            <li class="nav-item dropdown">
                <a class="nav-link count-indicator message-dropdown" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                  <i class="icon-speech"></i>
                  <span class="count">{{$count}}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 font-weight-medium float-left">vous avez réçue {{$count}} message(s) </p>
                        <span class="badge badge-pill badge-primary float-right">Voir tous</span>
                      </a>
                  <div class="dropdown-divider"></div>
                  @foreach($contacts as $contact)
                  <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                          @foreach($users as $user)
                          @if ($user->id == $contact->user_id)
                          <img src="{{asset('/'.$user->profile_photo_path)  }}" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                          <p class="preview-subject ellipsis font-weight-medium text-dark">{{$user->name}}</p>
                          @endif
                          @endforeach
                        <p class="font-weight-light small-text"> {{$contact->msg}}</p>
                        @endforeach
                        </div>
                      </a>
                </div>
              </li>
            <li class="nav-item dropdown d-none d-xl-inline-flex user-dropdown">
              <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                <img class="img-xs rounded-circle ml-2" src="{{asset('adminn/images/faces/face8.png')}}" alt="Profile image">

                <span class="font-weight-normal">{{ Auth::user()->name }}</span></a>
              <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                <div class="dropdown-header text-center">

                  <p class="mb-1 mt-3">{{ Auth::user()->name }}</p>
                  <p class="font-weight-light text-muted mb-0">{{ Auth::user()->email }}</p>
                </div>
                <a class="dropdown-item" href="{{route('ShowEditcompteA',['id'=>Auth::user()->id])}}"><i class="dropdown-item-icon icon-user text-primary"></i> Mon compte<span class="badge badge-pill badge-danger">1</span></a>
                <a class="dropdown-item" href="{{route('showmsgg')}}"><i class="dropdown-item-icon icon-speech text-primary"></i> Messages</a>
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
                  <img class="img-xs rounded-circle" src="{{asset('adminn/images/faces/face8.png')}}" alt="profile image" >
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{ Auth::user()->name }}</p>
                  <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                  <p class="designation" > Administrateur</p>
                </div>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
            <li class="nav-item nav-category">
              <span class="nav-link">Tableau de Bord</span>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('redirects') }}">
                  <span class="menu-title">Page d'acceuil</span>
                  <i class="icon-screen-desktop menu-icon"></i>
                </a>
              </li>
            <li class="nav-item nav-category">
                <a class="nav-link" href="{{route('paiementF')}}">
                  <span class="menu-title">Paiement </span>
                  <i class="bi bi-currency-exchange menu-icon"></i>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showformateur') }}">
                <span class="menu-title">Gestion Formateurs</span>
                <i class="bi bi-person-workspace menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('showetudiant') }}">
                  <span class="menu-title">Gestion Apprenants</span>
                  <i class="bi bi-person-lines-fill menu-icon"></i>
                </a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('listabonnement')}}">
                <span class="menu-title">Gestion Abonnements</span>
                <i class="bi bi-coin menu-icon"></i>
              </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="{{ route('listcateg') }}">
                <span class="menu-title">Gestion Categories</span>
                <i class="bi bi-ui-checks menu-icon"></i>
              </a>
            </li>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('consulterformation')}}">
                  <span class="menu-title">Consulter Formations</span>
                  <i class="icon-book-open menu-icon"></i>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('consulterparrainage')}}">
                  <span class="menu-title">Consulter Parrainage</span>
                  <i class="bi bi-person-check menu-icon"></i>
                </a>
              </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route('historiqjetons')}}">
                  <span class="menu-title">Consulter Historiques</span>
                  <i class="bi bi-eye menu-icon"></i>
                </a>
              </li>

            <li class="nav-item">
              <a class="nav-link" href="{{route('showmsgg')}}">
                <span class="menu-title">Qestion et Réponses</span>
                <i class="icon-envelope-letter menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{route('ShowEditcompteA',['id'=>Auth::user()->id])}}">
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
                    <h5 class="mb-0">Liste des  formateurs</h5>
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
                    <div class="col-sm-6 col-md-3 p-3 text-center btn-wrapper">
                        <button type="button" class="btn px-0" >
                            <a href="{{ route('addformateur') }}"><i class="icon-user mr-2"></i>Ajouter Formateur</a>
                      </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                            <th class="font-weight-bold">ID</th>
                            <th class="font-weight-bold">Image</th>
                            <th class="font-weight-bold">Nom</th>
                            <th class="font-weight-bold">Email</th>
                            <th class="font-weight-bold">Curriculum Vitae</th>
                            <th class="font-weight-bold">Pourcentage</th>
                            <th class="font-weight-bold">Formations</th>
                            <th class="font-weight-bold" >Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach ($m as $l)
                            <tr>
                            <td>{{$l->id}}</td>
                            <td><img src="{{$l->profile_photo_path}}" class="img-fluid"  width="80px" height="80px"></td>
                            <td>{{$l->name}}</td>
                            <td>{{$l->email}}</td>
                            <td><a href="/{{$l->cv}}">Voir</a></td>
                            <td>
                                <div class="progress">
                                    @if ($l->pourcentage < 25)
                                    <div class="progress-bar bg-danger" role="progressbar" style="width: {{$l->pourcentage}}%" aria-valuenow="{{$l->pourcentage}}" > {{ $l->pourcentage }} % </div>

                                    @elseif ($l->pourcentage >= 25 && $l->pourcentage <= 70 )
                                     <div class="progress-bar bg-warning" role="progressbar" style="width: {{$l->pourcentage}}%" aria-valuenow="{{$l->pourcentage}}" > {{ $l->pourcentage }} % </div>

                                     @elseif($l->pourcentage >70)
                                     <div class="progress-bar bg-success" role="progressbar" style="width: {{$l->pourcentage}}%" aria-valuenow="{{$l->pourcentage}}" > {{ $l->pourcentage }} % </div>
                                  @endif
                                </div>
                              </td>
                             <td><a href="{{route('showformationF',$l->id)}}">voir</a></td>
                            <td>
                                <button type="button" class="btn btn-success btn-sm" >
                                    <a href="{{route('ShowEditF',['id'=>$l->id])}}" style="color:rgb(253, 251, 249)">
                                     <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"></path>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"></path>
                                    </svg>
                                    </a>
                                </button>

                            <form action="{{route('DeleteF')}}" method="post" onsubmit="return confirm('Etes-vous sur  de supprimer?');">
                            @csrf
 	 	 	 	            <input type="hidden" name="_token" value="{{ Session::token() }}">
 	 	 	              	<input type="hidden" name="id" value="{{ $l->id }}">
                                 <button type="submit" class="btn btn-danger btn-sm" >
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                    </svg>
                                </button>
                           </form>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                    <div class="d-flex mt-4 flex-wrap">
                      <nav class="ml-auto">
                        <ul class="pagination separated pagination-info">
                            {{$users->links()}}
                        </ul>
                      </nav>
                    </div>
                  </div>
                </div>
              </div>
            </div>
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
