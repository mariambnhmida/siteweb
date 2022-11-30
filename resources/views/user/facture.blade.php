<meta content="width=device-width, initial-scale=1.0" name="viewport">
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
                                        <h1 class="text-light"><span style="color: orange"><img src="{{asset('log1/img/tee.png')}}"></span></h1>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <p class="font-weight-bold mb-1">FACTURE D'ACHAT</p>
                                        <p class="text-muted">
                                            Date: Le
                                            @foreach ( $achatformations as $ach )
                                            {{$ach->created_at->format('m/d/Y')}}
                                            @endforeach
                                        </p>
                                    </div>
                                </div>

                                <hr class="my-5">

                                <div class="row pb-5 p-5">
                                    <div class="col-md-6">
                                        <p class="font-weight-bold mb-4">Informations apprenant</p>
                                        <p class="mb-1">Nom et prénom : {{ Auth::user()->name}}</p>
                                        <p>Adress email : {{ Auth::user()->email}}</p>
                                        <p>Numéro téléphone : +216 {{ Auth::user()->phone}}</p>
                                        <p class="mb-1">Localisation : Tunis, Tunisie</p>
                                    </div>

                                    <div class="col-md-6 text-right">
                                        <p class="font-weight-bold mb-4">Détails de paiement</p>
                                        <p class="mb-1"><span class="text-muted">Type de paiement :
                                        </span> Abonnement</p>
                                        <p class="mb-1"><span class="text-muted">Nom d'abonnement : </span>
                                            @foreach ( $achatformations as $ach )
                                            @foreach ( $abonnements as $a )
                                            @if ($a->prix == $ach->prix)
                                            {{$a->nom}}
                                            @endif
                                            @endforeach
                                            @endforeach
                                        </p>
                                    </div>
                                </div>

                                <div class="row p-5">
                                    <div class="col-md-12">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th class="border-0 text-uppercase small font-weight-bold">CATEGORIE</th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">DESCRIPTION</th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">QUANTITE</th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">PRIX DE VENTE </th>
                                                    <th class="border-0 text-uppercase small font-weight-bold">TOTAL</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ( $achatformations as $ach )
                                                <tr>
                                                    @foreach($formations as $formation)
                                                    @foreach($cats as $cat)
                                                    @if ($formation->id == $ach->formation_id)
                                                    @if ($formation->cat_id == $cat->id)
                                                    <td>{{$cat->nom}}</td>
                                                    <td>{{$formation->nom}}</td>
                                                    @endif
                                                    @endif
                                                    @endforeach
                                                    @endforeach
                                                    <td>1</td>
                                                    <td>{{$ach->prix}}.000 TND</td>
                                                    <td>{{$ach->prix}}.000 TND</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                                    <div class="py-3 px-5 text-right">
                                        <div class="mb-2">Total</div>
                                        @foreach ( $achatformations as $ach )
                                        <div class="h2 font-weight-light">{{$ach->prix}}.000 TND</div>
                                        @endforeach
                                    </div>
                                    <div class="py-3 px-5 text-right">
                                        <div class="mb-2">
                                            <button  class="btn btn-outline-danger btn-fw" ><a href="{{route('download-pdf')}}" style="color: orange ">Exporter PDF</a></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


