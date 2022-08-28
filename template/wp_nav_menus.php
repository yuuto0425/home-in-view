<?php

function wp_nav_menus($menu_type,$theme_loca)
{
    wp_nav_menu(array(
        'menu'            => $menu_type,
        'menu_class'      => 'nav_menu_items',
        'container'       => 'nav',
        // 'container_class' => 'inner',
        // 'link_before'          => '<span>',
        // 'link_after'           => '</span>',
        'echo'            => 'true',
        'depth'           => '1',
        'theme_location'  => $theme_loca,
        // 'items_wrap'      => '出力されるulタグにID・クラス・内包されるliタグを含むのかを指定する'
    ));
}; ?>