<?php
/**
 * Elgg sidebar contents
 *
 * @uses $vars['sidebar'] Optional content that is displayed at the bottom of sidebar
 */

// echo elgg_view_menu('owner_block', array('entity' => $owner,'class'=>"group-profile-menu"));
echo elgg_view('page/elements/owner_block', $vars);

echo elgg_view_menu('page', array('sort_by' => 'name'));

// optional 'sidebar' parameter
if (isset($vars['sidebar'])) {
	echo $vars['sidebar'];
}