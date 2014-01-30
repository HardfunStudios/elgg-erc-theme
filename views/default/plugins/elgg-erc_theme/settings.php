<br/>
<p>
  <b><?php echo elgg_echo('erc:firstpage_title'); ?></b><br /><br/>
	<?php
		echo elgg_view('input/text', array(
			'name' => 'params[firstpage_title]',
			'value' => $vars['entity']->firstpage_title,
		));

  echo "</p>";

  // first login page content
  $options = array(
      'name' => 'params[firstpage_body]',
      'value' => $vars['entity']->firstpage_body,
  );
  echo elgg_echo('erc:firstpage_body') . "<br>";
  echo elgg_view('input/longtext', $options) . "<br><br>";
  echo "</div>";
