# Agência do Influencer

**Agência do Influencer** é um ecommerce focado na venda de serviços digitais para redes sociais, como seguidores, curtidas e visualizações.  
O sistema oferece uma experiência simples e rápida, desde a escolha do serviço até a confirmação do pagamento.

⚠️ **Status do Projeto:** Em desenvolvimento.  
- A etapa final de integração com a API do fornecedor (**Crescitaly**) ainda está sendo implementada.  
- O cliente está no processo de escolha e definição dos **códigos de serviços**, necessários para entrega automatizada.  

---

## 🚀 Funcionalidades

- Catálogo de serviços (seguidores, curtidas e views).  
- Checkout com opção de ajustar a quantidade desejada.  
- Geração de cobrança via **Open Pix** com **QR Code** válido por **15 minutos**.  
- Envio de **e-mail de confirmação** do pagamento.  
- Atualização automática do **status do serviço** após retorno do fornecedor (⚠️ **em implementação**).  

---

## 🛠️ Tecnologias Utilizadas

- **PHP** – Backend do sistema.  
- **JavaScript** – Lógica de interação no frontend.  
- **jQuery** – Manipulação do DOM e requisições dinâmicas.  
- **Ajax** – Comunicação assíncrona entre frontend e backend.  

---

## 📚 Bibliotecas

- [**PHPMailer**](https://github.com/PHPMailer/PHPMailer) – Envio de e-mails transacionais.  

---

## 🌐 Integrações e APIs

- [**Open Pix**](https://openpix.com.br/) – Geração de QR Code e gerenciamento de pagamentos via Pix.  
- [**Crescitaly API**](https://crescitaly.com/api) – Fornecedor responsável pela entrega dos pedidos.  
  - ⚠️ **Integração em andamento**: definição dos códigos de serviços e implementação da entrega automatizada.  

---

## 🔄 Fluxo de Funcionamento

1. O cliente escolhe o serviço desejado no ecommerce.  
2. Na tela de checkout, pode ajustar a quantidade.  
3. O sistema gera a cobrança no **Open Pix** e exibe o QR Code (com tempo limite de 15 minutos).  
4. Após o pagamento:  
   - O cliente recebe um **e-mail de confirmação**.  
   - O sistema enviará os dados do pedido para a **Crescitaly API** (⚠️ **em desenvolvimento**).  
   - O status do pedido será atualizado conforme retorno do fornecedor.  

---

## 📧 Notificações

- **E-mail de Confirmação**: enviado via PHPMailer após confirmação do pagamento.  
- **Status do Pedido**: (⚠️ **será integrado**) atualizado automaticamente após resposta da Crescitaly API.  

---

## ⚙️ Requisitos de Ambiente

- PHP >= 7.4  
- Servidor Web (Apache/Nginx)  
- Composer (para dependências do PHPMailer)  
- MySQL ou outro banco de dados relacional  

---

## 📦 Instalação

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/agencia-influencer.git
