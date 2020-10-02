<?php
/**
 * Adds Foo_Widget widget.
 */
class Sl_Form_Widget extends WP_Widget {

    /**
     * Register widget with WordPress.
     */
    public function __construct() {
        parent::__construct(
            'sl_form_widget', // Base ID
            'فرم اختصاصی برای ابزارک وردپرس', // Name
            array( 'description' => __( 'فرم در ابزارک', 'text_domain' ), ) // Args
        );
    }

    /**
     * Front-end display of widget.
     *
     * @see WP_Widget::widget()
     *
     * @param array $args     Widget arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        extract( $args );
        $title = apply_filters( 'widget_title', $instance['title'] );
        //echo $instance['cat'];

        echo $before_widget;
        if ( ! empty( $title ) ) {
            echo $before_title . $title . $after_title;
        }
        //$currentUser = wp_get_current_user();
//        if(!is_user_logged_in()){
//            echo "not logged in";
//        }else{
//            echo "you are logged in";
//        }
        ?>
        <div class="ads-box">
            <div class="ads-item">
                <a href="<?php echo $instance['ads_url']; ?>">
                    <img src="<?php echo $instance['ads_image_url']; ?>" alt="">
                </a>
            </div>
        </div>
        <form action="<?php get_permalink() ?>">
            <div class="frm-row">
                <input type="text">
            </div>
            <div class="frm-row">
                <input type="submit" value="ارسال فرم"   >
            </div>
        </form>
        <?php
        wp_reset_postdata();
        echo $after_widget;
    }

    /**
     * Back-end widget form.
     *
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from database.
     */
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }
        else {
            $title = __( 'عنوان ابزارک', 'text_domain' );
        }
        $cat_id = intval($instance['cat']);
        $cats = get_categories();
        ?>
        <p>
            <label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_name( 'cat' ); ?>"><?php _e( 'دسته بندی : ' ); ?></label>
            <select id="<?php echo $this->get_field_id( 'cat' ); ?>" name="<?php echo $this->get_field_name( 'cat' ); ?>" >
                <?php if(count($cats) > 0) :  ?>
                        <?php foreach($cats as $cat): ?>
                        <option value="<?php echo $cat->term_id; ?>" <?php selected($cat->term_id,$cat_id); ?>><?php echo $cat->name; ?></option>
                        <?php endforeach; ?>
                <?php endif; ?>
            </select>
        </p>
        <div class="ads-wrapper">
            <input placeholder="آدرس تصویر تبلیغ" type="text" id="<?php echo $this->get_field_name('ads_image_url');  ?>" name="<?php echo $this->get_field_name('ads_image_url'); ?>">
            <input placeholder="آدرس تبلیغ" type="text" id="<?php echo $this->get_field_name('ads_url');  ?>" name="<?php echo $this->get_field_name('ads_url'); ?>">
        </div>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( !empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['cat'] = ( !empty( $new_instance['cat'] ) ) ? strip_tags( $new_instance['cat'] ) : '';

        return $instance;
    }

} // class Foo_Widget

// Register Foo_Widget widget
add_action( 'widgets_init', function() { register_widget( 'Sl_Form_Widget' ); } );