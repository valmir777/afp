<?php
/**
 * @package CityBook - Directory Listing WordPress Theme
 * @author CTHthemes - http://themeforest.net/user/cththemes
 * @date 25-07-2018
 * @since 1.2.2
 * @version 1.2.2
 * @copyright Copyright ( C ) 2014 cththemes.com . All rights reserved.
 * @license GNU General Public License version 3 or later; see LICENSE
 */


/* Template Name: Geolocation Redirect Plus
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */

if ( post_password_required() ) {
    get_template_part( 'template-parts/page/protected', 'page' );
    return;
}

get_header();

?>
<style>


    .myButton {
    background-color:#5d3180;
    -moz-border-radius:28px;
    -webkit-border-radius:28px;
    -moz-border-radius:28px;
    -webkit-border-radius:28px;
    border-radius:28px;
    border:1px solid #057fd0;
    display:table;
    margin: 0 auto;
    cursor:pointer;
    color:#ffffff;
    font-family:Arial;
    font-size:15px;
    font-weight:bold;
    padding:6px 24px;
    text-decoration:none;
    text-shadow:0px -1px 0px #5b6178;
}
	
.myButton:hover {
background-color:#5cbf2a;;
}
	
.myButton:active {
    position:relative;
    top:1px;
}
	

.local-detect {
     opacity: 0;
    -webkit-animation: mymove .1s ; /* Safari 4.0 - 8.0 */
    -webkit-animation-delay: 3s; /* Safari 4.0 - 8.0 */
    animation: mymove .1s ;
    animation-delay: 3s;
}
	

