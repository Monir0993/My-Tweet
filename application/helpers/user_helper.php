<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('user_name_by_id'))
{
    function user_name_by_id($user_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_user_name_by_id($user_id);
        return $result;
    }   
}

if ( ! function_exists('user_info_by_id'))
{
    function user_info_by_id($user_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_user_info_by_id($user_id);
        return $result;
    }   
}

if ( ! function_exists('comment_count_by_post_id'))
{
    function comment_count_by_post_id($post_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_comment_count_by_post_id($post_id);
        return $result;
    }   
}

if ( ! function_exists('reply_count_by_comment_id'))
{
    function reply_count_by_comment_id($comment_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_reply_count_by_comment_id($comment_id);
        return $result;
    }   
}

if ( ! function_exists('like_count_by_comment_id'))
{
    function like_count_by_comment_id($comment_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_like_count_by_comment_id($comment_id);
        return $result;
    }   
}

if ( ! function_exists('like_count_by_reply_id'))
{
    function like_count_by_reply_id($reply_id)
    {
        $CI = & get_instance();
        $result = $CI->Post_Model->select_like_count_by_reply_id($reply_id);
        return $result;
    }   
}