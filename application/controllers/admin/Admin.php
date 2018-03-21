<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Admin
 *
 */
class Admin extends Admin_Controller
{

    /**
     * Admin constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 后台首页视图
     *
     * @return void
     */
    public function index()
    {
        $data = [
            'page' => [
                'title' => 'System',
                'view' => 'backend/system'
            ],
            'breadcrumb' => [
                'breadcrumb' => [
                    [
                        'class' => '',
                        'icon' => 'fa-dashboard',
                        'name' => 'System',
                        'href' => current_url()
                    ],
                    [
                        'class' => 'active',
                        'icon' => '',
                        'name' => 'system-info',
                        'href' => 'javascript:void(0)'
                    ]
                ]
            ]
        ];
        $this->load_page($data);
    }
}