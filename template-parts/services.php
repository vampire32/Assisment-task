  
  <?php


// title
$service_page_title = get_field('service_page_title');

// heading
$service_page_heading = get_field('service_page_heading');




  ?>

  
  
  
  <!-- service start -->
  <section class="services">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
           <div class="service-head wow fadeInDown">
            <h6><?php echo $service_page_title?></h6>
            <h4><?php echo $service_page_heading?></h4>
          </div>
          </div>
          <?php
if( have_rows('service_card') ): // Check if the repeater field has rows
  while( have_rows('service_card') ) : the_row(); // Loop through the rows of data

    // Get the sub-fields from the repeater
    $image = get_sub_field('service_card_image');
    $heading = get_sub_field('service_card_heading');
    $description = get_sub_field('service_card_description');

    // Make sure sub-fields are not empty before outputting
    if( $image || $heading ): 
?>
          <div class="col-lg-4">
            <a href="service-detail.html"><div class="service-box ">
              <div class="number">01</div>
              <ul>
                <li>
                <div class="serice-box-top">
                <?php if($image): ?>
                  <img src="<?php echo esc_url($image); ?>" alt="image">
                <?php endif; ?>
                </div>
                </li>
                <li><?php if($heading): ?>
            <h6><?php  print $heading ?></h6>
          <?php endif; ?></li>
              </ul>
             <p><?php echo $description ?></p>
            </div></a>
          </div>
          <?php
    endif; // End sub-field check

  endwhile; // End repeater loop
else :
  // No rows found
  echo '<p>No content available.</p>';
endif;
?>
         
        </div>
      </div>
    </section>
    <!-- service end -->