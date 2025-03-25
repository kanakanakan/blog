<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/the-new-css-reset/css/reset.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&family=Noto+Sans+JP:wght@100..900&display=swap"
        rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body>

    <header>
        <div class="single_inner">
            <h1 class="site_title"><a href="<?php echo home_url('/') ?>"><img src="<?php echo get_theme_file_uri('/images/blog_title.svg'); ?>" alt=""></a></h1>
        </div>
    </header>

    <main>
        <section class="content">
            <div class="single_inner">
                <ul class="page_list">
                    <li class="list"><a href="<?php echo home_url('/') ?>">ホーム</a></li>
                    <li>＜</li>
                    <li class="list"><a href="./single.html"><?php the_title(); ?></a></li>
                </ul>

                <h2 class="post_title"><?php the_title(); ?></h2>
                <p class="date"><?php the_time('Y.n.j'); ?></p>

                <section class="sentense">
                    <?php the_content() ?>
                </section>

            </div>
        </section>

        <div class="single_inner">
            <section class="form">
                <?php comments_template(); ?>
            </section>
        </div>

    </main>
    <?php get_footer(); ?>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const links = document.querySelectorAll('a[href^="#"]');

        links.forEach(link => {
            link.addEventListener("click", function(event) {
                event.preventDefault();
                const targetId = link.getAttribute("href");
                const targetElement = document.querySelector(targetId);

                let offset = 0; // デフォルトのオフセット

                if (targetId === "#first_heading") {
                    offset = 150; // #category のオフセット
                } else if (targetId === "#second_heading") {
                    offset = 150; // #about のオフセット
                } else if (targetId === "#third_heading") {
                    offset = 150;
                } else if (targetId === "#forth_heading") {
                    offset = 150;
                }

                const elementPosition = targetElement.getBoundingClientRect().top;
                const offsetPosition = elementPosition + window.pageYOffset - offset;

                const finalPosition = targetId === "#top" ? 0 : offsetPosition;

                window.scrollTo({
                    top: finalPosition,
                    behavior: 'smooth'
                });
            });
        });
    });
</script>

</html>