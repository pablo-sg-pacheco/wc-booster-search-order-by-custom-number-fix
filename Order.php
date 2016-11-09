<?php

namespace WCSON;

class Order extends Design_Pattern\Autoload{

	public function search_by_custom_number($query){
		if(!is_admin()){
			return;
		}
		if(!isset($query->query)){
			return;
		}
		if(!isset($query->query['s'])){
			return;
		}
		if(is_numeric($query->query['s']) === false){
			return;
		}
		/*if(filter_var($query->query['s'], FILTER_VALIDATE_INT) === false){
			return;
		}*/
		$customSearchEnabled = filter_var(get_option('wcj_order_numbers_enabled'),FILTER_VALIDATE_BOOLEAN);
		if(!$customSearchEnabled || $customSearchEnabled==null){
			return;				
		}
		//$custom_order_id = intval($query->query['s']);
		$custom_order_id = $query->query['s'];
		$query->query_vars['post__in']=array();
		$query->query['s']='';
		$query->set('meta_key','_wcj_order_number');
		$query->set('meta_value',$custom_order_id);
	}
}
