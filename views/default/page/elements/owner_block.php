<?php
/**
 * Elgg owner block
 * Displays page ownership information
 *
 * @package Elgg
 * @subpackage Core
 *
 */

elgg_push_context('owner_block');

// groups and other users get owner block
$owner = elgg_get_page_owner_entity();
if ($owner instanceof ElggGroup ||
	($owner instanceof ElggUser && $owner->getGUID() != elgg_get_logged_in_user_guid())) {

	// $header = elgg_view_entity($owner, array('full_view' => false));
	
	$header =  '<div class="groups-profile-icon">'.elgg_view_entity_icon($owner, 'large', array(
		'href' => $owner->getURL(),
		'width' => '',
		'height' => '',
		'img_class' => 'group-profile-menu-icon'
	)).'</div>';

	$body = elgg_view_menu('owner_block', array('entity' => $owner,'class'=>"group-profile-menu"));

	$body .= elgg_view('page/elements/owner_block/extend', $vars);

	echo elgg_view('page/components/module', array(
		'header' => $header,
		'body' => $body,
		'class' => 'elgg-owner-block',
	));
}

elgg_pop_context();