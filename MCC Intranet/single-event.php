<!-- single.php is used for the individual Events pages but acts simlar to the page.php -->

<?php

get_header();

while(have_posts()){
 the_post();
 pageBanner(); ?><!-- the posttype function calls on the condition to display the title of the page -->

 <!-- the code below creats the bredcrum area or the metabox for thr blog page fa fa-home class is declared to indicate the home icon -->
<div class="container container--narrow page-section">
    <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('event'); ?>"><i class="fa fa-home" aria-hidden="true"></i> 
      Events Home</a> 
      <span class="metabox__main"><?php the_title(); ?></span></p>
    </div> 

<div class="generic-content"><?php the_content(); ?></div>
</div>

<?php }

 get_footer();
?>