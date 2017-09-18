add_action( 'init', 'gt_current_affiliate_url' );
function gt_current_affiliate_url() {
    if ( defined( 'AFFILIATES_CORE_VERSION' ) ) {
        add_shortcode ( 'affiliates_current_url', 'affiliates_current_url' );
    } 
}

function affiliates_current_url( $atts ) {
    $output = '';
    $current_url = ( is_ssl() ? 'https://' : 'http://' ) . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    if ( class_exists( 'Affiliates_Shortcodes' ) ) {
        $output .= affiliates_get_affiliate_url( $current_url, Affiliates_Shortcodes::affiliates_id( array() ) );
    }
    return $output;
}
