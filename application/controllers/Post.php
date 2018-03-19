<?php

class Post extends CI_Controller {

    public function upload_picture() {
        $this->Post_Model->upload_picture_by_user_id();
        redirect('Welcome');
    }

    public function add_post() {
        $this->Post_Model->add_post_by_id();
        redirect('Welcome/home');
    }

    public function my_post($user_id) {
        $data = array();
        $data['all_post'] = $this->Post_Model->select_all_post_by_user_id($user_id);
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['like_count'] = $this->Post_Model->select_like_count_by_post_id($data['all_post']);
        $data['user_like_info_id'] = $this->Post_Model->select_all_user_like_info_id_by_post_id($data['all_post']);
//        echo '<pre>';
//        print_r($data['user_like_info_id']);
//        exit();
        $data['main_content'] = $this->load->view('pages/profile', $data, true);
        echo $data['main_content'];
    }

    // function below is for post like
    public function insert_like($post_id, $user_id, $like_type, $page) {
        $this->Post_Model->insert_like_by_post_id($post_id, $user_id, $like_type);
        $data = array();
        $user_id = $this->Post_Model->select_user_id_by_post_id($post_id);
        if ($page == 'home') {    
            $data['all_post'] = $this->Post_Model->select_all_user_or_friend_post_by_user_id($this->session->userdata('user_id'));            
            $data['like_count'] = $this->Post_Model->select_like_count_by_post_id($data['all_post']);
            $data['user_like_info_id'] = $this->Post_Model->select_all_user_like_info_id_by_post_id($data['all_post']);
            $data['main_content'] = $this->load->view('pages/home', $data, true);
        } else {
            $data['all_post'] = $this->Post_Model->select_all_post_by_user_id($user_id);
            $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
            $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
            $data['like_count'] = $this->Post_Model->select_like_count_by_post_id($data['all_post']);
            $data['user_like_info_id'] = $this->Post_Model->select_all_user_like_info_id_by_post_id($data['all_post']);
            $data['main_content'] = $this->load->view('pages/profile', $data, true);
        }
        echo $data['main_content'];
    }

    public function insert_comment_like($comment_id, $user_id, $like_type) {
        $this->Post_Model->insert_like_by_comment_id($comment_id, $user_id, $like_type);
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_id'] = $this->Post_Model->select_post_id_by_comment_id($comment_id);
        $data['all_comment'] = $this->Post_Model->select_all_comment_by_post_id($data['post_id']);
        $data['main_content'] = $this->load->view('pages/user_comment', $data, true);
        echo $data['main_content'];
    }

    public function insert_reply_like($reply_id, $user_id, $like_type) {
        $this->Post_Model->insert_like_by_reply_id($reply_id, $user_id, $like_type);
        $data = array();
        $data['comment_id'] = $this->Post_Model->select_comment_id_by_reply_id($reply_id);
        $data['all_reply'] = $this->Post_Model->select_all_reply_by_comment_id($data['comment_id']);
        $data['main_content'] = $this->load->view('pages/user_sub_comment', $data, true);
        echo $data['main_content'];
    }

    public function user_comment($post_id) {
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_id'] = $post_id;
        $data['all_comment'] = $this->Post_Model->select_all_comment_by_post_id($post_id);
        $data['main_content'] = $this->load->view('pages/user_comment', $data, true);
        echo $data['main_content'];
    }

    public function insert_comment($post_id, $user_id, $comment_description) {
        $data = array();
        $comment_description = str_replace('%20', ' ', $comment_description);
        $this->Post_Model->insert_comment_by_post_id($post_id, $user_id, $comment_description);
        $data['user_id'] = $user_id;
        $data['post_id'] = $post_id;
        $data['all_comment'] = $this->Post_Model->select_all_comment_by_post_id($post_id);
        $data['main_content'] = $this->load->view('pages/user_comment', $data, true);
        echo $data['main_content'];
    }

    public function user_sub_comment($comment_id) {
        $data = array();
        $data['comment_id'] = $comment_id;
        $data['all_reply'] = $this->Post_Model->select_all_reply_by_comment_id($comment_id);
        $data['main_content'] = $this->load->view('pages/user_sub_comment', $data, true);
        echo $data['main_content'];
    }

    public function insert_sub_comment($comment_id, $user_id, $reply_description) {
        $data = array();
        $reply_description = str_replace('%20', ' ', $reply_description);

        $this->Post_Model->insert_reply_by_comment_id($comment_id, $user_id, $reply_description);

        $data['comment_id'] = $comment_id;

        $data['all_reply'] = $this->Post_Model->select_all_reply_by_comment_id($comment_id);
        $data['main_content'] = $this->load->view('pages/user_sub_comment', $data, true);

        echo $data['main_content'];
    }

}
