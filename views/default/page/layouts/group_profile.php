<?php
/**
 * Layout for main column with one sidebar
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content HTML for the main column
 * @uses $vars['sidebar'] Optional content that is displayed in the sidebar
 * @uses $vars['title']   Optional title for main content area
 * @uses $vars['class']   Additional class to apply to layout
 * @uses $vars['nav']     HTML of the page nav (override) (default: breadcrumbs)
 */

$class = 'elgg-layout elgg-layout-one-sidebar clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

?>

<div class="<?php echo $class; ?>">
	<div class="elgg-sidebar group-profile-sidebar">

		<div class="groups-profile-icon">
			<?php
				// we don't force icons to be square so don't set width/height
				// echo elgg_view_entity_icon($vars['group'], 'large', array(
				// 	'href' => '',
				// 	'width' => '',
				// 	'height' => '',
				// 	'img_class' => 'group-profile-menu-icon'
				// )); 
			?>
		</div>
		
		<?php
			echo elgg_view('page/elements/sidebar', $vars);
		?>
	</div>

	<div class="elgg-main elgg-body">
		
		<?php
			echo $nav;

			if (isset($vars['buttons']) && $vars['buttons']) {
				$buttons = $vars['buttons'];
			} else {
				$buttons = elgg_view_menu('title', array(
					'sort_by' => 'priority',
					'class' => 'elgg-menu-hz',
				));
			}
			echo $buttons;
					
			if (isset($vars['title'])) {
				echo elgg_view_title($vars['title']);
			}
			if (isset($vars['content'])) {
				echo $vars['content'];
			}
		?>
	</div>
</div>
