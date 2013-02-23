
<div class="node<?php if ($sticky) { print " sticky"; } if (!$status) { print " node-unpublished"; } if ($page == 0 && arg(0) != 'comment') { print " teaser"; } ?>">
  <?php if ($page == 0) { ?>
    <div class="title<?php if (!$picture) {print ' nobreak';}?>">
    <a href="<?php print $node_url?>"><?php print $node->field_author ? $title.' by '.$node->field_author[0]['view'] : $title; ?></a>
  </div>
  <?php }; ?>
  <div class="content">
    <?php if (!$sticky && ($page == 0 && arg(0) != 'comment')) { ?>
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
    <?php } ?>
      <?php print $content?>
    <?php if (!$sticky && ($page == 0 && arg(0) != 'comment')) { ?>
    </div>
    <?php } ?>
  </div>
  <?php if (($links || $terms)) { ?>
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
  <?php } else { ?>
  <div style="clear: both;"></div>
  <?php } ?>
</div>