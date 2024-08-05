<?php
/*
 **********************************************************************
 * -------------------------------------------------------------------
 * Project Name : AbdalNewsTheme
 * File Name    : header.php
 * Author       : Ebrahim Shafiei (EbraSha)
 * Email        : Prof.Shafiei@Gmail.com
 * Created On   : 2024-08-03 5:26 PM
 * Description  : [A brief description of what this file does]
 * -------------------------------------------------------------------
 *
 * "Coding is an engaging and beloved hobby for me. I passionately and insatiably pursue knowledge in cybersecurity and programming."
 * – Ebrahim Shafiei
 *
 **********************************************************************
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
    <?php wp_head(); ?>
</head>
<body>

<header class="mb-5">
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">درباره ما</h4>
                    <p class="text-white"><?php bloginfo('description'); ?></p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">صفحات مهم</h4>
                    <ul class="list-unstyled">
                        <li><a href="<?php echo home_url(); ?>" class="text-white">خانه</a></li>
                        <?php
                        wp_list_pages(array(
                            'title_li' => '', // حذف عنوان پیش‌فرض
                            'link_before' => '<span class="text-white">',
                            'link_after' => '</span>',
                        ));
                        ?>
                    </ul>
                </div>

            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>