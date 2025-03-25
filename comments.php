<div class="comment">
    <div class="comment-form">
        <?php $args = array(
            'title_reply' => 'コメントする',
            'label_submit' => '送信する',
            'fields' => array(
                'author' =>
                '<p class="comment-form-author"><label for="name">名前</label>
                <span class="required">*</span>
                <input id="name" name="name" type="text" required>
                </p>',
                'email' =>
                '<p class="coment-form-email"><label for="email">メール</label><input id="email" name="email" type="email" value="" aria-describedby="email-notes" autocomplete="email"></p>',
            ),

            'url()' => '',
            'comment_field' => '<p>コメント</p><textarea id="input" name="comment" cols="45" rows="5" maxlength="65525" required></textarea>',
        ); ?>
        <?php comment_form($args); ?>
    </div>

    <div class="commets-list">
        <?php if (have_comments()): ?>
            <h3>みんなのコメント</h3>
            <ol>
                <?php wp_list_comments(); ?>
            </ol>
        <?php endif; ?>
    </div>
</div>