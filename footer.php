<footer class="default">
  <div class="container">
    <div class="footer-inner">
      <nav class="footer-nav">  
        <?php wp_nav_menu( array( 
          'theme_location'  => 'footer_menu', 
          'container_class' => '',
          'container'       => false, 
          'menu_class'      => 'menu-footer'
        ) ); ?>
      </nav>
    </div><!-- .footer-inner -->
  </div><!-- .container -->
</footer>

<section id="modals"></section>



<?php wp_footer(); ?> 
</body>
</html>