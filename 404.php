<!DOCTYPE html>
<html lang=<?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_theme_file_uri('./style.css') ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/the-new-css-reset/css/reset.min.css">
    <meta name="description" content="<?php bloginfo('description'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <?php wp_head(); ?>
</head>


<body>
    <div class="body404">
        <img class="illust404" src="<?php echo get_theme_file_uri("./images/illust404"); ?>" alt="">
        <section class="snow404">
            <div class="inner">
                <h1>404 Not Found</h1>
                <p>ページが見つかりませんでした</p>
                <a class="error_homeback" href="<?php echo home_url('/') ?>">>>>ホームに戻る</a>
            </div>
        </section>
    </div>
</body>


</html>