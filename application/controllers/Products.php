<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {


	public function __construct() {

		parent::__construct();
		$this->load->helper('general');
		$this->load->model(array('defaultmodel'));
		
	}	
	 public function index()
	 {
		$products['title'] ="Products list";
		$products['product_list']= $this->defaultmodel->getAllResult(PRODUCTS);
		$this->load->view('home',$products);
	
    }
		public function addToCart()
		{
	      if(isset($_POST['id'])) {
		      $id=$_POST['id'];
		      $condition=array(
		      'product_id'=>$id,
		      );
	       $product['product_detail']=$this->defaultmodel->getSingleResult(PRODUCTS,$condition);
	       $products=$this->defaultmodel->getAllResult(CART,$condition);
		   $created_date =date('Y-m-d H:i:s');
			if(count($products)>0){
				
				$qty=$products[0]['qty']+1;
				$update_data=array(
				'qty'=>$qty
				);
		    $this->defaultmodel->simpleUpdate(CART,$update_data,$condition);
		    } else {
				$postdata=array(
					    'product_id' => $id,
					    'qty'=>1,
						'created_date'=>$created_date
					);
					
				$upd_status=$this->defaultmodel->simpleInsert(CART,$postdata);
				$this->session->set_userdata('cartdetails',$postdata);	
	        }
        }
    }
       

}
