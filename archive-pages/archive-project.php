<?php get_header(); ?>

<section class="archive-section py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h1 class="archive-title">Our Projects</h1>
            </div>
        </div>
        <div class="row g-4">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="col-md-6 col-lg-4">
                    <div class="card h-100">
                        <?php if (has_post_thumbnail()) : ?>
                            <a href="<?php the_permalink(); ?>">
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" class="card-img-top" alt="<?php the_title(); ?>">
                            </a>
                        <?php endif; ?>
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="<?php the_permalink(); ?>" class="text-decoration-none text-dark"><?php the_title(); ?></a>
                            </h5>
                            <p class="card-text"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></p>
                        </div>
                        <div class="card-footer bg-white border-0">
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
                <div class="col-lg-12">
                    <nav class="pagination-wrapper mt-4">
                        <?php
                        echo paginate_links([
                            'prev_text' => '&laquo; Previous',
                            'next_text' => 'Next &raquo;',
                        ]);
                        ?>
                    </nav>
                </div>
            <?php else : ?>
                <div class="col-lg-12 text-center">
                    <p>No posts found.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php get_footer(); ?>
