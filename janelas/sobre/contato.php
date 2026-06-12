<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="/Casas-Brasilite/imagens/icon.png" type="image/x-icon">
    <title>Contato - Casas Brasilite</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/Casas-Brasilite/style.css">
    <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="css/contato.css">
    <link rel="stylesheet" href="\Casas-Brasilite\partials-css\footer.css">
</head>

<body>

    <?php require_once "../../partials/header-sobre.php" ?>

    <main class="container">

        <section class="atendimento-section">
            <div class="section-title">
                <h2>Nossos canais de atendimento</h2>
                <div class="linha-destaque"></div>
            </div>

            <div class="cards-grid">
                <div class="card">
                    <div class="icon-circle icon-orange">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="white">
                            <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z" />
                        </svg>
                    </div>
                    <div class="card-info">
                        <h3>Telefone</h3>
                        <p class="destaque">(11) 3456-7890</p>
                        <p class="subtexto">Fale com nossa equipe</p>
                    </div>
                </div>

                <div class="card">
                    <div class="icon-circle icon-orange">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="white">
                            <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z" />
                        </svg>
                    </div>
                    <div class="card-info">
                        <h3>E-mail</h3>
                        <p class="destaque">contato@casasbrasilite.com.br</p>
                        <p class="subtexto">Respondemos em breve</p>
                    </div>
                </div>

                <div class="card">
                    <div class="icon-circle icon-green">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="white">
                            <path d="M20.52 3.48A11.96 11.96 0 0012 0C5.38 0 0 5.38 0 12c0 2.12.55 4.16 1.6 5.96L0 24l6.19-1.62c1.75.99 3.73 1.51 5.81 1.51 6.62 0 12-5.38 12-12 0-3.21-1.25-6.22-3.48-8.41zm-8.52 18.4c-1.8 0-3.56-.48-5.11-1.4l-.37-.22-3.8 1 .01-3.7-.24-.38A9.87 9.87 0 012.01 12C2.01 6.49 6.5 2 12 2s9.99 4.49 9.99 10-4.49 10-9.99 10zM17.47 14.5c-.3-.15-1.78-.88-2.06-.98-.28-.1-.48-.15-.68.15-.2.3-.78.98-.95 1.18-.18.2-.35.23-.65.08-1.57-.81-2.76-1.5-3.82-3.32-.18-.3.08-.28.37-.86.1-.15.05-.28-.02-.43-.08-.15-.68-1.63-.93-2.23-.24-.59-.49-.51-.68-.52h-.58c-.2 0-.53.08-.8.38-.28.3-1.05 1.03-1.05 2.5 0 1.48 1.08 2.9 1.23 3.1.15.2 2.11 3.23 5.12 4.53 1.95.84 2.68 1.01 3.65.85.91-.15 2.83-1.15 3.23-2.28.4-1.13.4-2.1.28-2.28-.13-.18-.48-.28-.78-.43z" />
                        </svg>
                    </div>
                    <div class="card-info">
                        <h3>WhatsApp</h3>
                        <p class="destaque">(11) 98765-4321</p>
                        <p class="subtexto">Atendimento rápido</p>
                    </div>
                </div>

                <div class="card">
                    <div class="icon-circle icon-orange-outline">
                        <svg viewBox="0 0 24 24" width="24" height="24" fill="#F28C07">
                            <path d="M11.99 2C6.47 2 2 6.48 2 12s4.47 10 9.99 10C17.52 22 22 17.52 22 12S17.52 2 11.99 2zM12 20c-4.42 0-8-3.58-8-8s3.58-8 8-8 8 3.58 8 8-3.58 8-8 8zm.5-13H11v6l5.25 3.15.75-1.23-4.5-2.67z" />
                        </svg>
                    </div>
                    <div class="card-info">
                        <h3>Horário de atendimento</h3>
                        <p class="destaque">Segunda a Sexta</p>
                        <p class="subtexto">08h às 18h<br>Sábado: 08h às 12h</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="conteudo-duplo">

            <div class="form-container">
                <h2>Envie sua mensagem</h2>
                <p>Preencha o formulário abaixo que entraremos em contato.</p>

                <form action="enviar.php" method="POST">
                    <div class="form-group">
                        <label for="nome">Nome completo <span>*</span></label>
                        <input type="text" id="nome" name="nome" placeholder="Ex: Carlos Souza" required>

                    </div>

                    <div class="form-group">
                        <label for="email">E-mail <span>*</span></label>
                        <input type="email" id="email" name="email" placeholder="Ex: constru@gmail.com" required>                    
                    </div>      

                    <div class="form-group">
                        <label for="assunto">Assunto <span>*</span></label>
                        <select id="assunto" name="assunto" required>
                            <option value="">Selecione um assunto</option>
                            <option value="duvida">Dúvida</option>
                            <option value="orcamento">Orçamento</option>
                            <option value="reclamacao">Reclamação</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="mensagem">Mensagem <span>*</span></label>
                        <textarea id="mensagem" name="mensagem" rows="4" placeholder="Digite sua mensagem ..." required></textarea>
                    </div>

                    <button type="submit" class="btn-enviar">
                        <svg viewBox="0 0 24 24" width="20" height="20" fill="white" style="margin-right: 8px;">
                            <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z" />
                        </svg>
                        Enviar mensagem
                    </button>
                </form>
            </div>

            <div class="localizacao-container">
                <h2>Nosso Escritório Central</h2>
                <p>Central de operações e atendimento administrativo.<br> Nota: Não realizamos vendas físicas neste local.</p>

                <div class="localizacao-card">
                    <div class="endereco-info">
                        <svg viewBox="0 0 24 24" width="28" height="28" fill="#F28C07">
                            <path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                        </svg>
                        <div>
                            <h3>Sede Administrativa</h3>
                            <p>R. Santo André, 680 - Boa Vista, <br>São Caetano do Sul</br>São Paulo - SP, CEP 09572-000</p>
                        </div>
                    </div>

                    <div class="mapa-img">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3654.8841334496246!2d-46.56091152372297!3d-23.64432016464723!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5cec46ebe475%3A0x8d2c14858d37a05e!2sEscola%20Senai%20Armando%20de%20Arruda%20Pereira!5e0!3m2!1spt-BR!2sbr!4v1780958204394!5m2!1spt-BR!2sbr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

        </section>

        <section class="banner-orcamento">
            <div class="banner-ilustracao">
                <div style="font-size: 60px;"></div>
            </div>

            <div class="banner-texto">
                <span class="tag">PARA EMPRESAS E CONSTRUTORAS</span>
                <h2>Solicite um orçamento</h2>
                <p>Precisa de materiais para sua obra?<br>Solicite um orçamento personalizado e receba as melhores condições.</p>
            </div>

            <div class="banner-acao">
                <button class="btn-secundario">
                    <svg viewBox="0 0 24 24" width="20" height="20" fill="white" style="margin-right: 8px;">
                        <path d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z" />
                    </svg>
                    Solicitar orçamento
                </button>
            </div>
        </section>

    </main>

    <?php require_once "../../partials/footer-sobre.php" ?>

</body>

</html>
