/* CONTENT PÁGINA */
$(function() {
    var url_atual = (window.location.href).split("/");
    pageAtual = url_atual[(url_atual.length) - 2];

    switch (pageAtual) {
        case "TytoinKids":
            diretorio = "";
            break;

        case "listar":
            diretorio = "../";
            break;
    
        case "cadastrar":
            diretorio = "../";
            break;

        case "pastaSemNome":
            diretorio = "../";
            break;

        case "menu":
            diretorio = "../";
            break;
    
        default:
            diretorio = "";
            break;
    }

    /* Header */
    $('.top-header-area').html('');
    
    var contentHeader =   `<div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-sm-12 text-center">
                                    <div class="main-menu-wrap">
                                        <!-- logo -->
                                        <div class="site-logo">
                                            <a href="`+diretorio+`index">
                                                <img src="`+diretorio+`commandview/assets/img/logo_defined.png" alt="">
                                            </a>
                                        </div>
                                        <!-- logo -->

                                        <!-- menu start -->
                                        
                                        <nav class="main-menu">
                                            <ul>
                                                <li><a class="cool-hover" href="`+diretorio+`home">Inicio</a></li>
                                                <li><a class="cool-hover" href="`+diretorio+`sobre">Sobre</a></li>
                                                <li><a class="cool-hover" href="`+diretorio+`contato">Contato</a></li>
                                                <li><a class="cool-hover" href="`+diretorio+`loja">Produtos</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="`+diretorio+`loja">Produtos</a></li>
                                                        <li><a href="`+diretorio+`carrinho">Carrinho</a></li>
                                                    </ul>
                                                </li>
                                                <li><a class="cool-hover" href="`+diretorio+`menu/menu">MENU</a>
                                                    <ul class="sub-menu">
                                                        <li><a href="`+diretorio+`menu/menu">Menu</a></li>
                                                        <li><a href="`+diretorio+`menu/menu_status">Manutenção</a></li>
                                                    </ul>
                                                </li>
                                                <li>
                                                    <div class="header-icons">
                                                        <a class="shopping-cart cool-hover" href="`+diretorio+`carrinho"><i class="fas fa-shopping-cart"></i></a>
                                                        <a class="mobile-hide search-bar-icon cool-hover" href="`+diretorio+`login"><i class="fas fa-user"></i></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </nav>
                                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-user"></i></a>
                                        <div class="mobile-menu"></div>
                                        <!-- menu end -->
                                    </div>
                                </div>
                            </div>
                        </div>`;

    $(".top-header-area").append(contentHeader);

    /* end Header */

    /* Footer */
    $('.footer-copyright').html('');
    
    var contentBegin =   `<div class="container">
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
                                        <li><a class="cool-hover" href="`+diretorio+`index">Início</a></li>
                                        <li><a class="cool-hover" href="`+diretorio+`sobre">Sobre</a></li>
                                        <li><a class="cool-hover" href="`+diretorio+`loja">Produtos</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>`;

    $(".footer-copyright").append(contentBegin);

    $('.footer-copyright-party-end').html('');

    var contentEnd =   `<div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <p>Copyrights &copy; 2021 - <a href="`+diretorio+`tytoin_kids_link_copyright">Tytoin</a>,  Todos os direitos reservados.</p>
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
                    </div>`;

    $(".footer-copyright-party-end").append(contentEnd);

    /* End Footer */
});