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
							<p class = "text-white link-nav"><a href = "{{url('/')}}">Accueil </a><span class = "lnr lnr-arrow-right"></span><a href = "{{url('/journal-authentification')}}"> Consulter le journal d'authentification</a></p>
						</div>	
					</div>
				</div>
			</section>
			<section class = "post-content-area"> 
				<div class = "container">
					<div class = "row">
						<div class = "container emp-profile">
							@if(Session::has('journal-vide'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Vous ne pouvez pas supprimer un journal qui n'existe pas.
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@elseif(Session::has('journal-deleted'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-success">
														<div class = "info-tab tip-icon-success" title = "success"><i></i></div>
														<div class = "tip-box-success">
															<p>
																Votre journal a été mis à jour avec succés.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@elseif(Session::has('journal-not-deleted'))
								<div class = "position_erreur">
									<div class = "container-fluid text-center col-lg-12 position-alert">
										<div class = "row">
											<div class = "col-xs-12 col-sm-12 col-sm-offset-3">
												<div class = "new-message-box">
													<div class = "new-message-box-danger">
														<div class = "info-tab tip-icon-danger" title = "danger"><i></i></div>
														<div class = "tip-box-danger">
															<p>
																Pour des raisons techniques, votre journal ne peut pas être supprimée.</p>
															</p>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							@endif
							<form method = "get" name = "form_journal" id = "form_journa" action = "javascript:void(0)">
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
									<div class = "col-md-8">
										<div class = "profile-head">
                                            <table class = "table">
                                                <thead class = "thead-light">
                                                    <tr>
                                                        <th scope = "col" class = "table-head">#</th>
                                                        <th scope = "col" class = "table-head">Description</th>
                                                        <th scope = "col" class = "table-head">Région</th>
                                                        <th scope = "col" class = "table-head">Date</th>
                                                        <th scope = "col" class = "table-head">Temps</th>
                                                    </tr>
												</thead>
                                                <span class = "desc-vide">Si vous choisissez d'effacer votre journal, toutes les actions seront définitivement supprimées.<br><a href = "javascript:void(0)" onclick = "QuestionSupprimerJournal()"><b><i class = "fa fa-trash"></i> Vider le journal</b></a></span>
                                                <tbody>
                                                    @if($count == 0)
                                                        <tr class = "tab-journal">
                                                            <td colspan = "5">Le journal d'authentification est vide..</td>
                                                        </tr>
													@else
                                                        <?php $compteur = $dataJ->perPage() * ($dataJ->currentPage() -1); ?>                          
                                                        @foreach($dataJ as $journal)
                                                            <tr class = "tab-journal">
                                                                <td>{{$compteur}}</td>
                                                                <td>{{$journal->getActionAttribute()}}</td>
                                                                <td>{{$journal->getRegionttribute()}}</td>
                                                                <td>{{$journal->getDateAttribute()}}</td>
                                                                <td>{{$journal->getTempsAttribute()}}</td>
                                                            </tr>
																<?php $compteur++;?>
															@endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            <nav class = "blog-pagination justify-content-center d-flex">
                                                <ul class = "pagination">
                                                    <li class = "page-item">
                                                        @if($count > 0)
															{{$dataJ->links('vendor/pagination/bootstrap-4')}}
                                                        @endif
                                                    </li>
                                                </ul>
											</nav>
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