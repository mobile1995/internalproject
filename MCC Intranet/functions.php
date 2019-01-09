
<?php

function pageBanner($args = NULL){
   //args parameter is used within the pageBanner function
   //php logic will live here
   if(!$args['title']){
     $args['title'] = get_the_title();
   } 

   if(!$args['subtitle']){
     $args['subtitle'] = get_field('page_banner_subtitle');
   }

   if(!$args['photo']){
     if(get_field('page_banner_background_image')){
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
     }
     else{
        $args['photo'] = get_theme_file_uri('/images/SeaGull.gif');
     }
   }

   ?>
 <div class="page-banner">
  <div class="page-banner__bg-image" style="background-image: url(<?php echo $args['photo']; ?>);"></div>
   <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"><?php echo $args['title'] ?> </h1>
     <div class="page-banner__intro">
        <p><?php echo $args['subtitle']; ?></p> 
     </div>
    </div>  
   </div>
<?php } 

function intranet_files() {
  wp_enqueue_script('mcc-intranet-js', get_theme_file_uri('/js/scripts-bundled.js'), NULL, '1.0', true);
     /* the above java script code is used to create a slide show 
       java script file name is defined as MCC-INTRANET-js
       funtion get_theme_file_uri is defined
       inorder to look inside the theme folder and the js(java script) folder is defined as js/scripts-bundled
       to add any another dependency arrguments in future we declare them here but, for now its NULL
       version number is declared as 1.0 just for instance but,whenever the changes are made to the 
       java script file change its version or set the version to microtime() without '' this will reduce 
       the cache problemes both in css and js only if needed in future.
       inporder to load the file yes/no we declared it as true
    */
   wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
   wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
   wp_enqueue_style('intranet_mcc_styles', get_stylesheet_uri(), NULL, microtime());
   /* the above line is used to reduce the caching issues within the browser by setting the microtime() */
}

add_action('wp_enqueue_scripts', 'intranet_files');

function intranet_features(){
   add_theme_support('title-tag');
   add_theme_support('post-thumbnails');
   add_image_size('pageBanner',1500,350,true);
 
   
   /*
   register_nav_menu('headerMenuLocation', 'Header Menu Locations'); 
   //register_nav_menue is used to add dynamic Menu Bar to WP-Dashboard
   register_nav_menu('footerLocationOne', 'Footer Location One');
   register_nav_menu('footerLocationTwo', 'Footer Location Two');
   add_theme_support('title-tag'); 
   // this part of code add_theme_support is used to add dynamic title-tag to the url area
   add_image_size('pageBanner') // this adds image size function to the dynamic page Banner of individual pages or Post_Type
   */
}

add_action('after_setup_theme', 'intranet_features'); 
//add_action is used to call the function intranet_features()

//Adding cutom logo
add_theme_support( 'custom-logo' );

function intranet_adjust_queries($query){
   if(! is_admin() AND is_post_type_archive('event') AND $query->is_main_query()){
   $today = date('Ymd');
   $query->set('meat_key','event_date');
   $query->set('orderby','meta_value_num');
   $query->set('order','ASC');
   $query->set('meta_query', array(
      array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
        )
      ));
   }
}

add_action('pre_get_posts', 'intranet_adjust_queries');

function intranetMapKey($api){
   $api['key'] = 'AIzaSyCtZR3XtcG_bEA-O9GxZCKWuf4PY0vhAX4';
   return $api;
}

add_filter('acf/fields/google_map/api','intranetMapKey');

