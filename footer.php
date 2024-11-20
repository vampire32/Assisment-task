<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package custom_theme
 */

?>

<?php

// title
$footer_page_logo = get_field('footer_page_logo' , 'options');


// heading
$footer_page_description = get_field('footer_page_description' , 'options');
// copyright
$footer_copyright = get_field('footer_copyright' , 'options');

// social links
$footer_social_links = get_field('footer_social_links' , 'options');
if(isset($footer_social_links) && is_array($footer_social_links)) {
  $footer_social_links_url = $footer_social_links['url'];
  $footer_social_links_title = $footer_social_links['title'];
  $footer_social_links_target = $footer_social_links['target'];

}

// footer usefull links
$footer_contact_heading = get_field('footer_contact_heading' , 'options');
$footer_hours_heading = get_field('footer_hours_heading' , 'options' );
?>



	 <!-- footer start -->
	 <footer>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-3">
            <div class="logo-ftr wow fadeInLeft">
              <img src="<?php echo $footer_page_logo['url']; ?>" alt="image">
              <p><?php echo $footer_page_description; ?></p>
            
               <ul>
                <li><a href="<?php echo $footer_social_links_url; ?>" target="<?php echo $footer_social_links_target; ?>" ><i class="fa-brands fa-facebook"></i></a></li>
               </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="links wow fadeInDown">
              <h5>IMPORTANT LINKS</h5>
              <?php wp_nav_menu( array( 'theme_location' => 'footer', 'container' => '' ) ); ?>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="contact-link wow fadeInUp">
              <h5><?php echo $footer_contact_heading; ?></h5>
              <ul>
              <?php
                

                if( have_rows('footer_contact_links' , 'options') ):
                  while( have_rows('footer_contact_links' , 'options') ) : the_row(); 
                    $button = get_sub_field('footer_contact_link');
                    if ($button) {
                        $button_url = $button['url'];
                        $button_title = $button['title'];
                        $button_target = $button['target'];
                        ?>
                        <li><a href="<?php echo esc_url($button_url); ?>" target="<?php echo esc_attr($button_target); ?>"><i class="fa-solid fa-bolt"></i><?php echo esc_html($button_title); ?></a></li>
                        <?php
                    }
                  endwhile; 
                else :
                  echo '<p>No content available.</p>';
                endif;
                ?>
              </ul>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="opening-hours wow fadeInRight">
              <h5><?php echo $footer_hours_heading ?></h5>
              <ul>
                <?php 
                if( have_rows('footer_hour_links' , 'options') ):
                  while( have_rows('footer_hour_links' , 'options') ) : the_row(); 
                    $txt = get_sub_field('footer_hour_link');
                    if ($txt) :
                        ?>
                        <li><?php echo esc_html($txt); ?></li>
                        <?php
                    endif;
                  endwhile; 
                else :
                  echo '<p>No content available.</p>';
                endif;
                ?>
            
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="copyright">
        <div class="container">
          <p><?php echo $footer_copyright; ?></p>
        </div>
      </div>
    </footer>
    <!-- footer end -->
</div><!-- #page -->

<?php wp_footer(); ?>



</body>
</html>
