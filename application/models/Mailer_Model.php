<?php

class Mailer_Model extends CI_Model {
    public function send_email($data,$templateName){
        $this->email->set_mailtype('html');
        $this->email->from($data['from_address'],$data['admin_full_name']);
        $this->email->to($data['to_address']);
        $this->email->subject($data['subject']);
        $body = $this->load->view('mailer_script/'.$templateName,$data,true);
        echo $body;
        exit();
        $this->email->message($body);
        $this->email->send();
        $this->email->clear();
    }
    
    public function update_new_password() {
        $email_address = $this->input->post('user_email_address',true);
        $user_password = md5($this->input->post('user_password',true));
        $this->db->set('user_password',$user_password);
        $this->db->where('user_email_address',$email_address);
        $this->db->update('tbl_user');
    }
}
