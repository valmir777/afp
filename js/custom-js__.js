//Custom JS

$('.woo-wallet-sidebar-heading').html('<img src="https://afropolitan.com.br/wp-content/uploads/2018/11/logo-wallet-branco.png" style="width: 60%" alt="APo Wallet"> ');
//$('.woo-wallet-sidebar-heading').after('<div style="width: 230px; height: auto; color: white; margin: 3% auto; text-align: center"><strong>Cotação do APo Token:</strong><br><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/1-apo-token-logo-branco-ico.png" alt="APo Token"> 0,975 Apo Tokens = R$ 1,00 Real</div>');

$('.woo-wallet-price .woocommerce-Price-currencySymbol').html('<span class="saldo-apos-texto">Saldo em APOs</span><br><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/1-apo-token-logo-branco-ico.png" alt="APo"> ');


$('.woo-wallet-menu-contents .woocommerce-Price-currencySymbol').html('<img src="https://afropolitan.com.br/wp-content/uploads/2018/11/ico-wallet-branco.png" style="width: 20%" alt="APo">');

$('.woo-wallet-sidebar ul li:last-child').after('<li class="card"><a href="https://afropolitan.com.br/minha-conta/"><span class="dashicons dashicons-id"></span><p>Minha conta</p></a></li>');

$('.woo-wallet-menu-contents').removeAttr('href');


$('.citybook-footer > .container > .fwids-row').before('<div class="div-logos-eco"><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/2-afropolitan-logo-topo-min.png" class="logo-principal-eco" alt="Afropolitan"><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/LOGOS-no-topo-corte.png" class="logos-afropolitan-eco" alt="Afropolitan Station"></div>');

//$('#sec1 .container .row div:first').removeClass('col-md-8').addClass('col-md-12');

var pontosApos = $('.gamipress-user-points-amount').html();
var headUser = $('.header-user-name ul');

$( document ).ready(function() {

    $('.woo-wallet-price').after('<div class="woo-wallet-price-right"><span class="woocommerce-Price-amount amount"><span class="woocommerce-Price-currencySymbol"><span class="saldo-apos-texto">Você tem:</span><br><span class="pontosAposBox"></span></div>');
    $('.woo-wallet-price-right').before('<div class="woo-wallet-price-center"><strong>Cotação do APo Token:</strong><br><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/1-apo-token-logo-branco-ico.png" alt="APo Token"> 0,975 Apo Tokens = R$ 1,00 Real</div>');
    $('.pontosAposBox').html(pontosApos + ' APo Bônus <a href="https://afropolitan.com.br/meu-passport"><img src="https://afropolitan.com.br/wp-content/uploads/2018/11/round-help-button.png" alt="Ajuda"></a>');
    $('.hu-menu-visdec').append('<a href="https://afropolitan.com.br/minha-conta/">Minha Conta</a>');
});



