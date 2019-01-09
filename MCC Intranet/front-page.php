<!--front-page.php is the home page of the site -->

<?php get_header();  //used to pull the content from header.php ?>

<div class="page-banner">
<div class="page-banner__bg-image" style="background-image: url(<?php echo 
   get_theme_file_uri('images/mobile-sunset-image.gif') ?>);"></div>
  <div class="page-banner__content container t-center c-white">
    <h1 class="headline headline--large"><strong>I N T R A N E T </strong></h1>
    <h2 class="headline headline--medium">Mobile County Commission</h2>
    <h3 class="headline headline--small">We think you&rsquo;ll like the Digital Workspace.</h3>
    <a href="#" class="btn btn--large btn--blue">Get Started!</a>
  </div>
</div>

 <div class="full-width-split group">
   <div class="full-width-split__one">
     <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">Upcoming Events</h2>
        <!--  the code below is the custome query for the Events post using the while loop of the function -->

         <?php 
            $today = date('Ymd'); 
            $homepageEvents = new WP_Query(array(
              'posts_per_page' => 2,
              'post_type' => 'event',
              'meta_key' => 'event_date',
              'orderby' => 'meta_value_num',
              'order' => 'ASC',
              'meta_query' => array(
                array(
                  'key' => 'event_date',
                  'compare' => '>=',
                  'value' => $today,
                  'type' => 'numeric' //numeric type of date is used to compare event_date within WP
                )
              )
             
            ));
          // the $eventDate class is declared to dispaly the event_date custome field
          while($homepageEvents->have_posts()) {
            $homepageEvents->the_post(); ?>
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
                <p><?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(), 12);
                    } ?> <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
              </div>
            </div>
          <?php }
        ?>
        
        <p class="t-center no-margin"><a href="<?php echo get_post_type_archive_link('event')?>" class="btn btn--blue">View All Events</a></p>
  
      </div>
    </div>
    <div class="full-width-split__two">
      <div class="full-width-split__inner">
        <h2 class="headline headline--small-plus t-center">From Our Blogs</h2>
        <?php
          $homepagePosts = new WP_Query(array(
            'posts_per_page' => 2
          ));

          while ($homepagePosts->have_posts()) {
            $homepagePosts->the_post(); ?>
            <div class="event-summary">
              <a class="event-summary__date event-summary__date--beige t-center" href="<?php the_permalink(); ?>">
                <span class="event-summary__month"><?php the_time('M'); ?></span>
                <span class="event-summary__day"><?php the_time('d'); ?></span>  
              </a>
              <div class="event-summary__content">
                <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                <p>
                <?php if (has_excerpt()) {
                    echo get_the_excerpt();
                  } else {
                    echo wp_trim_words(get_the_content(),12);
                    } ?>
                 <a href="<?php the_permalink();?>" class="nu gray">Read more</a></p>

                 <!-- echo wp_trim_words() function is used to display the content and number of words used within the blog to display on the page 
                  we can write the had crafted blogs in wp and excert it to the home page insteas of echo wp_trim_words() we can use the_excerpt(); 
                  before using excerpt function make the needed changes in wp-admin posts.
                  we can use an if-statement in further if we want to excerpt a blog/events and trim another blog then use an if-stament as below
                   if(has_excerpt()){
                     the_excerpt();
                   }else{
                     echo wp_trim_words(get_the_content(), 12);
                   }
                -->
              </div>
            </div>
        
      <?php }
      wp_reset_postdata(); //this will reset the posts data within the wordpress blogs
     ?>
      
      <p class="t-center no-margin"><a href="<?php echo site_url('/blogs'); ?>" class="btn btn--yellow">View All Blog Posts</a></p>
    </div>
  </div>
</div>

<div class="hero-slider">
<div class="hero-slider__slide" style="background-image: url(<?php echo 
 get_theme_file_uri('images/UnityPoint.gif') ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">Employee Handbook</h2>
      <p class="t-center">Its important to know your Benifits.</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/employee-kayak-river.gif') ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">Meet your Co-Worker</h2>
      <p class="t-center">Mobile County Commission has more than 1500 Employees.</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
<div class="hero-slider__slide" style="background-image: url(<?php echo get_theme_file_uri('images/MiddleBayLight.gif') ?>);">
  <div class="hero-slider__interior container">
    <div class="hero-slider__overlay">
      <h2 class="headline headline--medium t-center">Birthdays</h2>
      <p class="t-center">Share your best wishes with your Co-Worker</p>
      <p class="t-center no-margin"><a href="#" class="btn btn--blue">Learn more</a></p>
    </div>
  </div>
</div>
</div>

<?php get_footer();
 
 ?>