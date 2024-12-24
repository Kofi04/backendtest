<!doctype html>
<html lang="en">


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Apr 2024 19:39:28 GMT -->
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png"/>
	<!--plugins-->
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet"/>
	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet"/>
	<script src="assets/js/pace.min.js"></script>
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet">
	<link href="../../../../fonts.googleapis.com/css276c7.css?family=Roboto:wght@400;500&amp;display=swap" rel="stylesheet">
	<link href="assets/css/app.css" rel="stylesheet">
	<link href="assets/css/icons.css" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="assets/css/dark-theme.css"/>
	<link rel="stylesheet" href="assets/css/semi-dark.css"/>
	<link rel="stylesheet" href="assets/css/header-colors.css"/>
	<title>Dashboard</title>
</head>

<body>
	<!--wrapper-->
	<div class="wrapper">
		<!--sidebar wrapper -->
		<div class="sidebar-wrapper" data-simplebar="true">
		<div class="sidebar-header">
			<button type="button" class="btn btn-outline-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
				<i class="lni lni-exit"></i> Déconnexion
			</button>
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
		</div>
		
			
		
		</div>
		<!--end sidebar wrapper -->
		
		<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
                   
				   </div>
				   
				 
		
				</div><!--end row-->

				<!--end row-->
 @if(session('success'))
        <div class="alert alert-success" id="success-message">
            {{ session('success') }}
        </div>
    @endif
	
				<div class="container">
				
				
	<!-- Afficher le message de succès -->
	<div class="d-flex justify-content-end mb-3">
		<a href="{{ route('vuecommande') }}" class="btn btn-outline-primary">
			<i class="lni lni-list"></i> Voir mes commandes
		</a>
	</div>
	<div class="container">
	@if(Auth::check() && Auth::user()->roles_id == 2)
					<div class="mb-3">
						<label for="kkipayId" class="form-label">ID Kkiapay</label>
							<!-- Button trigger modal -->
					<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#kkipayModal">
						<i class="lni lni-pencil-alt"></i> Modifier ID Kkiapay
					</button>

					<!-- Modal -->
					<div class="modal fade" id="kkipayModal" tabindex="-1" aria-labelledby="kkipayModalLabel" aria-hidden="true">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="kkipayModalLabel">Modifier ID Kkiapay</h5>
									<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
								</div>
								<div class="modal-body">
									
									<form method="POST" action="{{ route('kkiapay') }}	">
										@csrf
										<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" required>
																		
										<div class="mb-3">
											<label for="kkipayId" class="form-label">ID Kkiapay</label>
											<input type="text" name="kkiapay_id" class="form-control"  required>
										</div>
										<button type="submit" class="btn btn-primary">Enregistrer</button>
									</form>
								</div>
							</div>
						</div>
					</div>
					</div>
					@endif
<div class="col">
	<div class="card radius-10 border-start border-0 border-4 border-info">
		<div class="card-body">
			<div class="d-flex align-items-center">
				<div>
					<p class="mb-0 text-secondary">Total Produits</p>
					@if(Auth::check() && Auth::user()->roles_id == 2)
					<h4 class="my-1 text-info">{{ $produit->where('user_id', Auth::user()->id)->count() }}</h4>
					@endif
					@if(Auth::check() && Auth::user()->roles_id == 1)
					<h4 class="my-1 text-info">{{ $produit->count() }}</h4>
					@endif
				</div>
				<div class="widgets-icons-2 rounded-circle bg-gradient-blues text-white ms-auto"><i class='bx bxs-cart'></i>
				</div>
			</div>
		</div>
	</div>
