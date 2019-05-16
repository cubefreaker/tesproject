<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * @package Global_model
 * @license http://it-underground.web.id/licenses/MIT  MIT License
 * @author [didi triawan] <[<diditriawan13@gmail.com>]>
 * @link https://it-underground.web.id
 * @since [< version 2.1 > april-2019] [<lts version>]
 */
class Global_model extends CI_Model {

	protected $_table 		= "";
	protected $_tbl_alias 	= "";
	protected $_pk_field  	= "";
	var $instance;
	public function __construct()
	{
		parent::__construct();
	}

	/**
    * set static variable 
    * @return variable static in function 
    */
    public static function & get_instance() 
    {
        if( is_null(self::$instance)) {
            self::$instance = new self();
        }
        
        return self::$instance;
    }

	/**
	 * function set model with a param set_model('','','')
	 * set all table 
	 * @author : didi
	 * @link(it-underground.web.id)
	 * @return all method type
	 * @since  [< version 2.1 > april-2019] [<Lts version>]
	 */	
	public function set_model($table = null, $alias = null, $id = null)
	{
		$this->_table 		= $table;
		$this->_tbl_alias 	= $alias;
		$this->_pk_field  	= $id;

		return $this;
	}

	/**
	 * function mode = select, insert, update, delete
	 * one function for all methode 
	 * @author : didi
	 * @link(it-underground.web.id), diditriawan13@gmail.com
	 * @return all method type
	 * @since  [< version 2.1 > april-2019] [<Lts version>]
	 * one model for all actions
	 */
	public function mode($params = array())
	{
		//inisiasi
		$this->_result = array();
		/**
	     * type all_data.
	     * @param index['type'] = (all_data)
	     *        index['select'] = default (*)
	     *        index['joined'] = default null, array joined'
	     *        index['left_joiend'] = default null, array left_joined
	     *        index['conditions'] = default null, array where conditions
	     *        index['return_object'] = default return  result_array 
	     *        						- if return object != '' => std class object
	     *        index['debug_query'] = default null => query debug
	     */
		if( isset($params['type']) && $params['type'] == "all_data" ) {
			
			if(isset($params['select'])) {
				$this->_select = $params['select'];
			} else {
				$this->_select = "*";
			}

			$this->db->select($this->_select);
			if( isset($params['from']) && $params['from'] != "" ) {
				$this->db->from($params['from']);
			} else{
				$this->db->from($this->_table." ".$this->_tbl_alias);
			}

			if( isset($params['joined']) && ($params['joined']) != null )
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}

			if( isset($params['left_joined']) && ($params['left_joined']) != null )
			{
				foreach($params['left_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."left");
				}
			}

			if( isset($params['right_joinend']) && ($params['right_joinend']) != null )
			{
				foreach($params['right_joinend'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."right");
				}
			}

			if( isset($params['inner_joined']) && ($params['inner_joined']) != null )
			{
				foreach($params['inner_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."inner");
				}
			}

			if( isset($params['conditions']) && $params['conditions'] != "" ){
				$this->db->where($params['conditions']);
			}	

			if(isset($params['filter']) && $params['filter'] != ""  )
			{
				if (is_array($params['filter']) && count($params['filter']) > 0) {
		            
		            $this->db->group_start();
		            $keys = array_keys($params['filter']);
		            for ($i = 0; $i < count($keys); $i++) {
		                $column = $keys[$i];
		                $value = $params['filter'][$keys[$i]];
		                $this->db->like($column, $value);
		            }
		            $this->db->group_end();
		        }
			}

			if( isset($params['group_by']) && $params['group_by'] != "" ) 
			{
				$this->db->group_by($params['group_by']);
			}

			if( isset($params['order_by']) && is_array($params['order_by']) ) 
			{
				foreach($params['order_by'] as $val) {
					$this->db->order_by($val, 'desc');
				}
			} else {
				$this->db->order_by($this->_tbl_alias.".".$this->_pk_field." desc");
			}

			if( isset($params['limit']) && isset($params['start']) ) {
				$this->db->limit($params['limit'], $params['start']);
			}

			if( isset($params['return_object']) && $params['return_object'] != "" ) 
			{
				$this->_result = $this->db->get()->result();
			} else {
				$this->_result = $this->db->get()->result_array();
			}

			//debug query
			if( isset($params['debug_query']) && $params['debug_query'] == true) {
				print_query($this->db);exit;
			}
		/**
	     * type single row.
	     * @param index['type'] = (singel_row)
	     *        index['select'] = default (*)
	     *        index['joined'] = default null, array joined'
	     *        index['left_joiend'] = default null, array left_joined
	     *        index['conditions'] = default null, array where conditions
	     *        index['return_object'] = default return  result_array 
	     *        						- if return object != '' => std class object
	     *        index['debug_query'] = default null => query debug
	     */
		} else if(isset($params['type']) && $params['type'] == "single_row") {
			if(isset($params['select'])) {
				$this->_select = $params['select'];
			} else {
				$this->_select = "*";
			}

			$this->db->select($this->_select);
			$this->db->from($this->_table." ".$this->_tbl_alias);
			if( isset($params['joined']) && ($params['joined']) != null)
			{
				foreach($params['joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)]);
				}
			}

			if( isset($params['left_joined']) && ($params['left_joined']) != null)
			{
				foreach($params['left_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."left");
				}
			}

			if( isset($params['right_joinend']) && ($params['right_joinend']) != null)
			{
				foreach($params['right_joinend'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."right");
				}
			}

			if( isset($params['inner_joined']) && ($params['inner_joined']) != null)
			{
				foreach($params['inner_joined'] as $key => $val )
				{	
					$this->db->join($key, key($val)." = ".$val[key($val)] ."inner");
				}
			}

			if( isset($params['conditions']) && $params['conditions'] != null ){
				$this->db->where($params['conditions']);
			}

			// if( isset($params['debug_query']) && $params['debug_query'] == true) {
			// 	print_query($this->db);exit;
			// }
			if( isset($params['return_object']) && $params['return_object'] == TRUE ) 
			{
				return $this->_result = $this->db->get()->row();
			} else {
				return $this->_result = $this->db->get()->row_array();
			}


		/**
	     * type insert.
	     * @param index['type'] = (insert)
	     *        index['datas'] = array
	     *        ['is_batch'] = true; default false;
	     *        $this->db->insert_batch() 
	     */
		} else if( isset($params['type']) && $params['type'] == "insert") {

			$this->_is_batch = isset($params['is_batch']) ? $params['is_batch'] : false;

	        if (!$this->_is_batch) {

        		$this->db->insert($this->_table, $params['datas']);
				$this->_result =  $this->db->insert_id();

	        } else {
	            //insert batch.
	            $this->_result = $this->db->insert_batch($this->_table, $param['datas']);
	            return $this->_result;
	        }
		/**
	     * type insert no date.
	     * @param index['type'] = (insert_no_date) 
	     *  which is no date
	     */
		} else if( isset($params['type']) && $params['type'] == "insert_no_date") { 

			$this->db->insert($this->_table, $params['datas']);
			$this->_result =  $this->db->insert_id();
		/**
	     * type update.
	     * @param index['type']  = (update) 
	     *        index['datas'] = array()
	     */
		} else if( isset($params['type']) && $params['type'] == "update") {

			$this->_result = $this->db->update($this->_table, $params['datas'], $params['conditions']);
		} else {

			$this->_conditions   = isset($params['conditions']) ? $params['conditions'] : "";
			$this->_is_permanent = isset($params['is_permanent']) ? $params['is_permanent'] : false;
			$this->_data 		 = isset($params['datas']) ? $params['datas'] : "";

			if( !$this->_is_permanent ) 
			{
				$this->_result = $this->db->delete($this->_table, $this->_conditions);
			} else {
				$this->_result = $this->db->update($this->_table, $this->_data, $this->_conditions);
			}
		}

		return $this->_result;
	}	
}

/* End of file GLobal_model.php */
/* Location: ./application/models/GLobal_model.php */