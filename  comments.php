<?php if (comments_open()) { ?>
  <h3 class="comments-caption">Comments</h3>
    <?php if (get_comments_number() == 0) { ?>
    <h4>Be the first to comment</h4>
    <?php } else { ?>
    <ol class="commentlist">
      <?php
        function verstaka_comment($comment, $args, $depth){
          $GLOBALS['comment'] = $comment; ?>
          <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <div id="comment-<?php comment_ID(); ?>">
              <?php echo get_avatar($comment,$size='71'); ?>
              <div class="answer">
                <?php printf(__('<h4 class="fn">%s</h4>'), get_comment_author_link()) ?>
                <p class="time"><?php printf(__('%1$s  &mdash;  %2$s'), get_comment_date('F j, Y'),  get_comment_time('g:i a')) ?></p>
                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Your comment is awaiting moderation.') ?></em>
                    <br>
                    <?php endif; ?>
                  <?php comment_text() ?>
                <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
                  
              </div>
            </div>
      <?php }
        $args2 = array(
          'reply_text' => '<i class="fa fa-reply"></i>  Click to Reply',
          'callback' => 'verstaka_comment'
        );
        wp_list_comments($args2);
      ?>
    </ol>
  <?php } ?>
 
  <?php
    $fields = array(
      'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name' ) . ($req ? '<span class="required">*</span>' : '') . '</label><input type="text" id="author" name="author" class="author" value="' . esc_attr($commenter['comment_author']) . '" placeholder="" pattern="[A-Za-zА-Яа-я]{3,}" maxlength="30" autocomplete="on" tabindex="1" required' . $aria_req . '></p>',
      'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email') . ($req ? '<span class="required">*</span>' : '') . '</label><input type="email" id="email" name="email" class="email" value="' . esc_attr($commenter['comment_author_email']) . '" maxlength="30" autocomplete="on" tabindex="2" required' . $aria_req . '></p>',
    );
 
    $args1 = array(
      'fields' => apply_filters('comment_form_default_fields', $fields),
        'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><textarea id="comment" name="comment" class="comment-form" cols="45" rows="8" aria-required="true"></textarea></p>',
        'comment_notes_before' => '',
        'title_reply'          => __( 'Leave a Comment' ),
        
      
    );
    add_filter('comment_form_fields', 'kama_reorder_comment_fields' );
    function kama_reorder_comment_fields( $fields ){
      // die(print_r( $fields )); // посмотрим какие поля есть

      $new_fields = array(); // сюда соберем поля в новом порядке

      $myorder = array('author','email','url','comment'); // нужный порядок

      foreach( $myorder as $key ){
        $new_fields[ $key ] = $fields[ $key ];
        unset( $fields[ $key ] );
      }
      return $new_fields;
    }

    comment_form($args1);

  ?>
  <?php } else { ?>
  <h3>Обсуждения закрыты для данной страницы</h3>
  <?php }
?>