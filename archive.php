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
    <link
        href="https://fonts.googleapis.com/css2?family=Kiwi+Maru:wght@300;400;500&family=Noto+Sans+JP:wght@100..900&display=swap"
        rel="stylesheet">

    <?php wp_head(); ?>
</head>


<body>
    <?php wp_body_open(); ?>

    <header>
        <div class="inner">
            <nav>

                <ul>

                    <li>
                        <a href="#top"><img src="<?php echo get_theme_file_uri('./images/bird1.svg') ?>" alt="">
                            <p>top</p>
                        </a>
                    </li>

                    <li>
                        <a href="#category"><img src="<?php echo get_theme_file_uri('./images/bird2.svg') ?>" alt="">
                            <p>category</p>
                        </a>
                    </li>

                    <li>
                        <a href="#about"><img src="<?php echo get_theme_file_uri('./images/bird3.svg') ?>" alt="">
                            <p>about</p>
                        </a>
                    </li>

                </ul>
            </nav>
        </div>
    </header>


    <main>
        <section id="top" class="mainimg">
            <div class="inner">
                <h1><img src="<?php echo get_theme_file_uri('./images/main_image.svg'); ?>" alt=""></h1>
            </div>
        </section>

        <div class="contents">

            <div class="inner">
                <img class="board" src="<?php echo get_theme_file_uri('./images/board.svg'); ?>" alt="">

                <ul class="page_list">
                    <li class="list"><a href="<?php echo home_url('/') ?>">ホーム</a></li>
                    <li>＞</li>
                    <li class="list"><?php single_cat_title(); ?></li>
                </ul>

                <div class="item">
                    <section class="allpost">


                        <p class="nav_title">
                            <?php if (is_category()) : ?>
                                カテゴリー「<?php single_cat_title(); ?>」に属する記事一覧
                            <?php elseif (is_tag()) : ?>
                                タグ「<?php single_tag_title(); ?>」が設定された記事一覧
                            <?php elseif (is_date()) : ?>
                                「<?php echo get_the_date('Y年n月'); ?>」に投稿された記事一覧
                            <?php else: ?>
                                「<?php the_archive_title(); ?>」に関する記事一覧
                            <?php endif; ?>
                        </p>

                        <div id="alltext">

                            <?php if (have_posts()): ?>
                                <?php while (have_posts()): ?>
                                    <?php the_post(); ?>

                                    <?php
                                    $cat = get_the_category();
                                    $cat = $cat[0];
                                    ?>

                                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="thumbnail">
                                                <?php the_post_thumbnail('large'); ?>
                                            </div>
                                            <div class=" text">
                                                <dl>
                                                    <p class="time"><?php the_time('2024.4.9'); ?></p>
                                                    <dt><?php the_title(); ?></dt>
                                                    <dd><?php the_excerpt(); ?></dd>
                                                </dl>
                                            </div>

                                        </a>
                                    </article>

                                <?php endwhile; ?>
                            <?php else: ?>
                                <p>記事がありません。</p>
                            <?php endif; ?>

                        </div>

                        <div class="nav-page">
                            <?php the_posts_pagination(array('prev_text' => '<', 'next_text' => '>', 'type' => 'list')); ?>
                        </div>
                    </section>

                    <?php get_sidebar(); ?>

                </div>
            </div>
    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const links = document.querySelectorAll('a[href^="#"]');

            links.forEach(link => {
                link.addEventListener("click", function(event) {
                    event.preventDefault();
                    const targetId = link.getAttribute("href");
                    const targetElement = document.querySelector(targetId);

                    let offset = 0; // デフォルトのオフセット

                    if (targetId === "#category") {
                        offset = 150; // #category のオフセット
                    } else if (targetId === "#about") {
                        offset = 150; // #about のオフセット
                    } else if (targetId === "#top") {
                        offset = 0;
                    } else if (targetId === "#alltext") {
                        offset = 180;
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
    <?php get_footer(); ?>
    <?php wp_footer(); ?>
</body>


</html>