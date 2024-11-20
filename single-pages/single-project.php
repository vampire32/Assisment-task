<?php
/**
 * Template for displaying single posts
 *
 * @package custom_theme
 */

get_header();
?>

<section class="single-post-content py-5">
    <div class="container">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <?php if ( has_post_thumbnail() ) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('full'); ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="entry-title text-capitalize my-3"><?php the_field('project_name'); ?></h1>
                </header>

                <div class="entry-content text-white">
                    <?php the_field('project_description'); ?>
                    
                    <?php 
                    $start_date = get_field('project_start_date',get_the_ID());
                    $end_date = get_field('project_end_date',get_the_ID());
                    ?>
                    <p class="text-white"><?php echo esc_html(date('F j, Y', strtotime($start_date))); ?></p>
                    <p class="text-white"><?php echo esc_html(date('F j, Y', strtotime($end_date))); ?></p>

                    <a class="text-uppercase" href="<?php the_field('project_url'); ?>" target="_blank">View the Project</a>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</section>

<?php get_footer(); ?>

<script>
$(".main_slider").mousemove(function(event) {
  var mousex = event.pageX - $(this).offset().left;
  var mousey = event.pageY - $(this).offset().top;
  var imgx = (mousex - 10) / 100;
  var imgy = (mousey - 10) / 100;
  $(this).find('.banner_img img').css({
      "transform": "translate(" + imgx + "% , " + imgy + "%)",
      "transition": "none"
  });
});

$(".main_slider").mouseout(function() {
  $(this).find('img').css({
      "transform": "translate(0px, 0px)",
      "transition": "0.5s ease-out"
  });
});
</script>
