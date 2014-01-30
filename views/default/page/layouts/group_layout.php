<?php
/**
 * Elgg one-column layout
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['content'] Content string
 * @uses $vars['class']   Additional class to apply to layout
 */

$class = 'elgg-layout elgg-layout-one-column groups clearfix';
if (isset($vars['class'])) {
	$class = "$class {$vars['class']}";
}

// navigation defaults to breadcrumbs
$nav = elgg_extract('nav', $vars, elgg_view('navigation/breadcrumbs'));

?>
<div class="<?php echo $class; ?>">
	
	<div class="elgg-body elgg-main">
	<?php
		echo $nav;
		// 
		// if (isset($vars['title'])) {
		// 	echo elgg_view_title($vars['title']);
		// }

		// allow page handlers to override the default header
		if (isset($vars['header'])) {
			$vars['header_override'] = $vars['header'];
		}
		$header = elgg_view('page/layouts/content/header', $vars);
		
		echo "<h2>Minhas Oficinas</h2>";
		echo "<div id='groups_box'>";
		
		echo "<div id='my_groups'>";
		echo "<h2>Em Andamento</h2>";
		
		
		echo "<div class='group-list-container'>";
		if(!empty($vars['mine'])) {
			echo $vars['mine'];		
		} else {
			?>
				<ul class="elgg-list groups-list">
					<li class="elgg-item group-item">
						<div class="elgg-image-block clearfix no-groups-to-show">
							Você ainda não participa de nenhuma oficina. Inscreva-se!
						</div>
					</li>
				</ul>
			<?php
		}
		echo "</div>";
		echo "</div>";

		
		echo "<div style='clear: left'></div>";
		
		echo "<div id='registration_groups'>";
		echo "<h2>Inscrições abertas</h2>";

		echo "<div class='group-list-container'>";
			if(!empty($vars['featured'])) {
				echo $vars['featured'];		
			} else {
				?>
					<ul class="elgg-list groups-list">
						<li class="elgg-item group-item">
							<div class="elgg-image-block clearfix no-groups-to-show">
								Nenhuma oficina com inscrições abertas.
							</div>
						</li>
					</ul>
				<?php
			}
		echo "</div>";

		echo "</div>";

		echo "<h2 id='groups_all'><a href=\"".$CONFIG->url . "/groups/all\">Ver todas as Oficinas</a></h2>";
		echo "</div>";
	?>
	</div>
</div>