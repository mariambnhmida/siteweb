<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Competence</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
    <section class="fxt-template-animation fxt-template-layout27" data-bg-image="{{asset('site/assets/img/niv3.png')}}">
        <!-- Animation Start Here -->
        <div id="particles-js"></div>
        <!-- Animation End Here -->
        <div class="fxt-content">
            <div class="fxt-header">
                <ul class="fxt-switcher-wrap">
                    <button  class="btn waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i>! Félicitation  {{ Auth::user()->name }} , pour la création de votre compte</button>
                </ul>
                <br>
                <a href="#" class="fxt-logo"><img src="{{asset('site/assets/img/niv2.png')}}" ></a>
            </div>
            <div class="fxt-form">
                <div class="fxt-style-line">
                    <div class="fxt-transformY-50 fxt-transition-delay-6">
                        <h3>Objectif :Ce test a pour objectif de vous aider à découvrir  les formations qui vous interessent</h3>
                        <a href="#" class="switcher-text active"> Cocher votre niveau pour chaque catégorie </a>
                    </div>
                </div>

                <form id="validate" method="POST" action="usercom">
                    @csrf
                   <!-- col Check List -->
                    <div class="col-md-12">
                        <div class="box">
                                <div class="box-header">
                            <span id="message_error"></span>
                            <span class="text-danger" style="color:red; font-weight: 700;" id="status_checkbox-error"></span>
                        </div>
                        <div class="box-body">
                            <table style="width: 100%;border:dotted 1px #365d9d;" border="1" id="my_table" class="my_table">
                                    <tr align="center">

                                        <th style="width: 200px;">Catégories</th>
                                        <th class="text-center" style="width: 100px;">Débutant</th>
                                        <th class="text-center" style="width: 120px;">Confirmé</th>
                                        <th class="text-center" style="width: 120px;">Expert</th>
                                    </tr>
                                    @foreach ($scats as $scat)
                                        <tr>
                                            <td >
                                            <input type="text" name="scat_id[]" class="form-control" value="{{$scat->id}}" hidden>
                                            <input type="text"  name="user_id" class="form-control" value="{{ Auth::user()->id}}" hidden>
                                            <input type="text"  class="form-control" value="{{$scat->nom}}">
                                            </td>
                                            <td align="center">
                                            <label class="form-label">
                                                <input type="checkbox" id="niv"  name="niv[]" value="Débutant" > <span class="label-text"> </span>
                                            </label>
                                            </td>
                                            <td align="center">
                                            <label class="form-label">
                                                <input type="checkbox" id="niv"  name="niv[]" value="Confirmé" > <span class="label-text"> </span>
                                            </label>
                                            </td>
                                            <td align="center">
                                                <label class="form-label">
                                                    <input type="checkbox" id="niv"  name="niv[]" value="Expert" > <span class="label-text"> </span>
                                                </label>
                                                </td>
                                        </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div><!-- end col Daily Switch Check List -->
                    <br>
                    <div align="center">
                    <button type="submit" class="btn waves-effect waves-light btn-success"><i class="icofont icofont-check-circled"></i>Confirmer</button>
                    </div>
                </form>
            </div>
            <div class="fxt-style-line">
                <div class="fxt-transformY-50 fxt-transition-delay-6">
                    <h3> Après la validation de vos données, nous  vous aiderons à trouver des formations qualifiantes </h3>
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

    @section('script')
    <!-- library js validate -->
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

    <script type="text/javascript">
		$("input:checkbox").on('click', function()
		{
			var $box = $(this);
			if ($box.is(":checked"))
			{
				var group = "input:checkbox[class='" + $box.attr("class") + "']";
				$(group).prop("checked", false);
				$box.prop("checked", true);
			}
			else
			{
				$box.prop("checked", false);
			}
		});

    </script>

    <!-- alert blink text -->
    <script>
        function blink_text()
        {
            $('#message_error').fadeOut(700);
            $('#message_error').fadeIn(700);
        }
        setInterval(blink_text,1000);
    </script>
    <!-- script validate form -->

    <!-- script validate form -->
    <script>
        $('#validate').validate({
            reles: {
                'niv[]': {
					required :true,
					minlength:5,
				}

            },
            messages: {
                'status_checkbox[]' : "Please check all file*",
            },
            errorPlacement: function (error, element)
            {
                if(element.attr("name") == "status_checkbox[]")
                {
                    $('#message_error').empty();error.appendTo('#message_error')
                }
                else
                {
                    error.insertAfter(element);
                }
            }

        });
    </script>

@endsection





</body>
</html>
