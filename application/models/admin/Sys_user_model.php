<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Sys_manager_model
 *
 */
class Sys_manager_model extends CI_Model
{

    /**
     * Sys_manager_model constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取管理员信息
     * @param  string $manager_name
     *
     * @return array
     */
    public function get_sys_manager($manager_name)
    {
        $condition = [
            'manager_name' => $manager_name
        ];
        $query = $this->db->get_where('sys_manager', $condition);
        return $query->result();
    }
}
