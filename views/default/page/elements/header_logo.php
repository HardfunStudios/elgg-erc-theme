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
$name = explode(" ", elgg_get_site_entity()->name);
$last = array_pop($name);
$first = implode(" ", $name);

$url = $CONFIG->url;
$username = elgg_get_logged_in_user_entity()->username;
$context = elgg_get_context();
$messages = 0; //messages_count_unread();
?>

<div class="header-wrapper container">
    <div class="row">
        <div class="header span12">

          <div class="row elgg-heading-site">
            <div class="span8 elgg-heading-site-logo">
                <img src="<?php echo $CONFIG->url; ?>mod/elgg-erc_theme/graphics/logo-telefonica.jpg" alt="">
            </div><!--END LOGO-->

            <div class="span4 elgg-heading-site-logo">
                <img src="<?php echo $CONFIG->url; ?>mod/elgg-erc_theme/graphics/logo-projeto.jpg" alt="">
            </div>
          </div>
        </div><!--END HEADER-->
    </div>
</div><!--END HEADER-WRAPPER-->

<script>
    (function() {
        $(".elgg-heading-site").click(function() {
            window.location = elgg.config.wwwroot;
        });
    })();
</script>