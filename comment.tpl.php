<div class="comment<?php print ($comment->status == COMMENT_NOT_PUBLISHED ? ' comment-unpublished' : '') ?>">
  <div class="body">
    <div class="corners">
      <div class="corner line top left"></div>
      <div class="corner line top right"></div>
      <div class="corner line bottom left"></div>
      <div class="corner line bottom right"></div>
    </div>
    <div class="subject">
      <?php print l($comment->subject, $_GET['q'], array('fragment' => 'comment-'. $comment->cid)) .' '. theme('mark', $comment->new) ?>
    </div>
    <?php print $comment->comment ?>
    <div class="links">
      <?php print_r($links); ?>
    </div>
    <div style="clear: both;"></div>
    <div class="bit"></div>
  </div>
  <div class="credit">
    <strong><?php print theme('username', $comment) ?></strong> on <?php print format_date($comment->timestamp) ?>
  </div>
</div>