.pulsar {
    color: #fff;
    text-align: center;
    font-size: 1.5em;
    -webkit-animation-delay: 2s; /* Safari 4.0 - 8.0 */
    animation-delay: 2s;
    }

    .pulseffect  {
        position: absolute;
        top:18%;
    }
    .link-mktplace {
        text-align: center;
        padding-bottom: 0;
    }
   .link-mktplace a {
    color: #fff;
    font-size: 1.3em;
    background: #54a1c9;
    padding: 7px 10px;
    border-radius: 6px;
}

    .link-mktplace:hover {
        opacity: 0.8
    }

    .bg-geral-sub {
        width: 100%;
        height: auto;
        background: #4db7fe;
        text-align: center;
        padding: 6px;
    }


    .destaques-randomicos {
        width: 1200px;
        height: auto;
		display: table;
        margin: 5px auto;
		animation-delay: 1.5s;
	}

    .destaque-box {
        width:  260px;
        height: 240px;
        margin: 20px;
        border: 1px solid #ccc;
		float: left;
		border-radius: 5px;
		text-align: center;
    }
	
	.destaque-box p {
		font-size: 0.8em;
		color: #fff;
	}
	
	.destaque-box h4 {
		margin-top: 10px;
		font-size: 1em;
	}
	
	.destaques-box h4 a {
		/*color: #color;*/
		color: white;
		
	}
	
	.destaque-random-title {
		text-align: center;
    	color: #f9a92f;
    	font-size: 2em;
    	margin: 40px 0 10px;
	}
	
	.geodir-category-img img {
      object-fit: contain;
    }
	
	#shuffle {
	
	}
	
	.link-title-destaque {
		min-width: 160px;
		height: auto;
		color: white;
		background: #5e217b;
		padding: 1px 0px 4px;
		-ms-transform: rotate(-10deg); /* IE 9 */
		-webkit-transform: rotate(-8deg); /* Safari 3-8 */
		transform: rotate(0deg);
    	margin: 160px 0 0 90px;
		text-transform: uppercase;
		font-weight: bold;
		font-style: italic;
	}
	
	.link-destaque-preco {
		width: 90px;
		height: auto;
		color: white;
		padding: 1px 0px;
		-ms-transform: rotate(-20deg);
		-webkit-transform: rotate(-20deg);
		transform: rotate(0deg);
		margin: 5px 0px 0 160px;
		text-transform: uppercase;
		font-weight: bold;
		font-size: 20px;
		text-align: center;
		background: rgba(255,106,80,1);
background: -moz-linear-gradient(left, rgba(255,106,80,1) 0%, rgba(223,75,107,1) 100%);
background: -webkit-gradient(left top, right top, color-stop(0%, rgba(255,106,80,1)), color-stop(100%, rgba(223,75,107,1)));
background: -webkit-linear-gradient(left, rgba(255,106,80,1) 0%, rgba(223,75,107,1) 100%);
background: -o-linear-gradient(left, rgba(255,106,80,1) 0%, rgba(223,75,107,1) 100%);
background: -ms-linear-gradient(left, rgba(255,106,80,1) 0%, rgba(223,75,107,1) 100%);
background: linear-gradient(to right, rgba(255,106,80,1) 0%, rgba(223,75,107,1) 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff6a50', endColorstr='#df4b6b', GradientType=1 );
		font-style: italic;
	}
	
	.a-link-destaque {
		color: white;
		
	}
	
	@media all and (min-width: 760px) and (max-width: 1024px) {
		.destaques-randomicos {
			width: 600px;
		}
		.logo-principal-eco {
			width: 40%;
			margin: 0px 300px 0 0;
		}
	}
	
	@media all and (max-width: 420px) {
		.destaques-randomicos {
			width: 100%;
		}
	    
		.destaque-box {
			float: none;
			margin: 5% auto;
		}
	}
	
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
<?php

   // Include the file contains the ClientLocation class
   require_once('clientlocation.php');
   // Creating the object of ClientLocation class
   //Put your IPINFODB API KEY
   $obj = new ClientLocation('33af81ac163033b48ad5cb95fd494e3ca997f7c69742c9b0d17e085769661bb6');
   $cidade = $obj->city();
   $imgCity = "";
   $mensagem = "";

 if($cidade == "Sao Paulo") {
    $cidade = "São Paulo";
    $imgCity = "2018/12/mapa.png";
    $bt = "<a href='/sao-paulo-local'><button class='myButton local-detect  animated fadeInDown'>buscar<i class='fa fa-map-marker-alt'></i></button></a>";
 } elseif($cidade == "Rio de Janeiro") {
    $imgCity = "";
     $bt = "<a href='/rio-local'><button class='myButton local-detect  animated fadeInDown'>buscar<i class='fa fa-map-marker-alt'></i></button></a>";
 } elseif($cidade == "Santos") {
     $imgCity = "2018/12/mapa.png";
     $bt = "<p style='color: #fff; text-align: center; font-size: 1em'>Ainda não temos afro-empreededores cadastros na sua cidade.<br> Encontre produtos com pronta entrega para todo o Brasil.<br></p><a href='https://afropolitan.com.br/marketplace/'><button class='myButton'>avançar</button></a>";
 } elseif($cidade == "Salvador") {
    $imgCity = "";
    $bt = "<a href='/salvador-local'><button class='myButton local-detect  animated fadeInDown'>buscar<i class='fa fa-map-marker-alt'></i></button></a>";
 } else {
     $imgCity = "2018/12/mapa.png";
     $bt = "<p style='color: #fff; text-align: center; font-size: 1em'>Ainda não temos afro-empreededores cadastros na sua cidade.<br> Encontre produtos com pronta entrega para todo o Brasil.<br></p><a href='#'><button class='myButton'>buscar</button></a>";

 }

echo "<div class='background-geral animated fadeIn' style='background: #542d84 url(https://afropolitan.com.br/wp-content/uploads/$imgCity); background-size: cover;' >";
echo "<div class='cont-bg-geral'>";
echo "<h1 style='text-align: center; margin-bottom: 30px; color: #5c3180; font-size: 2.3em;'>O que precisar, onde estiver.</h1>";

echo "<p class='pulsar animated fadeOut'><span class='pulseffect animated pulse'></span></p>";
echo "<p class='local-detect animated fadeInDown' style='text-align: center; font-size: 1.5em; color: #ccc'>";
echo "Encontre produtos e serviços em <strong>$cidade</strong>";

echo $bt;

echo "</div>";
echo "</div><!-- backgrond geral -->";

echo "<h2 class='destaque-random-title animated flipInX'><img src='https://afropolitan.com.br/wp-content/uploads/2018/11/alto-falante.png' style='width:33px' alt='em destaque'> em destaque</h2>";

$args = array(
	'post_type' => 'destaque-random',
	'posts_per_page' => 6	
);

?>

<div class="destaques-randomicos animated fadeIn" id="shuffle">

    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/05/WhatsApp-Image-2018-10-25-at-11.20.48-424x280.jpeg); background-size:cover; background-position: center; ">
		<div class="link-title-destaque"><a href="#" class="a-link-destaque">Afropolitan Station</a></div>
		<div class="link-destaque-preco">5%OFF</div>
		<!--<p>moda</p>-->
	</div>
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/03/4-1.jpg); background-size: cover; background-position: center; ">
	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
	</div>
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/03/6-2.jpg); background-size: cover; background-position: center; ">
	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
   </div>
	
	
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/03/7-1.jpg); background-size: cover; background-position: center; ">
	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
	</div>
	
	
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/08/clubes.jpeg); background-size: cover; background-position: center; ">
	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>>
	</div>
	
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/05/6.jpg); background-size: cover; background-position: center; ">
	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
	</div>
	
	
	
	<div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/05/5.jpg); background-size: cover; background-position: center; ">
	 	<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
	</div>
	
	
    <div class="destaque-box" style="background: url(https://afropolitan.com.br/wp-content/uploads/2018/05/5.jpg) no-repeat; background-size: cover; background-position: center; ">
		<div class="link-title-destaque"><a href="#" class="a-link-destaque">Título teste random</a></div>
		<div class="link-destaque-preco">R$199</div>
	</div>
	
 <!--
    <div class="destaque-box">
		<div class="geodir-category-img">
		<a href="#">
     	<img width="424" height="280" src="https://afropolitan.com.br/wp-content/uploads/2018/08/clubes.jpeg" class="respimg wp-post-image" alt="">   
		</a>
    	</div>
		<h4><a href="#">Teste Random H</a></h4>
		<p>eventos</p>
	</div>
	
	
	
    <div class="destaque-box">
		<div class="geodir-category-img">
		<a href="#">
     	<img width="424" height="280" src="https://afropolitan.com.br/wp-content/uploads/2018/05/6.jpg" class="respimg wp-post-image" alt="">   
		</a>
    	</div>
		<h4><a href="#">Teste Random I</a></h4>
		<p>internacional</p>
	</div>
	
	
   <div class="destaque-box">
		<div class="geodir-category-img">
		<a href="#">
     	<img width="424" height="280" src="https://afropolitan.com.br/wp-content/uploads/2018/08/beleza.jpeg" class="respimg wp-post-image" alt="">   
		</a>
    	</div>
		<h4><a href="#">Teste Random J</a></h4>
		<p>beleza</p>
	</div>
	
	
    <div class="destaque-box">
		<div class="geodir-category-img">
		<a href="#">
     	<img width="424" height="280" src="https://afropolitan.com.br/wp-content/uploads/2018/05/5.jpg" class="respimg wp-post-image" alt="">  
		</a>
    	</div>
		<h4><a href="#">Teste Random L</a></h4>
		<p>gastronomia</p>
	</div>-->

</div>



<?php


?>





<?php


//echo "<div class='bg-geral-sub'><p class='link-mktplace'><a href='https://afropolitan.com.br/marketplace'><img src='https://afropolitan.com.br/wp-content/uploads/2018/11/market-place.png'> Acessar Marketplace na Versão Clássica</a></p></div>";

the_content();

get_footer();
