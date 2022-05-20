<?php
global $emotionListDefault;
if ( ! defined( 'WPINC' ) ) {
    die;
}
/** 打开的页面 */
function gu_stickers_plugin_options() {
	wp_enqueue_script( 'gu-js', plugins_url( 'options_page/js/gu.js' , dirname(__FILE__) ) );
    wp_enqueue_style('gu-css', plugins_url( 'options_page/css/gu.css' , dirname(__FILE__) ) );
	echo $data_name;
	echo readfile($data_name);
	?>
    <h1>Gu Stickers 设置</h1>
    <div class="card gu-card">






    <?php
	$gu_theme = wp_get_theme();
	echo "当前主题:".$gu_theme->get( 'Name' );//主题名
	echo get_template_directory();//获取当前主题文件夹位置
	?>
	</div>


	<?php
        }
?>