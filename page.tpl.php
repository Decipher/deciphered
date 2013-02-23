<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>">

  <head>
    <title><?php print $head_title ?></title>
    <?php print $head ?>
    <?php print $styles ?>
    <?php print $scripts ?>
    <!--[if lt IE 7]>
    <style type="text/css" media="all">@import "<?php print base_path() . path_to_theme() ?>/css/ieFix.css";</style>
    <![endif]-->
  </head>
  
  <body<?php if ($is_front) print ' class="front"'; ?>>
    <div id="pageWrapper">
      <div id="layoutHeader">
        <div class="logo">
          <?php if ($logo) { ?>
          <a href="<?php print $base_path ?>" title="<?php print $site_name ?>"><img src="<?php print $logo ?>" alt="<?php print $site_name ?>" /></a>
          <?php } ?>
        </div>
      </div>
      <div id="layoutMain">
        <div id="navMenu">
          <?php print phptemplate_theme_links($primary_links); ?>
        </div>
        <div id="layoutContent">
          <div class="corners">
            <div class="corner grey top left"></div>
            <div class="corner grey top right"></div>
            <div class="corner grey bottom left"></div>
            <div class="corner grey bottom right"></div>
          </div>
          <div id="layoutContentMain">
            <div id="regionMain" class="content">
              <?php if ($tabs): print '<div id="tabs-wrapper">'; endif; ?>
              <?php if ($title): print '<h2'. ($tabs ? ' class="with-tabs"' : '') .'>'. $title .'</h2>'; endif; ?>
              <?php if ($tabs): print $tabs .'<div style="clear: both"></div></div>'; endif; ?>

              <?php if (isset($tabs2)): print $tabs2; endif; ?>

              <?php if ($help): print $help; endif; ?>
              <?php if ($messages): print $messages; endif; ?>
              <?php print $content ?>
            </div>
          </div>
          <div id="regionsSidebar">
            <?php print $sidebar ?>
          </div>
          <div id="layoutCopyright">
            <div class="rss"><a href="/rss.xml"><img src="/misc/feed.png" alt="Deciphered.RSS" />Deciphered.RSS</a></div>
            <div class="text"><?php print $footer_message ?></div>
            <div style="clear: both"></div>
          </div>
        </div>
      </div>
    </div>
    <?php print $closure ?>
  </body>

</html>