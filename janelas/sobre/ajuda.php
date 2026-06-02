<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
  <title>Ajuda - Casas Brasilite</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/Casas-Brasilite/style.css">
  <link rel="stylesheet" href="css/header.css">
  <link rel="stylesheet" href="css/ajuda.css">
</head>

<body>

  <?php require_once "../../partials/header-sobre.php" ?>

  <div class="container">

    <section class="hero-ajuda">
      <div class="hero-text">
        <h1>Central de ajuda</h1>
        <p>Encontre respostas rápidas para as dúvidas mais comuns ou navegue pelos temas abaixo.</p>
      </div>
      <div class="hero-img">
        <img src="https://images.unsplash.com/photo-1504307651254-35680f356dfd?q=80&w=1200&auto=format&fit=crop" alt="">
      </div>
    </section>

    <section class="faq">
      <div class="faq-title">
        <h2>Perguntas frequentes</h2>
        <div class="line"></div>
      </div>
      <div class="faq-card">
        <div class="faq-left">
          <div class="faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="8" cy="21" r="1" />
              <circle cx="19" cy="21" r="1" />
              <path d="M2.05 2.05h2l2.66 12.42a2 2 0 0 0 2 1.58h9.78a2 2 0 0 0 1.95-1.57l1.65-7.43H5.12" />
            </svg>
          </div>
          <div class="faq-text">
            <h3>1. Como comprar</h3>
            <p>Veja o passo a passo para realizar suas compras na Casas Brasilite.</p>
          </div>
        </div>
        <details class="painel-faq">
          <summary class="arrow"></summary>
          <div class="painel-conteudo">
            <p>Para comprar na Casas Brasilite, escolha os produtos desejados, adicione ao carrinho, informe seu endereço e finalize escolhendo a forma de pagamento.</p>
          </div>
        </details>
      </div>
      <div class="faq-card">
        <div class="faq-left">
          <div class="faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="14" x="2" y="5" rx="2" />
              <line x1="2" x2="22" y1="10" y2="10" />
            </svg>
          </div>
          <div class="faq-text">
            <h3>2. Formas de pagamento</h3>
            <p>Aceitamos PIX, boleto bancário, cartão de crédito e débito. As opções disponíveis aparecem ao finalizar sua compra.</p>
          </div>
        </div>
        <details class="painel-faq">
          <summary class="arrow"></summary>
          <div class="painel-conteudo">
            <p>Aceitamos PIX, boleto bancário, cartão de crédito e débito. As opções disponíveis aparecem ao finalizar sua compra.</p>
          </div>
        </details>
      </div>
      <div class="faq-card">
        <div class="faq-left">
          <div class="faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M14 18H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h8" />
              <path d="M14 6h4l4 4v6a2 2 0 0 1-2 2h-2" />
              <circle cx="7" cy="18" r="2" />
              <circle cx="17" cy="18" r="2" />
            </svg>
          </div>
          <div class="faq-text">
            <h3>3. Frete</h3>
            <p>Saiba como funciona o cálculo do frete e as condições de entrega.</p>
          </div>
        </div>
        <details class="painel-faq">
          <summary class="arrow"></summary>
          <div class="painel-conteudo">
            <p>O valor do frete é calculado automaticamente de acordo com o CEP, quantidade de itens e local de entrega informado no pedido.</p>
          </div>
        </details>
      </div>
      <div class="faq-card">
        <div class="faq-left">
          <div class="faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <polyline points="12 6 12 12 16 14" />
            </svg>
          </div>
          <div class="faq-text">
            <h3>4. Prazo de entrega</h3>
            <p>Confira os prazos de entrega e fatores que podem influenciar.</p>
          </div>
        </div>
        <details class="painel-faq">
          <summary class="arrow"></summary>
          <div class="painel-conteudo">
            <p>O prazo de entrega varia conforme a sua região e disponibilidade dos produtos. Você pode consultar a previsão antes de concluir a compra.</p>
          </div>
        </details>
      </div>
      <div class="faq-card">
        <div class="faq-left">
          <div class="faq-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <circle cx="12" cy="12" r="10" />
              <path d="m15 9-6 6" />
              <path d="m9 9 6 6" />
            </svg>
          </div>
          <div class="faq-text">
            <h3>5. Cancelamento</h3>
            <p>Entenda como solicitar o cancelamento do seu pedido.</p>
          </div>
        </div>
        <details class="painel-faq">
          <summary class="arrow"></summary>
          <div class="painel-conteudo">
            <p>Caso precise cancelar seu pedido, entre em contato com nossa equipe de atendimento informando o número do pedido para receber suporte.</p>
          </div>
        </details>
      </div>
    </section>

    <section class="info-grid">
      <div class="info-box">
        <div class="info-top">
          <div class="info-top-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z" />
              <polyline points="3.29 7 12 12 20.71 7" />
              <line x1="12" x2="12" y1="22" y2="12" />
            </svg>
          </div>
          <h3>Orçamento</h3>
        </div>
        <div class="info-item">
          <strong>Entrega</strong>
          <p>Entregamos para todo o Brasil.</p>
        </div>
        <div class="info-item">
          <strong>Valores</strong>
          <p>valores variam conforme a região o produto e a quantidade.</p>
        </div>
      <button ><a href = "https://google.com">Fale conosco sobre orçamentos.</a></button>
      </div>
      <div class="info-box">
        <div class="info-top">
          <div class="info-top-icon">
            <svg></svg>
          </div>
          <h3> </h3>
        </div>
        <div class="info-item">
       <strong>Regras de Proteção</strong>
          <p>Veja as condições para identificar e evitar fraudes.</p>
        </div>
        <div class="info-item">
          <strong>Análise de Risco</strong>
          <p>Entenda como os golpistas agem.</p>
        </div>
        <button class="btn"><a href = "https://google.com">Ver como evitar golpes.</a></button>
    </div>
      <div class="info-box orange">
        <div class="info-top">
          <div class="info-top-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
              <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
            </svg>
          </div>
          <h3>Trabalhe conosco</h3>
        </div>
        <div class="info-item">
          <strong>Vagas abertas</strong>
          <p>Confira nossas oportunidades atuais.</p>
        </div>
        <div class="info-item">
          <strong>Envie seu currículo</strong>
          <p>Cadastre seu currículo em nosso banco de talentos.</p>
        </div>
        <button><a href = "https://google.com">Ver vagas disponíveis</a></button>
      </div>
    </section>

    <section class="cta-ajuda">
      <div class="cta-left">
        <div class="cta-icon">
          <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M3 14h3a2 2 0 0 1 2 2v3a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-7a9 9 0 0 1 18 0v7a2 2 0 0 1-2 2h-1a2 2 0 0 1-2-2v-3a2 2 0 0 1 2-2h3" />
          </svg>
        </div>
        <div class="cta-text">
          <h3>Ainda precisa de ajuda?</h3>
          <p>Nossa equipe está pronta para te atender pelos nossos canais de atendimento.</p>
        </div>
      </div>
      <button>Falar com a equipe</button>
    </section>

  </div>

  <?php require_once "../../partials/footer-sobre.php" ?>

</body>

</html>