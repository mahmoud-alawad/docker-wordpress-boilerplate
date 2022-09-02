<?php

namespace App\Theme;

use stdClass;
use WP_Post;

// @phpcs:disable PSR1.Methods.CamelCapsMethodName.NotCamelCaps
class MainMenuWalker extends \Walker_Nav_Menu
{
    /**
     * Starts the element output.
     *
     * @param string $output Used to append additional content (passed by reference).
     * @param WP_Post $data_object Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param stdClass $args An object of wp_nav_menu() arguments.
     * @param int $current_object_id Optional. ID of the current menu item. Default 0.
     *
     * @since 4.4.0 The {@see 'nav_menu_item_args'} filter was added.
     * @since 5.9.0 Renamed `$item` to `$data_object` and `$id` to `$current_object_id`
     *              to match parent class for PHP 8 named parameter support.
     *
     * @see Walker::start_el()
     *
     * @since 3.0.0
     */
    public function start_el(
        &$output,
        $data_object,
        $depth = 0,
        $args = null,
        $current_object_id = 0
    ) {
        $itemClasses = empty($menu_item->classes) ? array() : (array)$menu_item->classes;
        $menuItemClasses = ['mb-4'];
        $anchorClasses = [
            'relative',
            'font-bold',
            'uppercase',
        ];
        $decoratorClasses = [
            'anchor'
        ];

        $decoratorClasses[] = $data_object->current ? 'w-full' : 'w-0';

        $output .= '<li class="' . implode(' ', array_merge($itemClasses, $menuItemClasses)) . '">';

        if ($data_object->url && $data_object->url !== '#') {
            $output .= '<a class="' . implode(" ", $anchorClasses) . '" href="' . $data_object->url . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $data_object->title;
        $output .= '<div class="' . implode(' ', $decoratorClasses) . '"></div>';

        if ($data_object->url && $data_object->url !== '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }

}