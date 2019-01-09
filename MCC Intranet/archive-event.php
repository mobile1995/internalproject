<!-- archive-event page is created for single event archives -->

<?php 
get_header();
 pageBanner(array(
  'title' => 'All Events',
  'subtitle' => 'See what is going on in Mobile County! '
 ));
 ?>

<div class= "container container--narrow page-section">
 <?php

           

   while(have_posts()){
       the_post(); ?>
     <div class="event-summary">
     <a class="event-summary__date t-center" href="#">
                <span class="event-summary__month"><?php 
                   $eventDate = new DateTime(get_field('event_date'));
                   //$eventDate is an object that is created to represent the date
                   // 'event_date' is the custome field name for the date declared in WP
                   //get_field is used to echo the DateTime  
                   echo $eventDate->format('M') 
                ?></span> 
                <span class="event-summary__day"><?php echo $eventDate->format('d') ?></span> 
              </a>
              
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p><?php echo wp_trim_words(get_the_content(), 12); ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
              </div>
            </div>
   <?php }
   echo paginate_links(); // this line is used to continue page reading for the blogs
   //change the number of blogs to be dispalyed in WP-setting-Reading to have more than 2 blogs per page
 ?>

 <hr class = "section-break">
 
 <p>Looking for Past Events? <a href= "<?php echo site_url('/past-events')?>">Check out Past Events Archive</a>.</p>

</div>
<?php get_footer(); 
?>