<?php
/*
*/
?>
<?php if(!defined('pagIsXSLT')): ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?php endif; ?>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title(':', true, 'right'); ?> <?php bloginfo('name'); ?></title>
<?php wp_head(); ?>
	<meta name="generator" content="WordPress <?php bloginfo('version'); ?>" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="12 unique search terms separated by a comma and space">
    <meta name="copyright" content="Aids Taskforce of Greater Cleveland">
    <meta name="author" content="Author: Your Name/Company">
    <meta name="email" content="Email: suppport@yoursite.com">
    
    <meta name="Charset" content="UTF-8">
    <meta name="Distribution" content="Global">
    <meta name="Rating" content="General">
    <meta name="Robots" content="INDEX,FOLLOW">
    <meta name="Revisit-after" content="1 Day">
    <meta name="expires" content="never">
    
<link rel="stylesheet" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/header.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/nav.css" type="text/css" media="screen" />
<link rel="stylesheet" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/footer.css" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php if ( get_option('unnamed_rss') != '') { echo (get_option('unnamed_rss')); } else { echo bloginfo('rss2_url'); } ?>" />
<link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="Comments Rss" href="<?php bloginfo('comments_rss2_url'); ?>" />
<?php if (is_single() || is_page()) { ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php } ?>
<?php if(get_option('unnamed_shelf') == 1) { ?>
<?php if(get_option('unnamed_scriptloader') == 1) { wp_enqueue_script('unnamed_functions'); } else { ?>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/functions.js.php"></script>
<?php } } ?>
<?php if( get_option('unnamed_shelf')==1 ) { wp_enqueue_script('unnamed_toggle'); } ?>
<?php wp_head(); ?>
<link type="image/x-icon" href="http://www.aidstaskforce.org/wp-content/themes/themeBare/images/favicon.ico" />
<link type="image/x-icon" rel="shortcut icon" href="wp-content/themes/themeBare/images/favicon.ico" /> 
</head>
<body>
<div id="container">
<div id="header">


