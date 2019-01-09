<!-- archive-event page is created for single event archives -->

<?php 
get_header();
pageBanner(array(
  'title' => 'Past Events' ,
  'subtitle' => 'A recap of our Past Events'
)); ?>

<div class= "container container--narrow page-section">
 <?php

   $today = date('Ymd'); 
   $pastEvents = new WP_Query(array(
  'paged' => get_query_var('paged',1), 
  //get_query_var functioned to verify the paged url and if it doesnt give the url paged number which means it is in the 1st page of Events 
  'posts_per_page' => 2,
  'post_type' => 'event',
  'meta_key' => 'event_date',
  'orderby' => 'meta_value_num',
  'order' => 'ASC',
  'meta_query' => array(
    array(
      'key' => 'event_date',
      'compare' => '<',
      'value' => $today,
      'type' => 'numeric' //numeric type of date is used to compare event_date within WP
    )
  )
 
));           

   while($pastEvents->have_posts()){
       $pastEvents->the_post(); ?>
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
   echo paginate_links(array(
       'total' => $pastEvents->max_num_pages
   )); 
   
   
   // paginate_links() ; used to continue page reading for the blogs/events 
   //change the number of blogs to be dispalyed in WP-setting-Reading to have more than 2 blogs per page
 ?>
</div>
<?php get_footer(); 
?>