<?php

/*
 * Project Name:            ERC Theme
 * Project Description:     Theme for Elgg 1.8
 * Author:                  Robson Mendonça - HardFun Studios
 * License:                 GNU General Public License (GPL) version 2
 * Website:                 http://hardfunstudios.com
 * Contact:                 robson@hardfunstudios.com
 *
 * File Version:            1.0
 * Last Updated:            5/11/2013
 */

elgg_register_event_handler('init', 'system', 'erc_init');

function erc_init() {
    global $CONFIG;


    if (elgg_get_context() === "admin") {
        elgg_unregister_css("twitter-bootstrap");
        elgg_unregister_css("ui-lightness");
        elgg_unregister_css("erc");

        elgg_unregister_js("erc");
        elgg_unregister_js("jquery-migrate");
        elgg_unregister_js("twitter-bootstrap");
        
        elgg_register_css("erc", $CONFIG->url . "mod/elgg-erc_theme/css/erc_admin.css");
        // elgg_register_action('welcomer/settings/save', elgg_get_plugins_path() . 'welcomer/actions/welcomer/settings/save.php');
        
        
    } else {
        elgg_register_css("twitter-bootstrap", $CONFIG->url . "mod/elgg-erc_theme/vendors/bootstrap/css/bootstrap.css");
        elgg_register_css("ui-lightness", $CONFIG->url . "mod/elgg-erc_theme/vendors/jquery-ui-1.10.2.custom/css/ui-lightness/jquery-ui-1.10.2.custom.min.css");
        // elgg_register_css("fonts", $CONFIG->url . "mod/elgg-erc_theme/views/default/css/elements/reset.php");
        elgg_register_css("erc", $CONFIG->url . "mod/elgg-erc_theme/css/erc.css");

        elgg_register_js("erc", $CONFIG->url . "mod/elgg-erc_theme/js/erc.js");
        elgg_register_js("jquery", $CONFIG->url . "mod/elgg-erc_theme/vendors/jquery/jquery-1.9.1.min.js", "head", 0);
        elgg_register_js("jquery-migrate", $CONFIG->url . "mod/elgg-erc_theme/vendors/jquery/jquery-migrate-1.1.1.js", "head", 1);
        elgg_register_js("jquery-ui", $CONFIG->url . "mod/elgg-erc_theme/vendors/jquery-ui-1.10.2.custom/js/jquery-ui-1.10.2.custom.min.js", "head", 2);
        elgg_register_js("twitter-bootstrap", $CONFIG->url . "mod/elgg-erc_theme/vendors/bootstrap/js/bootstrap.min.js");

        elgg_load_css("ui-lightness");
        elgg_load_css("twitter-bootstrap");

        elgg_load_js("jquery-migrate");
        elgg_load_js("erc");
        elgg_load_js("twitter-bootstrap");

        // elgg_load_css("fonts");
        elgg_load_css("erc");

        // set_view_location("page/elements/topbar", elgg_get_plugins_path() . "elgg-erc_theme/views/page/elements/topbar");
        set_view_location("navigation/menu/site", elgg_get_plugins_path() . "elgg-erc_theme/new_views/");
        set_view_location("navigation/menu/elements/item", elgg_get_plugins_path() . "elgg-erc_theme/new_views/");
        set_view_location("navigation/menu/elements/section", elgg_get_plugins_path() . "elgg-erc_theme/new_views/");
        set_view_location("navigation/tabs", elgg_get_plugins_path() . "elgg-erc_theme/new_views/");
        set_view_location("navigation/menu/widget", elgg_get_plugins_path() . "elgg-erc_theme/new_views/");

    		elgg_register_plugin_hook_handler('forward', 'system', 'erc_theme_hook_forward_system');
		
    		// Redirect the groups menu
    		$item = new ElggMenuItem('groups', elgg_echo('groups'), 'groups/summary');
    		elgg_register_menu_item('site', $item);
		
    		//create a new page handler for groups
    		elgg_register_page_handler('groups', 'groups_custom_page_handler');
		
    		//create custom group metadata fields
        elgg_register_plugin_hook_handler('profile:fields', 'group', 'erc_theme_hook_group_fields');
    }
}


