<!--page.php is used for individual pages -->

<?php
 
 get_header();
 
 while(have_posts()){
     the_post(); 
     pageBanner(array(
       // 'title' => 'This is the Title' , //this is the page title var
       // 'subtitle' => 'the subtitle goes here' -- page subtitle
      //photo => 'https://www.prlog.org/12672736-dauphin-street-mobile-al.jpg'
     ));
     ?>
    
    

  <div class="container container--narrow page-section">
    
    <?php
       $theParent = wp_get_post_parent_id(get_the_ID());
       if($theParent){ ?>
       <div class="metabox metabox--position-up metabox--with-home-link">
      <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent);?>"><i class="fa fa-home" aria-hidden="true"></i> 
      Back to <?php echo get_the_title($theParent);?></a> 
      <span class="metabox__main"><?php the_title();?></span></p>
     </div> 
    <?php }
    ?> 
   
    <!-- the code below is used to indicate the dynamic parentchild pages -->
    <?php 
    $testArray = get_pages(array(
        'child_of' => get_the_ID()
    ));
    //If condition below is used to display and check the childpage block with its parent page
    if($theParent or $testArray){ ?>
    <div class="page-links">
      <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent);?>"><?php echo get_the_title($theParent); ?></a></h2>
      <ul class="min-list">
       <?php 
        if($theParent){
            $findChildrenOf = $theParent;
        }
        else{
            $findChildrenOf = get_the_ID();
        }
         wp_list_pages(array(
             'title_li' => NULL,
             'child_of' => $findChildrenOf
             // inorder to set the order of the child pages use 'sort_column' => 'menue_order' 
             //if needed further later change the order of the page in wp pages menue
         ));
        ?>
      </ul>
    </div>
    <?php 
    } ?>

    <div class="generic-content">
     <?php the_content(); ?>
    </div>

  </div>

 <?php }

get_footer();
?>