<!DOCTYPE html>
    <html lang = "zxx" class = "no-js">
	    <head>
			@include('layouts.head',['nom_page'=> $dataP['nomComplet']])
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
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/photo-profile')}}"> Image de profil</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "post-content-area"> 
				<div class = "container">
					<div class = "row">
						<div class = "container emp-profile">
							@if(Session::has('image-updated'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre image de profil a été mis à jour avec succés.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@elseif(Session::has('image-not-updated'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Pour des raisons techniques, il n'est pas possible de modifier votre photo de profil.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@elseif(Session::has('image-vide'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Vous ne pouvez pas supprimer une photo qui n'existe pas.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@elseif(Session::has('image-deleted'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre photo de profil a été bien supprimée.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								@elseif(Session::has('image-not-deleted'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Pour des raisons techniques, votre photo ne peut pas être supprimée.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
							<form method = "post" name = "form_file" id = "form_file" action = "{{url('/update-image-profile')}}" enctype = "multipart/form-data">
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
                                				<a href = "{{url('/photo-profile')}}" style = "color:#fff">Changer l'image</a>
                            				</div>  
                                            <h5>{{$dataP['nomComplet']}}</h5>    
											<p id = "titre-style">(Titre)</p>                     
                        				</div>   
                    				</div>
									<div class = "col-md-6">
										<div class = "profile-head">
											<div class = "row" style = "display:block">
												<div class = "col-sm-3">
													<h6 class = "mb-0">Image de profil</h6>
												</div>
												<div class = "mt-10 col-sm-9 ">
													<input type = "file" class = "single-input" name = "image" id = "image_profile" accept = "image/jpeg" required>
												</div>
												<br>
												<div class = "col">
													<span id = "black-color">(Image <b>JPEG</b> uniquement)</span>
												</div>
											</div>
                                            <hr>
											<div class = "row">
												<div class = "col-md-12 form-group">
													<button type = "submit" class = "btn submit_btn">Modifier</button>
												</div>
											</div>
                                            <span class = "desc-vide">Si vous choisissez de supprimer votre photo de profil, toutes vos photos seront définitivement supprimées.<a href = "javascript: void(0)" onclick = "SupprimerImage()"><br><b><i class = "fa fa-trash"></i> Supprimer l'image</b></a></span>
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