function erc_theme_hook_forward_system($hook, $type, $returnvalue, $params)
{
    $message = system_messages();
	$username = $_SESSION['user']->username;
    if (isset($message['success']) && array_pop($message['success']) == elgg_echo('loginok'))
    {
        // return elgg_get_site_url() . "groups/member/$username"; // replace this
		return elgg_get_site_url() . "groups/summary"; 
    }
    
    return $returnvalue;
}


function groups_custom_page_handler($page) {
	if (!isset($page[0])) {
		$page[0] = 'summary';
	}
	
	switch($page[0]) {
		case 'summary':
			groups_handle_custom_groups_page();
			break;
		case 'profile':
			erc_groups_handle_profile_page($page[1]);
			break;
		default:
			groups_page_handler($page);
	}
}


function groups_custom_view_entities($entities, $vars = array(), $offset = 0, $limit = 10, $full_view = false,
$list_type_toggle = true, $pagination = true) {

	$custom_vars = array(
		'list_class' => 'groups-list',
		'item_class' => 'group-item'
	);


	$vars = array_merge($vars, $custom_vars);

	return elgg_view_entity_list($entities, $vars, $offset, $limit, $full_view, $list_type_toggle, $pagination); 
}

/**
 * List all groups
 */
function groups_handle_custom_groups_page() {

	// all groups doesn't get link to self
	elgg_pop_breadcrumb();
	elgg_push_breadcrumb(elgg_echo('groups'));

	if (elgg_get_plugin_setting('limited_groups', 'groups') != 'yes' || elgg_is_admin_logged_in()) {
		elgg_register_title_button();
	}

	
	$mine = elgg_list_entities(array(
			'type' => 'group',
			'relationship' => 'member',
			'relationship_guid' => $_SESSION['user']->guid,
			'inverse_relationship' => false,
			'full_view' => false,
			'metadata_names' => array('closed'),
			'metadata_values' => array('não'),
		)	,
		'elgg_get_entities_from_relationship',
		'groups_custom_view_entities' );


	$open_registration = elgg_list_entities(
		array(
			'type' => 'group',
			'full_view' => false,
			'metadata_names' => array('registration_open'),
			'metadata_values' => array('sim'),		
		),
		'elgg_get_entities_from_metadata',
		'groups_custom_view_entities' );
		
	if (!$mine) {
		$content = elgg_echo('groups:none');
	}


	$params = array(
		'mine' => $mine,
		'featured' => $open_registration
	);

	$body = elgg_view_layout('group_layout', $params);

	echo elgg_view_page(elgg_echo('groups:all'), $body);
}

function erc_theme_hook_group_fields($hook, $type, $fields) {
	$fields['closed2'] = 'text';
	$fields['registration:open'] = 'text';
	
  // $main_fields = elgg_trigger_plugin_hook("profile:fields", "group", null, array());
  // $fields = array_merge($fields, $main_fields);
  // var_dump($fields); die();
	return $fields;
}


/**
 * Group profile page
 *
 * @param int $guid Group entity GUID
 */
function erc_groups_handle_profile_page($guid) {
	elgg_set_page_owner_guid($guid);
	elgg_load_library('elgg:groups');

	// turn this into a core function
	global $autofeed;
	$autofeed = true;

	elgg_push_context('group_profile');

	$group = get_entity($guid);
	if (!$group) {
		forward('groups/summary');
	}

	elgg_push_breadcrumb($group->name);

	groups_register_profile_buttons($group);

	$content = elgg_view('groups/profile/layout', array('entity' => $group));
	$sidebar = '';

	if (group_gatekeeper(false)) {	
		$sidebar .= elgg_view('groups/sidebar/members', array('entity' => $group));

		$subscribed = false;
		if (elgg_is_active_plugin('notifications')) {
			global $NOTIFICATION_HANDLERS;
			
			foreach ($NOTIFICATION_HANDLERS as $method => $foo) {
				$relationship = check_entity_relationship(elgg_get_logged_in_user_guid(),
						'notify' . $method, $guid);
				
				if ($relationship) {
					$subscribed = true;
					break;
				}
			}
		}
		
		$sidebar .= elgg_view('groups/sidebar/my_status', array(
			'entity' => $group,
			'subscribed' => $subscribed
		));
	}

	$params = array(
		'content' => $content,
		'sidebar' => $sidebar,
		'title' => $group->name,
		'filter' => '',
		'group' => $group,
	);
	$body = elgg_view_layout('group_profile', $params);

	echo elgg_view_page($group->name, $body);
}