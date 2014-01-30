<?php
$context = elgg_get_context();
$url = $CONFIG->url;
$viewer = elgg_get_logged_in_user_entity();
$notifier = notifier_topbar_menu_setup();

?>



<?php if (elgg_is_logged_in()) { 
            $menu = $CONFIG->menus['topbar'];
            $menu = elgg_trigger_plugin_hook('register', "menu:topbar", $vars, $menu);
            
            $builder = new ElggMenuBuilder($menu);
          	$smenu = $builder->getMenu($sort_by);
          	
          	$smenu = elgg_trigger_plugin_hook('prepare', "menu:topbar", $vars, $smenu);
            // var_dump($smenu); die();
        ?>
            <ul class="nav nav-pills erc-menu-topbar elgg-menu">
              <?php 
                foreach($smenu['default'] as $item) {
                  if($item->getName()=='elgg_logo') continue;
                  echo "<li class='elgg-menu-item-".$item->getName()."'>".$item->getContent()."</li>";
                }
              ?>
            </ul>

    
          <ul class="nav nav-pills erc-menu-topbar-alt">
            <?php 
              foreach($smenu['alt'] as $item) {
                echo "<li>".$item->getContent()."</li>";
              }
            ?>
          </ul>

<?php } else { ?>
    <ul class="nav nav-pills erc-menu-topbar">
      <li><a class="socia_login" href="<?php echo $CONFIG->url; ?>login">Entrar</a></li>
      <li><a class="socia_register" href="<?php echo $CONFIG->url; ?>register">Cadastrar</a></li>
     </ul>



<?php } ?>
