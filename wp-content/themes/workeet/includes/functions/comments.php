<?php if ( ! function_exists( 'et_custom_comments_display' ) ) :
function et_custom_comments_display($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
   <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
		<div class="comment-body">
		   <div id="comment-<?php comment_ID(); ?>" class="clearfix">
				<div class="avatar-box">
					<?php echo get_avatar($comment,$size='62'); ?>
					<span class="avatar-overlay"></span>
				</div> <!-- end .avatar-box -->
				<div class="comment-wrap clearfix">
					<div class="comment-meta commentmetadata"><?php printf('<span class="fn">%s</span>', get_comment_author_link()) ?> | <a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
							/* translators: 1: date, 2: time */
							printf( __( '%1$s at %2$s', 'LeanBiz' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( esc_html__( '(Edit)', 'LeanBiz' ), ' ' );
						?>
					</div><!-- .comment-meta .commentmetadata -->

					<?php if ($comment->comment_approved == '0') : ?>
						<em class="moderation"><?php esc_html_e('Your comment is awaiting moderation.','LeanBiz') ?></em>
						<br />
					<?php endif; ?>

					<div class="comment-content"><?php comment_text() ?></div> <!-- end comment-content-->
					<?php 
						$et_comment_reply_link = get_comment_reply_link( array_merge( $args, array('reply_text' => esc_attr__('Reply','LeanBiz'),'depth' => $depth, 'max_depth' => $args['max_depth'])) );
						if ( $et_comment_reply_link ) echo '<div class="reply-container">' . $et_comment_reply_link . '</div>';
					?>
				</div> <!-- end comment-wrap-->
			</div> <!-- end comment-body-->
		</div> <!-- end comment-body-->
<?php }
endif; ?>