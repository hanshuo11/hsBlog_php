<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_model extends CI_Model
{
    public function get_by_username_pwd($uname, $pwd)
    {
        $query = $this->db->get_where('t_user', array(
            'username' => $uname,
            'password' => $pwd
        ));
        return $query->row();
    }
    public function check_username($username){
        return $this->db->get_where('t_user', array(
                'username' => $username
            )
        )->row();
    }
    public function add_user($username,$password,$email){
        $this->db->insert('t_user',array(
            'username'=>$username,
            'password'=>$password,
            'email'=>$email
        ));
        return $this->db->affected_rows();

    }
}

