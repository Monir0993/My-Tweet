<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        if ($user_name != NULL) {
            $data = array();
            $data['title'] = $user_name;
            $data['content_class'] = '0';
            $data['cover_photo'] = true;
            $data['profile_page'] = true;
            $data['timeline'] = true;
            $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
            $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
            $data['cover_picture'] = $this->Welcome_Model->select_cover_picture_by_user_id($user_id);
//            $data['main_content'] = $this->load->view('pages/profile', '', true);
            $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($user_id);
            $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
            $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
            $this->load->view('master', $data);
        } else {
            redirect('Welcome/login');
        }
    }

    public function home() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = 'My Tweet - Home';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
        
        $data['all_post'] = $this->Post_Model->select_all_user_or_friend_post_by_user_id($user_id);
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['like_count'] = $this->Post_Model->select_like_count_by_post_id($data['all_post']);
        $data['user_like_info_id'] = $this->Post_Model->select_all_user_like_info_id_by_post_id($data['all_post']);
        
        $data['main_content'] = $this->load->view('pages/home', $data, true);
        $this->load->view('master', $data);
    }

    public function photo_gallery() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = 'My Tweet - Photo Gallery';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['all_friend'] = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $data['friend_count'] = $this->Friend_Model->select_friend_count_by_user_id($user_id);
        $data['main_content'] = $this->load->view('pages/photo_gallery', '', true);
        $this->load->view('master', $data);
    }

    public function friend_list() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = 'My Tweet - Friend List';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['main_content'] = $this->load->view('pages/friend_list', '', true);
        $this->load->view('master', $data);
    }

    public function about() {
        $user_name = $this->session->userdata('user_name');
        $user_id = $this->session->userdata('user_id');
        $data = array();
        $data['title'] = 'My Tweet - About';
        $data['content_class'] = '0';
        $data['user_info'] = $this->Welcome_Model->select_user_info_by_id($user_id);
        $data['profile_picture'] = $this->Welcome_Model->select_profile_picture_by_user_id($user_id);
        $data['friend_request_count'] = $this->Friend_Model->select_friend_request_count_by_user_id($this->session->userdata('user_id'));
        $data['main_content'] = $this->load->view('pages/about', '', true);
        $this->load->view('master', $data);
    }

    public function login() {
        $user_name = $this->session->userdata('user_name');
        if ($user_name) {
            redirect('Welcome', 'refresh');
        }
        $data = array();
        $data['title'] = 'My Tweet';
        $data['logout'] = true;
        $data['log_out_content'] = $this->load->view('pages/login', '', true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }

    public function user_login_check() {
        $sdata = array();
        $result = $this->Welcome_Model->check_user_login_info();
        if ($result) {
            $sdata['user_id'] = $result->user_id;
            $sdata['user_name'] = $result->user_name;
            $sdata['user_email_address'] = $result->user_email_address;
            $this->session->set_userdata($sdata);
            redirect('Welcome');
        } else {
            $sdata['exception'] = 'Your User Name or Password Invalid !!';
            $this->session->set_userdata($sdata);
            redirect('Welcome/login');
        }
    }

    public function logout() {
        $this->session->unset_userdata('user_id');
        $this->session->unset_userdata('user_name');
        $this->session->unset_userdata('user_email_address');
        redirect('Welcome/login');
    }

    public function registration_form() {
        $user_name = $this->session->userdata('user_name');
        if ($user_name) {
            redirect('Welcome', 'refresh');
        }
        $data = array();
        $data['title'] = 'My Tweet - Sign Up';
        $data['sign_up'] = true;
        $data['sign_up_content'] = $this->load->view('pages/registration_form', '', true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }

}
