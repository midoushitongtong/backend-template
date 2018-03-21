<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Class Common_model
 *
 */
class Common_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    /**
     * Get data from table or view
     *
     * @param  string $sKey unique key to get data
     * @param  string $sTable Table or View name
     * @param  string $sColumns
     * @param  int $offset
     * @param  int $pagesize
     * @param  string $order_str
     * @param  string $filter_str
     * @return array
     */
    function get_data($sKey, $sTable, $sColumns, $offset, $pagesize, $order_str, $filter_str)
    {
        $sql = "select " . $sColumns . " from " . $sTable . $filter_str . " order by " . $order_str . " limit " . $offset . "," . $pagesize . ' ;';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * 返回新增的索引id
     *
     * @return int
     */
    public function get_insert_id()
    {
        return $this->db->insert_id();
    }

    /**
     * Get data
     *
     * @param  string $table_name 表名
     * @param  string $return_type 返回数据类型
     * @return object|array
     */
    public function get_all($table_name, $return_type = 'object')
    {
        $query = $this->db->get($table_name);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions.
     *
     * @param  string $table_name 表名
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_all_limit($table_name, $limit, $offset, $return_type = 'object')
    {
        $query = $this->db->limit($limit, $offset)->get($table_name);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where condition and sys_merchant_id.
     *
     * @param  string $table_name 表名
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_all_limit_by_merchant_id($table_name, $limit, $offset, $return_type = 'object')
    {
        $condition = [
            'merchant_id' => $this->merchant_id
        ];
        $query = $this->db->limit($limit, $offset)->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where condition and sys_merchant_id.
     *
     * @param  string $table_name 表名
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_all_limit_by_sys_merchant_id($table_name, $limit, $offset, $return_type = 'object')
    {
        $condition = [];
        if ($this->sys_merchant_id != 0) {
            $condition = [
                'merchant_id' => $this->sys_merchant_id
            ];
        }
        $query = $this->db->limit($limit, $offset)->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where($table_name, $condition = [], $return_type = 'object')
    {
        $query = $this->db->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions and merchant_id.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where_by_merchant_id($table_name, $condition = [], $return_type = 'object')
    {
        $condition['merchant_id'] = $this->merchant_id;
        $query = $this->db->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions and sys_merchant_id.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where_by_sys_merchant_id($table_name, $condition = [], $return_type = 'object')
    {
        if ($this->sys_merchant_id != 0) {
            $condition['merchant_id'] = $this->sys_merchant_id;
        }
        $query = $this->db->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where_limit($table_name, $condition = [], $limit, $offset, $return_type = 'object')
    {
        $query = $this->db->limit($limit, $offset)->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions and merchant_id.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where_limit_by_merchant_id($table_name, $condition = [], $limit, $offset, $return_type = 'object')
    {
        $condition['merchant_id'] = $this->merchant_id;
        $query = $this->db->limit($limit, $offset)->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Get data with where conditions and sys_merchant_id.
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @param  string $limit 分页数
     * @param  string $offset 分页偏移数量
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_where_limit_by_sys_merchant_id($table_name, $condition = [], $limit, $offset, $return_type = 'object')
    {
        if ($this->sys_merchant_id != 0) {
            $condition['merchant_id'] = $this->sys_merchant_id;
        }
        $query = $this->db->limit($limit, $offset)->get_where($table_name, $condition);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * 获取所有数据 NOT IN
     *
     * @param  string $table_name 表名
     * @param  string $not_in_key NOT IN 字段
     * @param  array $not_in_arr NOT IN 数组
     * @param  string $return_type 返回类型
     * @return object|array
     */
    public function get_all_where_not_in($table_name, $not_in_key, $not_in_arr, $return_type = 'object')
    {
        $query = $this->db->where_not_in($not_in_key, $not_in_arr)->get($table_name);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * Insert data to table
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @return int
     */
    public function insert($table_name, $data)
    {
        $this->db->insert($table_name, $data);
        return $this->db->affected_rows();
    }

    /**
     * Insert Batch to table
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @return int
     */
    public function insert_batch($table_name, $data)
    {
        $this->db->insert_batch($table_name, $data);
        return $this->db->affected_rows();
    }

    /**
     * Insert data to table by merchant_id
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @return boolean
     */
    public function insert_by_merchant_id($table_name, $data)
    {
        $data['merchant_id'] = $this->merchant_id;
        $this->db->insert($table_name, $data);
        return $this->db->affected_rows();
    }

    /**
     * Insert data to table by sys_merchant_id
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @return boolean
     */
    public function insert_by_sys_merchant_id($table_name, $data)
    {
        if ($this->sys_merchant_id != 0) {
            $data['merchant_id'] = $this->sys_merchant_id;
        }
        $this->db->insert($table_name, $data);
        return $this->db->affected_rows();
    }

    /**
     * Update data to table
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function update($table_name, $data, $condition = [])
    {
        $this->db->update($table_name, $data, $condition);
        return $this->db->affected_rows();
    }

    /**
     * Update data to table and merchant_id
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function update_by_merchant_id($table_name, $data, $condition = [])
    {
        $condition['merchant_id'] = $this->merchant_id;
        $this->db->update($table_name, $data, $condition);
        return $this->db->affected_rows();
    }

    /**
     * Update data to table and sys_merchant_id
     *
     * @param  string $table_name 表名
     * @param  array $data 数据
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function update_by_sys_merchant_id($table_name, $data, $condition = [])
    {
        if ($this->sys_merchant_id != 0) {
            $condition['merchant_id'] = $this->sys_merchant_id;
        }
        $this->db->update($table_name, $data, $condition);
        return $this->db->affected_rows();
    }

    /**
     * Delete data to table
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function delete($table_name, $condition = [])
    {
        $this->db->delete($table_name, $condition);
        return $this->db->affected_rows();
    }

    /**
     * Delete data to table
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function delete_by_merchant_id($table_name, $condition = [])
    {
        $condition['merchant_id'] = $this->merchant_id;
        $this->db->delete($table_name, $condition);
        return $this->db->affected_rows();
    }

    /**
     * Delete data to table
     *
     * @param  string $table_name 表名
     * @param  array $condition 获取条件
     * @return boolean
     */
    public function delete_by_sys_merchant_id($table_name, $condition = [])
    {
        if ($this->sys_merchant_id != 0) {
            $condition['merchant_id'] = $this->sys_merchant_id;
        };
        $this->db->delete($table_name, $condition);
        return $this->db->affected_rows();
    }

    /**
     * 获取表总数
     *
     * @param  string $table 表名
     * @return int
     */
    public function count_all($table)
    {
        return $this->db->count_all($table);
    }

    /**
     * 根据店铺获取表总数
     *
     * @param  string $table 表名
     * @return string
     */
    public function count_all_by_merchant_id($table)
    {
        $where_sql = "WHERE merchant_id = $this->merchant_id";
        $sql = "SELECT COUNT(*) as count FROM we_$table $where_sql";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * 根据店铺获取表总数
     *
     * @param  string $table 表名
     * @return string
     */
    public function count_all_by_sys_merchant_id($table)
    {
        $sql_where = '';
        if ($this->sys_merchant_id != 0) {
            $sql_where = "WHERE merchant_id = $this->sys_merchant_id";
        }
        $sql = "SELECT COUNT(*) as count FROM we_$table $sql_where";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * 获取总行数 带分页
     *
     * @param  string $table 表名
     * @param  array $condition 条件
     * @return string
     */
    public function count_where($table, $condition = [])
    {
        $sql_where = '';
        if (!empty($condition)) {
            $sql_where = 'WHERE ';
            foreach ($condition as $_key => $_value) {
                $sql_where .= $_key . '=' . $_value . ' AND ';
            }
            $sql_where = substr($sql_where, 0, strlen($sql_where) - 4);
        }
        $sql = "SELECT COUNT(*) as count FROM we_$table $sql_where";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * 获取总行数 带分页
     *
     * @param  string $table 表名
     * @param  array $condition 条件
     * @return string
     */
    public function count_where_by_merchant_id($table, $condition = [])
    {
        $condition['merchant_id'] = $this->merchant_id;
        $sql_where = '';
        if (!empty($condition)) {
            $sql_where = 'WHERE ';
            foreach ($condition as $_key => $_value) {
                $sql_where .= $_key . '=' . $_value . ' AND ';
            }
            $sql_where = substr($sql_where, 0, strlen($sql_where) - 4);
        }
        $sql = "SELECT COUNT(*) as count FROM we_$table $sql_where";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * 获取总行数 带分页 后台
     *
     * @param  string $table 表名
     * @param  array $condition 条件
     * @return string
     */
    public function count_where_by_sys_merchant_id($table, $condition = [])
    {
        if ($this->sys_merchant_id != 0) {
            $condition['merchant_id'] = $this->sys_merchant_id;
        }
        $sql_where = '';
        if (!empty($condition)) {
            $sql_where = 'WHERE ';
            foreach ($condition as $_key => $_value) {
                $sql_where .= $_key . '=' . $_value . ' AND ';
            }
            $sql_where = substr($sql_where, 0, strlen($sql_where) - 4);
        }
        $sql = "SELECT COUNT(*) as count FROM we_$table $sql_where";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * distinct
     *
     * @param  $table
     * @param  $distinct_field
     * @param  array $condition
     * @return int
     */
    public function count_distinct_where($table, $distinct_field, $condition = [])
    {
        $sql_where = '';
        if (!empty($condition)) {
            $sql_where = 'WHERE ';
            foreach ($condition as $_key => $_value) {
                $sql_where .= $_key . '=' . $_value . ' AND ';
            }
            $sql_where = substr($sql_where, 0, strlen($sql_where) - 4);
        }
        $sql = "SELECT COUNT(DISTINCT $distinct_field) as count FROM we_$table $sql_where";
        $result = $this->db->query($sql)->result();
        return $result[0]->count;
    }

    /**
     * 后台查找数据
     *
     * @param  string $sql_where SQL 语句
     * @param  string $return_type 返回类型
     * @return mixed
     */
    public function get_search_limit($sql_where, $return_type = 'object')
    {
        $query = $this->db->query($sql_where);
        return $return_type != 'object' ? $query->result_array() : $query->result();
    }

    /**
     * 后台条件查找记录总行数
     *
     * @param  string $sql_where SQL语句
     * @return int
     */
    public function count_search_condition($sql_where)
    {
        $result = $this->db->query($sql_where)->result();
        return $result[0]->count;
    }


    /**
     * get db
     *
     * @param string $table
     * @return string
     */
    public function get_dbprefix_table($table, $need_prefix = true)
    {
        if ($need_prefix) {
            return $this->db->dbprefix . $table;
        } else {
            return $table;
        }
    }

    /**
     *
     * @param string $sql
     * @param string $return_type
     * return exec result
     */
    public function exec_sql($sql, $return_type = 'Array')
    {
        $query = $this->db->query($sql);
        return $return_type == 'Array' ? $query->result_array() : $query->result();
    }

    /**
     *ge table data
     *
     * @param string $table
     * @param string $db_columns
     * @param string $where
     * @param string $order
     * @param string $limit
     * @return array
     */
    public function datatable_get_data($table, $db_columns, $where, $order, $limit)
    {
        //     	$table = $this->get_dbprefix_table($table,false);
        $sql = "SELECT " . $db_columns . " FROM `$table`  $where $order $limit";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    /**
     * Get record count
     * @param string $table
     * @param string $where_str
     * @return int
     */
    function get_data_cnt($table, $where_str = '', $primaryKey = '1')
    {
        $sql = "select count(" . $primaryKey . ") as cnt from " . $table . " " . $where_str;
        $query = $this->db->query($sql)->row_array();
        return $query['cnt'];
    }

    /**
     * 获取所有语言
     *
     * @return object
     */
    public function get_all_language()
    {
        $query = $this->db->get('language');
        return $query->result();
    }

    /**
     *
     * @param string $table
     * @param string $select
     * @param array $where
     * @param boolean $is_parse
     *
     * @return object
     */
    public function get_where_select($table, $select = '*', $where = array(), $is_parse = false)
    {
        $query = $this->db->select($select)->get_where($table, $where);
        $result = $query->result();
        // 解析json
        if ($is_parse) {
            foreach ($result as $_key => $data) {
                $data->value = get_json_value_by_language($data->value);
            }
        }
        return $result;
    }

    /**
     * 返回用户的权限和系统所有的权限
     *
     */
    public function get_permission_data($role_id = 0)
    {
        $return_arr = [];

        //role 的权限
        $this->db->select('permission_ids');
        $this->db->where('status', 1);
        $this->db->where('role_id', $role_id);
        $role_permission = $this->db->get('sys_role');
        $role_permission = $role_permission->result_array();

        //用户的权限
        $this->db->select('permission_id,permission_code,permission_type,parent_id,permission_value');
        if (count($role_permission) > 0) {
            $role_permission_arr = explode(',', $role_permission[0]['permission_ids']);
            $this->db->where('status', 1);
            $this->db->where_in('permission_id', $role_permission_arr);
            $query = $this->db->get('sys_permission');
            $user_permission = $query->result();
        } else {
            $user_permission = [];
        }

        $this->db->select('permission_id,permission_code,permission_type,parent_id,permission_value');
        $this->db->where('status', 1);
        $query = $this->db->get('sys_permission');
        $all_permission = $query->result();

        $return_arr['all_permission'] = $all_permission;
        $return_arr['user_permission'] = $user_permission;

        return $return_arr;
    }
}