<a href="/index.php/"><div id="logo"></div></a>
	<div id="wrap2">
	<ul id="mega">
    	<li>
    	<a class="megawhite" href="/index.php/inicio">Inicio</a><b class="s4"></b>
        <div>
      	<p>
        <a href="/index.php/inicio/noticias/">Noticias</a>
        <a href="/index.php/inicio/enlacearchivos-de-noticias/">Enlace/Archivos De Noticias</a>
        <a href="/index.php/inicio/proximos-eventos-enlacepagina-de-eventos">Proximos Eventos: Enlace/Página De Eventos</a>
        </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="index.php/quienes-somos">Quienes Somos</a>
      <div>

        <h2>Sobre Nosotros</h2><!--s1-->
        <p>
        <a href="/index.php/quienes-somos/nuestra-gente/mesa-directiva/">Mesa Directiva</a>
        <a href="/index.php/quienes-somos/nuestra-gente/personal/">Personal</a>
        </p>
        <h2>Sobre ATGC</h2><!--s2-->
        <p>
        <a href="/index.php/quienes-somos/sobre-atgc/descripcion-de-departamentos/">Descripción De Departamentos</a>
        <a href="/index.php/quienes-somos/sobre-atgc/nuestra-mision/">Misión</a>
        <a href="/index.php/quienes-somos/sobre-atgc/socios-de-la-comunidad/">Socios</a>
        <a href="/index.php/quienes-somos/sobre-atgc/historial-del-atgc/">Historial Del ATGC</a>
        <a href="/index.php/quienes-somos/sobre-atgc/comunicado-de-prensa/">Comunicado De Prensa</a>
        <a href="/index.php/quienes-somos/sobre-atgc/informacion-de-impuestos-501c3/">Información De Impuestos - [501(C)(3)]</a>
        </p>
        <h2>Servicio Alusuario</h2><!--s3-->
        <p>
        <a href="/index.php/quienes-somos/servicio-alusario/informacion-general/">Información General</a>
        <a href="/index.php/quienes-somos/servicio-alusario/perfiles-positivos/">Perfiles Positivos</a>
        </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/servicios">Servicios</a>
      <div> 
        <h2>Servicios De Salud</h2>
        <p>
        <a href="/index.php/servicios/sevicios-de-salud/analisis/">Análisis</a>
        <a href="/index.php/servicios/sevicios-de-salud/consejeria/">Consejería</a>
        <a href="/index.php/servicios/sevicios-de-salud/sevicio-medico">Sevicio Médico</a>
        <a href="/index.php/servicios/sevicios-de-salud/abuso-de-sustancias/">Abuso de Sustancias</a>
        <a href="/index.php/servicios/sevicios-de-salud/grupos-de-apoyo/">Grupos De Apoyo</a>
        </p>
        <h2>Alimentos, Vivienda y Transportación</h2>
        <p>
	<a href="/index.php/servicios/alimentos-vivienda-y-transportacion/nutricion/">Nutrición</a>
        <a href="/index.php/servicios/alimentos-vivienda-y-transportacion/despensa-de-alimentos/">Despensa De Alimentos</a>
        <a href="/index.php/servicios/alimentos-vivienda-y-transportacion/entrega-de-alimentos/">Entrega De Alimentos</a>
        <a href="/index.php/servicios/alimentos-vivienda-y-transportacion/vivienda/">Vivienda</a>
        <a href="/index.php/servicios/alimentos-vivienda-y-transportacion/transportacion/">Transportación</a>
        </p>
        <h2>Grupos De Acción</h2>
        <p>
        <a href="/index.php/involucrate/grupos-de-accion/informacion-para-el-elector/">Información Para El Elector</a>
        <a href="/index.php/involucrate/grupos-de-accion/referencias-de-polizas/">Referencias De Pólizas</a>
        <!--<a href="/index.php/get-involved/volunteer">Advocacy News</a>-->                 
        </p>
        <h2>Servicios Adicionales</h2>
        <p>
        <a href="/index.php/servicios/servicios-adicionales/servicios-legales/">Servicios Legales</a>
        <a href="/index.php/servicios/servicios-adicionales/asistencia-financiera/">Asistencia Financiera</a>
        <a href="/index.php/servicios/servicios-adicionales/servicios-sociales/">Servicios Sociales</a>
        </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/obtenga-los-datos">Obtenga Los Datos</a>
      <div> 
        <h2>Sobre VIH y El SIDA</h2>
        <p>
        <a href="/index.php/obtenga-los-datos/sobre-vih-y-el-sida/sida-101/">SIDA 101</a>
        <a href="/index.php/obtenga-los-datos/sobre-vih-y-el-sida/estadisticas/">Estadisticas</a>
        <a href="/index.php/obtenga-los-datos/sobre-vih-y-el-sida/historial-del-sida/">Historial del SIDA</a>
        </p>
        <h2>Legal</h2>
        <p>
        <a href="/index.php/obtenga-los-datos/legal/derechos/">Derechos</a>
        </p>
        <h2>Para Educadores</h2>
        <p>
        <a href="/index.php/obtenga-los-datos/para-educadores/material-educativo-para-adolescentes">Material Educativo Para Adolescentes</a>
        </p>
        <h2>LGBT - QIA</h2>
        <p>
        <a href="/index.php/obtenga-los-datos/lgbt-qia/">LGBT - QIA</a>
        </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/involucrate">Involucrate</a>
      <div> 
        <h2>Donaciones</h2>
        <p>
        <a href="/index.php/involucrate/donaciones/perfiles-positivos/">Perfiles Positivos</a>
        <a href="/index.php/involucrate/donaciones/como-hacer-donaciones-financieras/">Como Hacer Donaciones Financieras</a>
        <a href="/index.php/involucrate/donaciones/como-hacerdonaciones-de-especie">Donaciones De Especie</a>
        <a href="/index.php/quienes-somos/sobre-atgc/informacion-de-impuestos-501c3/">Información De Impuestos - [501(C)(3)], Fondos Monetarios</a>
        <a href="/index.php/involucrate/donaciones/metas/">Metas</a>
        </p>
        <h2>Hágace Voluntario</h2>
        <p>
        <a href="/index.php/involucrate/hagace/beneficios-de-participacion/">Beneficios De Participación</a>
        <a href="/index.php/involucrate/hagace/lista-de-oportunidades/">Lista De Oportunidades</a>        
	<!--a href="/index.php/involucrate/hagace/dest‎">Destrezas Necesarias</a-->
        <a href="/index.php/involucrate/hagace/formulario/">Formulario</a>
        </p>
        <h2>Grupos De Acción</h2>
        <p>
        <a href="/index.php/involucrate/grupos-de-accion/informacion-para-el-elector/">Información Para El Elector</a>
        <a href="/index.php/involucrate/grupos-de-accion/referencias-de-polizas/">Referencias De Pólizas</a>
        <!--<a href="/index.php/get-involved/volunteer">Advocacy News</a>-->                 
        </p>
        <h2>Eventos</h2>
        <p>
        <a href="/index.php/involucrate/eventos/hagase-voluntarioeventos">Hágase Voluntario/Eventos</a>
        <a href="/index.php/involucrate/eventos/archivos-de-eventos/">Archivos De Eventos</a>     			  
        </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/piensa-positivamente">Piensa Positivamente</a>
      <div>
      <p>
        <a href="/index.php/piensa-positivamente/viviendo-saludablemente-con-vihsida">Viviendo Saludablemente Con VIH/SIDA</a>
        <a href="/index.php/piensa-positivamente/vihsida-y-las-artes/">VIH/SIDA y Las Artes</a>
      </p>
      </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/contactos">Contactos</a>
<div>
      <p>
        <a href="/index.php/contacto/formulario-de-contacto">Contactos Formulario</a>
        <a href="/index.php/contacto/direcciones-telefono-y-correo-electronico">Direcciones, Teléfono y Correo Electrónico</a>
      </p>
      </div>				
    </li>
    <li>
    <a class="megawhite" href="/index.php/faq-espanol/">FAQ</a>								

    </li>
  </ul>
  </div>
<div id="mainPics">
	<div id="image_1"></div>
    <div id="image_2"></div>
    <div id="image_3"></div>
    <div id="image_4"></div>
</div>

</div>

<!--closes header-->
<div class="clearfloat"></div>
