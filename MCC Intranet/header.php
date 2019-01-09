
<!DOCTYPE html>
<html <?php language_attributes(); ?>> 
<!-- php language_attributes() is used to improve search engine effeciency within the specific language --> 
<head>
    <meta charset="<?php bloginfo('charset')?>">
   <!-- meta charset above is used to indicate the language charecter for the site
    meta tag line below is used to create resposiveness to all mobile and other device types -->
   <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
   <?php wp_head(); /*wp_head() is used to load all the 
   head functions plugins to interact with the header file */
   ?>
</head>
<body <?php body_class(); ?>> 
<!-- the above body_class is helpful to inspect element and make chages for CSS & JS files -->
<header class="site-header">
    <div class="container">
     
      <h1 class="school-logo-text float-left"><a href="<?php echo site_url() ?>"><strong>I N T R A N E T</strong></a></h1>
      <span class="js-search-trigger site-header__search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
      <i class="site-header__menu-trigger fa fa-bars" aria-hidden="true"></i>
      <div class="site-header__menu group">
        <nav class="main-navigation">
        <?php 
           wp_nav_menu(array(
             'theme_location' => 'headerMenuLocation'
           ));
         ?>
        <!--below set of code is used to create static Header Menu
          <ul class="min-list group">
            <li><a href="#">Agencies</a></li>
            <li><a href="<#">Training</a></li>
            <li><a href="#">Calendar</a></li>
            <li><a href="#">Gallery</a></li>
            <li><a href="#">Contacts</a></li>
          </ul>
          -->
        </nav>
        <div class="site-header__util">
          <a href="#" class="btn btn--small btn--orange float-left push-right">Login</a>
          <a href="#" class="btn btn--small  btn--dark-orange float-left">Sign Up</a>
          <span class="search-trigger js-search-trigger"><i class="fa fa-search" aria-hidden="true"></i></span>
        </div>
      </div>
    </div>
  </header>
