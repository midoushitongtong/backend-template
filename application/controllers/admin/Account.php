<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Account
 *
 */
class Account extends Init_Controller
{
    /**
     * Account constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * sign view
     *
     * @return void
     */
    public function sign_in()
    {
        $data = [
            'page' => [
                'title' => 'Admin | Sign In'
            ]
        ];
        $this->load->view('backend/sign_in', $data);
    }

    /**
     * sign check
     *
     * @return string
     */
    public function sign_in_check()
    {
        $login_info = $this->input->post();
        $user_name = $login_info['userName'];
        $password = sha1($login_info['password']);
        // 获取状态不为0的管理员
        $condition = [
            'user_name' => $user_name,
            'status' => 1
        ];
        $manager = $this->common_model->get_where($this->sys_user_table, $condition);
        // 判断密码是否正确
        if (count($manager) > 0 && $manager[0]->password == $password) {
            $data = [
                'manager' => $manager[0]
            ];
            //创建session
            $this->session->set_userdata($data);
            $this->mresult->errCode = 0;
            $this->mresult->errMsg = 'SignIn Success';
            $this->mresult->toJson();
        } else {
            $this->mresult->errCode = 400404;
            $this->mresult->errMsg = 'SignIn Failed';
            $this->mresult->toJson();
        }
    }

    /**
     * 注销登录
     *
     * @return void
     */
    public function sign_out()
    {
        // 销毁 sys_user session
        $data = [
            'manager'
        ];
        $this->session->unset_userdata($data);

        // 重定向登录页面
        redirect(site_url('admin/account/sign_in'));
    }
}