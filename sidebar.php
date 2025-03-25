<section class="menu">

    <?php get_search_form(); ?>

    <div id="category">
        <h3>-category-</h3>

        <!-- 特定のカテゴリーに属する記事を3件表示したい -->
        <?php
        $args = array(
            'category_name' => 'design',
            'posts_per_page' => 4
        );
        $the_query = new WP_Query($args);

        if ($the_query->have_posts()):
            while ($the_query->have_posts()):
                $the_query->the_post();
        ?>

                <article class="post">
                </article>

        <?php
            endwhile;
        endif;
        wp_reset_postdata();
        ?>

        <ul>
            <?php
            $arg = array(
                'title_li' => ''
            );
            wp_list_categories($arg);
            ?>
        </ul>


    </div>

    <div id="about">
        <h3>-about-</h3>
        <img class="icon" src="<?php echo get_theme_file_uri('./images/koara.jpg'); ?>" alt="">

        <dl>
            <dt>上水奏<br><span class="name">かみみずかなで</span></dt>
            <dd>トライデントコンピュータ専門学校Webデザイン学科1年生。HTML/CSSやデザインについて勉強中！</dd>
        </dl>
    </div>
</section>