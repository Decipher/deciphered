<div class="node<?php if ($sticky) { print " sticky"; } if (!$status) { print " node-unpublished"; } if ($page == 0 && arg(0) != 'comment') { print " teaser"; } ?>">
  <?php if ($page == 0) : ?>
    <div class="title<?php if (!$picture) {print ' nobreak';}?>">
    <a href="<?php print $node_url?>"><?php print $node->field_author ? $title.' by '.$node->field_author[0]['view'] : $title; ?></a>
  </div>
  <?php endif; ?>
  <div class="content">
    <?php if (!$sticky && ($page == 0 && arg(0) != 'comment')) : ?>
    <?php $date = split(" ", format_date($node->created, 'custom', 'd M Y')); ?>
    <div class="date">
      <div class="corners">
        <div class="corner white top left"></div>
        <div class="corner white top right"></div>
        <div class="corner white bottom left"></div>
        <div class="corner white bottom right"></div>
      </div>
      <span class="day"><?php print $date[0] ?></span>
      <span class="month"><?php print $date[1] ?></span>
    </div>
    <div class="text">
    <?php endif; ?>
    <?php if ($page == 0) : ?>
      <?php print l(
          theme('imagecache', 'skinMedium',
            $node->field_preview_image_2[0]['filepath'] ?
              $node->field_preview_image_2[0]['filepath'] :
              $node->field_preview_image_1[0]['filepath']
          ), 'node/'.$node->nid, array('html' => TRUE)
        );
      ?>
      <?php print $node->content['body']['#value'] ?>
    <?php else: ?>
      <div class="screenshots">
        <?php print theme('imagecache', 'skinLarge', $node->field_preview_image_1[0]['filepath']); ?>
        <?php if ($node->field_preview_image_2[0]['filepath']) print theme('imagecache', 'skinLarge', $node->field_preview_image_2[0]['filepath']); ?>
      </div>
      <div class="details">
        <p>
          <strong>Author:</strong> <?php print l(check_plain($node->field_author[0]['value']), 'skins/author/'. check_plain($node->field_author[0]['value'])); ?><br />
          <strong>Device:</strong> <?php $i = array_keys($node->taxonomy); print l($node->taxonomy[$i[0]]->name, 'taxonomy/term/'.$i[0]); ?>
        </p>
        <?php if ($node->field_more_information_url[0]['value'] || $node->field_authors_website[0]['value']) { ?>
        <p>
          <strong>More Information (External):</strong><br />
          <?php if ($node->field_authors_website[0]['value']) print "&nbsp;&nbsp;&nbsp;&nbsp;".l($node->field_author[0]['view'], $node->field_authors_website[0]['value']); ?>
          <?php if ($node->field_more_information_url[0]['value'] && $node->field_authors_website[0]['value']) print "<br />\n\r"; ?>
          <?php if ($node->field_more_information_url[0]['value']) print "&nbsp;&nbsp;&nbsp;&nbsp;".l($node->title, $node->field_more_information_url[0]['value']); ?>
        </p>
        <?php } ?>
        <p>
          <?php $file = array_pop($node->files); ?>
          <strong>Download:</strong> <?php print l(drupal_strtoupper(drupal_substr($file->filename, -4)).' ('.(($file->filesize/1024 < 1024) ? number_format(($file->filesize/1024), 0, '.', '').' KB)' : number_format(($file->filesize/1024/1024), 2, '.', '').' MB)'), $file->filepath); ?><br />
          <?php if ($node->field_mobile_code[0]['view']) { ?>
          <strong>Mobile Code</strong><br /> <?php print $node->field_mobile_code[0]['view'] ?>
          <?php } ?>
        </p>
      </div>
      <div class="description">
        <?php print $node->content['body']['#value'] ?>
      </div>
    <?php endif; ?>
    <?php if (!$sticky && ($page == 0 && arg(0) != 'comment')) : ?>
    </div>
    <?php endif; ?>
  </div>
  <?php if (($links || $terms)) : ?>
  <div class="linksContainer">
    <div class="corners">
      <div class="corner white top left"></div>
      <div class="corner white top right"></div>
      <div class="corner white bottom left"></div>
      <div class="corner white bottom right"></div>
    </div>
    <?php if ($links) { ?><div class="postlinks"><?php print $links?></div><?php }; ?>
    <?php if ($terms) { ?><div class="taxonomy"><img src="<?php print base_path() . path_to_theme() ?>/images/icons/tags.png" alt="Tags" /> <?php print $terms?></div><?php } ?>
  </div>
  <?php else: ?>
  <div style="clear: both;"></div>
  <?php endif; ?>
</div>