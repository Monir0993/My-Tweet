<?php

class Welcome_Model extends CI_Model {
    public function check_user_login_info() {
        $email_addreess = $this->input->post('user_email_address');
        $password = md5($this->input->post('user_password'));
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_email_address',$email_addreess);
        $this->db->where('user_password',$password);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_user_info_by_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_id',$user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_profile_picture_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_photo');
        $this->db->where('user_id',$user_id);
        $this->db->where('photo_type',3);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
    public function select_cover_picture_by_user_id($user_id) {
        $this->db->select('*');
        $this->db->from('tbl_photo');
        $this->db->where('user_id',$user_id);
        $this->db->where('photo_type',1);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
    
}
