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
$default_items = elgg_extract('default', $vars['menu'], array());
echo "<div class='elgg-menu elgg-menu-widget' style='float:right;margin-top:4px;'>";
foreach ($default_items as $menu_item) {
    $href = $menu_item->getHref();
    $content = $menu_item->getContent();
    echo $content;
}
echo "</div>";
?>