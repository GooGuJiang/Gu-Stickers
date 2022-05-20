<?php
/** 引入样式文件 */
function gu_includ_css_js(){
    wp_enqueue_script( 'gu-js', plugins_url( 'options_page/js/gu.js' , dirname(__FILE__) ) );
    wp_enqueue_style('gu-css', plugins_url( 'options_page/css/gu.css' , dirname(__FILE__) ) );
}