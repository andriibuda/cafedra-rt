<?php

/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
//krumo($node);
?>

<div id="page-wrapper">
    <div id="page">

        <?php require_once(drupal_get_path('theme', 'cafedra_rt') . '/templates/header.tpl.php');?>

        <!-- /.section, /#header -->
        <?php if (isset($node) && $node->type == 'page'): ?>
            <?php $image = $node->field_bg_image[ LANGUAGE_NONE ][0]['uri'];?>
            <?php $path = file_create_url($image);?>
            <div class="image bg-page-image">
                <img src="<?php print $path;?>">
            </div>

        <?php endif;?>

        <?php if ($page['breadcrumbs'] && (isset($node) && $node->type != 'page')): ?>
            <div id="breadcrumbs" class="container">
                <?php print render($page['breadcrumbs']);?>
            </div>
        <?php endif; ?>

        <?php print $messages; ?>

        <?php if(isset($node) && $node->type == 'page') {
            $page_margin = 'page-type-margin';
        } else {
            $page_margin = '';
        }
        ?>

        <div id="main-wrapper" class="<?php print $page_margin;?>">
            <div class="container">
                <div id="main" class="clearfix columns">

                    <?php
                    if ($page['sidebar_first'] && $page['sidebar_second']) {
                        $main_content = 'is-6';
                    } elseif ($page['sidebar_first'] || $page['sidebar_second']) {
                        $main_content = 'is-9';
                    } else {
                        $main_content = 'is-12';
                    }
                    ?>

                    <?php if ($page['sidebar_first']): ?>
                        <div class="column is-3 section">
                            <div class="">
                                <?php print render($page['sidebar_first']); ?>
                            </div>
                        </div> <!-- /.section, /#sidebar-first -->
                    <?php endif; ?>

                    <div class="column section <?php print $main_content;?>">
                        <div class="">
                            <?php if ($page['highlighted']): ?>
                                <div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
                            <a id="main-content"></a>
                            <?php print render($title_prefix); ?>
                            <?php if ($title): ?><h1 class="title"
                                                     id="page-title"><?php print $title; ?></h1><?php endif; ?>
                            <?php print render($title_suffix); ?>
                            <?php if ($tabs): ?>
                                <div class="tabs"><?php print render($tabs); ?></div><?php endif; ?>
                            <?php print render($page['help']); ?>
                            <?php if ($action_links): ?>
                                <ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
                            <?php print render($page['content']); ?>

                            <div class="columns is-mobile is-multiline">
                                <div class="contact-us-form-custom column is-6-desktop is-6-tablet is-12-mobile">
                                    <?php $block = module_invoke('webform', 'block_view', 'client-block-235');
                                    print render($block['content'])
                                    ?>
                                </div>

                                <div class="contact-us-coordinates column is-6-desktop is-6-tablet is-12-mobile">
                                    <ul>
                                        <li>

                                                <i class="fa fa-map-marker" aria-hidden="true"></i>

                                            м.Тернопіль, вул. Текстильна, 28, корпус № 9, к.611
                                        </li>
                                        <li>

                                                <i class="fa fa-envelope-o" aria-hidden="true"></i>

                                            kaf_rt@tu.edu.te.ua
                                        </li>
                                        <li>

                                                <i class="fa fa-phone" aria-hidden="true"></i>

                                            51-97-00
                                        </li>
                                    </ul>
                                </div>
                            </div>

                            <div>
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5174.176549600216!2d25.634357639261328!3d49.57722379042822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdbe30825ea3dfa64!2z0JrQsNGE0LXQtNGA0LAg0L_RgNC40LvQsNC00ZbQsiDRliDQutC-0L3RgtGA0L7Qu9GM0L3Qvi3QstC40LzRltGA0Y7QstCw0LvRjNC90LjRhSDRgdC40YHRgtC10Lw!5e0!3m2!1suk!2sua!4v1512345981841" onload="this.width=screen.width;" height="400" width="1366" frameborder="0" style="border:0" allowfullscreen></iframe>

                            </div>

                            <?php print $feed_icons; ?>
                        </div>
                    </div> <!-- /.section, /#content -->

                    <?php if ($page['sidebar_second']): ?>
                        <div class="column is-3">
                            <div class="section">
                                <?php print render($page['sidebar_second']); ?>
                            </div>
                        </div> <!-- /.section, /#sidebar-second -->
                    <?php endif; ?>
                </div>
            </div>

        </div> <!-- /#main, /#main-wrapper -->

        <?php require_once(drupal_get_path('theme', 'cafedra_rt') . '/templates/footer.tpl.php');?>
        <!-- /.section, /#footer -->

    </div>
</div> <!-- /#page, /#page-wrapper -->
