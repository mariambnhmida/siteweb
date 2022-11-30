<body>
    <title>E-LEARNING</title>
    <br/><br/>
    <center>
<div style="width:800px; height:600px; padding:20px; text-align:center; border: 10px solid #595856">
    <div style="width:750px; height:550px; padding:20px; text-align:center; border: 5px solid #E5D562">
        <h2 align="left">Training Easily</h2>
        <h4 align="right">N° de certificat: EL-{{$randomNumber}}-{{$randomNumber1}} </h4>
        <h4 align="right">N° de référence : 00{{$formations->id}}   </h4>
        <span style="font-size:50px; font-weight:bold; ">Certificat de fin de formation</span>
           <br><br>
           <span style="font-size:25px"><i>Merci pour votre participation et votre contribution à la formation : <span style="font-size:25px"><i>{{$formations->nom}} </i></span> .</i></span>
           <br><br>
           @foreach ($users as $u )
           @if ($u->id == $formations->user_id)
           <span style="font-size:25px"><i>Formateurs <b> {{$u->name}}</b></i></span> <br/>
           @endif
            @endforeach
           <br/>
           <span  style="font-size:30px" ><b style="color: #E5D562"> {{Auth::user()->name}}</b></span><br/><br/>
           <span style="font-size:20px">Avec un score de <b>{{\DB::table('historiqparticipationparties')->where('formation_id',$formations->id)->count()}} / {{$count}}</b> Chapitre(s)</span> <br/>
            @if ($historique->formation_id == $formations->id)
           <h4 style="font-size:20px , margin-left: 1em;"   align="center" >
            <i >Date : Le {{$historique->created_at->translatedFormat('d M Y')}} </i></h4>
           @endif
           <img class="pull-right" id="footerLogo" src="site/assets/img/s.png"  width="100" height="100">
          <span style="font-size:30px"></span>
    </div>
    </div>
  </body>
