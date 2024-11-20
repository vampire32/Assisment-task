<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = [
    'posts_per_page' => 12,
    'post_type'      => 'post',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'paged'          => $paged,
];

$blog_posts = new WP_Query($args);
?>

<section class="blog">
    <div class="container-fluid">
        <div class="row gy-5">
            <div class="col-lg-12">
                <div class="blog-head wow fadeInDown mb-4">
                    <h1>Our Latest Blogs</h1>
                </div>
            </div>
            <?php if ($blog_posts->have_posts()) : while ($blog_posts->have_posts()) : $blog_posts->the_post(); ?>
                <div class="col-lg-4">
                    <div class="blog-box wow fadeInLeft">
                        <div class="blog-img">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('full', ['alt' => get_the_title()]); ?>
                            <?php endif; ?>
                        </div>
                        <h6><?php echo get_the_date(); ?></h6>
                        <h4><?php the_title(); ?></h4>
                        <p class="lh-lg"><?php the_excerpt(); ?></p>
                        <a class="text-uppercase" href="<?php the_permalink(); ?>">Read More</a>
                    </div>
                </div>
            <?php endwhile; ?>
            <div class="col-lg-12">
                <div class="pagination">
                    <?php
                    echo paginate_links([
                        'total'        => $blog_posts->max_num_pages,
                        'current'      => $paged,
                        'format'       => '?paged=%#%',
                        'show_all'     => false,
                        'type'         => 'plain',
                        'prev_text'    => '« Previous',
                        'next_text'    => 'Next »',
                    ]);
                    ?>
                </div>
            </div>
            <?php else : ?>
                <p>No content available.</p>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
