<?php
/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : index.php
 * Author       : Ebrahim Shafiei (EbraSha)
 * Email        : Prof.Shafiei@Gmail.com
 * Created On   : 2024-08-03 4:45 PM
 * Description  : [A brief description of what this file does]
 * -------------------------------------------------------------------
 *
 * "Coding is an engaging and beloved hobby for me. I passionately and insatiably pursue knowledge in cybersecurity and programming."
 * – Ebrahim Shafiei
 *
 **********************************************************************
 */
?>

<?php get_header(); ?>
<main>

    <section class="py-5 text-center container">
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">به <?php bloginfo('name'); ?> خوش آمدید</h1>
                <p class="lead text-muted"><?php bloginfo('description'); ?></p>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <div class="col">
                        <div class="card shadow-sm">
                            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('full', ['class' => 'bd-placeholder-img card-img-top', 'style' => 'width: 100%; height: 225px; object-fit: cover;']); ?>
                                </a>
                            <?php else : ?>
                                <a href="<?php the_permalink(); ?>">
                                    <img class="bd-placeholder-img card-img-top" width="100%" height="225" src="<?php echo get_template_directory_uri(); ?>/img/def.jpg" alt="Thumbnail">
                                </a>
                            <?php endif; ?>

                            <div class="card-body">
                                <h3><?php the_title(); ?> </h3>
                                <p class="card-text"><?php the_excerpt(); ?></p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <a href="<?php the_permalink(); ?>" type="button" class="btn btn-sm btn-outline-secondary">دیدن ادامه خبر</a>
                                    </div>
<!--                                    <small class="text-muted">--><?php //echo human_time_diff_carbon(get_the_time('U')); ?><!--</small>-->
                                    <small class="text-muted"> توسط <?php the_author(); ?></small>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

                <?php else : ?>
                    <p class="text-center">مطلبی یافت نشد.</p>
                <?php endif; ?>

            </div>

            <div class="pagination justify-content-center mt-4">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('« قبلی', 'textdomain'),
                    'next_text' => __('بعدی »', 'textdomain'),
                ));
                ?>
            </div>

        </div>
    </div>

</main>
<?php get_footer(); ?>
