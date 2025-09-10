function startTimer(duration, $display) {
    let timer = duration, hours, minutes, seconds;
    const interval = setInterval(function () {
        hours = Math.floor(timer / 3600);
        minutes = Math.floor((timer % 3600) / 60);
        seconds = timer % 60;

        hours = hours < 10 ? "0" + hours : hours;
        minutes = minutes < 10 ? "0" + minutes : minutes;
        seconds = seconds < 10 ? "0" + seconds : seconds;

        $display.text(hours + ":" + minutes + ":" + seconds);

        if (--timer < 0) {
            clearInterval(interval);
            $display.text("00:00:00"); // Quando o tempo acabar
        }
    }, 1000);
}

$(document).ready(function () {
    const timeElement = $('.time-promo').text();
    const parts = timeElement.split(':');
    const hours = parseInt(parts[0], 10);
    const minutes = parseInt(parts[1], 10);
    const seconds = parseInt(parts[2], 10);
    const totalSeconds = hours * 3600 + minutes * 60 + seconds;

    const $display = $('.time-promo');
    startTimer(totalSeconds, $display);
});



$(document).ready(function() {
    const notification = $("#notification");

    let quotas = [];
    try {
        const rawQuotas = notification.attr('data-json-quotas');
        if (rawQuotas) {
            quotas = JSON.parse(rawQuotas);
        } else {
            console.warn("Atributo 'data-json-quotas' está vazio.");
        }
    } catch (e) {
        console.error("Erro ao fazer parse de 'data-json-quotas':", e);
    }

    const platformElem = $(".socials span");
    const platformIconElem = $(".socials i");
    const nameElem = $("#notification-name");
    const quotaNumberElem = $("#notification-quota-number");
    const quotaElem = $("#notification-quota");
    const timeElem = $("#notification-time");
    const names = ["Diego Souza", "Carla Lima", "Felipe Araújo", "Ana Pereira", "Paulo Oliveira", "Camila Ribeiro", "Lucas Mendes", "Bruna Ferreira", "Ricardo Silva", "Renata Costa", "Thiago Martins", "Fernanda Alves", "João Santos", "Maria Gomes", "Daniel Rodrigues", "Isabela Moraes", "Pedro Cunha", "Juliana Azevedo", "Rodrigo Cardoso", "Patrícia Rocha", "Marcos Farias", "Larissa Santana", "Gustavo Moreira", "Aline Reis", "Leandro Batista", "Beatriz Barros", "Rafael Teixeira", "Amanda Dias", "André Pacheco", "Gabriela Macedo", "Eduardo Monteiro", "Luana Nogueira", "Fábio Neves", "Natália Almeida", "Fernando Vieira", "Sabrina Lopes", "Bruno Matos", "Letícia Correia", "Henrique Nunes", "Tatiana Carvalho", "César Borges", "Bianca Soares", "José Fernandes", "Luiza Miranda", "Victor Freitas", "Melissa Freire", "Leonardo Pinto", "Raquel Mota", "Roberto Siqueira", "Carol Fonseca", "Vinícius Guimarães", "Elisa Martins", "Alexandre Maia", "Cláudia Ramos", "Júlio Castro", "Sara Lima", "Hugo Andrade", "Marcela Meireles", "Miguel Paiva", "Viviane Duarte", "Maurício Melo", "Vanessa Santos", "Rogério Braga", "Priscila Martins", "Igor Leite", "Stephanie Gonçalves", "Felipe Monteiro", "Alice Camargo", "Samuel Lira", "Clara Assunção", "Alberto Barbosa", "Helena Tavares", "Caio Xavier", "Daniela Santos", "Wilson Xavier", "Verônica Cunha", "Sérgio Castro", "Marina Nascimento", "Antônio Barbosa", "Lorena Peixoto", "Alan Soares", "Érica Queiroz", "Douglas Santana", "Mônica Vieira", "Bruno Pereira", "Tatiane Melo", "Renan Borges", "Adriana Siqueira", "Erick Almeida", "Cíntia Franco", "Nicolas Rocha", "Simone Silveira", "Wesley Andrade", "Geovana Albuquerque", "Jonas Tavares", "Kelly Rocha", "Otávio Meireles", "Jaqueline Costa", "Matheus Machado", "Flávia Paixão", "Vitor Pereira", "Rafaela Ribeiro", "Enzo Araújo", "Rosana Gomes", "Nathan Braga", "Marjorie Oliveira"];
    const times = ["Agora", "5min", "10min", "15min", "20min", "Agora", "30min", "35min", "40min", "Agora", "50min", "1h", "Agora", "Agora", "1h30min", "Agora", "1h50min", "Agora", "2h30min", "3h", "3h30min", "4h", "Agora", "6h", "7h", "Agora", "9h", "Agora", "11h", "Agora"];
    const socialNetworks = [
        { name: "Instagram", icon: "fa-instagram" },
        { name: "TikTok", icon: "fa-tiktok" }
    ];

    function getRandomValue(array) {
        return array[Math.floor(Math.random() * array.length)];
    }

    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    function showNotification() {
        const randomName = getRandomValue(names);
        const randomQuotaNumber = getRandomInt(100, 10000);
        const randomTime = getRandomValue(times);

        // Verifica se a rede social está definida, caso contrário escolhe aleatoriamente
        let socialNetwork = notification.data('social-network');
        let socialNetworkIcon = notification.data('social-network-icon');
        if (!socialNetwork || !socialNetworkIcon) {
            const randomSocial = getRandomValue(socialNetworks);
            socialNetwork = randomSocial.name;
            socialNetworkIcon = randomSocial.icon;
        }

        const randomQuotaText = getRandomValue(quotas) + ' ' + socialNetwork;

        nameElem.text(randomName);
        quotaNumberElem.text(randomQuotaNumber.toLocaleString('pt-BR').replace(/\B(?=(\d{3})+(?!\d))/g, '.'));
        quotaElem.text(randomQuotaText);
        timeElem.text(randomTime);
        platformElem.text(socialNetwork);
        platformIconElem.attr('class', `fa-brands icon ${socialNetworkIcon}`);

        notification.addClass("active");
        setTimeout(() => {
            notification.removeClass("active");
        }, 3500);
    }

    function triggerRandomNotification() {
        const randomInterval = getRandomInt(4000, 8000);
        setTimeout(() => {
            showNotification();
            triggerRandomNotification();
        }, randomInterval);
    }
    
    triggerRandomNotification();
});

