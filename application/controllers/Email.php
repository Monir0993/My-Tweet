<?php

class Email extends CI_Controller {
    public function recovery_password($enc_email) {
        $enc_email = str_replace('%F2','/', $enc_email);
        $email_address = $this->encrypt->decode($enc_email);
        $data = array();
        $data['title'] = 'My Tweet - Password Recovery';
        $data['logout'] = true;
        $data['email_address'] = $email_address;
        $data['log_out_content'] = $this->load->view('pages/password_recovery_page',$data, true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }
    
    public function update_password() {
        $this->Mailer_Model->update_new_password();
        redirect('Email/update_password_successfully');
    }
    
    public function update_password_successfully(){
        $data = array();
        $data['title'] = 'My Tweet - Update Password Successfully';
        $data['logout'] = true;
        $data['log_out_content'] = $this->load->view('pages/update_password_successfully', '', true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }
}
