<?php

class Post_Model extends CI_Model {

    public function upload_picture_by_user_id() {
        $data = array();
        $pdata = array();
        $fdata = array();
        $sdata = array();
        $error = '';
        $data['user_id'] = $this->input->post('user_id');
        // update previous profile picture photo_type to past_profile_picture(3)
        $pdata['photo_type'] = $this->input->post('photo_type');
        if ($pdata['photo_type'] == 1) {
            $this->db->set('photo_type', 2);
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('photo_type', 1);
            $this->db->update('tbl_photo');
        } else if ($pdata['photo_type'] == 3) {
            $this->db->set('photo_type', 4);
            $this->db->where('user_id', $data['user_id']);
            $this->db->where('photo_type', 3);
            $this->db->update('tbl_photo');
        }


        // set new profile picture
        $data['post_description'] = $this->input->post('post_description');
        $data['privacy_status'] = $this->input->post('privacy_status');
        $this->db->insert('tbl_post', $data);
        $pdata['post_id'] = $this->db->insert_id();
        /*
         * start upload image
         */

        $config['upload_path'] = './user_imge/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5500;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_photo')) {
            $error = $this->upload->display_errors();
            $sdata['exception'] = $error;
            $this->session->set_userdata($sdata);
        } else {
            $fdata = $this->upload->data();
            $pdata['user_photo'] = $config['upload_path'] . $fdata['file_name'];
        }

        /*
         * end upload image
         */
        $pdata['user_id'] = $data['user_id'];

        $this->db->insert('tbl_photo', $pdata);
    }

    public function add_post_by_id() {
        $data = array();
        $fdata = array();
        $pdata = array();
        $error = '';
        $data['user_id'] = $this->session->userdata('user_id');
        $data['post_description'] = $this->input->post('post_description', true);
        $data['privacy_status'] = $this->input->post('privacy_status');
        $this->db->insert('tbl_post', $data);
        $pdata['post_id'] = $this->db->insert_id();
        /*
         * start upload image
         */
        $config['upload_path'] = './user_imge/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5500;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('user_photo')) {
            $error = $this->upload->display_errors();
            $sdata = array();
            $sdata['exception'] = $error;
            $this->session->set_userdata($sdata);
        } else {
            $fdata = $this->upload->data();
            $pdata['user_photo'] = $config['upload_path'] . $fdata['file_name'];
        }
        /*
         * end image upload
         */

        $pdata['user_id'] = $data['user_id'];
        $pdata['photo_type'] = $this->input->post('photo_type');
        $this->db->insert('tbl_photo', $pdata);
    }

    public function select_all_post_by_user_id($user_id) {
        $this->db->select('tbl_post.*,tbl_photo.user_photo');
        $this->db->from('tbl_post');
        $this->db->join('tbl_photo', 'tbl_post.post_id = tbl_photo.post_id');
        $this->db->where('tbl_post.user_id', $user_id);
        $this->db->order_by("tbl_post.post_time", "desc");
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }
    // not complete(select_all_user_or_friend_post_by_user_id)
    public function select_all_user_or_friend_post_by_user_id($user_id) {
        $data = array();
        $all_friend = array();
        $all_friend = $this->Friend_Model->select_all_friend_by_user_id($user_id);
        $i=0;
        foreach ($all_friend as $v_friend){
            if($v_friend->user_id == $user_id){
                $data[$i] = $v_friend->friend_id;
            }else{
                $data[$i] = $v_friend->user_id;
            }
            $i++;
        }
        $where = "tbl_post.user_id = '$user_id' and (tbl_post.privacy_status = 1 or tbl_post.privacy_status = 2)";
        $this->db->select('tbl_post.*,tbl_photo.user_photo');
        $this->db->from('tbl_post');
        $this->db->join('tbl_photo', 'tbl_post.post_id = tbl_photo.post_id');
        //$this->db->where($where);
        $this->db->where_in('tbl_post.user_id',$data);
        //$this->db->where($where);
        //$this->db->or_where('tbl_post.user_id',$user_id);
        $this->db->or_where($where);
        //$this->db->where($where);
        $this->db->order_by("tbl_post.post_time", "desc");
        //$this->db->where($where);
        $query_result = $this->db->get();
        $result = $query_result->result();
//        echo '<pre>';
//        print_r($result);
//        exit();
        return $result;
    }

    public function insert_like_by_post_id($post_id, $user_id, $like_type) {
        $data = array();
        $data['post_id'] = $post_id;
        $data['user_like_id'] = $user_id;
        $data['like_type'] = $like_type;
        $this->db->insert('tbl_like', $data);
    }

    public function insert_like_by_comment_id($comment_id, $user_id, $like_type) {
        $data = array();
        $data['comment_id'] = $comment_id;
        $data['user_like_id'] = $user_id;
        $data['like_type'] = $like_type;
        $this->db->insert('tbl_like', $data);
    }

    public function insert_like_by_reply_id($reply_id, $user_id, $like_type) {
        $data = array();
        $data['reply_id'] = $reply_id;
        $data['user_like_id'] = $user_id;
        $data['like_type'] = $like_type;
        $this->db->insert('tbl_like', $data);
    }

    public function select_like_count_by_post_id($all_post) {
        $data = array();
        $i = 0;
        foreach ($all_post as $v_post) {
            $this->db->select('*');
            $this->db->from('tbl_like');
            $this->db->where('post_id', $v_post->post_id);
            $query_result = $this->db->get();
            $data[$i] = $query_result->num_rows();
            $i++;
        }

        return $data;
    }

    public function select_like_count_by_comment_id($comment_id) {

        $this->db->select('*');
        $this->db->from('tbl_like');
        $this->db->where('comment_id', $comment_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function select_like_count_by_reply_id($reply_id) {

        $this->db->select('*');
        $this->db->from('tbl_like');
        $this->db->where('reply_id', $reply_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function select_all_user_like_info_id_by_post_id($all_post) {
        $data = array();
        $i = 0;
        foreach ($all_post as $v_post) {
            $this->db->select('user_like_id');
            $this->db->from('tbl_like');
            $this->db->where('post_id', $v_post->post_id);
            $query_result = $this->db->get();
            $data[$i] = $query_result->result();
            $i++;
        }
        return $data;
    }

    public function select_user_info_by_id($user_id) {
        $this->db->select('tbl_user.*,tbl_photo.user_photo');
        $this->db->from('tbl_user');
        $this->db->join('tbl_photo', 'tbl_user.user_id = tbl_photo.user_id');
        $this->db->where('tbl_user.user_id', $user_id);
        $this->db->where('tbl_photo.photo_type', 3);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function select_user_name_by_id($user_id) {
        $this->db->select('user_name');
        $this->db->from('tbl_user');
        $this->db->where('user_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function insert_comment_by_post_id($post_id, $user_id, $comment_description) {
        $data = array();
        $data['post_id'] = $post_id;
        $data['comment_description'] = $comment_description;
        $data['user_id'] = $user_id;
        $this->db->insert('tbl_comment', $data);
    }

    public function select_all_comment_by_post_id($post_id) {
        $this->db->select('*');
        $this->db->from('tbl_comment');
        $this->db->where('post_id', $post_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function select_comment_count_by_post_id($post_id) {
        $this->db->select('*');
        $this->db->from('tbl_comment');
        $this->db->where('post_id', $post_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function select_all_reply_by_comment_id($comment_id) {
        $this->db->select('*');
        $this->db->from('tbl_reply');
        $this->db->where('comment_id', $comment_id);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function insert_reply_by_comment_id($comment_id, $user_id, $reply_description) {
        $data = array();
        $data['comment_id'] = $comment_id;
        $data['user_id'] = $user_id;
        $data['reply_description'] = $reply_description;
        $this->db->insert('tbl_reply', $data);
    }

    public function select_reply_count_by_comment_id($comment_id) {
        $this->db->select('*');
        $this->db->from('tbl_reply');
        $this->db->where('comment_id', $comment_id);
        $query_result = $this->db->get();
        $result = $query_result->num_rows();
        return $result;
    }

    public function select_post_id_by_comment_id($comment_id) {
        $this->db->select('*');
        $this->db->from('tbl_comment');
        $this->db->where('comment_id', $comment_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result->post_id;
    }

    public function select_comment_id_by_reply_id($reply_id) {
        $this->db->select('*');
        $this->db->from('tbl_reply');
        $this->db->where('reply_id', $reply_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result->comment_id;
    }

    public function select_user_id_by_post_id($post_id) {
        $this->db->select('user_id');
        $this->db->from('tbl_post');
        $this->db->where('post_id', $post_id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result->user_id;
    }

}
