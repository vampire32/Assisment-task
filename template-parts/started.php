 
 <?php


// title
$contact_heading = get_field('contact_heading');

// title
$contact_description = get_field('contact_description');

// form
$contact_form = get_field('contact_form'); 


?>
 
 
 <!-- get startd start-->
 <section class="get-started">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="get-strtd-head wow fadeInDown">
              <h3><?php echo $contact_heading ?></h3>
              <p> <?php echo $contact_description ?></p>
            </div>
          </div>
        </div>
        <?php echo do_shortcode($contact_form); ?>
      </div>
    </section>
    <!-- get startd end-->