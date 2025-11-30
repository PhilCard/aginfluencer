<?php

    require __DIR__ . '/../../inc/database.php';
    
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
        $dados = mysqli_fetch_all($result, MYSQLI_ASSOC);

        if (empty($dados)) {
            return ["error" => "Ops! não foi possível listar nenhum serviço!"];
        }

        return $dados;
    }


    function cardToastColor($qtde, $tipoServico) {

        $color_laranja = $qtde === '1.000' &&  $tipoServico === 'seguidores' || $qtde === '1.000' &&  $tipoServico === 'curtidas' ||  $qtde === '10.000' &&  $tipoServico === 'visualizações' ? ' toast-light-orange' : '';

        $color_gradiente =  $qtde === '10.000' &&  $tipoServico === 'seguidores' || $qtde === '10.000' &&  $tipoServico === 'curtidas' || $qtde === '100.000' &&  $tipoServico === 'visualizações' ? ' toast-light-gradient' : '';

        $color_cinza = $qtde === '80' || $qtde === '100' || $qtde === '1.000' && $tipoServico === 'visualizações' ? ' toast-light-gray' : '';

        if($color_laranja) {
            return $color_laranja;
        }

        if($color_gradiente) {
            return $color_gradiente;
        }

        if($color_cinza) {
            return $color_cinza;
        }
    }

    function cardToastText($qtde, $tipoServico, $descont) {

        $mais_vendido = $qtde === '1.000' &&  $tipoServico === 'seguidores' || $qtde === '1.000' &&  $tipoServico === 'curtidas' || $qtde === '10.000' &&  $tipoServico === 'visualizações' ? 'Mais Vendido 🎯' : '';

        $custo_beneficio = $qtde === '10.000' &&  $tipoServico === 'seguidores' || $qtde === '10.000' &&  $tipoServico === 'curtidas' || $qtde === '100.000' &&  $tipoServico === 'visualizações' ? '+ Custo / Benefício 🏆' : '';

        if($mais_vendido) {
            return $mais_vendido;
        }

        if($custo_beneficio) {
            return $custo_beneficio;
        }

        if($descont !== '0') 
        {
            return $descont. '%' . ' de Desconto';
        }
        else 
        {
            return 'Pacote Básico ✅';
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
    }

?>