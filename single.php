<?php
/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : single.php
 * Author       : Ebrahim Shafiei (EbraSha)
 * Email        : Prof.Shafiei@Gmail.com
 * Created On   : 2024-08-03 5:27 PM
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post text-right">
                    <?php if (has_post_thumbnail()) : ?>
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('full', ['class' => 'bd-placeholder-img card-img-top', 'style' => 'width: 100%; height: 225px; object-fit: cover;']); ?>
                        </a>
                    <?php endif; ?>


                    <h2 class="mt-5"><?php the_title(); ?></h2>
                    <div class="meta mb-3">
                        <?php
                        $time_diff = human_time_diff_carbon(get_the_time('U'));
                        echo '<span class="posted-on">' . $time_diff . '</span>';
                        ?> توسط <?php the_author(); ?>
                    </div>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
            <div class="text-center mt-4 mb-3">
                <a class="btn btn-primary" href="<?php echo home_url(); ?>">بازگشت به خانه</a>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>
