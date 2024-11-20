<?php


// heading
$hero_section_title = get_field('hero_section_title');

// description
$hero_section__description = get_field('hero_section__description');

// button
$hero_section_button = get_field('hero_section_button');

if(isset($hero_section_button) && is_array($hero_section_button)) {
    $hero_section_button_url = $hero_section_button['url'];
    $hero_section_button_title = $hero_section_button['title'];
    $hero_section_button_target = $hero_section_button['target'];

}


// image
$hero_section_right_image = get_field('hero_section_right_image');

if ( isset ($hero_section_right_image ) && is_array( $hero_section_right_image ) ) {
    $hero_section_right_image = $hero_section_right_image['url'];
}else{
    $hero_section_right_image = '';
}

// bg-image
$hero_section_background_image = get_field('hero_section_background_image');

if ( isset ($hero_section_background_image ) && is_array( $hero_section_background_image ) ) {
    $hero_section_background_image = $hero_section_background_image['url'];
}else{
    $hero_section_background_image = '';
}



?>

    
    <!-- banner start -->
    <section class="main_slider">
        <div class="banner-bg-img">
            <img src="<?php echo $hero_section_background_image ?>" class="img-fluid custom-img" alt="...">
            </div>
            <div class="banner-text">
            <div class="container-fluid">
                <div class="row align-items-center">
                <div class="col-md-5">
                        <div class="banner_text wow fadeInLeft" data-wow-duration="2s">
                            <?php if($hero_section_title) { ?>
                            <h1><?php echo $hero_section_title ?></h1>
                            <?php } ?>
                                <p><?php echo $hero_section__description ?></p>
                            <a href="<?php echo $hero_section_button_url ?>" target="<?php echo $hero_section_button_target ?>" class="bss"><?php echo $hero_section_button_title ?></a>
                        </div>
                    </div>
                  <div class=" col-md-7 align-self-center">
                    <div class="banner_img wow bounceIn" data-wow-duration="2s"> 
                         <img src="<?php echo $hero_section_right_image ?>"  class="img-fluid"  alt="">
                    </div>
                  </div>
                        
                </div>
            </div>
            </div>
   </section>
    <!-- banner end -->