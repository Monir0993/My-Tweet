<?php

class Registration_Model extends CI_Model {
    public function save_user_info(){
        $data = array();
        $sdata = array();
        // tbl_user table insert
        $data['user_name'] = $_POST['user_name'];
        $data['user_email_address'] = $_POST['user_email_address'];
        $data['user_password'] = md5($_POST['user_password']);
        $data['user_sex'] = $_POST['user_sex'];
        $this->db->insert('tbl_user',$data);
        $user_id = $this->db->insert_id();
//        $sdata['user_name'] = $data['user_name'];
        $sdata['user_id'] = $user_id;
        $sdata['user_name'] = $data['user_name'];
        $sdata['user_email_address'] = $data['user_email_address'];
        $this->session->set_userdata($sdata);
        
    }
    
    public function check_email_info($email_address) {
        $this->db->select('*');
        $this->db->from('tbl_user');
        $this->db->where('user_email_address',$email_address);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }
}
