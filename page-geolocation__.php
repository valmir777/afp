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


/* Template Name: Geolocation Redirect
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




/*
This file is free software: you can redistribute it and/or modify
the code under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

However, the license header, copyright and author credits
must not be modified in any form and always be displayed.

This class is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

@author geoPlugin (gp_support@geoplugin.com)
@copyright Copyright geoPlugin (gp_support@geoplugin.com)

This file is an example PHP file of the geoplugin class
to geolocate IP addresses using the free PHP Webservices of
http://www.geoplugin.com/

*/

require_once('geoplugin.class.php');

$geoplugin = new geoPlugin();

/*
Notes:

The default base currency is USD (see http://www.geoplugin.com/webservices:currency ).
You can change this before the call to geoPlugin::locate with eg:
$geoplugin->currency = 'EUR';

The default IP to lookup is $_SERVER['REMOTE_ADDR']
You can lookup a specific IP address, by entering the IP in the call to geoPlugin::locate
eg
$geoplugin->locate('209.85.171.100');

The default language is English 'en'
supported languages:
de (German)
en (English - default)
es (Spanish)
fr (French)
ja (Japanese)
pt-BR (Portugese, Brazil)
ru (Russian)
zh-CN (Chinese, Zn)

To change the language to e.g. Japanese, use:
$geoplugin->lang = 'ja';

*/
?>
<style>
    .myButton {
    -moz-box-shadow: 0px 1px 0px 0px #f0f7fa;
    -webkit-box-shadow: 0px 1px 0px 0px #f0f7fa;
    box-shadow: 0px 1px 0px 0px #f0f7fa;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #33bdef), color-stop(1, #019ad2));
    background:-moz-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-webkit-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-o-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:-ms-linear-gradient(top, #33bdef 5%, #019ad2 100%);
    background:linear-gradient(to bottom, #33bdef 5%, #019ad2 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#33bdef', endColorstr='#019ad2',GradientType=0);
    background-color:#33bdef;
    -moz-border-radius:6px;
    -webkit-border-radius:6px;
    border-radius:6px;
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
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #019ad2), color-stop(1, #33bdef));
    background:-moz-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-webkit-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-o-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:-ms-linear-gradient(top, #019ad2 5%, #33bdef 100%);
    background:linear-gradient(to bottom, #019ad2 5%, #33bdef 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#019ad2', endColorstr='#33bdef',GradientType=0);
    background-color:#019ad2;
}
.myButton:active {
    position:relative;
    top:1px;
}

.background-geral {
    width:  100%;
    height:  100%;
    margin-top: -50px;
}
	
	.cont-bg-geral {
		width: 80%; 
		height: auto; 
		min-height:500px;
		margin: 50px auto; 
		padding: 80px 20px 20px; 
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


</style>
<?php
//locate the IP
$geoplugin->locate();
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css" />
<div class="background-geral" style="background:  #542d84 url(https://afropolitan.brzeelab.com/wp-content/uploads/2018/10/sampa2-min.png); background-size: cover;" >
<div class="cont-bg-geral">
<h1 style="text-align: center; margin-bottom: 30px; color: #fff; font-size: 2.3em; ">O que precisar, aonde estiver.</h1>

<p class="pulsar animated fadeOut"><span class="pulseffect animated pulse"></span></p>
<p class="local-detect  animated fadeInDown" style="text-align: center; font-size: 1.5em; color: #ccc">

<?php
//echo "Teste resultado para Geolocalização:{$geoplugin->ip}: <br />\n".
    //"Cidade: {$geoplugin->city} <br />\n".
    //"Regiião: {$geoplugin->region} <br />\n".
   // "Código da Região: {$geoplugin->regionCode} <br />\n".
   // "Nome da Região: {$geoplugin->regionName} <br />\n".
   // "DMA Code: {$geoplugin->dmaCode} <br />\n".
    //"País: {$geoplugin->countryName} <br />\n".
    //"Código do País: {$geoplugin->countryCode} <br />\n".
   // "In the EU?: {$geoplugin->inEU} <br />\n".
   // "EU VAT Rate: {$geoplugin->euVATrate} <br />\n".
  //  "Latitude: {$geoplugin->latitude} <br />\n".
  //  "Longitude: {$geoplugin->longitude} <br />\n".
 //   "Radius/Accuracy (Milhas): {$geoplugin->locationAccuracyRadius} <br />\n".
 //   "Fuso Hrário: {$geoplugin->timezone} <br />\n".
//    "Moeda: {$geoplugin->currencyCode} <br />\n".
//    "Símbolo da moeda: {$geoplugin->currencySymbol} <br />\n".
 //   "Exchange: {$geoplugin->currencyConverter} <br />\n";

echo " Você está em <strong>{$geoplugin->city}</strong>" ;



/*
How to use the in-built currency converter
geoPlugin::convert accepts 3 parameters
$amount - amount to convert (required)
$float - the number of decimal places to round to (default: 2)
$symbol - whether to display the geolocated currency symbol in the output (default: true)
*/
?>
  <img src="https://afropolitan.brzeelab.com/wp-content/uploads/2018/10/6-proximo-a-voce.png"  style="width:30px" alt="Local">
</p>

<?php
  $cidade = $geoplugin->city;


   if ($cidade == "São Paulo") {
         echo "<a href='/sao-paulo-local'><button class='myButton local-detect  animated fadeInDown'>encontre lugares<i class='fa fa-map-marker-alt'></i></button></a>";
   } elseif ($cidade == "Salvador") {
         echo "<a href='/salvador-local'><button class='myButton local-detect  animated fadeInDown'>encontre lugares<i class='fa fa-map-marker-alt'></i></button></a>";
   } elseif ($cidade == "Rio de Janeiro") {
         echo "<a href='/rio-local'><button class='myButton local-detect  animated fadeInDown'>encontre lugares<i class='fa fa-map-marker-alt'></i></button></a>";
   } else {
         echo "Ainda não temos afro-empreededores cadastros na sua região.<br>".
              "Clique no botão baixo para encontrar produtos com pronta entrega para todo o Brasil.<br>".
             "<a href='#'><button class='myButton'>Vamos lá!</button></a>";
   }

?>
</div>
</div><!-- backgrond geral -->



<?php
the_content();

get_footer( );
