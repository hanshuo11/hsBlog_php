<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Comments_model extends CI_Model
{
    public function add_comment($comment,$post_date,$article_id,$user_id){
        $this->db->insert('t_comment',array(
            'content'=>$comment,
            'article_id'=>$article_id,
            'user_id'=>$user_id,
            'post_date'=>$post_date
        ));
        return $this->db->affected_rows();
    }
    public function get_article_comments_by_article_id($id){
        $sql="select c.*,u.username from t_comment c,t_user u where u.user_id=c.user_id and c.article_id=$id";
        return $this->db->query($sql)->result();
    }

}

