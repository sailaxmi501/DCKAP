<?php

 class  DefaultModel extends MY_Model{
  
   function __construct()
    {
        // Call the Model constructor
        parent::__construct();
        $this->load->database();
    }



  public function getAllCartList(){
  	
  	$this->db->select('A.*,B.*');
  	$this->db->from('dc_products as A');
  $this->db->join('dc_cart as B', 'B.product_id = A.product_id');
  
  $query=$this->db->get();
    return $query->result_array();
  	//print_r($result->result());exit;
  	
  }
}
?>