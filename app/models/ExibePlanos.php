<?php

    require __DIR__ . '/../../config/database.php';
    
    function buscarPacotes($conn, $tipoServico, $redeSocial, $tipoPlano) {
        $sql = "
            SELECT 
                pf.id_pacote,
                q.quantidade,
                s.tipo_servicos,
                p.tipo_plano,
                rs.rede_social,
                pf.preco,
                d.desconto_pacote
            FROM pacote_final pf
            INNER JOIN quantidade q 
                ON pf.id_quantidade = q.id_quantidade
            INNER JOIN servicos s 
                ON pf.id_servico = s.id_servico
            INNER JOIN planos p 
                ON pf.id_plano = p.id_plano
            INNER JOIN redes_sociais rs 
                ON pf.id_rede_social = rs.id_rede_social
            INNER JOIN descontos d
                ON pf.id_desconto = d.id_desconto
            WHERE s.tipo_servicos = ? 
            AND rs.rede_social = ?
            AND p.tipo_plano = ?
            ORDER BY pf.preco ASC
        ";

        $stmt = mysqli_prepare($conn, $sql);

        mysqli_stmt_bind_param($stmt, "sss", $tipoServico, $redeSocial, $tipoPlano);

        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    function cardToastColor($qtde, $tipoServico) {

        if
        (
            $qtde === '1.000' &&  $tipoServico === 'seguidores' || 
            $qtde === '1.000' &&  $tipoServico === 'curtidas' || 
            $qtde === '10.000' &&  $tipoServico === 'visualizações'
        ) 
        {
            return ' toast-light-orange';
        }
        elseif
        (
            $qtde === '10.000' &&  $tipoServico === 'seguidores' || 
            $qtde === '10.000' &&  $tipoServico === 'curtidas' || 
            $qtde === '100.000' &&  $tipoServico === 'visualizações'
        )
        {
            return ' toast-light-gradient';
        }

        if($qtde === '80' || $qtde === '100' || $qtde === '1.000' && $tipoServico === 'visualizações') 
        {
            return ' toast-light-gray';
        }

        else
        {
            return;
        }

    }

    function cardToastText($qtde, $tipoServico, $descont) {

        if
        (
            $qtde === '1.000' &&  $tipoServico === 'seguidores' || 
            $qtde === '1.000' &&  $tipoServico === 'curtidas' || 
            $qtde === '10.000' &&  $tipoServico === 'visualizações'
        ) 
        {
            return 'Mais Vendido 🎯';
        }
        elseif
        (
            $qtde === '10.000' &&  $tipoServico === 'seguidores' || 
            $qtde === '10.000' &&  $tipoServico === 'curtidas' || 
            $qtde === '100.000' &&  $tipoServico === 'visualizações'
        )
        {
            return '+ Custo / Benefício 🏆';
        }

        if($descont === '0')
        {
            return 'Pacote Básico ✅';
        }
        else
        {
            return $descont. '%' . ' de Desconto';
        }
    }


    function calculaDesconto($preco, $descont) {

        if($descont > 0) 
        {
            $descont = intval($descont) / 100;
            $descont = $preco * $descont; 
            $result = $preco + $descont;
            return number_format($result, 2, ',', '.');
        }
        else
        {
            return;
        }
    }

?>