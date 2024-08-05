<?php
/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : archive.php
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
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="meta">
                        <span>Posted on <?php the_date(); ?> by <?php the_author(); ?></span>
                    </div>
                    <div class="excerpt">
                        <?php the_excerpt(); ?>
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


