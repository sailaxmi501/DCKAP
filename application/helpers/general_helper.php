<?php
if(!defined('BASEPATH')) exit('No direct script access allowed');
 

 
 
 
 function getCount(){
 	
$ci = get_instance();
$ci->load->model('defaultmodel');
$count=$ci->defaultmodel->getCount('dc_cart');
//echo $count;
return $count;
 }
 

  
 
 
 
 
 ?>
	