<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=>'Récupération'])
            <link rel = "stylesheet" href = "{{asset('site/css/box_alert.css')}}">
		</head>
        <body>
			<header id = "header" id = "home">
	  		    @include('layouts.header-top')
		        <div class = "container main-menu">
		    	    @include('layouts.menu-site')
		        </div>
		    </header>
            <section class = "banner-area relative about-banner" id = "home">	
				<div class = "overlay overlay-bg"></div>
				<div class = "container">				
					<div class = "row d-flex align-items-center justify-content-center">
						<div class = "about-content col-lg-12">
							<h1 class = "text-white">
								Récupération			
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/forget1')}}">Récupération</a></p>
						</div>	
					</div>
				</div>
			</section>
            <section class = "post-content-area">
                <div class = "container">
                    <div class = "row">
                        <div class = "col-lg-8 sidebar-widgets">
                            <div class = "widget-wrap">
                                <div class = "single-sidebar-widget newsletter-widget">
                                    <h4 class = "newsletter-title">Entrez le code de sécurité</h4>
                                    <p>Veuillez vérifier dans vos e-mails que vous avez reçu un message contenant votre code. Celui-ci se compose de 8 chiffres.</p>
                                    <div class = "form-group d-flex flex-row">
                                        <div class = "col-autos">
                                            <div class = "position_erreur"  id = "erreur">
                                                <div class = "container-fluid text-center col-lg-12 position-alert">
                                                    <div class = "row">
                                                        <div class = "col-xs-12 col-sm-12 col-sm-offset-3">
                                                            <div class = "new-message-box">
                                                                <div class = "new-message-box-danger">
                                                                    <div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
                                                                    <div class = "tip-box-danger">
                                                                        <p style = 'color: #b71c1c;font-weight:600'>
                                                                            Le code de sécurité que vous avez entré est incorrect.
                                                                        </p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <form name = "form_forget3" id = "form_forget3" method = "post" action = "{{url('/forget4')}}">
                                                @csrf
                                                <div class = "input-group">
                                                    <div class = "input-group-prepend">
                                                        <div class = "input-group-text">
                                                            <i class = "fa fa-code" aria-hidden = "true"></i>
                                                        </div>
                                                    </div>
									                <input type = "number" class = "form-control" id = "code" name = "code" placeholder = "Entrez votre code de sécurité.." required onfocus = "this.placeholder = ''" onblur = "this.placeholder = 'Entrez votre code de sécurité..'" onKeyPress = "if(this.value.length==8) return false;" required>
												</div>
                                                <br>
												<span class = "error_form" id = "code_erreur"></span>
                                                <p>Nous avons envoyé le code de sécurité à :
                                                    <a href = "#" >
                                                        <h4 class = "champ-forget margin-email">{{$email}}</h4>
                                                    </a>
                                                </p>
                                                <div class = "input-group-btn" id = "position-btn">   
                                                    <button class = "btn submit_btn reset" type = "reset">
                                                        Annuler
                                                    </button>

                                                    <button class = "btn submit_btn" type = "submit">
                                                        Continuer
                                                    </button> 
									            </div>
                                                <input type = "hidden" id = "email" name = "email" value = {{$email}}>
												<input type = "hidden" id = "oldCode" name = "oldCode" value = {{$code}}>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class = "footer-area section-gap">
				@include('layouts.footer')
			</footer>	
			@include('layouts.scripts')
            <script>
				$(function(){
					$('#code_erreur').hide();
                    $('#erreur').hide();
						
					var code = false;

					$('#code').on('input', function(){
						ValidationCodeSecurite($('#code'),$('#code_erreur'));
					});

					$("#form_forget3").submit(function() {
						CodeSecurite();
         			});
				});
			</script>
		</body>
	</html>