<?php
/**
 * Menu Walkers
 *
 * Output custom markup for Menus
 *
 * @package Kirumo
 */

/**
 * Walker for Moble Navigation Menu
 */
class Mobile_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $object->classes ) ? array() : (array) $object->classes;
		$classes[] = 'menu-item-' . $object->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

		$item_output = '';
		if ( isset( $args->before ) ) {
			$item_output = $args->before
				. '<div class="li-header"><span class="arrow genericon"></span><a ' . $attributes . '>'
				. $args->link_before
				. apply_filters( 'the_title', $object->title, $object->ID )
				. '</a></div>'
				. $args->link_after
				. $args->after;
		}

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
	}
}

/**
 * Walker for Primary Site Navigation Menu
 */
class Primary_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $object->classes ) ? array() : (array) $object->classes;
		$classes[] = 'menu-item-' . $object->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

		$item_output = '';
		if ( isset( $args->before ) ) {
			$item_output = $args->before
				. '<a ' . $attributes . '>'
				. $args->link_before
				. apply_filters( 'the_title', $object->title, $object->ID )
				. '<span class="arrow genericon"></span></a>'
				. $args->link_after
				. $args->after;
			}

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
	}
}

/**
 * Walker for Footer Social Navigation Menu
 */
class Social_Menu_Walker extends Walker_Nav_Menu {
	/**
	 * Start the element output.
	 *
	 * @param  string $output Passed by reference. Used to append additional content.
	 * @param  object $item   Menu item data object.
	 * @param  int $depth     Depth of menu item. May be used for padding.
	 * @param  array $args    Additional strings.
	 * @return void
	 */
	function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {

		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes   = empty( $object->classes ) ? array() : (array) $object->classes;
		$classes[] = 'menu-item-' . $object->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $object, $args ) );
		$class_names = ' class="' . esc_attr( $class_names ) . '"';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $object->ID, $object, $args );
		$id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $object->attr_title ) ? ' title="'  . esc_attr( $object->attr_title ) .'"' : '';
		$attributes .= ! empty( $object->target )     ? ' target="' . esc_attr( $object->target     ) .'"' : '';
		$attributes .= ! empty( $object->xfn )        ? ' rel="'    . esc_attr( $object->xfn        ) .'"' : '';
		$attributes .= ! empty( $object->url )        ? ' href="'   . esc_attr( $object->url        ) .'"' : '';

		$item_output = '';
		if ( isset( $args->before ) ) {
			$item_output = $args->before
				. '<a ' . $attributes . '><span class="genericon"><span class="screen-reader-text">'
				. $args->link_before
				. apply_filters( 'the_title', $object->title, $object->ID )
				. '</span></span></a>'
				. $args->link_after
				. $args->after;
			}

		// Since $output is called by reference we don't need to return anything.
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $object, $depth, $args );
	}
}
