<?php
/*
Plugin Name: Gu Stickers
Description: 咕谷的私用表情
Version: 1.0.1
*/
    function add_more_emotions($emotionList){
        array_push(
            $emotionList,
            array(
                'groupname' => '还没添加呢!', 
                'list' => array(
                    array('type' => 'sticker', 'code' => 'test-1', 'src' => $GLOBALS['assets_path'] . '/stickers/test/1.jpg'),
                    array('type' => 'sticker', 'code' => 'test-2', 'src' => $GLOBALS['assets_path'] . '/stickers/test/2.jpg'),
                    array('type' => 'sticker', 'code' => 'test-3', 'src' => $GLOBALS['assets_path'] . '/stickers/test/3.jpg')
                )
            )
        );
        return $emotionList;
    }
    add_filter('argon_emotion_list' , 'add_more_emotions');
?>