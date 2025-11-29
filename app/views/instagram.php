<?php require VIEW_PATH . 'partials/header.php'; ?>
    <?php require_once './app/models/ExibePlanos.php'; ?>
    <title> Agência do Influencer - Aumente o seu Engajamento | Engajamento Real e Barato | Menor preço </title>
    <link rel="stylesheet" type="text/css" href="<?= asset('css/style_app.css')?>">
    <link rel="stylesheet" type="text/css" href="<?= asset('css/estilo_principal.css')?>">
    <!--==Fav-icon===============================-->
    <link rel="shortcut icon" type="image/x-icon" href="<?=asset('images/favicon ag influencer.png')?>">
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
    <?php require VIEW_PATH . 'partials/search_banner.php'; ?>
    <!--==category=========================================-->
    <!-- Título da Categoria -->
    <section class="category" id="cate-36">
        <div class="category-heading">
            <div class="">
                <h2 class="">Seguidores</h2>
                <br>
                <p>Destaque-se com <strong>seguidores 100% ativos</strong> e impulsione seu perfil com mais
                    <strong>autoridade</strong> e <strong>engajamento</strong> real.
                </p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <!-- Busca pacote, tipo servico e plano -->
            <?php $seguidores_basico = buscarPacotes($conn, "seguidores", "instagram", "básico");?>

            <?php foreach ($seguidores_basico as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'seguidores'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'seguidores',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="checkout" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-39">
        <div class="category-heading">
            <div class="">
                <h2 class="">Seguidores</h2>
                <br>
                <p>Destaque-se com <strong>seguidores 100% orgânicos</strong> e impulsione seu perfil com mais
                    <strong>autoridade</strong> e <strong>engajamento</strong> real.
                </p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $seguidores_balanceado = buscarPacotes($conn, "seguidores", "instagram", "balanceado");?>

            <?php foreach ($seguidores_balanceado as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'seguidores'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'seguidores',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-42">
        <div class="category-heading">
            <div class="">
                <h2 class="">Seguidores</h2>
                <br>
                <p>Destaque-se com <strong>seguidores 100% brasileiros </strong>e impulsione seu perfil com mais
                    <strong>autoridade</strong> e <strong>engajamento</strong> real.
                </p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $seguidores_premium = buscarPacotes($conn, "seguidores", "instagram", "premium");?>

            <?php foreach ($seguidores_premium as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'seguidores'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'seguidores',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-37">
        <div class="category-heading">
            <div class="">
                <h2 class="">Curtidas</h2>
                <br>
                <p>Dê <strong>visibilidade</strong> aos seus posts com <strong>curtidas reais</strong> e fortaleça
                    sua presença no Instagram.</p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <?php $curtidas_basico = buscarPacotes($conn, "curtidas", "instagram", "básico");?>

            <?php foreach ($curtidas_basico as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'curtidas'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'curtidas',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-40">
        <div class="category-heading">
            <div class="">
                <h2 class="">Curtidas</h2>
                <br>
                <p>Dê <strong>visibilidade</strong> aos seus posts com <strong>curtidas ativas</strong> e fortaleça
                    sua presença no Instagram.</p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $curtidas_balanceado = buscarPacotes($conn, "curtidas", "instagram", "balanceado");?>

            <?php foreach ($curtidas_balanceado as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'curtidas'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'curtidas',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-43">
        <div class="category-heading">
            <div class="">
                <h2 class="">Curtidas</h2>
                <br>
                <p>Dê <strong>visibilidade</strong> aos seus posts com <strong>curtidas brasileiras</strong> e
                    fortaleça sua presença no Instagram.</p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $curtidas_premium = buscarPacotes($conn, "curtidas", "instagram", "premium");?>

            <?php foreach ($curtidas_premium as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'curtidas'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'curtidas',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-38">
        <div class="category-heading">
            <div class="">
                <h2 class="">Visualizações</h2>
                <br>
                <p>Aumente o alcance e a <strong>credibilidade</strong> dos seus vídeos com mais
                    <strong>visualizações.</strong>
                </p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->

            <!-- Busca pacote, tipo servico e plano -->
            <?php $views_basico = buscarPacotes($conn, "visualizações", "instagram", "básico");?>

            <?php foreach ($views_basico as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'visualizações'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'visualizações',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-41">
        <div class="category-heading">
            <div class="">
                <h2 class="">Visualizações</h2>
                <br>
                <p>Aumente o alcance e a <strong>credibilidade</strong> dos seus vídeos com <strong>visualizações
                        reais.</strong></p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $views_balanceado = buscarPacotes($conn, "visualizações", "instagram", "balanceado");?>

            <?php foreach ($views_balanceado as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'visualizações'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'visualizações',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>
    <!-- Título da Categoria -->
    <section class="category" id="cate-44">
        <div class="category-heading">
            <div class="">
                <h2 class="">Visualizações</h2>
                <br>
                <p>Aumente o alcance e a <strong>credibilidade</strong> dos seus vídeos com <strong>visualizações
                        reais e nacionais</strong>.</p>
            </div>
            <div class="temp">
                <span>
                    <img src="<?= asset('images/1f6a8.gif')?>" style="width: 50px; height: 50px;">
                    <span class="time-promo">00:12:41</span>
                </span>
            </div>
        </div>
        <div class="category-container">
            <!-- Caixa de Serviço -->
            <?php $views_premium = buscarPacotes($conn, "visualizações", "instagram", "premium");?>

            <?php foreach ($views_premium as $pacote): ?>

            <form class="category-box 
                            card-toast 
                            <?= cardToastColor(
                                htmlspecialchars($pacote['quantidade'], ENT_QUOTES, 'UTF-8'),
                                'visualizações'
                                );
                            ?>" data-card-toast-text="
                                <?= cardToastText(
                                    htmlspecialchars($pacote['quantidade'] ,ENT_QUOTES, 'UTF-8'),
                                    'visualizações',
                                    htmlspecialchars($pacote['desconto_pacote'])
                                    );
                                ?>
                            " action="../checkout/" method="POST">
                <!-- gera token id_pacote -->
                <input type="hidden" name="id_pacote"
                    value="<?= htmlspecialchars($pacote['id_pacote'],ENT_QUOTES,'UTF-8')?>" />

                <input type="hidden" data-id="followers" name="tipo_servicos"
                    value="<?= htmlspecialchars($pacote['tipo_servicos'] ,ENT_QUOTES,'UTF-8');?>" />

                <input type="hidden" data-id="instagram" name="rede_social"
                    value="<?= htmlspecialchars($pacote['rede_social'],ENT_QUOTES,'UTF-8'); ?>" />

                <input type="hidden" name="tipo_plano"
                    value="<?= htmlspecialchars( $pacote['tipo_plano'] ,ENT_QUOTES,'UTF-8'); ?>" />

                <button type="submit">
                    <h1>
                        <?= htmlspecialchars($pacote['quantidade']) ?>
                    </h1>
                    <p>
                        <?= htmlspecialchars(ucfirst($pacote['tipo_servicos']))?>
                    </p>

                    <div class="price-stack">
                        <div class="price-now">R$
                            <?= htmlspecialchars(number_format($pacote['preco'], 2, ',', '.') )?>
                        </div>

                        <div class="price-old">
                            <?= calculaDesconto(
                                            htmlspecialchars($pacote['preco']), 
                                            htmlspecialchars($pacote['desconto_pacote']) 
                                                );
                                            ?>
                        </div>
                    </div>

                    <div style="font-size: 9px;color: #000000a1;margin-bottom: -10px;">Compra garantida</div>
                </button>
            </form>
            <?php endforeach; ?>
            <?php mysqli_close($conn); ?>
            <!-- Caixa de Serviço -->
        </div>
        <?php require VIEW_PATH . 'partials/pill_container.php'; ?>
    </section>

    <!--==Clients===============================================-->
    <section class="categoryy" style="
                    display: flex;
                    align-items: center;
                    background: transparent;
                    margin-bottom: 140px;
                    ">
        <!--heading---------------->
        <div class="client-heading">
            <h3>Dúvidas frequentes
            </h3>
        </div>
        <!--box-container---------->
        <div class="tabs">
            <div class="tab">
                <input type="checkbox" id="chck0">
                <label class="tab-label" for="chck0">
                    Qual o prazo de entrega dos seguidores </label>
                <div class="tab-content">
                    Geralmente a entrega inicia no mesmo instante após o pagamento ser aprovado.
                </div>
            </div>
            <div class="tab">
                <input type="checkbox" id="chck1">
                <label class="tab-label" for="chck1">
                    Os seguidores são reais? </label>
                <div class="tab-content">
                    Sim todos os seguidores são reais e Brasileiros.
                </div>
            </div>
            <div class="tab">
                <input type="checkbox" id="chck2">
                <label class="tab-label" for="chck2">
                    Tem garantia? </label>
                <div class="tab-content">
                    Sim todos os nossos serviços tem total garantia de entrega ou dinheiro de volta.
                </div>
            </div>
            <div class="tab">
                <input type="checkbox" id="chck3">
                <label class="tab-label" for="chck3">
                    Se o perfil estiver privado é possível receber o serviços? </label>
                <div class="tab-content">
                    Não é possível entregar os seguidores com perfil privado
                </div>
            </div>
        </div>
    </section>
    <!--client-section-end---------->
    <!--==Footer=============================================-->
</main>
<script src="./public/js/filtra-categorias.js"></script>
<!--==Footer=============================================-->
<?php require VIEW_PATH . 'partials/footer.php'; ?>