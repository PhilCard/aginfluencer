<?php

    function getPacoteId($conn, $id_pacote)
    {
        $sql = "SELECT 
                        rs.rede_social,
                        s.tipo_servicos,
                        p.tipo_plano
                    FROM pacote_final pf
                    INNER JOIN redes_sociais rs ON pf.id_rede_social = rs.id_rede_social
                    INNER JOIN servicos s ON pf.id_servico = s.id_servico
                    INNER JOIN planos p ON pf.id_plano = p.id_plano
                    WHERE pf.id_pacote = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) 
        {
            mysqli_stmt_bind_param($stmt, "i", $id_pacote);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            $pacote = mysqli_fetch_assoc($result);
            mysqli_stmt_close($stmt);
            return $pacote;
        } 
        else 
        {
            die("Erro na query de critérios: " . mysqli_error($conn));
        }
    }

    function getPacoteRelacionado($conn, $rede_social, $tipo_servico, $tipo_plano)
    {
        $sql = "SELECT 
                        pf.id_pacote AS item_ids,
                        d.desconto_pacote AS discount,
                        q.quantidade AS quantity,
                        pf.preco AS price
                    FROM pacote_final pf
                    INNER JOIN redes_sociais rs ON pf.id_rede_social = rs.id_rede_social
                    INNER JOIN servicos s ON pf.id_servico = s.id_servico
                    INNER JOIN planos p ON pf.id_plano = p.id_plano
                    INNER JOIN quantidade q ON pf.id_quantidade = q.id_quantidade
                    LEFT JOIN descontos d ON pf.id_desconto = d.id_desconto
                    WHERE rs.rede_social = ?
                    AND s.tipo_servicos = ?
                    AND p.tipo_plano = ?
            ";

        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) 
        {
            mysqli_stmt_bind_param($stmt, "sss", $rede_social, $tipo_servico, $tipo_plano);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            $pacotes = [];
            while ($row = mysqli_fetch_assoc($result)) {

                $row['item_ids'] = $row['item_ids'];

                $row['quantity'] = (int) str_replace('.', '', $row['quantity']);

                $row['quantity_formatted'] = number_format($row['quantity'], 0, '', '.');
                
                $row['price'] = number_format((float)$row['price'], 4, '.', '');

                $pacotes[] = $row;
            }
            mysqli_stmt_close($stmt);

            usort($pacotes, function ($a, $b) {
                return $a['quantity'] <=> $b['quantity'];
            });

            return $pacotes;
        } 
        else 
        {
            die("Erro na query de pacotes: " . mysqli_error($conn));
        }
    }

?>
