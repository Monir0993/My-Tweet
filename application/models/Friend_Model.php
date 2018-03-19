<?php

class Friend_Model extends CI_Model {
    public function add_friend_by_user_id($user_id) {
        $data = array();
        $data['user_id'] = $user_id;
        $data['requested_user_id'] = $this->session->userdata('user_id');
        $this->db->insert('tbl_friend_request',$data);
    }
    
    public function cancel_friend_request_by_user_id($user_id) {
        $data = array();
        $data['user_id'] = $user_id;
        $data['requested_user_id'] = $this->session->userdata('user_id');
        $this->db->where($data);
        $this->db->delete('tbl_friend_request');
    }
    
    public function confirm_friend_request_by_id($user_id) {
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['requested_user_id'] = $user_id;
        $this->db->where($data);
        $this->db->delete('tbl_friend_request');
        $fdata = array();
        $fdata['user_id'] = $this->session->userdata('user_id');
        $fdata['friend_id'] = $user_id;
        $this->db->insert('tbl_friend',$fdata);
    }
    
    public function unfriend_by_user_id($user_id,$friend_id) {
        $where = "user_id = $user_id AND friend_id = $friend_id OR user_id = $friend_id AND friend_id = $user_id";
        $this->db->where($where);
        $this->db->delete('tbl_friend');
    }
    
    public function select_all_friend_request_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_friend_request');
        $this->db->where('user_id',$user_id);
        $this->db->where('request_status',0);
        $this->db->order_by('request_time','desc');
        $this->db->limit(6);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_all_friend_request_by_user_id_without_limit($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_friend_request');
        $this->db->where('user_id',$user_id);
        $this->db->order_by('request_time','desc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_friend_request_count_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_friend_request');
        $this->db->where('user_id',$user_id);
        $this->db->where('request_status',0);
        $this->db->order_by('request_time','desc');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }
    
    public function not_now_friend_by_user_id($requested_user_id) {
        $data = array();
        $data['user_id'] = $this->session->userdata('user_id');
        $data['requested_user_id'] = $requested_user_id;
        $this->db->set('request_status',1);
        $this->db->where($data);
        $this->db->update('tbl_friend_request');
    }
    
    public function select_all_friend_by_user_id($user_id) {
        
        $this->db->select('*');
        $this->db->from('tbl_friend');
        $this->db->where('user_id',$user_id);
        $this->db->or_where('friend_id',$user_id);
        $this->db->order_by('friend_since','desc');
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    
    public function select_friend_count_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_friend');
        $this->db->where('user_id',$user_id);
        $this->db->or_where('friend_id',$user_id);
        $this->db->order_by('friend_since','desc');
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }
}
