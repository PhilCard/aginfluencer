<?php require VIEW_PATH . 'partials/header.php'; ?>
    <link rel="stylesheet" href="<?= asset('css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,500,500i,600,600i,700,700i&amp;subset=latin-ext">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;700" rel="stylesheet">
    <!-- Core -->
    <link href="<?= asset('css/core.css') ?>" rel="stylesheet">
    <!-- toast -->
    <link rel="stylesheet" type="text/css" href="<?= asset('css/jquery.toast.css') ?>">
    <link rel="stylesheet" href="<?= asset('plugins/colors.css') ?>" id="theme-stylesheet">
    <!-- OwlCarousel -->
    <link rel="stylesheet" type="text/css" href="<?= asset('plugins/owl.carousel.min.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('plugins/owl.theme.default.min.css') ?>">
    <link href="<?= asset('css/util.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/user.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/footer.css') ?>" rel="stylesheet">
    <script src="<?= asset('vendor/jquery-3.2.1.min.js') ?>"></script>
    <script src="<?= asset('vendor/owl.carousel.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= asset('css/checkout.css') ?>">
</head>
<!--<span class="loader"></span>-->
<?php require __DIR__ . '/../controllers/checkout.php' ?>
<div id="page-overlay" class="visible incoming">
    <div class="loader-wrapper-outer">
        <div class="loader-wrapper-inner">
            <div class="lds-double-ring">
                <div></div>
                <div></div>
                <div>
                    <div></div>
                </div>
                <div>
                    <div></div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- load general header -->
<html>

<head>
    <style>
        .collapse {
            visibility: visible !important;
        }
    </style>
</head>
<header class="header fixed-top" id="headerNav">
    <div class="container">
        <nav class="navbar navbar-expand-lg ">
            <a class="navbar-brand" href="../">
                <img class="site-logo" src="<?= asset('images/ligo agencia influencer 1.png') ?>" alt="agInfluencer">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa-solid fa-bars"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item ">
                        <a class="nav-link js-scroll-trigger" href="../">Início</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Serviços </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="../social-instagram">Instagram</a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="../social-tiktok">TikTok</a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="../social-facebook">Facebook</a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="../social-kwai">Kwai</a>
                            </li>
                            <li class="dropdown-submenu">
                                <a class="dropdown-item" href="../social-youtube">Youtube</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</header>
<div id="modal-ajax" class="modal fade" tabindex="1" style="display: none;"></div>
</html>

<?php require VIEW_PATH . 'partials/modals.php'; ?>

