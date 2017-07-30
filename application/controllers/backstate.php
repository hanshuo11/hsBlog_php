<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Backstate extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('articles_model');
//        分页
        $this->load->library('pagination');
    }

    public function index()
    {
        $login_user=$this->session->userdata('login_user');
        if($login_user){
            $this->load->view('backstate_index');
        }else{
            $this->load->view('index');
        }
    }

    public function write_article()
    {
        $login_user=$this->session->userdata('login_user');
        if($login_user){
            $types=$this->articles_model->get_by_article_type();
            $this->load->view('backstate_write_article',array(
                'types' => $types
            ));
        }else{
            $this->load->view('index');
        }
    }

    public function add_article()
    {
        $login_user=$this->session->userdata('login_user');
        $date=date("Y-m-d");
        $article_name= $this->input->post('article_name');
        $content= $this->input->post('content');
        $type_id=$this->input->post('type_id');
        $result=$this->articles_model->add_article($login_user->user_id,$article_name,$type_id,$content,$date);
        if($result){
            echo '<script>alert("文章发表成功！");</script>';
            $types=$this->articles_model->get_by_article_type();
            $this->load->view('backstate_write_article',array(
                'types' => $types
            ));
        }else{
            echo '<script>alert("发表失败！");</script>';
        }


    }
    public function article_manage(){
        $this->load->view('backstate_article_manage');
    }

}

