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

                <div class="item">
                    <section class="allpost">

                        <div id="alltext">

                            <?php if (have_posts()): ?>
                                <?php while (have_posts()): ?>
                                    <?php the_post(); ?>


                                    <article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>
                                        <a href="<?php the_permalink(); ?>">
                                            <div class="thumbnail">
                                                <?php the_post_thumbnail('large'); ?>
                                            </div>
                                            <div class=" text">
                                                <dl>
                                                    <p class="time"><?php the_time('Y.n.j'); ?></p>
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

    <footer>
        <?php get_footer(); ?>
    </footer>

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

    <?php wp_footer(); ?>
</body>


</html>