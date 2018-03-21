<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Sys_menu_model
 *
 */
class Sys_menu_model extends CI_Model
{
    /**
     * 系统菜单表
     *
     * @var string
     */
    private $sys_menu_table = 'sys_menu';

    /**
     * Sys_menu_model constructor.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * 获取系统菜单
     *
     * @return array
     */
    public function get_all_sys_menu()
    {
        $condition = [
            'status' => '1'
        ];
        $sys_menus = $this->common_model->get_where($this->sys_menu_table, $condition);
        // 构造系统菜单 [层级关系]
        $sys_menus_struct = $this->sys_menus_struct($sys_menus, 0);
        $sys_menus = [];
        // 获取子菜单不为空的 菜单
        foreach ($sys_menus_struct as $_key => $sys_menu) {
            if (isset($sys_menu->child) && !empty($sys_menu->child)) {
                $sys_menus[] = $sys_menu;
            }
        }
        return $sys_menus;
    }

    /**
     * 构造系统菜单
     *
     * @param  object  $sys_menus  数据库导航对象
     * @param  int     $parent_id 父导航 id
     * @return object
     */
    public function sys_menus_struct($sys_menus, $parent_id)
    {
        $sys_menus_by_parent_id = $this->get_sys_menu_by_parent_id($sys_menus, $parent_id);
        if (empty($sys_menus_by_parent_id)) return null;
        foreach ($sys_menus_by_parent_id as $_key => $sys_menu) {
            $sys_menus_child = $this->sys_menus_struct($sys_menus, $sys_menu->sys_menu_id);
            if (!empty($sys_menus_child)) $sys_menu->child = $sys_menus_child;
        }
        return $sys_menus_by_parent_id;
    }

    /**
     * 根据parent_id 返回子菜单
     *
     * @param  object  $sys_menus  数据库导航对象
     * @param  int     $parent_id  父导航 id
     * @return array
     */
    private function get_sys_menu_by_parent_id($sys_menus, $parent_id)
    {
        $sys_menus_by_parent_id = [];
        foreach ($sys_menus as $_key => $sys_menu) {
            if ($parent_id == 0) {
                // 顶级菜单
                if ($sys_menu->parent_id == $parent_id) $sys_menus_by_parent_id[] = $sys_menu;
            } else {
                // 子菜单
                if ($sys_menu->parent_id == $parent_id) $sys_menus_by_parent_id[] = $sys_menu;
            }
        }
        return $sys_menus_by_parent_id;
    }
}
