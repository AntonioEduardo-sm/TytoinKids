<?php
	session_start();

	if (isset($_SESSION["logado"])) {
	}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Tytoin_kids - Seja muito bem vindo, Conheça nossos produtos, encomende algo que o agrade para seu filho ou filha, nós somos a Tytoin kids.">

	<!-- title -->
	<title>Carrinho</title>

	<!-- favicon -->
	<link rel="shortcut icon" type="image/png" href="commandview/assets/img/favicon.png">
	<!-- google font -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
	<!-- fontawesome -->
	<link rel="stylesheet" href="commandview/assets/css/all.min.css">
	<!-- bootstrap -->
	<link rel="stylesheet" href="commandview/assets/bootstrap/css/bootstrap.min.css">
	<!-- owl carousel -->
	<link rel="stylesheet" href="commandview/assets/css/owl.carousel.css">
	<!-- magnific popup -->
	<link rel="stylesheet" href="commandview/assets/css/magnific-popup.css">
	<!-- animate css -->
	<link rel="stylesheet" href="commandview/assets/css/animate.css">
	<!-- mean menu css -->
	<link rel="stylesheet" href="commandview/assets/css/meanmenu.min.css">
	<!-- main style -->
	<link rel="stylesheet" href="commandview/assets/css/main.css">
	<!-- responsive -->
	<link rel="stylesheet" href="commandview/assets/css/responsive.css">

</head>
<body>
	
	<!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->
	
	<!-- header -->
	<div class="top-header-area" id="sticker">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 col-sm-12 text-center">
					<div class="main-menu-wrap">
						<!-- logo -->
						<div class="site-logo">
							<a href="index">
								<img src="commandview/assets/img/logo_defined.png" alt="">
							</a>
						</div>
						<!-- logo -->

						<!-- menu start -->
						
						<nav class="main-menu">
							<ul>
								<li><a class="cool-hover" href="sobre">Sobre</a></li>
								<li><a class="cool-hover" href="contato">Contato</a></li>
								<li><a class="cool-hover" href="loja">Produtos</a>
									<ul class="sub-menu">
										<li><a href="loja">Produtos</a></li>
										<li><a href="carrinho">Carrinho</a></li>
									</ul>
								</li>
								<li>
									<div class="header-icons">
										<a class="shopping-cart" href="carrinho"><i class="fas fa-shopping-cart"></i></a>
										<a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
									</div>
								</li>
							</ul>
						</nav>
						<a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
						<div class="mobile-menu"></div>
						<!-- menu end -->
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end header -->

	<!-- search area -->
	<div class="search-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<span class="close-btn"><i class="fas fa-window-close"></i></span>
					<div class="search-bar">
						<div class="search-bar-tablecell">
							<h3>Pesquisar:</h3>
							<input type="text" placeholder="Digite aqui">
							<button type="submit">Pesquisar <i class="fas fa-search"></i></button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end search area -->
	
	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>Visualize suas escolhas</p>
						<h1>Carrinho</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-5 mb-5">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12 mt-5 mb-5">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-remove"></th>
									<th class="product-image">Produto</th>
									<th class="product-name">Nome</th>
									<th class="product-price">Preço</th>
									<th class="product-quantity">Quantidade</th>
									<th class="product-total">Total</th>
								</tr>
							</thead>
							<tbody>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="commandview/assets/img/images/productind.jpg" alt=""></td>
									<td class="product-name">Strawberry</td>
									<td class="product-price">$85</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="commandview/assets/img/images/productind.jpg" alt=""></td>
									<td class="product-name">Berry</td>
									<td class="product-price">$70</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
								<tr class="table-body-row">
									<td class="product-remove"><a href="#"><i class="far fa-window-close"></i></a></td>
									<td class="product-image"><img src="commandview/assets/img/images/productind.jpg" alt=""></td>
									<td class="product-name">Lemon</td>
									<td class="product-price">$35</td>
									<td class="product-quantity"><input type="number" placeholder="0"></td>
									<td class="product-total">1</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4 mt-5 mb-5">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Preço</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td>$500</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>$45</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td>$545</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="carrinho" class="boxed-btn">Atualizar Carrinho</a>
							<a href="encomendar" class="boxed-btn black">Encomendar</a>
						</div>
					</div>

					<div class="coupon-section">
						<h3>Adicionar Cupom</h3>
						<div class="coupon-form-wrap">
							<p><input type="text" class="btn_nm_cupom" name="Cupom" placeholder="Cupom" required></p>
							<p><input type="submit" class="modal_system_open" value="Aplicar"></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

	<!-- Large modal -->
	<div class="modal fade modal_system_open_class" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="conteudo">
				
			</div>
		</div>
	</div>
	</div>

	<!-- End Large modal -->

	<!-- footer -->
	<div class="footer-area">
		<div class="container">
			<div class="row">
				<div class="col-lg-3 col-md-6">
					<div class="footer-box about-widget">
						<h2 class="widget-title">Sobre nós</h2>
						<p>Ut enim ad minim veniam perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae.</p>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box get-in-touch">
						<h2 class="widget-title">Como nos encontrar</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@tkids.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box">
						<h2 class="widget-title">Serviços</h2>
						<ul>
							<li>34/8, East Hukupara, Gifirtok, Sadan.</li>
							<li>support@tkids.com</li>
							<li>+00 111 222 3333</li>
						</ul>
					</div>
				</div>
				<div class="col-lg-3 col-md-6">
					<div class="footer-box pages">
						<h2 class="widget-title">Páginas</h2>
						<ul>
							<li><a class="cool-hover" href="index">Início</a></li>
							<li><a class="cool-hover" href="sobre">Sobre</a></li>
							<li><a class="cool-hover" href="loja">Produtos</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end footer -->
	
	<!-- copyright -->
	
	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-12">
					<p>Copyrights &copy; 2021 - <a href="tytoin_kids_link_copyright">Tytoin</a>,  Todos os direitos reservados.</p>
				</div>
				<div class="col-lg-6 text-right col-md-12">
					<div class="social-icons">
						<ul>
							<li><a href="#" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
							<!-- <li><a href="#" target="_blank"><i class="fab fa-twitter"></i></a></li> -->
							<li><a href="#" target="_blank"><i class="fab fa-instagram"></i></a></li>
							<!-- <li><a href="#" target="_blank"><i class="fab fa-linkedin"></i></a></li> -->
							<!-- <li><a href="#" target="_blank"><i class="fab fa-dribbble"></i></a></li> -->
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end copyright -->
	
	<!-- jquery -->
	<script src="commandview/assets/js/jquery-1.11.3.min.js"></script>
	<!-- bootstrap -->
	<script src="commandview/assets/bootstrap/js/bootstrap.min.js"></script>
	<!-- count down -->
	<script src="commandview/assets/js/jquery.countdown.js"></script>
	<!-- isotope -->
	<script src="commandview/assets/js/jquery.isotope-3.0.6.min.js"></script>
	<!-- waypoints -->
	<script src="commandview/assets/js/waypoints.js"></script>
	<!-- owl carousel -->
	<script src="commandview/assets/js/owl.carousel.min.js"></script>
	<!-- magnific popup -->
	<script src="commandview/assets/js/jquery.magnific-popup.min.js"></script>
	<!-- mean menu -->
	<script src="commandview/assets/js/jquery.meanmenu.min.js"></script>
	<!-- sticker js -->
	<script src="commandview/assets/js/sticker.js"></script>
	<!-- main js -->
	<script src="commandview/assets/js/main.js"></script>

	<!-- conteudo modal js -->
	<script src="commandsfunction/content/conteudoCart.js"></script>

</body>
</html>