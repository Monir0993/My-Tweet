<?php

class Search extends CI_Controller {

    public function search_friend_by_name($user_name = NULL) {
        $data = array();
        $data['friend_info'] = $this->Search_Model->select_friend_info_by_name($user_name);
        $data['search_content'] = $this->load->view('pages/search_friend_list', $data, true);
        echo $data['search_content'];
    }

    public function show_friend_profile($user_id) {
        $data = array();
        $data['content_class'] = '0';
        $data['cover_photo'] = true;
        $data['profile_page'] = true;
        $data['timeline'] = true;
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['cover_picture'] = $this->Welcome_Model->select_cover_picture_by_user_id($user_id);
        $data['check_friend'] = $this->Search_Model->check_friend_by_user_id($user_id);
        $data['check_friend_request'] = $this->Search_Model->check_friend_request_by_user_id($user_id,$this->session->userdata('user_id'));
        $data['check_rev_friend_request'] = $this->Search_Model->check_friend_request_by_user_id($this->session->userdata('user_id'),$user_id);
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
        $data['main_content'] = $this->load->view('pages/friend_profile', '', true);
        $data['title'] = 'My Tweet - ' . $data['user_info']->user_name;
        $this->load->view('pages/master_friend', $data);
    }
    
    public function search_friend() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['friend_info'] = $this->Search_Model->select_all_friend_by_given_info();
        $data['title'] = 'Search Result';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
        $data['main_content'] = $this->load->view('pages/search_result',$data, true);
        $this->load->view('master', $data);
    }
    
    public function connection_button($check_friend,$check_friend_request) {
        $data = array();
        $data['check_friend'] = $check_friend;
        $data['check_friend_request'] = $check_friend_request;
        $data['main_content'] = $this->load->view('pages/connection_button',$data,true);
        echo $data['main_content'];
    }
    
    public function friend_request_list() {
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['friend_request'] = $this->Friend_Model->select_all_friend_request_by_user_id_without_limit($user_id);
        $data['title'] = 'My Tweet - All Friend Request';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['main_content'] = $this->load->view('pages/friend_request_list',$data, true);
        $this->load->view('master', $data);
    }

}
