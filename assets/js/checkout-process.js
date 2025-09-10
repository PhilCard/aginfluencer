//
async function geraPagamento(formData) {
    try {
        const data = await $.ajax({
            url: '../action/gera_qrcode.php',
            type: "POST",
            dataType: "json",
            data: formData
        });
        return data;
    }
    catch (err) {
       mostrarErro(err + ' | OPS! Ocorreu um erro ao gerar a cobrança. Entre em contato com o suporte');
    }
}


$("#pagamento_checkout").on("click", async function (e) {

    let qtde = $('#quantity').text().trim();
    let preco = $('#price').text().trim();
    $('#quantidade').val(qtde);
    $('#preco_final').val(preco);

    const formData = {
        link_post: $('#user_insta').val(),
        rede_social: $('#redes_sociais').val(),
        tipo_servico: $('#tipo_servico').val(),
        tipo_plano: $('#plano_pacote').val(),
        quantidade: $('#quantidade').val(),
        preco_final: $('#preco_final').val(),
        email: $('#email').val(),
        whats: $('#whats').val()
    };

    if
    (
        $("#user_insta").val().trim() === '' ||
        $('#email').val().trim() === '' ||
        $("#whats").val().trim() === ''
    ) 
    {
        return;
    }

    try {
        e.preventDefault();
        $(".loader").show();
        $('.form-fieldset').hide();
        $('.slider-container').hide();
        $('.btn-primary').hide();
        $('.qrcode-generator').show();

        const data = await geraPagamento(formData);

        if (data.charge && data.charge.qrCodeImage) {
            $('#qr_openpix').attr('src', data.charge.qrCodeImage);
        }

        if (data.brCode) {
            $('#pixPaymentCode').text(data.brCode);
        }

        if (data.charge.value) {
            const valorFormatado = (data.charge.value / 100).toLocaleString('pt-BR', {
                style: 'currency',
                currency: 'BRL'
            });
            $('#valor-pix').text(valorFormatado).show();
        }

        if (data.correlationID) {
            $("#correlation_id").val(data.correlationID);
        }

        $("#pagamento_checkout").hide();
        $(".loader").hide();

        const resultado = await validaPagamento(data.correlationID);

        if (resultado.includes("aprovado")) {
            mostrarSucesso('O pagamento foi concluído com sucesso. Verifique seu email para acompanhar o status de entrega do serviço escolhido');
            //await liberaServico(data.charge.correlationID);
        }
        else if(resultado.includes("Erro")) 
        {
            mostrarErro('OPS! Ocorreu um erro ao validar o pagamento. Entre em contato com o suporte');
        }
        else
        {
            alert('o tempo de cobrança expirou, você será redirecionado a página inicial'); //testar 
            //tentar por setimeout
            window.location.href = '../';
        }

    }
    catch (err) {
        mostrarErro(err +' | OPS! Ocorreu um erro. Entre em contato com o suporte');
        //console.error(err);
        $(".loader").hide();
    }
});

//valida status pagamento

function validaPagamento(correlationID) {
    return new Promise((resolve, reject) => {
        const tempo_total = 15 * 60 * 1000;
        const intervalo = 1000;
        const inicio = Date.now();

        function verificaStatus() {
            const tempo_passado = Date.now() - inicio;

            if (tempo_passado >= tempo_total) {
                resolve("⏰ Tempo expirado");
                return;
            }

            //console.log("Aguardando pagamento...");

            $.ajax({
                url: '../action/process_pag.php',
                type: "GET",
                dataType: "json",
                data: { pagamento: 'status', correlationid: correlationID },
                success: function (resp) {
                    if (resp.charge.status === "COMPLETED") {
                        resolve("Pagamento aprovado!");
                    }
                    else 
                    {
                        setTimeout(verificaStatus, intervalo);
                    }

                },
                error: function () {
                    reject("Erro ao verificar status");
                }
            });
        }

        verificaStatus();
    });
}


//liberação do servico escolhido
/*
async function liberaServico(correlationID) {
    try {
        const resp = await $.ajax({
            url: '../action/libera_servico.php',
            type: "POST",
            dataType: "json",
            data: { id: correlationID }
        });
        console.log("✅ Serviço liberado:", resp);
    } catch (err) {
        console.error("Erro ao liberar serviço:", err);
    }
}
*/

function mostrarSucesso(mensagem = 'A operação foi concluída com êxito.') {
    document.getElementById("msgSucesso").textContent = mensagem;
    document.getElementById("modalSucesso").style.display = "flex";
}

function mostrarErro(mensagem = 'Ocorreu um erro. Tente novamente.') {
    document.getElementById("msgErro").textContent = mensagem;
    document.getElementById("modalErro").style.display = "flex";
}

function fecharModal(id) {
    document.getElementById(id).style.display = "none";
    window.location.href = '../';
}