const details = [
   { text: "47% OFF PARA TIKTOK", url: "https://promo.agenciadoinfluencer.com.br/social-tiktok", background: "linear-gradient(135deg, #25F4EE, #FE2C55)" },
   { text: "49% OFF PARA KWAI", url: "https://promo.agenciadoinfluencer.com.br/social-kwai", background: "linear-gradient(135deg, #FF5E00, #FFA726)" },
   { text: "45% OFF PARA YOUTUBE", url: "https://promo.agenciadoinfluencer.com.br/social-youtube", background: "linear-gradient(135deg, #FF0000, #CC0000)" },
   { text: "46% OFF PARA FACEBOOK", url: "https://promo.agenciadoinfluencer.com.br/social-facebook", background: "linear-gradient(135deg, #1877F2, #145DBF)" },
   { text: "50% OFF PARA INSTAGRAM", url: "https://promo.agenciadoinfluencer.com.br/social-instagram", background: "linear-gradient(135deg, #F58529, #DD2A7B, #8134AF, #515BD4)" },
];

let index = 0;

function updateDetails() {
   const item = details[index];

   document.getElementById('text').innerText = item.text;
   document.getElementById('url').href = item.url;
   document.getElementById('banner').style.background = item.background;

   index = (index + 1) % details.length;
};

setInterval(updateDetails, 5000);

