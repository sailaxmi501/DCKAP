			<?php 
			defined('BASEPATH') OR exit('No direct script access allowed');
			class Cart extends CI_Controller {
				public function __construct() 
				{

					parent::__construct();
					$this->load->model(array('defaultmodel'));  
				}
				public function index()
				{	
					
					$data['cart_list']=$this->defaultmodel->getAllCartList();
					$cart_details=$this->session->set_userdata('cartdetails',$data['cart_list']);
					$this->load->view('cart',$data);
				}

				public function cartDelete()
				{    
					$cart_id=base64_decode($this->uri->segment(3));
					$condition=array('cart_id'=>$cart_id);
					$result=$this->defaultmodel->simpleDelete(CART,$condition);
					if($result >0) {
						$this->session->set_flashdata('msg', 'Item Deleted Successfully');
						redirect('cart');  
					} else {
						$this->session->set_flashdata('msg', 'Item Delete Failed');
						redirect('cart');
					}
				}

				public function checkout()
				{
					$cart_details=$this->session->userdata('cartdetails');
					$check['title'] = "checkout";
					$this->form_validation->set_rules('name', 'Name', 'required');
					$this->form_validation->set_rules('email', 'Email', 'required');
					$this->form_validation->set_rules('address', 'Address', 'required');
					$this->form_validation->set_rules('phone', 'Phone', 'required');

					$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
					if ($this->form_validation->run() == FALSE)
					{
						$this->load->view('checkout',$check);
					}else{
						$created_date =date('Y-m-d H:i:s');
						$postdata=array(
							'name' => $this->input->post('name'),
							'email'=> $this->input->post('email'),
							'phone'=> $this->input->post('phone'),
							'address'=>$this->input->post('address'),
							'created_date'=>$created_date
						);
						$upd_status=$this->defaultmodel->simpleInsert(ADDRESSES,$postdata);
						
						if($upd_status >0) {
							$product_id=array();
							foreach ($cart_details as $key) {
								$product_id[]=$key['product_id'];

							}
							$pro_id=implode(",", $product_id);
							$orderdata=array(
								'address_id'=>$upd_status,
								'order_date'=>$created_date,
								'product_id'=>$pro_id	
							);
							$orders=$this->defaultmodel->simpleInsert(ORDERS,$orderdata);
							if($orders>0){
								$this->session->unset_userdata('cartdetails');	
								$this->db->truncate(CART);
								$this->session->set_flashdata('msg', 'Order Submitted Successfully');
								redirect('orderSuccess');  
							}
						}else {
							$this->session->set_flashdata('msg', 'Order Submitted Failed');
							redirect('checkout');
						}
					}
				}
				public function orderSuccess()
				{
					
					$this->load->view('success');
				} 
			}