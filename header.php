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
    <meta name="keywords" content="AIDS Taskforce", "AIDS Task Force", "AIDS", "HIV", "Cleveland", "Ohio", "volunteer", "testing", "help", "gay", "protection", "prevention">
    <meta name="copyright" content="Aids Taskforce of Greater Cleveland">
    <meta name="author" content="Author: Rebecca Murray-Strong">
    <meta name="email" content="Email: rstrong@atfgc.org">

    <meta name="google-site-verification" content="2gyYmIhLowF7wRnl_eh5aT7ILT94CRXw1qZZcY2NPsE" /> <!-- verification for aidstaskforce@gmail.com Webmaster tools -->
    <meta name="google-site-verification" content="pZjuS35MsD_BbW543YE0_zKPGSrB1iVuiSBsSKKnuM4" /> <!-- verification for Google Apps -->
    
    <meta name="Charset" content="UTF-8">
    <meta name="Distribution" content="Global">
    <meta name="Rating" content="General">
    <meta name="Robots" content="INDEX,FOLLOW">
    <meta name="Revisit-after" content="1 Day">
    <meta name="expires" content="never">

<link rel="stylesheet" href="/wp-content/themes/artshares-2014/reset.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/wp-content/themes/artshares-2014/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/wp-content/themes/artshares-2014/header.css" type="text/css" media="screen" />
<link rel="stylesheet" href="/wp-content/themes/artshares-2014/nav.css" type="text/css" media="screen" />
<!--<link rel="stylesheet" href="/wp-content/themes/artshares-2014/footer.css" type="text/css" media="screen" />-->
<link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); echo '/footer.css?v=' . filemtime( get_stylesheet_directory() . '/footer.css'); ?>" type="text/css" media="screen" />
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
<link type="image/x-icon" href="../../../../wp-content/themes/artshares-2014/images/favicon.ico" />
<link type="image/x-icon" rel="shortcut icon" href="../../../../wp-content/themes/artshares-2014/images/favicon.ico" /> 
</head>
<body>
<div id="container">
<div id="header">


