<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page' => $dataP['nomComplet']])
			<link rel = "stylesheet" href = "{{asset('site/css/box_alert.css')}}">
			<link rel = "stylesheet" href = "{{asset('site/css/profile.css')}}">
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
								Paramétres				
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/parametres-compte')}}"> Paramétres de compte</a></p>
						</div>	
					</div>
				</div>
			</section>
            <section class = "post-content-area"> 
				<div class = "container">
					<div class = "row">
						<div class = "container emp-profile">
							<form method = "post" name = "form_profil" id = "form_profil" action = "#">
								@csrf
								<div class = "row">
									<div class = "col-md-4">
                        				<div class = "profile-img">
											@if($dataP['photo'] == 'inconu.png')
                                                <img src = "{{asset('site/img/icon/image.png')}}" alt = "Photo de {{$dataP['nomComplet']}}">
                                            @else
                                            	<img src = "{{asset('uploads/images/'.$dataP['nomComplet'].'/'.$dataP['photo'])}}" alt = "Photo de {{$dataP['nomComplet']}}">
											@endif
                            				<div class = "file btn btn-lg btn-primary" onclick = "OuvrirModifierImage()">
                                				<a href = "{{url('/photo-profile')}}" style = "color:#fff">Changer l'image</a>
                            				</div>
                                            <h5>{{$dataP['nomComplet']}}</h5>
                                            <p id = "titre-style">(Titre)</p>                              
                        				</div>
                    				</div>
									<div class = "col-md-8">
										<div class = "profile-head">
                                            <section class = "course-mission-area pb-120">
                                                <div class = "container">
                                                    <div class = "row d-flex justify-content-center">
                                                        <div class = "menu-content pb-70 col-lg-8">
                                                            <div class = "title text-center">
                                                                <h1 class = "mb-10">Paramétres de sécurité</h1>
                                                                <p>Jouer la sécurité est le choix le plus risqué que l’on puisse faire.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class = "row">
                                                        <div class = "col-md-12 accordion-left center-block">
                                                            <dl class = "accordion">
                                                                <dt>
                                                                    <a href = "javascript: void(0)">Mot de passe</a>
                                                                </dt>
                                                                <dd>
                                                                    Pour sécuriser votre compte, vous devez ajouter un mot de passe d'au moins 8 caractères et contenant des lettres minuscules, une lettre majuscule, de nombreux chiffres et de nombreux caractères spéciaux.
                                                                    Si vous le souhaitez, vous pouvez modifier votre mot de passe en un seul clic : <b><a href = "{{url('/update-password-compte')}}">Modifier le mot de passe</a></b>.
                                                                </dd>
																<dt>
                                                                	<a href = "javascript: void(0)">Adresse e-mail</a>
                                                            	</dt>
																<dd>
																	Votre adresse e-mail est intouchable par défaut. Pour des raisons de sécurité, cette modification sera bientôt disponible.
																</dd>
																<dt>
                                                                	<a href = "javascript: void(0)">Profil</a>
                                                            	</dt>
																<dd>
                                                                	Votre profil vous présente sur notre plateforme. Essayez de mettre vos vraies informations afin que les entreprises puissent vous trouver facilement et éviter tout type de problème. Pour consulter votre <b><a href = "{{url('profile')}}">profil</a></b>, merci de cliquer içi.
                                                            	</dd>
																<dt>
                                                                	<a href = "javascript: void(0)">Journal d'authentification</a>
                                                            	</dt>
																<dd>
                                                                	Notre plateforme vous donne la possibilité de vérifier l'historique d'authentification de votre compte. Si vous le souhaitez, vous pouvez <b><a href = "{{url('/journal-authentification')}}">le vérifier maintenant</a></b> en utilisant cette option.
                                                            	</dd>
																 <dt>
                                                                	<a href = "javascript: void(0)">Désactiver le compte</a>
                                                            	</dt>
																<dd>
                                                                	Si vous souhaitez désactiver temporairement votre compte, vous pouvez le faire en un seul clic :
                                                                	<b><a href = "javascript: void(0)" onclick = "QuestionDesactiverCompte()">Désactiver le compte</a></b>
                                                            	</dd>
																<dt>
                                                                	<a href = "javascript: void(0)">Supprimer le compte</a>
                                                            	</dt>
																<dd>
																	Si vous souhaitez supprimer définitivement votre compte, vous pouvez le faire en une seule clique :
																	<b><a href = "javascript: void(0)" onclick = "QuestionSupprimerCompte()">Supprimer le compte</a></b>
                                                            	</dd>
                                                            </dl>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </div>
                                    </div>										
								</div>
							</form>
						</div>
					</div>
				</div>
			</section>
			<footer class = "footer-area section-gap">
				@include('layouts.footer')
			</footer>	
			@include('layouts.scripts')
		</body>
	</html>