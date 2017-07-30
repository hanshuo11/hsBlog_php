<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Articles_model extends CI_Model
{
    public function get_by_article_type()
    {
        $sql="select * from t_article_type";
        return $this->db->query($sql)->result();

    }
    public function add_article($user_id,$article_name,$type_id,$content,$date)
    {
        $this->db->insert('t_article',array(
            'content'=>$content,
            'title'=>$article_name,
            'type_id'=>$type_id,
            'user_id'=>$user_id,
            'post_date'=>$date
        ));
        return $this->db->affected_rows();
    }
    public function get_all_articles(){
        $sql="select a.*,t.type_name,(select count(*) from t_comment c where c.article_id=a.article_id)comment_number from t_article a,t_article_type t where a.type_id=t.type_id  order by article_id desc";
        return $this->db->query($sql)->result();
    }
    public function get_article_by_id($id){
        $sql1="update t_article set clicked=clicked+1 where article_id=$id";
        $this->db->query($sql1);
        $sql="select a.*,t.type_name,(select count(*) from t_comment c where c.article_id=a.article_id)comment_number from t_article a,t_article_type t where a.type_id=t.type_id and article_id=$id";
        return $this->db->query($sql)->row();
    }

    public function get_articles_limit($n,$o){
        if($o==''){$o=0;}
        $sql="select a.*,t.type_name,(select count(*) from t_comment c where c.article_id=a.article_id)comment_number from t_article a,t_article_type t where a.type_id=t.type_id order by article_id desc limit $o,$n";
        return $this->db->query($sql)->result();
    }

}

