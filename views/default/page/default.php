<?php
/**
 * Elgg pageshell
 * The standard HTML page shell that everything else fits into
 *
 * @package Elgg
 * @subpackage Core
 *
 * @uses $vars['title']       The page title
 * @uses $vars['body']        The main content of the page
 * @uses $vars['sysmessages'] A 2d array of various message registers, passed from system_messages()
 */
// backward compatability support for plugins that are not using the new approach
// of routing through admin. See reportedcontent plugin for a simple example.
if (elgg_get_context() == 'admin') {
    if (get_input('handler') != 'admin') {
        elgg_deprecated_notice("admin plugins should route through 'admin'.", 1.8);
    }
    elgg_admin_add_plugin_settings_menu();
    elgg_unregister_css('elgg');
    echo elgg_view('page/admin', $vars);
    return true;
}

// render content before head so that JavaScript and CSS can be loaded. See #4032

$messages = elgg_view('page/elements/messages', array('object' => $vars['sysmessages']));
$header = elgg_view('page/elements/header', $vars);
$body = elgg_view('page/elements/body', $vars);
$footer = elgg_view('page/elements/footer', $vars);
$topbar = elgg_view('page/elements/topbar', $vars);
$context = elgg_get_context();
$url = $CONFIG->url;

// Set the content type
header("Content-type: text/html; charset=UTF-8");

$lang = get_current_language();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $lang; ?>" lang="<?php echo $lang; ?>">
    <head>
        <?php echo elgg_view('page/elements/head', $vars); ?>
    </head>
    <body>
        <div class="elgg-menu-top-navbar">
				<?php echo $topbar; ?>
        </div>

        <div class="container">
            <div class="row">
                <div class="loader span12"></div>
                <div class="span12">
                    <div class="row">
                        <div class="span12">
                            <?php echo $messages; ?>
                        </div>
                        <div class="span12 content-header">
                            <div class="elgg-inner">
                                <?php echo $header; ?>
                            </div>
                        </div>
                        <div class="span12">
                            <div class="elgg-inner">
                                <?php echo $body; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php echo $footer; ?>
        <?php echo elgg_view('page/elements/foot'); ?>
    </body>
</html>