</div>

				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center justify-content-between">
							<div>
								<h6 class="mb-0">Listes des produits</h6>
							</div> 	
					@if(Auth::check() && Auth::user()->roles_id == 2)	
					<!-- Modal Trigger Button -->
						<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
							<i class="lni lni-plus c">Ajouter</i>
						</button>
						@endif
						<!-- Modal Structure -->
						<div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
							<div class="modal-dialog">
								
							
								<div class="modal-content">
									<div class="modal-header">
										<h5 class="modal-title" id="addProductModalLabel">Ajouter un produit</h5>
										<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
									</div>
									<div class="modal-body">
										<form method="POST" action="{{ route('pproduit') }}" enctype="multipart/form-data">
											@csrf
											<input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
											<div class="mb-3">
												<label for="productName" class="form-label">Nom du produit</label>
												<input type="text" name="nom" class="form-control" id="nom" required>
											</div>
											<div class="mb-3">
												<label for="productPrice" class="form-label">Prix</label>
												<input type="number" name="prix" class="form-control" id="prix" required>
											</div>
											<div class="mb-3">
												<label for="productImage" class="form-label">Image</label>
												<input type="file" name="photo" class="form-control" id="photo" required>
											</div>
											<button type="submit" class="btn btn-primary">Ajouter</button>
										</form>
									</div>
								</div>
						
							</div>
						</div>
						</div>
					</div>
						 <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Produits</th>
							   <th>Photo</th>
							   <th>Prix</th>
							   <th>Actions</th>
							 </tr>
							 </thead>
							 <tbody>
							 @foreach($produit as $product)
							
							 @if(Auth::check() && Auth::user()->roles_id == 1)
									<tr>
										<td>{{ $product->nom }}</td>
										<td><img src="{{ asset('storage/'.$product->photo) }}" class="product-img-2" alt="product img"></td>
										<td>{{ $product->prix }}</td>
										<td style="width: 150px;">
											<div class="d-flex justify-content-end">
												@if(Auth::check() && Auth::user()->roles_id == 1)
													<button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#orderProductModal{{ $product->id }}">
														<i class="lni lni-cart"></i> Commander
													</button>

												@endif
												@if(Auth::check() && Auth::user()->roles_id == 2)
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteProductModal{{ $product->id }}">
														<i class="lni lni-trash"></i> Supprimer
													</button>

													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
														<i class="lni lni-pencil-alt"></i> Modifier
													</button>
												@endif
											</div>
										</td>
									</tr>
								@endif
							 @endforeach

							@foreach($produit as $product)
								@if($product->user_id == Auth::user()->id)
									<tr>
										<td>{{ $product->nom }}</td>
										<td><img src="{{ asset('storage/'.$product->photo) }}" class="product-img-2" alt="product img"></td>
										<td>{{ $product->prix }}</td>
										<td style="width: 150px;">
											<div class="d-flex justify-content-end">
												@if(Auth::check() && Auth::user()->roles_id == 1)
													

												@endif
												@if(Auth::check() && Auth::user()->roles_id == 2)
													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-danger me-2" data-bs-toggle="modal" data-bs-target="#deleteProductModal{{ $product->id }}">
														<i class="lni lni-trash"></i> Supprimer
													</button>

													<!-- Button trigger modal -->
													<button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#editProductModal{{ $product->id }}">
														<i class="lni lni-pencil-alt"></i> Modifier
													</button>
												@endif
											</div>
										</td>
									</tr>
								@endif
							 @endforeach
							
							</tbody>
						  </table>
						  </div>
						 </div>
					</div>

							</div>
						  </div>
					 </div><!--end row-->

			</div>
		</div>
		<!--end page wrapper -->
		
	</div>
	<!--end wrapper-->


									<!-- Modal -->
									@foreach($produit as $product)
									<div class="modal fade" id="deleteProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteProductModalLabel{{ $product->id }}" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="deleteProductModalLabel{{ $product->id }}">Supprimer le produit</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													Êtes-vous sûr de vouloir supprimer ce produit ?
												</div>
												<div class="modal-footer">
													<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
													<form method="POST" action="{{ route('delete', $product->id) }}">
														@csrf
														@method('DELETE')
														<button type="submit" class="btn btn-danger">Supprimer</button>
													</form>
												</div>
											</div>
										</div>
									</div>


									
									<!-- Modal -->
									<div class="modal fade" id="editProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="editProductModalLabel{{ $product->id }}" aria-hidden="true">
										<div class="modal-dialog">
											<div class="modal-content">
												<div class="modal-header">
													<h5 class="modal-title" id="editProductModalLabel{{ $product->id }}">Modifier le produit</h5>
													<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
												</div>
												<div class="modal-body">
													<form method="POST" action="{{ route('modifier', $product->id) }}" enctype="multipart/form-data">
														@csrf
														@method('PUT')
														<div class="mb-3">
															<label for="productName{{ $product->id }}" class="form-label">Nom du produit</label>
															<input type="text" name="nom" class="form-control" id="productName{{ $product->id }}" value="{{ $product->nom }}" required>
														</div>
														<div class="mb-3">
															<label for="productPrice{{ $product->id }}" class="form-label">Prix</label>
															<input type="number" name="prix" class="form-control" id="productPrice{{ $product->id }}" value="{{ $product->prix }}" required>
														</div>
														<div class="mb-3">
															<label for="productImage{{ $product->id }}" class="form-label">Image</label>
															<input type="file" name="photo" class="form-control" id="productImage{{ $product->id }}">
															<img src="{{ asset('storage/'.$product->photo) }}" class="img-thumbnail mt-2" width="100" alt="product img">
														</div>
														<button type="submit" class="btn btn-primary">Modifier</button>
													</form>
												</div>
											</div>
										</div>
									</div>


									<!-- Modal -->
									<div class="modal fade" id="orderProductModal{{ $product->id }}" tabindex="-1" aria-labelledby="orderProductModalLabel{{ $product->id }}" aria-hidden="true">
														<div class="modal-dialog">
															<div class="modal-content">
																<div class="modal-header">
																	<h5 class="modal-title" id="orderProductModalLabel{{ $product->id }}">Commander le produit</h5>
																	<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
																</div>
																<div class="modal-body">
																	<div class="text-center mb-3">
																		<img src="{{ asset('storage/'.$product->photo) }}" class="img-fluid" alt="product img">
																	</div>
																	<div class="mb-3">
																		<label class="form-label text-primary fw-bold">Nom du produit</label>
																		<p>{{ $product->nom }}</p>
																	</div>
																	<div class="mb-3">
																		<label class="form-label text-primary fw-bold">Prix</label>
																		<p>{{ $product->prix }}</p>
																	</div>
																	<form method="POST" action="{{ route('commande') }}">
																	@csrf
																	<div class="form-group">
																		<input type="hidden" name="produits_id" value="{{ $product->id }}" class="form-control" required>
																		<input type="hidden" name="user_id" value="{{ Auth::user()->id }}" class="form-control" required>
																		
																		<label for="quantite">Quantité</label>
																			
																			
																			<input type="number" name="quantite" class="form-control" required>
																		</div>
																		<button type="submit" class="btn btn-primary kkiapay-button">Commander</button>
																	</form>
																	
																</div>
															</div>
														</div>
													</div>
													<script src="https://cdn.kkiapay.me/k.js"></script>
													<script amount="{{ $product->prix }}" 
        callback=""
        data=""
        position="right" 
        theme="#0095ff"
        sandbox="true"
        key=""
        src="https://cdn.kkiapay.me/k.js"></script>
													@endforeach
													
													
													
	<script>
    document.addEventListener('DOMContentLoaded', function() {
        setTimeout(function() {
            var successMessage = document.getElementById('success-message');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 3000); // 3 seconds
    });
</script>

	<!-- Bootstrap JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/chartjs/js/chart.js"></script>
	<script src="assets/js/index.js"></script>
	<!--app JS-->
	<script src="assets/js/app.js"></script>
	<script>
		new PerfectScrollbar(".app-container")
	</script>
	
</body>


<!-- Mirrored from codervent.com/rocker/demo/vertical/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 25 Apr 2024 19:43:05 GMT -->
</html>