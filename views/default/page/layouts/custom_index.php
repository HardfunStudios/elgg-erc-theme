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
?>

<div class="row">
	<div class="span8">
		<div class="span12 oficinas-abertas">
		    <h1><?php echo get_plugin_setting('firstpage_title', 'elgg-erc_theme'); ?></h1>
		    <br><br>
		    <div class="row">
		        <div class="span3">
		            <img src="<?php echo $CONFIG->url; ?>mod/elgg-erc_theme/graphics/livro.jpg" alt="">
		        </div>
		        <div class="span5">
		            <?php
		              echo get_plugin_setting('firstpage_body', 'elgg-erc_theme');
		            ?>
		        </div>
		    </div>
		</div>
	</div>
    <div class="span4">
		<?php if (elgg_is_logged_in()) { ?>
		    <div class="span12 index-login-box">
		        <h3>Acesse suas oficinas por aqui</h3>
		        <br><br>
		        <div class="modal-body span3 pull-left">
		            <?php $username = elgg_get_logged_in_user_entity()->username; ?>
		            <?php $groups_url = $CONFIG->url . "groups/summary"; ?>
		            <a class="elgg-button btn-large btn-block" href="<?php echo $groups_url; ?>">
		                Minhas Oficinas &raquo;
		            </a>
		        </div>
		    </div>
		<?php } else { ?>
		    <div class="span12 index-login-box">
		        <h3>Acesse suas oficinas por aqui</h3>
		        <div class="modal-body span3 pull-left">
		            <?php echo elgg_view_form("login"); ?>
		        </div>
		    </div>
		<?php } ?>
	</div>
</div>

<div class="row">
	<div class="span12" id="home-ilustration">
		<img src="/mod/elgg-erc_theme/graphics/home-banner-small.png"/>
	</div>
</div>
