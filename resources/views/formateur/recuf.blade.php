<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <h1 class="text-light"> <img src="{{asset('log1/img/tee.png')}}" alt="logo" class="logo-dark" /></h1>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-1">Reçu de retrait</p>
                            @foreach ($totale as $tot )
                            <p class="text-muted"> Date : Le {{$tot->created_at->format(' m/d/Y')}}</p>
                            @endforeach
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Informations formateur</p>
                            <p class="mb-1">Nom et prénom : {{ Auth::user()->name}}</p>
                                        <p>Adress email : {{ Auth::user()->email}}</p>
                                        <p>Numéro téléphone : +216 {{ Auth::user()->phone}}</p>
                                        <p class="mb-1">Localisation : Tunis, Tunisie</p>
                        </div>

                        <div class="col-md-6 text-right">
                            <p class="font-weight-bold mb-4">Détails de paiement</p>
                            @foreach ($totale as $tot )
                            <p class="mb-1"><span class="text-muted">Type de paiement : </span> {{$tot->etat}}</p>
                            <p class="mb-1"><span class="text-muted">Date de reçu: </span> Le {{$tot->created_at->translatedFormat('m/d/Y à H\hi')}}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="border-0 text-uppercase small font-weight-bold">Formation</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Date de retrait</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Type de retrait</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Montant</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Commentaire</th>
                                        <th class="border-0 text-uppercase small font-weight-bold">Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($totale as $tot)
                                    <tr>
                                        @foreach($gainsformateur as $gains)
                                        @foreach($formations as $forma)
                                        @if ($gains->id == $tot->gain_id)
                                        @if ($gains->formation_id == $forma->id)
                                        <td>{{$forma->nom}} </td>
                                        @endif
                                        @endif
                                        @endforeach
                                        @endforeach
                                        <td>{{$tot->created_at->format(' m/d/Y')}}</td>
                                        <td>{{$tot->etat}}</td>
                                        <td>{{$tot->gainformateur}} TND</td>
                                        <td>{{$tot->commentaire}}</td>
                                        <td>{{$tot->gainformateur}} TND</td>
                                     </tr>



                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Total</div>
                            <div class="h2 font-weight-light">{{$tot->gainformateur}} TND</div>
                        </div>
                        @endforeach
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Pourcentage</div>
                            <div class="h2 font-weight-light">{{ Auth::user()->pourcentage}}%</div>
                        </div>

                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">Prix de formation</div>
                            @foreach($gainsformateur as $gains)
                            <div class="h2 font-weight-light">{{$gains->prixformation}}.000 TND</div>
                            @endforeach
                        </div>
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">
                                <button  class="btn btn-outline-danger btn-fw" > <a href="{{route('Dpdf')}}" style="color: orange">Exporter PDF</a></button>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


