<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('articles_model');
        $this->load->model('comments_model');
//        分页类
        $this->load->library('pagination');
    }

    public function index()
    {
        $login_user = $this->session->userdata('login_user');
        $all_articles = $this->articles_model->get_all_articles();
//        $all_article_type = $this->articles_model->get_by_article_type();
        $count=count($all_articles);
        $add='welcome/index';
        $config=$this->page_config( $count, $add );
        $this->pagination->initialize($config);
        $data['page'] = $this->pagination->create_links();
        $data['list'] = $this->articles_model->get_articles_limit( $config ['per_page'], $this->uri->segment(3));
        $data['articles']=$all_articles;
        if ($login_user) {
            $data['ok']='ok';
            $this->load->view('index',$data);
        } else {
            $this->load->view('index',$data);
        }
    }
    //分页控制方法
    function page_config($count, $add) {
        $config ['base_url'] = $add; //设置基地址

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';

        //$config ['uri_segment'] = 3; //设置url上第几段用于传递分页器的偏移量
        $config ['total_rows'] = $count;//一共有多少条数据
        $config ['per_page'] = 8; //每页显示的数据数量
        $config ['first_link'] = '首页';
        $config['num_links'] = 3;
        $config ['last_link'] = '末页';
        $config ['next_link'] = '下一页>';
        $config ['prev_link'] = '<上一页';

        return $config;
    }


    public function check_login()
    {
        $use = $this->input->post('use');
        $pad = $this->input->post('pad');
        $this->load->model('user_model');
        $rows = $this->user_model->get_by_username_pwd($use, $pad);
        $all_articles = $this->articles_model->get_all_articles();
        if ($rows) {
            $this->session->set_userdata('login_user', $rows);
            echo 'yes';
        } else {
            echo 'no';
        }

    }

    public function login_out()
    {
        $this->session->unset_userdata('login_user');
        //获取当前url进行退出跳转，用php的跳转方法不会有明显的跳转的效果
        $url=$_SERVER["HTTP_REFERER"];
        header("Location:$url");
        //js的跳转会有延迟效果特别差！
//        echo "<script>location.href='".$url."';</script>";
    }

//分类表
    public function classify()
    {
        $login_user = $this->session->userdata('login_user');
        if ($login_user) {
            $this->load->view('classify', array(
                'ok' => 'ok',
            ));
        } else {
            $this->load->view('classify');
        }
    }

//文章详情
    public function article()
    {
        $login_user = $this->session->userdata('login_user');
        $article_id = $this->input->get('id');
        $article_by_id = $this->articles_model->get_article_by_id($article_id);
        $comments = $this->comments_model->get_article_comments_by_article_id($article_id);
        if ($login_user) {
            $this->load->view('article', array(
                'ok' => 'ok',
                'article' => $article_by_id,
                'comments'=>$comments
            ));
        } else {
            $this->load->view('article', array(
                'article' => $article_by_id,
                'comments'=>$comments
            ));
        }
    }

    public function check_username()
    {
        $username = $this->input->get('username');
        $result = $this->user_model->check_username($username);
        if ($result) {
            echo 'no';
        } else {
            echo 'ok';
        }
    }

//    注册
    public function add_user()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $email = $this->input->post('email');
        $all_articles = $this->articles_model->get_all_articles();
        $result = $this->user_model->add_user($username, $password, $email);
        if ($result) {
            echo '<script>alert("注册成功！");</script>';
            $this->load->view('index', array(
                'articles' => $all_articles
            ));
        } else {
            echo '<script>alert("注册失败！");</script>';
            $this->load->view('index', array(
                'articles' => $all_articles
            ));
        }
    }
    public function get_comment(){
        date_default_timezone_set("PRC");
        $login_user = $this->session->userdata('login_user');
        if($login_user){
            $comment=$this->input->post('comment');
            $article_id=$this->input->post('article_id');
            $post_date=date("Y-m-d H:i:s");
            $user_id=$login_user->user_id;
            $row=$this->comments_model->add_comment($comment,$post_date,$article_id,$user_id);
            echo 'yes';
        }else{
            echo 'no';
        }
    }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */