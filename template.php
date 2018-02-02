<?php

/**
 * Function that will redirect admin to content panel
 * @param $edit
 * @param $account
 */
function cafedra_rt_user_login(&$edit, $account) {
    krumo('dsf');
    dpm('sdf');
    $edit['redirect'] = 'admin/content/node';
}

/**
 * Function to theme menu
 * @param $variables
 * @return string
 */
function cafedra_rt_menu_link__main_menu($variables) {
//    dpm($variables);
//    krumo($variables);
    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
//        krumo('Has an items inside!');
        $sub_menu = drupal_render($element['#below']);
        $sub_menu = '<div class="navbar-dropdown">'. $sub_menu . '</div>';
//        dpm($sub_menu);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<div' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</div>\n";
}

/**
 * Function to theme menu
 * @param $variables
 * @return string
 */
function cafedra_rt_menu_tree__main_menu($variables) {
    return $variables['tree'];
}

/**
 * Function to alter rendering of locale-switcher
 * @param $variables
 */
function cafedra_rt_links__locale_block(&$variables)
{
    // the global $language variable tells you what the current language is
    global $language;

    // an array of list items
    $items = array();
    foreach($variables['links'] as $lang => $info) {
        switch ($info['language']->language) {
            case 'uk':
                $flag = 'flag-icon flag-icon-ua';
                break;
            case 'en':
                $flag = 'flag-icon flag-icon-gb';
                break;
        }
        $name     = $info['language']->native;
        $href     = isset($info['href']) ? $info['href'] : '';
        $li_classes   = array('list-item-class');
        // if the global language is that of this item's language, add the active class
        if($lang === $language->language){
            $li_classes[] = 'active';
        }
        $link_classes = array('link-class1', 'link-class2', $flag);
        $options = array('attributes' => array('class'    => $link_classes),
            'language' => $info['language'],
            'html'     => true
        );
        $link = l($name, $href, $options);

        // display only translated links
        if ($href) $items[] = array('data' => $link, 'class' => $li_classes);
    }

    // output
    $attributes = array('class' => array('language-switcher-locale-url'));
    $output = theme_item_list(array('items' => $items,
        'title' => '',
        'type'  => 'ul',
        'attributes' => $attributes
    ));
    return $output;
}

/**
 * Implements hook_preprocess_page()
 * @param $variables
 */
function cafedra_rt_preprocess_page(&$variables) {
    // Load PT Sans font as external library
    drupal_add_css('https://fonts.googleapis.com/css?family=PT+Sans&subset=cyrillic,cyrillic-ext', array('group' => CSS_THEME));
    drupal_add_css('https://fonts.googleapis.com/css?family=Open+Sans:300,400&amp;subset=cyrillic,cyrillic-ext', array('group' => CSS_THEME));
    drupal_add_css('https://fonts.googleapis.com/css?family=Play&amp;subset=cyrillic,cyrillic-ext,greek,latin-ext,vietnamese', array('group' => CSS_THEME));

    // Load Particles.js library only on homepage
    if (drupal_is_front_page()) {
        drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/particles/particles.js');
        drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/particles/particles-init.js');
        drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/js/partners-scroll.js');
    }
}

/**
 * Implements hook_preprecess_views_view
 * @param $vars
 */
function cafedra_rt_preprocess_views_view(&$vars) {
    cafedra_rt_views_assets();

    if($vars['view']->name == 'news_slider') {
        drupal_add_css(drupal_get_path('theme', 'cafedra_rt') . '/vendor/node_modules/flickity/dist/flickity.css');
        drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/node_modules/flickity/dist/flickity.pkgd.js');
        drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/js/flickity-init.js');
    }
}

/**
 * Function that initialize all necessary JS-assets for a common view.
 */
function cafedra_rt_views_assets() {
    drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/masonry.pkgd.min.js');
    drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/jquery.appear.js');
    drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/vendor/jquery.countTo.js');
    drupal_add_js(drupal_get_path('theme', 'cafedra_rt') . '/js/views-js.js');
}

/**
 * Custom translation of label for Filter by courses for disciplines
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function cafedra_rt_form_alter(&$form, &$form_state, $form_id) {
    global $language ;
    $lang_name = $language->language;

    if ($lang_name == 'en') {
        $form['#info']['filter-field_courses_value_i18n']['label'] = 'Filter by courses';
        $form['#info']['filter-field_course_type_value_i18n']['label'] = 'Disciplines type';
    }

    // Check the form_id
    if ($form_id == 'views-exposed-form-disciplines-page') {
        // To alter the label
        $form['your_form_element']['#title'] = t('Your new title');
    }
}