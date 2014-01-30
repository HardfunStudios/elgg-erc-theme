<?php

// echo elgg_view('object/elements/summary', $vars);

$entity = $vars['entity'];

$title_link = elgg_extract('title', $vars, '');
if ($title_link === '') {
  if (isset($entity->title)) {
    $text = $entity->title;
  } else {
    $text = $entity->name;
  }
  $params = array(
    'text' => $text,
    'href' => $entity->getURL(),
    'is_trusted' => true,
  );
  $title_link = elgg_view('output/url', $params);
}

$metadata = elgg_extract('metadata', $vars, '');
$subtitle = elgg_extract('subtitle', $vars, '');
$content = elgg_extract('content', $vars, '');

$tags = elgg_extract('tags', $vars, '');
if ($tags === '') {
  $tags = elgg_view('output/tags', array('tags' => $entity->tags));
}

if ($metadata) {
  echo $metadata;
}
if ($title_link) {
  echo "<h3>$title_link</h3>";
}
echo "<div class=\"elgg-subtext\">$subtitle</div>";
echo $tags;

// echo elgg_view('object/summary/extend', $vars);

if ($content) {
  echo "<div class=\"elgg-content\">$content</div>";
}
