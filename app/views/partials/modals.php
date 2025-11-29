<div class="modal-infor">
    <div class="modal fade" id="notFound">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-triangle-exclamation"></i> Ops tivemos um problema
                    </h4>
                </div>
                <div class="modal-body">
                    <p><strong>Seu perfil não foi encontrado no Instagram, verifique se o nome de usuário está
                            correto.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn round btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal-infor">
    <div class="modal fade" id="postNotFound">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-triangle-exclamation"></i> Ops tivemos um problema
                    </h4>
                </div>
                <div class="modal-body">
                    <p><strong>Sua postagem não foi encontrado no Instagram, verifique se a URL informada está
                            correta.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn round btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-infor">
    <div class="modal fade" id="isPrivate">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-solid fa-triangle-exclamation"></i> Ops tivemos um problema
                    </h4>
                </div>
                <div class="modal-body">
                    <p>Percebemos que o seu perfil se encontra privado, é necessário deixa-lo em modo público para
                        receber seu pedido.</p>
                    <br>
                    <p><strong>Siga o tutorial abaixo para deixar seu perfil público</strong></p>
                    <p><strong>1. No app do Instagram, acesse seu perfil e toque em ☰</strong></p>
                    <p><strong>2. Vá até "Privacidade da conta", e deixe em modo público</strong></p>
                    <p><strong>3. Após isso basta fechar esse aviso, e terminar seu pedido</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class=" btn round btn-primary" data-dismiss="modal">Fechar</button>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="modal-infor">
    <div class="modal fade" id="notification">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><i class="fa-regular fa-circle-question"></i> Tutorial e informações</h4>
                </div>
                <div class="modal-body" style="max-height: 600px; margin-bottom: 10px;">
                    <iframe src="https://www.youtube.com/embed/ZxGV6pBnTE0" title="Tutorial" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        allowfullscreen="" style="
                                width: 100%;
                                height: 500px;
                                border-radius: 10px;
                                "></iframe>
                    <div class="warning-section" bis_skin_checked="1">
                        <h5 style="color: #e91e63; margin-bottom: 12px; font-weight: 600;">Realize seu pedido</h5>
                        <p>Para realizar seu pedido é bem simples, basta preencher os campos solicitados, realizar o
                            pagamento e aguardar enquanto seu pedido é processado e entregue pelo nosso sistema.</p>
                    </div>
                    <div class="info-section" bis_skin_checked="1">
                        <h5 style="color: #45c4a0; margin-bottom: 12px; font-weight: 600;">Privacidade do perfil</h5>
                        <ul class="instruction-list">
                            <li>Antes de realizar o seu envio, confira se o perfil está público e sem nenhum tipo de
                                restrição.</li>
                        </ul>
                    </div>
                    <div class="info-time" bis_skin_checked="1">
                        <h5 style="color: #456ac4; margin-bottom: 12px; font-weight: 600;">Prazos de entrega</h5>
                        <ul class="instruction-list">
                            <li>Após o seu pagamento ter sido efetuado, entre 5 a 10 minutos o serviço contratado deverá
                                começar a ser entregue em sua conta.</li>
                            <br>
                            <li>Caso passe do prazo acima e seu pedido ainda não tenha dado inicio, segue abaixo o
                                contato do suporte para te auxiliar.</li>
                        </ul>
                    </div>
                    <div class="info-contact" bis_skin_checked="1">
                        <h5 style="color: #ffa000; margin-bottom: 12px; font-weight: 600;">Suporte ao cliente</h5>
                        <ul class="instruction-list">
                            <li>Caso tenha tido qualquer tipo de problema, entre em contato com nosso suporte via
                                Whatsapp: +55 34 99256-8696</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn round btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- MODALS DE SUCESSO E ERRO -->

    <!-- Modal Sucesso -->
    <div id="modalSucesso" class="modal-msg-box">
        <div class="modal-conteudo success">
            <div class="icon-modal">✔</div>
            <p id="msgSucesso">A operação foi concluída com êxito.</p>
            <button onclick="fecharModal('modalSucesso')">Ok</button>
        </div>
    </div>

    <!-- Modal Erro -->
    <div id="modalErro" class="modal-msg-box">
        <div class="modal-conteudo error">
            <div class="icon-modal">✖</div>
            <p id="msgErro">Ocorreu um erro. Tente novamente.</p>
            <button onclick="fecharModal('modalErro')">Ok</button>
        </div>
    </div>
    <!-- MODALS DE SUCESSO E ERRO -->


    <div class="modal-infor">
        <div class="modal fade" id="Terms">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fa-regular fa-circle-question"></i>Termos de Uso</h4>
                    </div>
                    <div class="modal-body" style="max-height: 600px;">
                        <h2>1. Aceitação dos Termos</h2>
                        <ul>
                            <li>Ao usar o site ou comprar serviços, você concorda com todos os termos e políticas, mesmo
                                sem tê-los lido.</li>
                            <li>Os termos podem ser alterados sem aviso prévio.</li>
                        </ul>
                        <h2>2. Uso Adequado do Site</h2>
                        <ul>
                            <li>Proibido utilizar o site para fins ilícitos, difamar terceiros, usar perfis sem
                                autorização ou criticar candidatos políticos.</li>
                            <li>Você deve ser proprietário ou ter autorização para o perfil alvo.</li>
                            <li>Violação dos termos pode levar à suspensão ou desativação da conta.</li>
                        </ul>
                        <h2>3. Comportamento no Site</h2>
                        <ul>
                            <li>Reclamações com insultos, ofensas ou discriminação não serão atendidas.</li>
                            <li>Usuários que infringirem essas regras podem ter suas contas suspensas definitivamente.
                            </li>
                        </ul>
                        <h2>4. Sobre os Serviços</h2>
                        <ul>
                            <li>O company oferece serviços de marketing digital em redes sociais.</li>
                            <li>Os preços e disponibilidade dos serviços podem mudar sem aviso.</li>
                            <li>É necessário ser maior de 18 anos e ter autorização para o perfil em questão.</li>
                        </ul>
                        <h2>5. Garantias e Limitações</h2>
                        <ul>
                            <li>Perfis devem estar em modo público para receber os serviços.</li>
                            <li>Não há garantia de permanência dos serviços adquiridos; quedas podem ocorrer.</li>
                            <li>Reposições são oferecidas como cortesia, seguindo regras específicas.</li>
                        </ul>
                        <h2>6. Regras de Reposição</h2>
                        <p>Reposições só serão feitas se:</p>
                        <ul>
                            <li>O serviço não estiver marcado como "Sem Reposição".</li>
                            <li>A queda ocorrer dentro do prazo de reposição.</li>
                            <li>O perfil estiver público e com o mesmo nome do pedido original.</li>
                            <li>A contagem atual estiver entre a inicial e a adquirida.</li>
                        </ul>
                        <p>Reposições não serão feitas fora dessas condições.</p>
                        <h2>7. Entrega dos Serviços</h2>
                        <ul>
                            <li>Após a entrega, os serviços não podem ser removidos do seu perfil.</li>
                            <li>Evite comprar simultaneamente de outros fornecedores para não interferir na contagem.
                            </li>
                            <li>Não é possível cancelar ou estornar pedidos após o pagamento.</li>
                        </ul>
                        <h2>8. Pagamento</h2>
                        <ul>
                            <li>Pagamentos via PayPal incluem taxas de transação.</li>
                            <li>Créditos são adicionados antecipadamente e não expiram.</li>
                            <li>Disputas ou estornos podem resultar em suspensão permanente da conta.</li>
                        </ul>
                        <h2>9. Preços</h2>
                        <ul>
                            <li>Preços podem mudar sem aviso prévio.</li>
                            <li>O tempo de liberação de créditos varia conforme o método de pagamento.</li>
                        </ul>
                        <h2>10. Alterações nos Termos</h2>
                        <ul>
                            <li>Os termos podem ser atualizados ou modificados a qualquer momento.</li>
                            <li>A versão mais recente estará sempre disponível no site.</li>
                        </ul>
                        <h2>11. Cancelamento/Arrependimento</h2>
                        <ul>
                            <li>Não há direito de arrependimento para produtos e serviços digitais.</li>
                            <li>Pagamentos não serão estornados em caso de desistência.</li>
                        </ul>
                        <h2>12. Política de Reembolso</h2>
                        <ul>
                            <li>Reembolsos só serão feitos se os serviços não forem entregues dentro do prazo.</li>
                            <li>Pedidos feitos incorretamente ou duplicados não serão reembolsados.</li>
                            <li>Reclamações públicas podem resultar na divulgação de informações para comprovação.</li>
                        </ul>
                        <h2>13. Legislação Aplicável</h2>
                        <ul>
                            <li>Os termos são regidos pelas leis do Brasil.</li>
                            <li>Disputas serão resolvidas nos tribunais brasileiros competentes.</li>
                        </ul>
                        <hr>
                        <h2>Política de Privacidade</h2>
                        <ul>
                            <li><strong>Uso de Informações:</strong> Suas informações pessoais são usadas apenas para
                                processar pedidos e não são vendidas ou compartilhadas.</li>
                            <li><strong>Segurança:</strong> Dados pessoais são criptografados e armazenados em
                                servidores seguros.</li>
                        </ul>
                        <hr>
                        <h2>Serviços</h2>
                        <ol>
                            <li>A Agência do Influencer aumenta números em redes sociais.</li>
                            <li>Não garante interação dos novos seguidores.</li>
                            <li>Não se responsabiliza por danos às suas redes sociais.</li>
                            <li>Não garante que todos os perfis tenham foto, biografia ou sejam ativos.</li>
                            <li>Uso dos serviços é por sua conta e risco; algumas redes sociais podem desaprovar.</li>
                            <li>Reposições não são garantidas após o prazo estipulado.</li>
                            <li>Prazos de entrega são estimativas; atrasos não geram direito a reembolso.</li>
                        </ol>
                        <hr>
                        <h2>Política de Reembolso (Atualizada em 08/04/2023)</h2>
                        <ul>
                            <li>Saldo adicionado não pode ser retirado; adicione apenas o necessário.</li>
                            <li>Não há reembolso para o método de pagamento original após a conclusão do depósito.</li>
                            <li>Ao pagar, você concorda em não abrir disputas ou estornos.</li>
                            <li>Pedidos não serão reembolsados ou cancelados após feitos.</li>
                            <li>Não use múltiplos servidores para o mesmo perfil simultaneamente.</li>
                            <li>Não há reembolso por escolha errada de serviço após o início do pedido.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn round btn-primary" data-dismiss="modal">Fechar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>