<section class="checkout-form">
    <div class="container">
        <div class="row justify-content-md-center justify-content-xl-center content  ">
            <div class="col-md-10 m-t-40">
                <div class="row checkout-wrap">
                    <form class="col-sm-7 col-xs-12 checkout-left actionCheckoutForm" method="POST" action>
                        <div class="card ">
                            <div class="checkout-left-content form-content ">
                                <div class="qrcode-generator" style="padding: 1rem;border-radius: 3px;display: flex;flex-direction: column;gap: 10px; display:none;">

                                    <div class="flex" style="display: flex;margin: auto;gap: 20px;align-items: center;padding: 15px;justify-content: center;">
                                        <img src="https://upload.wikimedia.org/wikipedia/commons/d/de/Logo_-_pix_powered_by_Banco_Central_%28Brazil%2C_2020%29.png" style="width: 115px; height: max-content;" />
                                        <!--  preço_final EXIBIR aqui !!! -->
                                        <h1 id="valor-pix" style="margin: 0; font-size: 30px;"></h1>
                                    </div>
                                    <img id="qr_openpix" src="" style="display: flex;justify-content: center;margin: auto;width: 200px;border-radius: 5px;">

                                    <textarea id="pixPaymentCode" class="text-pix" readonly style="appearance: none;background-color: #fff;border-width: 1px;border-radius: 0;padding: .5rem .75rem;font-size: 1rem;line-height: 1.5rem;--tw-shadow: 0 0 #0000;">
                                                    <!-- codigo qr aqui -->
                                                </textarea>

                                    <center style="padding:10px;">
                                        <p class="">
                                            <small> Após a confirmação do pagamento, a página será atualizada automaticamente. </small>
                                        </p>
                                    </center>
                                </div>
                                <script>
                                    $(document).ready(function() {
                                        const $social_input = $('#user_insta');
                                        const $btn_verifica_user = $('#verifica_user_insta');

                                        let tipo_srvc = $social_input.data('id'); // equivale ao getAttribute('data-id')

                                        if (tipo_srvc !== 'instagram-seguidores') {
                                            $btn_verifica_user.hide();

                                            if (
                                                tipo_srvc !== 'tiktok-seguidores' &&
                                                tipo_srvc !== 'facebok-seguidores' &&
                                                tipo_srvc !== 'kwai-seguidores' &&
                                                tipo_srvc !== 'youtube-seguidores'
                                            ) {
                                                $social_input.attr('placeholder', 'Informe o link da sua publicação');
                                            } else {
                                                $social_input.attr('placeholder', 'Informe o link do perfil');
                                            }
                                        }
                                    });
                                </script>
                                <fieldset class="form-fieldset" style=" padding-top: 4px;">
                                    <!-- get alert html -->
                                    <div id="alert-message"></div>
                                    <!--
                                                <div class="flex" style="display: flex; margin: auto; gap: 20px; align-items: center; padding: 15px;"> </div> colocar logo pix e valor aqui -->
                                    <!-- inserir qr code pix aqui -->

                                    <label class="form-label m-b-0" style="display: flex;justify-content: flex-end;width: 100%;"><a href="#" onclick="$('#notification').modal('show');" style="font-size: 15px;color: #0cc27e;">Como faz a compra <i class="fa-regular fa-circle-question"></i></a></label>
                                    <div id="profile-container" style="display: none; position: relative;">
                                        <div style="display: flex; align-items: center;">
                                            <img id="profile-picture" src="" alt="Foto do perfil" style="margin-right: 10px; width: 45px; height: 45px; border-radius: 50%;">
                                            <div>
                                                <p id="username" style="margin: 0; font-size: 14px; font-weight: 600;"></p>
                                                <p id="followers" style="margin: 0; font-size: 12px; color: gray;"></p>
                                            </div>
                                            <button class="btn btn-primary" style="padding: 3px 8px; font-size: 0.75rem; width: 25%; position: absolute; right: 0px;" onclick="change()">Trocar</button>
                                        </div>
                                    </div>

                                    <div class="form-group" id="form-container">
                                        <!-- INSERIR INPUTS TYPE HIDDEN TODOS AQUI  -->

                                        <!-- inputs banco de dados-->
                                        <input type="hidden" id="plano_pacote" value="<?= htmlspecialchars($plano,  ENT_QUOTES, 'UTF-8') ?>" />
                                        <input id="redes_sociais" type="hidden" value="<?= htmlspecialchars($rede_social, ENT_QUOTES, 'UTF-8') ?>"> <!-- PEGAR O VALOR textContent do price e passar para o preço final aqui no hidden-->
                                        <input id="tipo_servico" type="hidden" value="<?= htmlspecialchars($tipo_servico, ENT_QUOTES, 'UTF-8') ?>" />
                                        <input id="quantidade" type="hidden" value="" />
                                        <input id="preco_final" type="hidden" value="" />
                                        <!-- inputs banco de dados-->

                                        <!-- input carrega correlationID -->
                                        <input type="hidden" id="correlation_id" value="">

                                        <!-- inputs do cobrança PIX-->
                                        <label class="form-label">Informe o link ou seu nome de usuário</label>
                                        <div style="display: flex; align-items: center;">

                                            <input id="user_insta" name="link"
                                                data-id="<?= htmlspecialchars($rede_social, ENT_QUOTES, 'UTF-8') ?>-<?= htmlspecialchars($tipo_servico, ENT_QUOTES, 'UTF-8') ?>" type="text" placeholder="Exemplo: neymarjr ou @neymarjr" required style="flex-grow: 1; font-size: 12px;" />
                                            <button id="verifica_user_insta" type="button" class="btn btn-primary" style="margin-left: 10px; padding: 3px 8px; font-size: 0.75rem; width: 30%;">Verificar</button>
                                        </div>
                                        <p style="font-weight: 100;font-size: 11px;color: var(--gray);margin: 0px 0 0 2px;">Seu perfil <span class="texto-destaque">precisa está publico!</span></p>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-label">Email <span class="form-required">*</span></label>
                                        <input type="email" id="email" name="email" class="form-control" required style="flex-grow: 1;font-size: 12px;" placeholder="Informe seu email" required>
                                    </div>
                                    <div class="form-group">

                                        <label class="form-label">Whatsapp <span class="form-required">*</span></label>
                                        <input type="whatsapp" id="whats" name="whatsapp" id="whatsapp" class="form-control" required style="flex-grow: 1;font-size: 12px;" placeholder="Ex: 21 99912-3456" required>
                                    </div>
                                    <!-- inputs do cobrança PIX-->
                                    <script>
                                        const phoneMask = (value) => {
                                            if (!value) return "";
                                            value = value.replace(/\D/g, '');
                                            value = value.substring(0, 11); // Limitar a 11 dígitos
                                            value = value.replace(/(\d{2})(\d)/, "($1) $2");
                                            value = value.replace(/(\d)(\d{4})$/, "$1-$2");
                                            return value;
                                        };

                                        $('#whatsapp').on('input', function() {
                                            let input = $(this);
                                            input.val(phoneMask(input.val()));
                                        });
                                    </script>
                                    <div class="form-group">
                                        <label class="form-label">Métodos de Pagamento</label>
                                        <select name="payment_method" id="select-payments" class="form-control custom-select">
                                            <option
                                                value="efibank"
                                                data-data='{"image": "./public/images/efibank.jpg"}'
                                                selected>
                                                Pague via PIX
                                            </option>
                                        </select>
                                    </div>
                                    <div id="customerDetails" class="form-group" style="display: none;">
                                        <!--Aqui-->
                                        <label class="form-label">CPF</label>
                                        <input type="text" name="cpf" id="cpf" class="form-control" style="flex-grow: 1;font-size: 12px;" placeholder="Informe seu CPF">
                                        <label class="form-label">Nome</label>
                                        <input type="text" name="name" id="name" class="form-control" style="flex-grow: 1;font-size: 12px;" placeholder="Informe seu Nome">
                                    </div>
                                    <!-- require promo_adc -->
                                </fieldset>

                                <div class="card-footer text-left">
                                    <button id="pagamento_checkout" type="submit" class="btn  btn-submit"><i class="fa-solid fa-wallet"></i> &nbsp; &nbsp;Realizar Pagamento
                                        <div class="loader" style="display:none;"> </div>
                                    </button>
                                    <button id="copia-pix" type="submit" class="btn  btn-submit" style="display:none;">
                                        COPIA PIX
                                    </button>
                                    <!--<a  class="btn  btn-primary" href="#" style=" margin-top: 5px; "><i class="fa-solid fa-clock-rotate-left"></i> &nbsp; &nbsp;MEUS PEDIDOS</a>-->
                                </div>
                            </div>
                        </div>
                    </form>

                    <div class="col-sm-5 col-xs-12 checkout-right">
                        <div class="flex items-center justify-center bg-gradient-to-r to-indigo-600 px-4 py-1 rounded-t-2xl" bis_skin_checked="1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" class="fill-white mr-1">
                                <path fill="white" d="M12 0c-3.371 2.866-5.484 3-9 3v11.535c0 4.603 3.203 5.804 9 9.465 5.797-3.661 9-4.862 9-9.465v-11.535c-3.516 0-5.629-.134-9-3zm-.548 15l-3.452-3.362 1.237-1.239 2.215 2.123 4.382-4.475 1.238 1.238-5.62 5.715z"></path>
                            </svg>
                            <span class="textsecure">COMPRA 100% SEGURA</span>
                        </div>
                        <div class="card">
                            <div class="checkout-right-title">Resumo do Pedido</div>
                            <div class="checkout-right-content">
                                <div class="card-body product-info card-toast" data-card-toast-text="10% de desconto">
                                    <div class="">
                                        <div class="quantity">
                                            <span class="rotate" id="quantity">250</span>
                                            <p style="font-weight: 500;font-size: 15px;margin-top: 0.5rem;display: flex;align-items: center;">
                                                <i style="margin-right: 0.5rem;" class="icon-social fa-brands fa-<?= htmlspecialchars($rede_social, ENT_QUOTES, 'UTF-8') ?>">
                                                </i>
                                                <?= htmlspecialchars(ucfirst($tipo_servico), ENT_QUOTES, 'UTF-8') ?>
                                            </p> <!-- REDE SOCIAL - TIPO DE SERVIÇO -->
                                        </div>
                                        <div id="slider-body" class="slider-body">
                                            <div class="slider-container">
                                                <div class="slider-track">
                                                    <div class="slider-fill" style="width: 0%;"></div>
                                                    <div class="slider-thumb" style="left: 0%;"><i class="fa-solid fa-bolt fa-shake"></i></div>
                                                </div>
                                                <div class="slider-labels">
                                                    <span>Min</span>
                                                    <p style="font-weight: 100;">Deslize para aumentar:</p>
                                                    <span>Max</span>
                                                </div>
                                                <input type="hidden" id="item_ids" name="item_ids"
                                                    value="<?= htmlspecialchars($id_pacote, ENT_QUOTES, "UTF-8") ?>" />

                                                <!-- AQUI É APLICADO O DESCONTO CONFORME MEXE A BARRA !!-->
                                                <input type="hidden" id="json-products" value='<?= htmlspecialchars($jsonPacotes, ENT_QUOTES, "UTF-8"); ?>'>
                                            </div>
                                            <div class="avaliacao-seletor" bis_skin_checked="1">
                                                <img class="lazy loaded" decoding="async" src="<?= asset('images/45-estrelas.jpg') ?>" data-src="<?= asset('images/45-estrelas.jpg') ?>" data-was-processed="true">
                                                <span style="font-size: 12px;"><b>4.7</b> (63327 avaliações)</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                               
                                <div class="card-footer text-right">
                                    <!-- TOTAL E DESCONTO -->
                                    <div class="d-flex">
                                        <p style="margin: 0px;">Total (IVA incluído):</p>
                                        <h3 class="ml-auto" id="price" style="margin: 0; color: #45c4a0;"></h3>
                                    </div>
                                    <div class="d-flex" id="discount-block" style="display: none;">
                                        <p style="margin: 0px;">Desconto aplicado:</p>
                                        <h4 class="ml-auto" id="discount-text" style="margin: 0; color: #45c4a0;">Definido pela quantia</h4>
                                    </div>
                                    <div class="d-flex" id="discount-block" style="display: none;">
                                        <p style="margin: 0px;">Pagamento via PIX:</p>
                                        <h4 class="ml-auto" id="discount-text" style="margin: 0; color: #45c4a0;">5% Desconto</h4>
                                    </div>
                                    <!--==Daqui==-->
                                </div>
                                <div id="description" style="display: none;">
                                    Pacotes adicionais (<span id="offers-quantity">0</span>):
                                    <ul id="packages-selected"></ul>
                                    <div style="display: flex; justify-content: space-between; padding: 4px 0;">
                                        <span>Total:</span>
                                        <span id="total-price">$12.9000</span>
                                    </div>
                                </div>
                                <!--==Até aqui==-->
                                <a href="../" target="_blank" rel="noopener noreferrer">
                                    <img src="<?= asset('images/checkoutsidesz.webp') ?>" alt="Compra Segura" width="auto" height="auto" style="margin-top: 5%;">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div> <!-- fecha modal info -->
    <script>
        $(document).on('change', '#select-payments', function() {
            const selected = $(this).val().trim().toLowerCase();

            if (selected === 'mercadopago') {
                $('#customerDetails').show();
            } else {
                $('#customerDetails').hide();
            }
        });

        // Executar ao carregar
        $(document).ready(function() {
            $('#select-payments').trigger('change');
        });
    </script>

    <script>
        function change() {
            const linkInput = document.querySelector('input[name="link"]');
            const link = linkInput.value = '';

            document.getElementById('form-container').style.display = 'block';
            document.getElementById('profile-container').style.display = 'none';
        }

        const offers = document.querySelectorAll('.offer-checkbox');
        const description = document.getElementById('description');
        const packagesSelected = document.getElementById('packages-selected');
        const offersQuantity = document.getElementById('offers-quantity');
        const itemIds = document.getElementById('item_ids');

        const priceElement = document.getElementById('price');

        function updateDescription() {
            const selected = [];
            const rawText = priceElement.textContent.trim();
            const numericString = rawText.replace(/[^\d,]/g, '');
            const normalized = numericString.replace(',', '.');
            let totalPrice = parseFloat(normalized);

            let ids = [];

            const jsonString = $('#json-products').val();

            const products = JSON.parse(jsonString);
            const foundProduct = products.find(product => parseFloat(product.price) == totalPrice);
            let id = foundProduct.item_ids;

            ids.push(id);

            document.querySelectorAll('.offer-checkbox').forEach(offer => {
                if (offer.checked) {
                    const description = offer.getAttribute('data-description');
                    const newPrice = offer.getAttribute('data-newPrice');

                    selected.push({
                        id: offer.id,
                        description,
                        newPrice
                    });

                    totalPrice += parseFloat(newPrice) || 0;

                    if (!ids.includes(offer.id)) {
                        ids.push(offer.id);
                    }
                } else {
                    if (ids.includes(offer.id)) {
                        ids = ids.filter(id => id !== offer.id);
                    }
                }
            });


            description.style.display = selected.length > 0 ? 'block' : 'none';

            packagesSelected.innerHTML = selected.map(item => `
                    <li style="display: flex; justify-content: space-between; padding: 4px 0;">
                        <span>${item.description}</span>
                        <span>$${item.newPrice}</span>
                    </li>
                `)
                .join('');

            offersQuantity.textContent = selected.length;

            document.getElementById('item_ids').value = ids.join(',');

            const totalPriceElement = document.getElementById('total-price');
            if (totalPriceElement) {
                totalPriceElement.textContent = `$${totalPrice.toFixed(2)}`;
            };
        };

        document.querySelectorAll('.offer-checkbox').forEach(offer => {
            offer.addEventListener('change', function() {
                updateDescription();
            });
        });

        const observer = new MutationObserver((mutationsList) => {
            for (const mutation of mutationsList) {
                if (mutation.type === 'childList' || mutation.type === 'characterData') {
                    updateDescription();
                }
            }
        });

        document.querySelectorAll('.offer-packages').forEach(select => {
            select.addEventListener('change', function() {
                const selected = this.options[this.selectedIndex];
                const newPrice = selected.dataset.newprice;
                const oldPrice = selected.dataset.oldprice;
                const itemId = selected.value;
                const description = selected.dataset.description;

                const offerDiv = this.closest('.offer');
                const oldPriceSpan = offerDiv.querySelector('.old-price');
                const newPriceSpan = offerDiv.querySelector('.new-price');
                const checkboxId = this.dataset.checkboxId;
                const checkbox = offerDiv.querySelector('[data-checkbox]');

                oldPriceSpan.textContent = 'R$' + oldPrice;
                newPriceSpan.textContent = 'R$' + newPrice;

                checkbox.id = itemId;
                checkbox.setAttribute('data-newPrice', newPrice);
                checkbox.setAttribute('data-description', description);

                updateDescription();
            });
        });

        // Observar alterações no conteúdo interno
        observer.observe(priceElement, {
            childList: true, // mudanças nos nós filhos (ex: innerHTML)
            characterData: true, // mudanças no texto (ex: textContent)
            subtree: true // observar profundamente (ex: <span> dentro de <div>)
        });

        // Até aqui
    </script>
