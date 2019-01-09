<!-- single.php is used for the individual pages but avts simlar to the page.php, it works for the blog posts -->
<?php

get_header();

while(have_posts()){
 the_post(); 
 //-- the posttype function calls on the condition to display the title of the page
 pageBanner();
 ?>

  <!-- the code below creats the bredcrum area or the metabox for thr blog page fa fa-home class is declared to indicate the home icon -->
 <div class="container container--narrow page-section">
     <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo site_url('/blog'); ?>"><i class="fa fa-home" aria-hidden="true"></i> 
      Blog Home</a> 
      <span class="metabox__main">Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(','); ?>></span></p>
     </div> 

   <div class="generic-content"><?php the_content(); ?></div>
 </div>


<?php }

 get_footer();
?>