<?php require VIEW_PATH . 'partials/header.php'; ?>
    <link rel="stylesheet" type="text/css" href="<?= asset('css/style_app.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/estilo_principal.css')?>">
    <!--==JAVASCRIPT=============================-->
    <script src="<?= asset('js/jquery.js')?>" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript" src="<?= asset('js/promo-countdown.js') ?>"></script>
    <!--==Using-Font-Awesome=====================-->
    <link rel="stylesheet" href="<?= asset('css/all.min.css') ?>" crossorigin="anonymous" referrerpolicy="no-referrer">
    <!--==Import-Font-Family======================-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!--pesquisar o que é isso-->
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/banner-button.css')?>">
</head>
<!--==social-prove================================-->
<?php require VIEW_PATH . 'partials/notifications.php'; ?>
<!--==Navigation================================-->
<?php require VIEW_PATH . 'partials/nav.php'; ?>
<!--nav-end--------------------->
<main>
    <!--==Search-banner=======================================-->
    <section id="search-banner">
        <div class="search-banner-text">
            <span>
                Seguidores <br> & Curtidas para as suas
                <br>
                <span class="rotate"> Redes sociais </span>
                <img src="<?= asset('images/1f929.gif')?>">
            </span>
            <p>Quer <b>aumentar</b> seu engajamento nas redes sociais? Com nós isso não só é possível, assim como
                também é <b>real!</b> Adquira abaixo os <b>melhores pacotes</b> para as suas redes sociais!</p>
            <!--search-box------>
            <div class="search-container">
                <div class="centraliza-tudo">
                    <p style="font-size: 16px;
                                    color: #60697b;
                                    margin: 0 auto;
                                    padding-bottom: 20px;
                                    margin-top: 10px;
                                    text-shadow: 2px 6px 4px rgba(0, 0, 0, 0.15);">
                        Selecione a <b>rede social</b> abaixo
                    </p>
                    <div class="social-selector">
                        <a href="social-instagram/" class="icon-button instagram">
                            <i class="fab fa-instagram"></i>
                            <div class="textslide">Instagram</div>
                        </a>
                        <a href="social-tiktok/" class="icon-button tiktok">
                            <i class="fab fa-tiktok"></i>
                            <div class="textslide">TikTok</div>
                        </a>
                        <a href="social-facebook/" class="icon-button facebook selected">
                            <i class="fab fa-facebook-f"></i>
                            <div class="textslide">Facebook</div>
                        </a>
                        <a href="social-kwai/" class="icon-button kwai">
                            <i class="fas fa-video"></i>
                            <div class="textslide">Kwai</div>
                        </a>
                        <a href="social-youtube/" class="icon-button youtube">
                            <i class="fab fa-youtube"></i>
                            <div class="textslide">YouTube</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="items-2" style="margin-top: 12px;">
                <div class="item-2">
                    <svg height="18" viewBox="0 0 11 11" width="18" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none">
                            <path d="m5.5 11a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" fill="#00c479"></path>
                            <path
                                d="m3.205 5.72a.66.66 0 0 0 -.91.956l1.475 1.406a.66.66 0 0 0 .894.016l4.43-3.938a.66.66 0 1 0 -.878-.987l-3.974 3.534z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                    <p>Não Pedimos sua Senha</p>
                </div>
                <div class="item-2">
                    <svg height="18" viewBox="0 0 11 11" width="18" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none">
                            <path d="m5.5 11a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" fill="#00c479"></path>
                            <path
                                d="m3.205 5.72a.66.66 0 0 0 -.91.956l1.475 1.406a.66.66 0 0 0 .894.016l4.43-3.938a.66.66 0 1 0 -.878-.987l-3.974 3.534z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                    <p>100% Seguro e Sigiloso
                    </p>
                </div>
                <div class="item-2">
                    <svg height="18" viewBox="0 0 11 11" width="18" xmlns="http://www.w3.org/2000/svg">
                        <g fill="none">
                            <path d="m5.5 11a5.5 5.5 0 1 1 0-11 5.5 5.5 0 0 1 0 11z" fill="#00c479"></path>
                            <path
                                d="m3.205 5.72a.66.66 0 0 0 -.91.956l1.475 1.406a.66.66 0 0 0 .894.016l4.43-3.938a.66.66 0 1 0 -.878-.987l-3.974 3.534z"
                                fill="#fff"></path>
                        </g>
                    </svg>
                    <p>Não Precisa Seguir Ninguém
                    </p>
                </div>
            </div>
            <div class="items-2" bis_skin_checked="1">
                <div class="item-2" bis_skin_checked="1">
                    <svg width="100" height="30" viewBox="0 0 150 30" xmlns="http://www.w3.org/2000/svg" fill="#FFD700">
                        <polygon points="15,1 19,11 30,11 21,17 24,28 15,22 6,28 9,17 0,11 11,11"></polygon>
                        <polygon points="45,1 49,11 60,11 51,17 54,28 45,22 36,28 39,17 30,11 41,11"></polygon>
                        <polygon points="75,1 79,11 90,11 81,17 84,28 75,22 66,28 69,17 60,11 71,11"></polygon>
                        <polygon points="105,1 109,11 120,11 111,17 114,28 105,22 96,28 99,17 90,11 101,11">
                        </polygon>
                        <polygon points="135,1 139,11 150,11 141,17 144,28 135,22 126,28 129,17 120,11 131,11">
                        </polygon>
                    </svg>
                    <p><b>4.7</b> (+63.327 avaliações)</p>
                    <div class="flex items-center" bis_skin_checked="1">

                        <img src="<?= asset('images/cliente-avaliacao-comprou-seguidores.png')?>"
                            class="-ml-2 rounded-full" style="margin-left: 10px; width: 35px; height: 35px;"
                            alt="Comprou seguidores">
                        <img src="<?= asset('images/cliente-avaliacao-comprou-curtidas.jpg')?>"
                            class="-ml-2 rounded-full" style="width: 35px; height: 35px;" alt="Comprou curtidas">
                        <img src="<?= asset('images/cliente-avaliacao-comprou-seguidores-instagram.jpg')?>"
                            class="-ml-2 rounded-full" style="width: 35px; height: 35px;"
                            alt="Comprou seguidores instagram">
                        <img src="<?= asset('images/cliente-avaliacao-comprou-visualizacoes.jpg')?>"
                            class="-ml-2 rounded-full" style="width: 35px; height: 35px;" alt="Comprou visualizações">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="client-headingy">
        <h3>Veja seu perfil crescendo!
        </h3>
    </div>
    <div class="swiper swiper-cards swiper-3d swiper-initialized swiper-horizontal swiper-watch-progress mt-8">
        <div class="swiper-wrapper" style="cursor: grab; transform: translateX(0px);">
            <div class="swiper-slide swiper-slide-visible swiper-slide-fully-visible swiper-slide-active"
                style="width: 200px; z-index: 7; transform: translate3d(0px, 0px, 0px) rotateZ(0deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper"
                    style="opacity: 1; transform: none; box-shadow: rgba(217, 180, 255, 0.333) 0px 0px 0px;">
                    <video src="<?= asset('media/oPJkqyF.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 0;"></div>
            </div>
            <div class="swiper-slide swiper-slide-next"
                style="width: 200px; z-index: 6; transform: translate3d(calc(7.25% - 230px), 0px, -100px) rotateZ(6deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper"
                    style="opacity: 1; transform: none; box-shadow: rgba(217, 180, 255, 0.333) 0px 0px 0px;">
                    <video src="<?= asset('media/qBpXXSg.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
            <div class="swiper-slide"
                style="width: 200px; z-index: 5; transform: translate3d(calc(13% - 460px), 0px, -200px) rotateZ(12deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper"
                    style="opacity: 1; transform: none; box-shadow: rgba(217, 180, 255, 0.333) 0px 0px 0px;">

                    <video src="<?= asset('media/JE8uyHX.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
            <div class="swiper-slide"
                style="width: 200px; z-index: 4; transform: translate3d(calc(17.25% - 690px), 0px, -300px) rotateZ(18deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper"
                    style="opacity: 1; transform: none; box-shadow: rgba(217, 180, 255, 0.333) 0px 0px 0px;">

                    <video src="<?= asset('media/2f0BRA0.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
            <div class="swiper-slide"
                style="width: 200px; z-index: 3; transform: translate3d(calc(20% - 920px), 0px, -400px) rotateZ(24deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper"
                    style="opacity: 1; transform: none; box-shadow: rgba(217, 180, 255, 0.333) 0px 0px 0px;">

                    <video src="<?= asset('media/OQFiRZW.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
            <div class="swiper-slide"
                style="width: 200px; z-index: 2; transform: translate3d(calc(20% - 1150px), 0px, -400px) rotateZ(24deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper" style="opacity: 1; transform: none;">

                    <video src="<?= asset('media/Vd2c6We.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
            <div class="swiper-slide"
                style="width: 200px; z-index: 1; transform: translate3d(calc(20% - 1380px), 0px, -400px) rotateZ(24deg) scale(1); margin-right: 30px;">
                <div class="video-wrapper" style="opacity: 1; transform: none;">

                    <video src=" <?= asset('media/iYIEUAg.mp4#t=0.1')?>" class="video-player" playsinline=""
                        loop=""></video>
                    <div class="play-button">
                        <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="lucide lucide-play-circle text-white">
                            <circle cx="12" cy="12" r="10"></circle>
                            <polygon points="10 8 16 12 10 16 10 8"></polygon>
                        </svg>
                    </div>
                </div>
                <div class="swiper-slide-shadow swiper-slide-shadow-cards" style="opacity: 1;"></div>
            </div>
        </div>
        <button class="swiper-button-prev">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M15 18l-6-6 6-6"></path>
            </svg>
        </button>
        <button class="swiper-button-next">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="M9 18l6-6-6-6"></path>
            </svg>
        </button>
        <div
            class="swiper-pagination swiper-pagination-clickable swiper-pagination-bullets swiper-pagination-horizontal">
            <span class="swiper-pagination-bullet swiper-pagination-bullet-active"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
            <span class="swiper-pagination-bullet"></span>
        </div>
    </div>
    <!--==Clients===============================================-->
    <?php require VIEW_PATH . 'partials/faq.php'; ?>
    <!--client-section-end---------->
    <link rel="stylesheet" href="<?= asset('css/swiper-bundle.min.css') ?>">
    <script src="<?= asset('js/swiper-bundle.min.js')?>"></script>
    <script>
        // Espera o DOM carregar completamente

        document.querySelectorAll('.video-player').forEach(video => {
            video.addEventListener('click', () => {
                if (video.paused) {
                    video.play();
                    const playButton = document.querySelector('.play-button');
                    playButton.style.display = 'none';
                } else {
                    video.pause();
                    const playButton = document.querySelector('.play-button');
                    playButton.style.display = 'block';
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            // Seleciona todos os botões de play
            const playButtons = document.querySelectorAll('.play-button');

            // Adiciona um evento de clique para cada botão de play
            playButtons.forEach(button => {
                button.addEventListener('click', function () {
                    // Encontra o vídeo mais próximo do botão de play clicado
                    const videos = document.querySelectorAll('video');

                    videos.forEach(video => {

                        if (video.paused) {
                            video.play();
                            this.style.opacity = '0';
                        } else {
                            video.pause();
                            this.style.opacity = '1';
                        }
                    });
                });
            });
        });

        document.addEventListener("DOMContentLoaded", function () {
            var swiper = new Swiper('.swiper', {
                // Ativa a navegação com os botões de setas
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                effect: 'creative',
                grabCursor: true,
                centeredSlides: true,
                slidesPerView: 1.2, // deixa as bordas dos vídeos visíveis
                creativeEffect: {
                    prev: {
                        translate: ['-5%', 0, -200],
                        rotate: [0, 0, -15],
                        opacity: 1,
                    },
                    next: {
                        translate: ['5%', 0, -200],
                        rotate: [0, 0, 15],
                        opacity: 1,
                    }
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                }
            });
        });
    </script>
</main>
<!--==Footer=============================================-->
<?php require VIEW_PATH . 'partials/footer.php'; ?>