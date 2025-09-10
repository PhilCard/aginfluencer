<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Página em Manutenção</title>
    <style>
        :root {
            --bg: hsl(0, 0%, 90%);
            --card: #ffffff;
            --accent: #7c3aed;
            /* roxo */
            --muted: #555;
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, "Segoe UI", Roboto, "Helvetica Neue", Arial;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0
        }

        html,
        body {
            height: 100%
        }

        body {
            background: var(--bg);
            color: #222;
            display: grid;
            place-items: center;
            padding: 32px;
        }

        .card {
            margin : 30px 30px 30px 30px;
            max-width: 600px;
            background: var(--card);
            border-radius: 18px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.08);
            padding: 40px 28px;
            text-align: center;
        }

        h1 {
            font-size: 28px;
            margin-bottom: 12px;
            color: var(--accent);
        }

        p {
            font-size: 16px;
            color: var(--muted);
        }

        .illustration {
            margin: 30px auto 10px;
            width: 100px;
        }

        .illustration svg {
            width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            animation: spin 8s linear infinite;
            transform-origin: 50% 50%;
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }
    </style>
    <?php require_once 'header.php'; ?>
</head>

<body>
    <main class="card" role="main" aria-labelledby="titulo">
        <div class="illustration">
            <!-- Ícone de engrenagem centralizada com rotação -->
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="var(--accent)" aria-hidden="true">
                <path
                    d="M19.43 12.98c.04-.32.07-.65.07-.98s-.03-.66-.07-.98l2.11-1.65a.5.5 0 0 0 .12-.66l-2-3.46a.5.5 0 0 0-.61-.22l-2.49 1a7.025 7.025 0 0 0-1.69-.98l-.38-2.65A.488.488 0 0 0 14 2h-4c-.25 0-.46.18-.49.42l-.38 2.65c-.63.24-1.2.56-1.69.98l-2.49-1a.5.5 0 0 0-.61.22l-2 3.46c-.14.23-.09.54.12.66l2.11 1.65c-.04.32-.07.65-.07.98s.03.66.07.98L2.46 14.63a.5.5 0 0 0-.12.66l2 3.46c.14.23.42.3.61.22l2.49-1c.49.42 1.06.75 1.69.98l.38 2.65c.03.24.24.42.49.42h4c.25 0 .46-.18.49-.42l.38-2.65c.63-.24 1.2-.56 1.69-.98l2.49 1c.19.08.47.01.61-.22l2-3.46a.5.5 0 0 0-.12-.66l-2.11-1.65zM12 15.5c-1.93 0-3.5-1.57-3.5-3.5s1.57-3.5 3.5-3.5c1.93 0 3.5 1.57 3.5 3.5s-1.57 3.5-3.5 3.5z" />
            </svg>
        </div>

        <h1 id="titulo">Página em Manutenção</h1>
        <p>Estamos realizando melhorias nessa página.<br>Voltaremos em breve para oferecer a melhor experiência de compra.</p>
    </main>
    <?php require_once 'footer.php'; ?>
</body>

</html>