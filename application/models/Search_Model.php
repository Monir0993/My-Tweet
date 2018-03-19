<?php

class Search_Model extends CI_Model {

    public function select_friend_info_by_name($user_name) {
        $this->db->select('tbl_user.*,tbl_photo.user_photo');
        $this->db->from('tbl_user');
        $this->db->join('tbl_photo', 'tbl_user.user_id = tbl_photo.user_id');
        $this->db->limit(8);
        $this->db->like('tbl_user.user_name', $user_name);
        $this->db->where('tbl_photo.photo_type', 3);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_all_friend_by_given_info() {
        $user_info = $this->input->post('search_friend', true);
        $this->db->select('tbl_user.*,tbl_photo.user_photo');
        $this->db->from('tbl_user');
        $this->db->join('tbl_photo', 'tbl_user.user_id = tbl_photo.user_id');
        $this->db->where('tbl_user.user_email_address', $user_info);
        $this->db->where('tbl_photo.photo_type', 3);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if ($result) {
            $sdata = array();
            $sdata['message'] = 'Email Address Search';
            $this->session->set_userdata($sdata);
            return $result;
        } else {
            $this->db->select('tbl_user.*,tbl_photo.user_photo');
            $this->db->from('tbl_user');
            $this->db->join('tbl_photo', 'tbl_user.user_id = tbl_photo.user_id');
            $this->db->like('tbl_user.user_name', $user_info);
            $this->db->where('tbl_photo.photo_type', 3);
            $query_result = $this->db->get();
            $result = $query_result->result();
            return $result;
        }
    }
    
    public function check_friend_by_user_id($friend_id) {
        $user_id = $this->session->userdata('user_id');
        $where = "user_id = $user_id AND friend_id = $friend_id OR user_id = $friend_id AND friend_id = $user_id";
        $this->db->select('*');
        $this->db->from('tbl_friend');
        $this->db->where($where);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if($result){
            return 1;
        }
        return 0;
    }
    
    public function check_friend_request_by_user_id($user_id,$requested_user_id) {
        $this->db->select('*');
        $this->db->from('tbl_friend_request');
        $this->db->where('user_id',$user_id);
        $this->db->where('requested_user_id',$requested_user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if($result){
            return 1;
        }
        return 0;
    }

}
