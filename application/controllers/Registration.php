<?php

class Registration extends CI_Controller {

    public function sign_up() {
        $data = array();
        $data['user_email_address'] = $this->input->post('user_email_address');
        $data['user_password'] = $this->input->post('user_password');
        $data['user_sex'] = $this->input->post('user_sex');
        /*
         * mail data configuration
         */
        $data['from_address'] = 'admin@My_Tweet_CI_Project.com';
        $data['admin_full_name'] = 'My Tweet';
        $data['to_address'] = $data['user_email_address'];
        $data['subject'] = 'User Registration';
        $data['user_name'] = $this->input->post('first_name') . ' ' . $this->input->post('last_name');
        $this->Mailer_Model->send_email($data, 'user_registration_email');
        $sdata = array();
        $sdata['message'] = 'Account Confirmation Link was Sent to Email. Please Check your Email and Confirm Your Account Registration.';
        $this->session->set_userdata($sdata);
        redirect('Registration/send_email_successfully');
    }

    public function send_email_successfully() {
        $data = array();
        $data['title'] = 'My Tweet';
        $data['logout'] = true;
        $data['log_out_content'] = $this->load->view('pages/send_email_successfully', '', true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }

    public function confirm_registration() {
        $this->Registration_Model->save_user_info();
        redirect('Welcome');
    }

    public function ajax_email_check($email_address = NULL) {
        if ($email_address == '') {
            echo 'Email Address Required.';
        } else {
            $result = $this->Registration_Model->check_email_info($email_address);
            if ($result) {
                echo 'Email Address Already Exits.';
            } else {
                echo 'Email Address Available.';
            }
        }
    }

    public function forget_password() {
        $data = array();
        $data['title'] = 'My Tweet - Forget Password';
        $data['logout'] = true;
        $data['log_out_content'] = $this->load->view('pages/forget_password_page', '', true);
        $data['main_content'] = '';
        $data['content_class'] = '0';
        $this->load->view('master', $data);
    }

    public function user_email_check() {
        $email_address = $this->input->post('user_email_address', true);
        $result = $this->Registration_Model->check_email_info($email_address);
        if ($result) {
            /*
             * mail data configuration
             */
            $data = array();
            $data['from_address'] = 'admin@My_Tweet_CI_Project.com';
            $data['admin_full_name'] = 'My Tweet';
            $data['to_address'] = $result->user_email_address;
            $data['user_name'] = $result->user_name;
            $data['subject'] = 'Password Recovery';
            $this->Mailer_Model->send_email($data, 'password_recovery_email');
            $sdata = array();
            $sdata['message'] = 'Password Recovery Link was Sent to Email. Please Check your Email and Update Your Password.';
            $this->session->set_userdata($sdata);
            redirect('Registration/send_email_successfully');
        } else {
            $sdata = array();
            $sdata['exception'] = 'Sorry You Have No Account Here';
            $this->session->set_userdata($sdata);
            redirect('Registration/forget_password');
        }
    }

}
