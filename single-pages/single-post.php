<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package custom_theme
 */

get_header();


?>

<!-- Hero Banner Section Start -->

<!-- Hero Banner Section End -->

<!-- Single Post Content Start -->
<section class="single-post-content  py-5">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="entry-title text-capitalize my-3"><?php the_title(); ?></h1>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>	
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>
<!-- Single Post Content End -->

<?php get_footer(); ?>


<script>
	
$(".main_slider").mousemove(function(event) {
  var mousex = event.pageX - $(this).offset().left;
  var mousey = event.pageY - $(this).offset().top;
  var imgx = (mousex - 10) / 100;
  var imgy = (mousey - 10) / 100;
  $(this).find(' .banner_img  img').css({
      "transform": "translate(" + imgx + "%   ," + imgy + "%   )",
      "transition": "none"
  });


});

$(".main_slider ").mouseout(function() {
  $(this).find('img').css({
      "transform": "translate(0px,0px)",
      "transition": "0.5s ease-out"
  });
});

</script>