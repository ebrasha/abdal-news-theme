<?php
/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : page.php
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
    <div class="row">
        <div class="col-md-8">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <div class="post">
                    <h2><?php the_title(); ?></h2>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endwhile; endif; ?>
        </div>
        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>

