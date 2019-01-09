<!-- index.php page is used to create the blog posts and css of the page to direct its parent child pages using archive.php 
index.php acts as home of the Blog page-->

<?php
 get_header(); 
 pageBanner(array(
   'title' => 'Welcome to our Blog!' ,
   'subtitle' => 'Keep up with our latest Blogs'
 ));
 ?>


<div class= "container container--narrow page-section">
 <?php
   while(have_posts()){
       the_post();?>
      <div class="post-item">
        <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>

       <div class="metabox">
        <p>Posted by <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', '); ?></p>
      </div>

        <div class="generic-content">
         <?php the_excerpt();?>
         <p><a class ="btn btn--blue" href="<?php the_permalink(); ?>">Continue Reading &raquo; </a></p>
      </div>

      </div>
   <?php }
   echo paginate_links(); // this line is used to continue page reading for the blogs
   //change the number of blogs to be dispalyed in WP-setting-Reading to have more than 2 blogs per page
 ?>
</div>

<?php get_footer(); ?>