<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Test
 *
 */
class Test extends Admin_Controller
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
     * Test
     *
     * @return void
     */
    public function index()
    {
        $data = [
            'page' => [
                'title' => 'Test',
                'view' => 'backend/test/test'
            ],
            'breadcrumb' => [
                'breadcrumb' => [
                    [
                        'class' => '',
                        'icon' => 'fa-dashboard',
                        'name' => 'Test',
                        'href' => current_url()
                    ],
                    [
                        'class' => 'active',
                        'icon' => '',
                        'name' => 'test',
                        'href' => 'javascript:void(0)'
                    ]
                ]
            ]
        ];
        $this->load_page($data);
    }
}