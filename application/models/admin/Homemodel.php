<?php
class Homemodel extends MY_Model {

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
	//Forgot Password starts
	 public function ForgotPassword($email)
 {
        $this->db->select('admin_email');
        $this->db->from('gc_admin'); 
        $this->db->where('admin_email', $email); 
        $query=$this->db->get();
        
        return $query->row_array();
 }
	
	
	
 
 public function sendpassword($data)
{
        $email = $data['admin_email'];
        $query1=$this->db->query("SELECT *  from gc_admin where admin_email = '".$email."' ");
        $row=$query1->result_array();
        if ($query1->num_rows()>0)
      
{
        $passwordplain = "";
        $passwordplain  = rand(999999999,getrandmax());
        $newpass['admin_password'] = md5($passwordplain);
		//echo $newpass['admin_password'];exit;
        $this->db->where('admin_email', $email);
        $this->db->update('gc_admin', $newpass); 
        $mail_message='<div>Dear '.$row[0]['admin_name'].','. "</div>";
        $mail_message.='<div style="padding-top:15px;">Thanks for contacting regarding to forgot password,<br> Your <b>Password</b> is <b>'.$passwordplain.'</b>'."</div>";
        $mail_message.='<div style="padding-top:5px;">Please Update your password. </div>';
        $mail_message.='<div style="padding-top:15px;">Thanks & Regards </div>';
        $mail_message.='<div style="padding-top:5px;">Your company name </div>'; 
		       
		$this->load->library('email'); 
		
         $this->email->from('gc@gmail.com'); 
         $this->email->to($email);
         $this->email->subject('Forgot Password'); 
         $this->email->message($mail_message);
		
		// $this->load->library('amazon_ses');				
		// $this->amazon_ses->from(FROMEMAIL);
		// $this->amazon_ses->to($email);
		// $this->amazon_ses->subject('Admin Forgot Password');
		// $this->amazon_ses->message($mail_message);
		
				
if (!$this->email->send()) {
	 //echo "gfdjh";
      //  exit;
     $this->session->set_flashdata('msg','Failed to send admin password, please try again!');
} else {
   $this->session->set_flashdata('msg','Admin Password sent to your email!');
}
  redirect('admin/login','refresh');        
}
else
{  
 $this->session->set_flashdata('msg','Email not found try again!');
 redirect('admin/home/forgot','refresh');
}
}
//forgot password ends

}

?>