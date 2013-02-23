<?php
// $Id: views-view-fields.tpl.php,v 1.5 2008/05/05 23:51:47 merlinofchaos Exp $
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->separator: an optional separator that may appear before a field.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<h3><?php print $fields['field_preview_image_1_fid']->handler->view->description ?></h3>
<?php
  if ($fields['field_preview_image_2_fid']->raw == 0) {
    print $fields['field_preview_image_1_fid']->content;
  }
  else {
    print $fields['field_preview_image_2_fid']->content;
  }
?>
<p>
  <strong>Title:</strong> <?php print $fields['title']->content ?><br />
  <strong>Author:</strong> <?php print l($fields['field_author_value']->content, 'skins/author/'. $fields['field_author_value']->content) ?><br />
  <strong>Device:</strong> <?php print $fields['name']->content ?>
</p>