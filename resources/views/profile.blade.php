<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=>'Profile'])
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
								{{$dataP['nomComplet']}}				
							</h1>	
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/profile')}}"> Profile</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "post-content-area"> 
				<div class = "container">
					<div class = "row">
						<div class = "container emp-profile">
							@if(Session::has('compte-creer'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre nouveau compte a été créé avec succès. Si vous rencontrez des problèmes avec votre compte, contactez-nous depuis la page Contact</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@elseif(Session::has('compte-recuperer'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre compte a été récupéré avec succès. Si vous rencontrez des problèmes avec votre compte, contactez-nous depuis la page Contact</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
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
                            				<div class = "file btn btn-lg btn-primary">
                                				<a href = "#" style = "color:#fff">Changer l'image</a>
                            				</div>                           
                        				</div>
                    				</div>
									<div class = "col-md-6">
										<div class = "profile-head">
											<h5>{{$dataP['nomComplet']}}</h5>                             
											<h6>Développeur web</h6>
											<p class = "proile-rating">PROFESSION : <span>{{$dataP['profession']}}</span></p>
											<ul class = "nav nav-tabs" id = "myTab" role = "tablist">
												<li class = "nav-item">
													<a class = "nav-link active" id = "basic-tab" data-toggle = "tab" href = "#basic" role = "tab" aria-controls = "basic" aria-selected = "true">Basique</a>
												</li>
												<li class = "nav-item">
													<a class = "nav-link" id = "seconde-tab" data-toggle = "tab" href = "#seconde" role = "tab" aria-controls = "seconde" aria-selected = "false">Secondaire</a>
												</li>
												<li class = "nav-item">
													<a class = "nav-link" id = "network-tab" data-toggle = "tab" href = "#network" role = "tab" aria-controls = "network" aria-selected = "false">Réseaux</a>
												</li>
												<li class = "nav-item">
													<a class = "nav-link" id = "work-tab" data-toggle = "tab" href = "#work" role = "tab" aria-controls = "work" aria-selected = "false">Emplois</a>
												</li>
												<li class = "nav-item">
													<a class = "nav-link" id = "school-tab" data-toggle = "tab" href = "#school" role = "tab" aria-controls = "school" aria-selected = "false">Etudes</a>
												</li>
                            				</ul>
										</div>
									</div>
									<div class = "col-md-2">
                        				<input type = "button" class = "profile-edit-btn" name = "btnAddMore" value = "Modifier le profile"/>
                    				</div>
								</div>
								<div class = "row">
									<div class="col-md-4">
                        				<div class = "profile-work">
                            				<p class = "grand-p">Projets</p>
                            				<a href = "">Projet 1</a><br/>
                            				<a href = "">Projet 2</a><br/>
                            				<a href = "">Projet 3</a><br/>
                            				<p class = "grand-p">Compétences</p>
                            				<a href = "">Compétence 1</a><br/>
                            				<a href = "">Compétence 2</a><br/>
                            				<a href = "">Compétence 3</a><br/>
                            				<a href = "">Compétence 4</a><br/>
                            				<a href = "">Compétence 5</a><br/>
                        				</div>
                    				</div>
									<div class = "col-md-8">
										<div class = "tab-content profile-tab" id = "myTabContent">
											<div class = "tab-pane fade show active" id = "basic" role = "tabpanel" aria-labelledby = "basic-tab">
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Identifiant d'utilisateur</label>
                                            		</div>
													<div class = "col-md-6">
														<p>{{$dataP['id']}}</p>
													</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Nom</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['nom']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Prénom</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['prenom']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Adresse e-mail</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['email']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Genre</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['genre']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Numéro mobile</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>(+216) {{$dataP['numero']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Date de naissance</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['naissance']}}</p>
                                            		</div>
                                        		</div>
												<div class = "row">
                                            		<div class = "col-md-6">
                                                		<label class = "label-p">Profession</label>
                                            		</div>
                                            		<div class = "col-md-6">
                                                		<p>{{$dataP['profession']}}</p>
                                            		</div>
                                        		</div>
											</div>
											<div class = "tab-pane fade" id = "seconde" role = "tabpanel" aria-labelledby = "seconde-tab">

											</div>
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