</section>
<!-- Stripe JavaScript library -->
<script src="./public/vendor/bootstrap.bundle.min.js"></script>
<script src="./public/vendor/jquery.sparkline.min.js"></script>
<script src="./public/vendor/selectize.min.js"></script>
<script src="./public/js/core.js"></script>
<!-- general JS -->
<!--<script src="../js/process.js"></script>-->
<script src="./public/js/general.js"></script>
<script>
    $(document).ready(function() {
        $('#select-payments').selectize({
            render: {
                option: function(data, escape) {
                    return '<div>' +
                        '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                        '<span class="title">' + escape(data.text) + '</span>' +
                        '</div>';
                },
                item: function(data, escape) {
                    return '<div>' +
                        '<span class="image"><img src="' + data.image + '" alt=""></span>' +
                        escape(data.text) +
                        '</div>';
                }
            }
        });
    });
</script>

<a href="https://api.whatsapp.com/send?phone=#"
    class="float" target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
    <div class="fx-popupwhats" id="msg1">Precisa de ajuda!
        <img src="https://images.emojiterra.com/google/noto-emoji/unicode-15/animated/1f914.gif" width="20px">
    </div>
</a>
<script>
    // Exibe a mensagem após 5 segundos
    setTimeout(function() {
        document.getElementById("msg1").style.visibility = "visible";
    }, 5000);

    // Oculta a mensagem após 10 segundos (5 visível + 5 extra)
    setTimeout(function() {
        document.getElementById("msg1").style.visibility = "hidden";
    }, 10000);
</script>
<script src="./public/js/profile-insta.js"> </script>
<script src="./public/js/checkout-process.js"> </script>
<!--==Footer=============================================-->
<?php require VIEW_PATH . 'partials/footer.php'; ?>