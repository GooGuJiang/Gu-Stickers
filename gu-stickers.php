<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://gmoe.cc
 * @since             0.0.2
 * @package           Gu Stickers
 *
 * @wordpress-plugin
 * Plugin Name:       Gu Stickers
 * Plugin URI:        https://github.com/GooGuJiang/Gu-Stickers
 * Description:       一个用于管理 WordPress argon 主题的评论表情插件
 * Version:           0.0.2
 * Author:            咕谷酱
 * Author URI:        https://gmoe.cc
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       Gu Stickers
 * Domain Path:       /languages
 */




if ( ! defined( 'WPINC' ) ) {
	die;
}

include("function/message.php");
include("options_page/options.php");
//获取主题信息
$gu_get_theme = wp_get_theme();
$gu_get_theme = $gu_get_theme->get( 'Name' );

define( 'PLUGIN_NAME_VERSION', '0.0.2' );


//备份文件
//$gu_theme = wp_get_theme();

$getback = plugin_dir_path(__FILE__).'backup';
$getback_file = plugin_dir_path(__FILE__).'backup/emotions.php';
$getcopy_file = plugin_dir_path(__FILE__).'data/emotions.php';
if(!file_exists($getback)){
    mkdir($getback);
}
if(!file_exists($getback_file)){
    $data_name = plugin_dir_path(__FILE__).'data/data.json';
    $data_name_input = fopen($data_name , "w");
    fwrite($data_name_input, json_encode($emotionListDefault));
    fclose($data_name_input);
    copy(get_template_directory()."/emotions.php",$getback_file);
    copy($getcopy_file,get_template_directory()."/emotions.php");
}

function deactivate_plugin_gu() {//卸载清除函数
    $getback = plugin_dir_path(__FILE__).'backup';
    $getback_file = plugin_dir_path(__FILE__).'backup/emotions.php';
    if(file_exists($getback_file)){
        copy($getback_file,get_template_directory()."/emotions.php");
        unlink($getback_file);
        rmdir($getback);
    }
}
register_deactivation_hook( __FILE__, 'deactivate_plugin_gu' );
//引入


/** 定义添加菜单选项 */
if($gu_get_theme == "argon"){//判断是不是argon主题

    if ( is_admin() ){ //判断是不是后台管理页

function gu_stickers_plugin_menu() {
     add_options_page( 
    'Gu Stickers 设置', 
    'Gu Stickers', 
    'administrator',
    'gu-stickers-plugin',
    'gu_stickers_plugin_options' );
}
/** 将菜单函数注册到钩子中 */
add_action( 'admin_menu', 'gu_stickers_plugin_menu' );
//加载表情
    }
}else {
    add_action('admin_notices', 'gu_error');//主题错误提示
}
?>