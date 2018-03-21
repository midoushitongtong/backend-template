<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Init_Controller
 *
 */
class Init_Controller extends CI_Controller
{
    /**
     * 所有表名称和主键
     *
     * @var string
     */
    protected $sys_user_table = 'sys_user';
    protected $sys_menu_table = 'sys_menu';

    /**
     * Init_Controller constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        // include model
        $this->load->model('common/common_model');
        // include library
        $this->load->library('common/mresult');
        $this->load->library('common/tool');
    }
}

/**
 * Class Admin_Controller
 *
 */
class Admin_Controller extends Init_Controller
{
    /**
     * 后台管理员 管理员id
     *
     * @var
     */
    public $sys_user_id;

    /**
     * Admin_Controller constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
        // 判断是否登录
        $manager = $this->session->userdata('manager');
        if (!isset($manager) || empty($manager)) {
            redirect(site_url('admin/account/sign_in'));
        }
        // 保存当前管理员的id
        $this->sys_user_id = $manager->sys_user_id;
        // load model
        $this->load->model('admin/sys_menu_model');
    }

    /**
     * 页面初始化
     *
     * @param array $data 数据
     */
    public function load_page($data)
    {
        $data['page']['page_src'] = current_url();
        $view = $data['page']['view'];
        if (empty($view)) {
            // 不得为空
            $this->mresult->errCode = 400301;
            $this->mresult->errMsg = 'view name is not empty';
            $this->mresult->toJson();
        }
        if (!is_pjax()) {
            // 没有pjax头请求 刷新加载整个框架
            $data['sys_menus'] = $this->sys_menu_model->get_all_sys_menu();
            $this->load->view('backend/index', $data);
        } else {
            // 有pjax有请求 只加载html内容
            $this->load->view('backend/layouts/breadcrumb', $data);
            $this->load->view($view);
        }
    }
}
