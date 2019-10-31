<?php

// Adds widget: Share Buttons
class Sharebuttons_Widget extends WP_Widget {

  function __construct() {
    parent::__construct(
      'sharebuttons_widget',
      esc_html__( 'Share Buttons', 'arissberg' ),
      array( 'description' => esc_html__( 'Adds Social Sharing buttons', 'arissberg' ), ) // Args
    );
  }

  private $widget_fields = array(
    array(
      'label' => 'Accounts',
      'id'    => 'accounts',
      'type'  => 'group_title'
    ),
    array(
      'label' => 'Facebook',
      'id' => 'facebook',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Twitter',
      'id' => 'twitter',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Pinterest',
      'id' => 'pinterest',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Mail',
      'id' => 'mail',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Display Options',
      'id'    => 'display_options',
      'type'  => 'group_title'
    ),
    array(
      'label' => 'Show share count',
      'id' => 'share_count',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Show Icons',
      'id' => 'icons',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Show Titles',
      'id' => 'titles',
      'type' => 'checkbox',
    ),
    array(
      'label' => 'Show Labels',
      'id' => 'labels',
      'type' => 'checkbox',
    ),
  );


  public function widget( $args, $instance ) {

    $converted = array();
    foreach ($instance as $key => $value) {
      $converted[$key] = (bool)$value;
    }

    $accounts = array(
      ( $instance['facebook'] ) ? 'facebook' : '',
      ( $instance['twitter'] ) ? 'twitter' : '',
      ( $instance['pinterest'] ) ? 'pinterest' : '',
      ( $instance['mail'] ) ? 'mail' : '',
    );

    echo $args['before_widget'];

    $test = array_filter( $accounts );

    echo do_shortcode("[powerkit_share_buttons accounts='" . implode( ', ', array_filter( $accounts ) ) . "' total='false' share_count='${instance['share_count']}' icons='${instance['icons']}' titles='${instance['titles']}' labels='${instance['labels']}' layout='os-smile' ]");

    // Output generated fields
    // echo '<p>'.$instance['accounts'].'</p>';
    // echo '<p>'.$instance['share_count'].'</p>';

    echo $args['after_widget'];
  }

  public function field_generator( $instance ) {

    $output = '';

    foreach ( $this->widget_fields as $widget_field ) {
      $default = '';

      if ( isset($widget_field['default']) ) {
        $default = $widget_field['default'];
      }

      $widget_value = ! empty( $instance[$widget_field['id']] ) ? $instance[$widget_field['id']] : esc_html__( $default, 'arissberg' );

      switch ( $widget_field['type'] ) {
        case 'group_title':
          $output .= '<p><strong>' . esc_attr( $widget_field['label'], 'arissberg' ) . '</strong></p><hr>';
          break;
        case 'checkbox':
          $output .= '<p>';
          $output .= '<input class="checkbox" type="checkbox" '. checked( $widget_value, true, false ).' id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" value="1">';
          $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'arissberg' ).'</label>';
          $output .= '</p>';
          break;
        default:
          $output .= '<p>';
          $output .= '<label for="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'">'.esc_attr( $widget_field['label'], 'arissberg' ).':</label> ';
          $output .= '<input class="widefat" id="'.esc_attr( $this->get_field_id( $widget_field['id'] ) ).'" name="'.esc_attr( $this->get_field_name( $widget_field['id'] ) ).'" type="'.$widget_field['type'].'" value="'.esc_attr( $widget_value ).'">';
          $output .= '</p>';
      }
    }
    echo $output;
  }

  public function form( $instance ) {
    $this->field_generator( $instance );
  }

  public function update( $new_instance, $old_instance ) {
    $instance = array();
    foreach ( $this->widget_fields as $widget_field ) {
      switch ( $widget_field['type'] ) {
        case 'group_title':
          break;
        default:
          $instance[$widget_field['id']] = ( ! empty( $new_instance[$widget_field['id']] ) ) ? strip_tags( $new_instance[$widget_field['id']] ) : '';
      }
    }
    return $instance;
  }
}

function register_sharebuttons_widget() {

  if ( class_exists('Powerkit_Share_Buttons') ) {
    register_widget( 'Sharebuttons_Widget' );
  }
}
add_action( 'widgets_init', 'register_sharebuttons_widget' );