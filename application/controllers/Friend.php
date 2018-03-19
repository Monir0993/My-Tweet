<?php

class Friend extends CI_Controller {
    public function add_friend($user_id) {
        $data = array();
        $this->Friend_Model->add_friend_by_user_id($user_id);
        $data['check_friend'] = 0;
        $data['check_friend_request'] = 1;
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/connection_button',$data,true);
        echo $data['main_content'];
    }
    
    public function cancel_friend_request($user_id) {
        $data = array();
        $this->Friend_Model->cancel_friend_request_by_user_id($user_id);
        $data['check_friend'] = 0;
        $data['check_friend_request'] = 0;
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/connection_button',$data,true);
        echo $data['main_content'];
    }
    
    public function confirm_friend_request($user_id) {
        $data = array();
        $this->Friend_Model->confirm_friend_request_by_id($user_id);
        $data['check_friend'] = 1;
        $data['check_friend_request'] = 0;
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/connection_button',$data,true);
        echo $data['main_content'];
    }
    
    public function confirm_friend_from_navbar($user_id) {
        $data = array();
        $this->Friend_Model->confirm_friend_request_by_id($user_id);
        $user_id = $this->session->userdata('user_id');
        $data['friend_request'] = $this->Friend_Model->select_all_friend_request_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($user_id);
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/all_friend_request',$data,true);
        echo $data['main_content'];
    }
    
    public function confirm_friend_from_list_page($user_id) {
        $data = array();
        $this->Friend_Model->confirm_friend_request_by_id($user_id);
        $user_id = $this->session->userdata('user_id');
        $data['friend_request'] = $this->Friend_Model->select_all_friend_request_by_user_id_without_limit($user_id);
        $data['title'] = 'My Tweet - All Friend Request';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['main_content'] = $this->load->view('pages/friend_request_list',$data, true);
        echo $data['main_content'];
    }
    
    public function unfriend($user_id) {
        $data = array();
        $this->Friend_Model->unfriend_by_user_id($this->session->userdata('user_id'),$user_id);
        $data['check_friend'] = 0;
        $data['check_friend_request'] = 0;
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/connection_button',$data,true);
        echo $data['main_content'];
    }
    
    public function unfriend_from_list_page($user_id) {
        $data = array();
        $this->Friend_Model->unfriend_by_user_id($this->session->userdata('user_id'),$user_id);
        $user_id = $this->session->userdata('user_id');
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['title'] = 'My Tweet - All Friend List';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['main_content'] = $this->load->view('pages/friend_list',$data, true);
        echo $data['main_content'];
    }
    
    public function all_friend_request($user_id) {
        $data = array();
        $data['friend_request'] = $this->Friend_Model->select_all_friend_request_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($user_id);
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/all_friend_request',$data,true);
        echo $data['main_content'];
    }
    
    public function not_now_friend($user_id) {
        $data = array();
        $this->Friend_Model->not_now_friend_by_user_id($user_id);
        $user_id = $this->session->userdata('user_id');
        $data['friend_request'] = $this->Friend_Model->select_all_friend_request_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($user_id);
        $data['user_id'] = $user_id;
        $data['main_content'] = $this->load->view('pages/all_friend_request',$data,true);
        echo $data['main_content'];
    }
    
    public function all_friend_list($user_id) {
        $data = array();
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['title'] = 'My Tweet - All Friend List';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
        $data['main_content'] = $this->load->view('pages/friend_list',$data, true);
        $this->load->view('master', $data);
    }
}
