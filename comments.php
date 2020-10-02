<?php

if (post_password_required())

    return;

?>
<div id="post-comments" class="comments-area">

    <?php if (have_comments()) : ?>

        <h3 class="comment-title"><?php echo get_comments_number(); ?> دیدگاه برای این مطلب ثبت شده است</h3>

        <div class="comment-list">
            <ol>

                <?php wp_list_comments(array('callback' => 'comments_callback', 'style' => 'ul')); ?>

            </ol><!-- .commentlist -->
        </div>


        <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // are there comments to navigate through  ?>

            <div class="box comment-pagination">

                <?php paginate_comments_links(); ?>

            </div>

        <?php endif; // check for comment navigation  ?>



        <?php

        /* If there are no comments and comments are closed, let's leave a note.

         * But we only want the note on posts and pages that had comments in the first place.

         */

        if (!comments_open() && get_comments_number()) :

            ?>

            <p class="nocomments">No Comments</p>

        <?php endif; ?>



    <?php endif; // have_comments()  ?>
    <?php

    $commenter=  wp_get_current_commenter();

    $req=  get_option('require_name_email');

    $aria_req=($req?"aria-required='true'":'');

    $fields =  array(

        'author' => '<div class="comment-frm-row">' . '<label for="author">' . __( '' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .

            '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" placeholder="نام شما : " size="30"' . $aria_req . ' /></div>',

        'email'  => '<div class="comment-frm-row"><label for="email">' . __( '' ) . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) .

            '<input class="form-control" id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" placeholder="ایمیل شما : " size="30"' . $aria_req . ' /></div>',

        'url'    => '<div  class="comment-frm-row"><label for="url">' . __( ' ' ) . '</label>' .

            '<input class="form-control" id="url" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '" placeholder="وب سایت شما : " size="30" /></div><div class="clearfix"></div>',

    );

    $comments_args=array(

        'fields'=>$fields,

        'title_reply'=>'دیدگاه خود را بیان کنید : ',

        'label_submit'=>'ارسال دیدگاه',

        //'comment_notes_before'=>'<p class="comment-notes">Some Texts</p>',

       // 'comment_notes_after'=>'<p class="comment-notes-after">Some Text</p>'

    );

    comment_form($comments_args); ?>



</div><!-- #comments .comments-area -->
