<?php

/*
* ACF Field Registation
*/

if ( class_exists( 'acf' ) && function_exists( 'register_field_group' ) ) {

  //Add <a> css class to menu items
  acf_add_local_field_group(array(
    'key' => 'group_5bcf8c434f08b',
    'title' => 'Nav Menu Item',
    'fields' => array(
      array(
        'key' => 'field_5bcf8c52659f0',
        'label' => 'Link CSS Class',
        'name' => 'link_css_class',
        'type' => 'text',
        'instructions' => 'Apply a css class to the href tag of the menu item',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
      array(
        'key' => 'field_5bcf8c52659f1',
        'label' => 'Link to page anchor',
        'name' => 'link_anchor',
        'type' => 'text',
        'instructions' => 'Link directly to an anchor on the page',
        'required' => 0,
        'conditional_logic' => 0,
        'wrapper' => array(
          'width' => '',
          'class' => '',
          'id' => '',
        ),
        'default_value' => '',
        'placeholder' => '',
        'prepend' => '',
        'append' => '',
        'maxlength' => '',
      ),
    ),
    'location' => array(
      array(
        array(
          'param' => 'nav_menu_item',
          'operator' => '==',
          'value' => 'all',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'seamless',
    'label_placement' => 'top',
    'instruction_placement' => 'field',
    'hide_on_screen' => '',
    'active' => 1,
    'description' => '',
  ));



} // End if().