<?php
class MY_Model extends CI_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
public function getSingleResult($table='',$condition=array(),$selectedFields=array()) {	

	if($table!=''){
		if(!empty($selectedFields)){
			$fields=implode(",",$selectedFields);
			$this->db->select($fields);
		}else{
		$this->db->select('*');	
		}
		$this->db->from($table);
		if(!empty($condition)){
		$this->db->where($condition);	
		}
		$qry=$this->db->get();
		return $qry->row_array();
	}else{
		return '';
	}
}

public function getAllResult($table='',$condition=array(),$selectedFields=array(),$limit='',$offset=0,$like=array(),$sort=array(),$groupby='') {	
	if($table!=''){
		if(!empty($selectedFields)){
			$fields=implode(",",$selectedFields);
			$this->db->select($fields);
		}else{
		$this->db->select('*');	
		}
		$this->db->from($table);
		if(!empty($condition)){
		$this->db->where($condition);	
		}
		if(!empty($like)){
		$this->db->like($like);	
		}
		if(!empty($sort)){
			$order=implode(" ",$sort);
		$this->db->order_by($order);	
		}
		if(!empty($groupby)){
		$this->db->group_by($groupby);	
		}
		if($limit!='' && $limit!=0){
		$this->db->limit($limit,$offset);
		}
		$qry=$this->db->get();
		return $qry->result_array();
	}else{
		return '';
	}
}

public function getAllResults($table='',$condition=array(),$selectedFields=array(),$limit='',$offset=0,$like=array(),$sort=array(),$groupby='') {	
	if($table!=''){
		if(!empty($selectedFields)){
			$fields=implode(",",$selectedFields);
			$this->db->select($fields);
		}else{
		$this->db->select('ap_offercodes.*,ap_products.product_name');	
		}
		$this->db->from($table);
		$this->db->join(PRODUCTS, 'ap_products.product_id = ap_offercodes.product','left');
		if(!empty($condition)){
		$this->db->where($condition);	
		}
		if(!empty($like)){
		$this->db->like($like);	
		}
		if(!empty($sort)){
			$order=implode(" ",$sort);
		$this->db->order_by($order);	
		}
		if(!empty($groupby)){
		$this->db->group_by($groupby);	
		}
		if($limit!='' && $limit!=0){
		$this->db->limit($limit,$offset);
		}
		$qry=$this->db->get();
		return $qry->result_array();
	}else{
		return '';
	}
}

public function getCount($table='',$condition=array(),$like=array(),$groupby='') {	
	if($table!=''){
		$this->db->from($table);
		if(!empty($condition)){
		$this->db->where($condition);	
		}
		if(!empty($like)){
		$this->db->like($like);	
		}
		if(!empty($groupby)){
		$this->db->group_by($groupby);	
		}
		$qry=$this->db->count_all_results();
		return $qry;
	}else{
		return 0;
	}
}

public function simpleInsert($table='',$insertData=array()) {	
	if($table!=''){
		$this->db->insert($table,$insertData);
		$insert_id=$this->db->insert_id();
		return $insert_id;
	}else{
		return 0;
	}
}

public function bulkInsert($table='',$insertData=array()) {	
	if($table!=''){
		$this->db->insert_batch($table,$insertData);
		return 1;
	}else{
		return 0;
	}
}

public function bulkUpdate($table='',$insertData=array(),$keyid) {	
	if($table!='' && !empty($insertData)){
		$this->db->update_batch($table,$insertData,$keyid);
		return 1;
	}else{
		return 0;
	}
}

public function simpleUpdate($table='',$updateData=array(),$condition=array()) {	
	if($table!=''){
		$this->db->where($condition);
		$this->db->update($table,$updateData);
		return 1;
	}else{
		return 0;
	}
}

public function simpleDelete($table='',$condition=array()) {	
	if($table!=''){
		$this->db->where($condition);
		$this->db->delete($table);
		return $this->db->affected_rows();
	}else{
		return 0;
	}
}

public function download_to_excel()
	{
		$this->db->select('product_name,qty');
		$query = $this->db->get('fp_orders');
		return $query->result();
	}

}

?>