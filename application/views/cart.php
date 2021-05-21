<?php  $cart_details=$this->session->userdata('cartdetails');?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
	<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>

	<title>Cart</title>
</head>
<body>
	<h1>Cart List</h1>
<div class="container">
	 <table id="myTable" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Product Id</th>
                  <th>Product Name</th>
                  <th>Product Price</th>
                  <th>Quantity</th>
                  <th>Action</th>
                
                </tr>
                </thead>
                <tbody>
                <?php $grand_total=0; $i=0; if(!empty($cart_details)) {
                foreach ($cart_details as $row) {$i++;  ?>
                	<?php $grand_total+= $row['price']*$row['qty'];   ?> 
                <tr>
                  <td><?php echo $row['product_id']?></td>
                  <td><?php echo $row['product_name']?></td>
                  <td><?php echo $row['price']*$row['qty']?></td>
                  <td><?php echo $row['qty']?></td>
                  <td>  
                  <a onclick = "return confirm('are you sure want to delete this item?');" href="<?php echo site_url('cart/cartDelete/'.base64_encode($row['cart_id']));?>"><button class="btn btn-xs btn-danger"><i class="fa fa-exclamation-circle"></i> Delete</button></a></td>
                </tr> 

                   <?php }
                    } else {echo '<tr class="gradeX"><td colspan="5" align="center">No category Records found</td></tr>'; }
                   ?>         
                </tbody>
               
                </table>
                <h2>Grand Total:<?php echo $grand_total;?></h2>   
                <button><a href="<?php echo base_url();?>">Back To Home</a></button> 
                <a href="<?php echo base_url();?>checkout"><input type="button" class="btn btn-success" style="float: right;" value="Checkout"></a>

</div>
</body>
</html>

<script>
  $(document).ready( function () {
    $('#myTable').DataTable();
} );
</script>
