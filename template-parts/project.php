<?php
$paged = get_query_var('paged') ?: 1;
$args = [
    'posts_per_page' => 6,
    'post_type'      => 'project',
    'orderby'        => 'date',
    'order'          => 'ASC',
    'paged'          => $paged,
];

$project_posts = new WP_Query($args);

$project_section_title = get_field('project_section_title');
$project_section_heading = get_field('project_section_heading');
$project_section_description = get_field('project_section_description');
$project_section_button = get_field('project_section_button');

if ($project_section_button && is_array($project_section_button)) {
    $project_section_button_url = $project_section_button['url'];
    $project_section_button_title = $project_section_button['title'];
    $project_section_button_target = $project_section_button['target'];
}
?>
<section class="fatures">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="feature-head wow fadeInLeft">
                    <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/img/lamp-1.png" alt="image">
                    <div class="feature-hd-prnt">
                        <img src="<?php echo get_template_directory_uri(); ?>/inc/assets/img/lamp-2.png" alt="image">
                    </div>
                </div>
            </div>
        </div>
        <div class="row center-align">
            <div class="col-lg-4">
                <div class="feature-text wow fadeInDown">
                    <h6><?php echo esc_html($project_section_title); ?></h6>
                    <h3><?php echo esc_html($project_section_heading); ?></h3>
                    <p><?php echo esc_html($project_section_description); ?></p>
                    <a href="<?php echo esc_url($project_section_button_url); ?>" class="bss">
                        <?php echo esc_html($project_section_button_title); ?>
                    </a>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="slider-sec">
                    <div class="row gy-5">
                        <?php if ($project_posts->have_posts()): ?>
                            <?php while ($project_posts->have_posts()): $project_posts->the_post(); 
                                $image = get_the_post_thumbnail_url(get_the_ID());
                                $heading = get_the_title();
                                $description = get_the_excerpt();
                                $button_url = get_the_permalink();
                                $button_title = 'Read More';
                                if ($image || $heading): ?>
                                    <div class="col-lg-4">
                                        <div class="feature-box">
                                            <?php if ($image): ?>
                                                <div class="feature-img">
                                                    <img src="<?php echo esc_url($image); ?>" alt="image">
                                                </div>
                                            <?php endif; ?>
                                            <h6><?php echo esc_html($heading); ?></h6>
                                            <p><?php echo esc_html($description); ?></p>
                                            <a href="<?php echo esc_url($button_url); ?>"><?php echo esc_html($button_title); ?> <i class="fa-solid fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                <?php endif; 
                            endwhile; ?>
                        <?php else: ?>
                            <div class="col-lg-12">
                                <p>No content available.</p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