<a href="/index.php/"><div id="logo"></div></a>
	<div id="wrap2">
	<ul id="mega">
    	<li><a class="megawhite" href="/index.php/">HOME</a><b class="s4"></b>
      <div>
    	<p>
      <a href="/index.php/category/news">News &amp; News Archives</a>
      <a href="/index.php/category/events">Events &amp Event Archive</a>
      </p>
    </div>
    </li>
    <li><a class="megawhite" href="/index.php/who-we-are">WHO WE ARE</a>
    <div>
      <h2>Our People</h2><!--s1-->
      <p>
      <a href="/../who-we-are/people/staff">Our Staff</a>
      </p>
      <h2>About ATGC</h2><!--s2-->
      <p>
      <a href="/index.php/who-we-are/about-atgc/departments">Our Departments</a>
      <a href="/index.phpwho-we-are/about-atgc/mission">Our Mission Statement</a>
      <a href="/index.php/who-we-are/about-atgc/partners">Our Partners</a>
      <a href="/index.php/who-we-are/about-atgc/history_atgc">History of ATGC</a>
      <a href="/index.php/who-we-are/about-atgc/press_releases">Press Releases</a>
      <a href="/index.php/get-involved/donate/501c3">Tax Info - [501(c)(3)]</a>
      </p>
      <h2>Who We Serve</h2><!--s3-->
      <p>
      <a href="/index.php/who-we-are/who-we-serve/serve">We Serve...</a>
      <a href="/index.php/get-involved/donate/positive-profiles">Positive Profiles</a>
      </p>
    </div>
    </li>
    <li><a class="megawhite" href="/index.php/services">SERVICES</a>
    <div> 
      <h2>Health Services</h2>
      <p>
      <a href="/index.php/services/health-services/testing">Get Tested</a>
      <a href="/index.php/services/health-services/counseling">Counseling</a>
      <a href="/index.php/services/health-services/healthcare">General Healthcare</a>
      <a href="/index.php/services/health-services/chem_dependency">Chemical Dependency</a>
      <a href="/index.php/services/health-services/support_groups">Support Groups</a>
      </p>
      <h2>Food, Housing and Transportation</h2>
      <p><a href="/index.php/services/health-services/food-housing-and-transportation/nutrition">Nutrition Services</a>
      <a href="/index.php/services/health-services/food-housing-and-transportation/food_pantry">Food Pantry</a>
      <a href="/index.php/services/health-services/food-housing-and-transportation/food_delivery">Food Delivery</a>
      <a href="/index.php/services/health-services/food-housing-and-transportation/housing">Housing</a>
      <a href="/index.php/services/health-services/food-housing-and-transportation/transportation">Transportation</a>
      </p>
      </p>
      <h2>Advocacy</h2>
      <p>
      <a href="/index.php/category/advocacy/voter">Voter Information</a>
      <a href="/index.php/category/advocacy/policy">Policy Resources</a>
      <a href="/index.php/category/advocacy/advocacy_news">Advocacy News</a>
      <a href="/index.php/category/advocacy/media">Media &amp; Press</a>
      </p>
      <h2>Additional Services</h2>
      <p>
      <a href="/index.php/services/additional-services/legal_services">Legal Services</a>
      <a href="/index.php/services/additional-services/financial">Financial Assistance</a>
      <a href="/index.php/services/additional-services/social_services">Social Services</a>
      </p>
    </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/get-the-facts">GET THE FACTS</a>
    <div> 
      <h2>About HIV/AIDS</h2>
      <p>
      <a href="/index.php/about/aids101">AIDs 101</a>
      <a href="/index.php/about/statistics">Statistics</a>
      <a href="/index.php/about/history_aids">History of AIDS</a>
      </p>
      <h2>Legal Information</h2>
      <p><a href="/index.php/get-the-facts/legal/legal_rights">Know Your Rights</a></p>
      <h2>For Educators</h2>
      <p><a href="/index.php/get-the-facts/for-educators/teaching_materials">Teaching Materials for Teens</a></p>
      <h2>LGBT - QIA</h2>
      <p><a href="/index.php/get-the-facts/lgbt-qia">LGBT - QIA</a></p>
    </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/get-involved">GET INVOLVED</a>
    <div> 
      <h2>Donate</h2>
      <p> 
      <a href="/index.php/get-involved/donate/goals">Our Goals</a>
      <a href="/index.php/get-involved/donate/positive-profiles">Positive Profiles</a>
      <a href="/index.php/get-involved/donate">Financial Donations</a>
      <a href="/index.php/get-involved/donate/goods">Goods Donations</a>
      <a href="/index.php/get-involved/donate/501c3">Tax Info - [501(c)(3)], Trusts</a></p>
      <h2>Volunteer</h2>
      <p>
      <a href="/index.php/get-involved/volunteer/involvement">Benefits of Involvement</a>
      <a href="/index.php/get-involved/volunteer/opportunities">Opportunities</a>
      <a href="/index.php/get-involved/volunteer/skills_needed">Skills We Need</a>
      <a href="/index.php/get-involved/volunteer/form">Volunteer Form</a>
      </p>
      <h2>Advocacy</h2>
      <p>
      <a href="/index.php/category/advocacy/voter">Voter Information</a>
      <a href="/index.php/category/advocacy/policy">Policy Resources</a>
      <a href="/index.php/category/advocacy/advocacy_news">Advocacy News</a>
      <a href="/index.php/category/advocacy/media">Media &amp; Press</a>a>
      </p>
      <h2>Events</h2>
      <p>
      <a href="/index.php/get-involved/events/volunteer-for-events">Volunteer for Events</a>
      <a href="/index.php/get-involved/events">Event Archives</a>     			  <!--Where is this page?-->
      </p>
    </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/think-positive">THINK POSITIVE</a>
    <div>
    <p>
      <a href="/index.php/think-positive/living-well-with-hivaids">Living Well with HIV/AIDS</a>
      <a href="/index.php/think-positive/hivaids-and-the-arts">HIV/AIDS and the ARTS</a>
    </p>
    </div>
    </li>
    <li>
    <a class="megawhite" href="/index.php/contacts">CONTACT US</a>
<div>
    <p>
    <a href="/index.php/contactus">Address, Directions, Phone...</a>
      <a href="/index.php/contactus/contact-form">Contact Form</a>
    </p>
    </div>				
    </li>
    <li>
    <a class="megawhite" href="/index.php/faq">FAQ</a>								
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