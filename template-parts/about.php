<?php

// title
$about_section_title = get_field('about_section_title');

// heading
$about_section_heading = get_field('about_section_heading');

// description
$about_section_desctiption = get_field('about_section_desctiption');

// button
$about_section_button = get_field('about_section_button');

if(isset($about_section_button) && is_array($about_section_button)) {
  $about_section_button_url = $about_section_button['url'];
  $about_section_button_title = $about_section_button['title'];
  $about_section_button_target = $about_section_button['target'];

}

// left first-image
$about_us_image = get_field('about_us_image');

if (isset ($about_us_image) && is_array($about_us_image)){
  $about_us_image = $about_us_image['url'];
}else {
  $about_us_image = '';
}



?>
  
  
  
  
  <!-- about start -->
  <section class="about-us">
      <div class="container-fluid">
        <div class="row rvrsee">
          <div class="col-lg-6 abc col-md-6">
            <div class="about-imgs wow fadeInLeft">
              <div class="about-top-img">
<?php 
    $about_us_image_second  = get_field('about_us_image_second');
if(is_array($about_us_image_second)):
  foreach($about_us_image_second as $sub_value):
?>
    <img src="<?php echo $sub_value['about_us_image_inner']['url']; ?>" class="abt-top" alt="image">
      <?php
  endforeach;
else :
endif;
?>
              </div>
                <div class="about-back">
                  <img src="<?php echo $about_us_image ?>" alt="image">
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6">
              <div class="about-text wow fadeInRight">
                <h6><?php echo $about_section_title ?></h6>
                <h2><?php echo $about_section_heading ?></h2>
                <p><?php echo $about_section_desctiption ?> </p>
                <div class="about-main">
                    <?php
if( have_rows('about_sec_card') ): // Check if the repeater field has rows
  while( have_rows('about_sec_card') ) : the_row(); // Loop through the rows of data

    // Get the sub-fields from the repeater
    $image = get_sub_field('about_card_image');
    $heading = get_sub_field('about_card_heading');
    $description = get_sub_field('about_card_description');

    // Make sure sub-fields are not empty before outputting
    if( $image || $heading ): 
?>
    <div class="below-abt">
      <ul>
        <li>
          <?php if($image): ?>
            <img src="<?php echo esc_url($image); ?>" alt="image">
          <?php endif; ?>
        </li>
        <li>
          <?php if($heading): ?>
            <h3><?php echo esc_html($heading); ?></h3>
          <?php endif; ?>
          <p><?php echo $description ?></p>
        </li>
      </ul>
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
                <a href="<?php echo $about_section_button_url ?> " class="bss"><?php echo $about_section_button_title ?></a>
              </div>
            </div>
          </div>
        </div>
    </section>
    <!-- about end -->