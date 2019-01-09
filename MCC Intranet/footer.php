

<footer class="site-footer">

    <div class="site-footer__inner container container--narrow">

      <div class="group">

        <div class="site-footer__col-one">
          <h1 class="school-logo-text school-logo-text--alt-color"><a href="<?php echo site_url() ?>"><strong>I N T R A N E T</strong></a></h1>
          <p><a class="site-footer__link" href="#">251.574.xxxx</a></p>
        </div>

        <div class="site-footer__col-two-three-group">
          <div class="site-footer__col-two">
            <h3 class="headline headline--small">Explore</h3>
            <nav>
            <?php 
             wp_nav_menu(array(
             'theme_location' => 'footerLocationOne'
             ));
            ?>
          </div>
           <!--
            <ul class="nav-list min-list">
                <li><a href="#">Our Locations</a></li>
                <li><a href="#">Events</a></li>
                <li><a href="#">Blogs</a></li>
              </ul>
            </nav>
           </div>
           !-->
           <div class="site-footer__col-three">
            <h3 class="headline headline--small">Learn</h3>
            <nav>
            <?php 
             wp_nav_menu(array(
             'theme_location' => 'footerLocationTwo'
             ));
            ?>
            </nav>
          </div>
          </div>

        <div class="site-footer__col-four">
          <h3 class="headline headline--small">Connect With Us</h3>
          <nav>
            <ul class="min-list social-icons-list group">
              <li><a href="<?php the_permalink('https://www.facebook.com/MobileCountyAL/')?>" class="social-color-facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-youtube"><i class="fa fa-youtube" aria-hidden="true"></i></a></li>
              <li><a href="#" class="social-color-instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
            </ul>
          </nav>
        </div>
      </div>

    </div>
  </footer>

<!-- the code below is written for the search  -->
<div class= "search-overlay"> 
  <div class ="search-overlay__top">
   <div class="container">
   <i class="fa fa-search search-overlay__icon" aria-hidden="true"></i>
   <input type = "text" class="search-term" placeholder="what are you looking for?" id="search-term">
   <i class="fa fa-window-close search-overlay__close" aria-hidden="true"></i>
   </div>
  </div>
</div>

<?php wp_footer(); ?>
</body>
</html>