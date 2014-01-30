<?php
/**
 * Group entity view
 *
 * @package ElggGroups
 */

$group = $vars['entity'];


$metadata = elgg_view_menu('entity', array(
  'entity' => $group,
  'handler' => 'groups',
  'sort_by' => 'priority',
  'class' => 'elgg-menu-hz',
));

if (elgg_in_context('owner_block') || elgg_in_context('widgets')) {
  $metadata = '';
}

$context = elgg_get_context();

if ($context == "groups") {
  $image_size = "medium";
  $icon = elgg_view_entity_icon($group, $image_size);
} else {
  $icon = null;
}


if ($vars['full_view']) {
  echo elgg_view('groups/profile/summary', $vars);
} else {
  // brief view
  $params = array(
    'entity' => $group,
    'metadata' => $metadata,
    'subtitle' => $group->briefdescription,
  );
  $params = $params + $vars;
  $list_body = elgg_view('group/elements/summary', $params);
  // $group = $params['entity'];


  echo elgg_view_image_block($icon, $list_body, $vars);
}
