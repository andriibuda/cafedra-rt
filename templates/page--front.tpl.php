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

// Check language and translate some custom strings
global $language;
$cur_lang = $language->language;
if ($cur_lang == 'uk') {
    $jumbotron1 = 'Кафедра радіотехнічних систем';
    $jumbotron2 = 'Тернопільський національний технічний університет ім. І. Пулюя';

    $contact_us_title = 'Зворотній зв\'язок';
    $contact_block_id = 'client-block-235';
    $address = 'м.Тернопіль, вул. Текстильна, 28, корпус № 9, к.611';
} elseif ($cur_lang == 'en') {
    $jumbotron1 = 'Department of Radio Engineering Systems';
    $jumbotron2 = 'Ternopil National Technical University named after. I. Puluj';

    $contact_us_title = 'Contact us';
    $contact_block_id = 'client-block-238';
    $address = 'Ternopil, st. Textile, 28, building number 9, k.611';
}
?>

<div id="page-wrapper">
    <div id="page">

        <?php require_once(drupal_get_path('theme', 'cafedra_rt') . '/templates/front-header.tpl.php');?>

        <!-- /.section, /#header -->
        <div id="jumbotron">
            <div class="site-jumbotron">
                <div class="jumbotron-overlay">
                    <div id="particles-js"></div>
                    <h2 class="jumbotron-heading title is-1 is-spaced">
                        <?php print $jumbotron1;?>
                    </h2>
                    <h2 class="jumbotron-heading title is-3 is-spaced">
                        <?php print $jumbotron2;?>
                    </h2>
                </div>
            </div>
        </div>

        <?php print $messages; ?>

        <div id="main-wrapper">

            <?php if ($page['homepage_firstsection']): ?>
                <div class="body-white-bg">
                    <div class="container section columns">
                        <div class="column is-8 is-offset-3">
                            <?php print render($page['homepage_firstsection']);?>
                        </div>
                    </div>
                </div>
            <?php endif;?>

            <?php if ($page['homepage_secondsection']): ?>
                <div class="body-gray-bg">
                    <div class="container section ">
                        <div class="">
                            <?php print render($page['homepage_secondsection']);?>
                        </div>
                    </div>
                </div>
            <?php endif;?>

            <?php if ($page['homepage_thirdsection']): ?>
                <div class="body-white-bg">
                    <?php print render($page['homepage_thirdsection']);?>
                </div>
            <?php endif;?>

            <?php if ($page['homepage_fourthsection']): ?>
                <div class="body-gray-bg">
                    <?php print render($page['homepage_fourthsection']);?>
                </div>
            <?php endif;?>


            <?php if ($page['homepage_fifthsection']): ?>
                <div class="body-white-bg">

                    <?php print render($page['homepage_fifthsection']);?>
                </div>
            <?php endif;?>

                <div class="container homepage-contact block-title-styled">
                    <h2><?php print $contact_us_title?></h2>
                    <div class="columns is-multiline container section is-mobile ">

                        <div class="contact-us-form-custom column is-6-desktop is-6-tablet is-12-mobile ">
                            <?php $block = module_invoke('webform', 'block_view', $contact_block_id);
                            print render($block['content'])
                            ?>
                        </div>
                        <div class="contact-us-coordinates column is-6-desktop is-6-tablet is-12-mobile">
                            <ul>
                                <li>

                                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                                    <?php print $address?>
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
                </div>



                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d5174.176549600216!2d25.634357639261328!3d49.57722379042822!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xdbe30825ea3dfa64!2z0JrQsNGE0LXQtNGA0LAg0L_RgNC40LvQsNC00ZbQsiDRliDQutC-0L3RgtGA0L7Qu9GM0L3Qvi3QstC40LzRltGA0Y7QstCw0LvRjNC90LjRhSDRgdC40YHRgtC10Lw!5e0!3m2!1suk!2sua!4v1512345981841" onload="this.width=screen.width;" height="400" width="1366" frameborder="0" style="border:0" allowfullscreen></iframe>


        </div> <!-- /#main, /#main-wrapper -->

        <?php require_once(drupal_get_path('theme', 'cafedra_rt') . '/templates/footer.tpl.php');?>

        <!-- /.section, /#footer -->

    </div>
</div> <!-- /#page, /#page-wrapper -->
