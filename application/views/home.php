<!DOCTYPE html>

<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body,h1,h2,h3,h4,h5,h6,.w3-wide {font-family: "Montserrat", sans-serif;}
</style>
<header class="w3-container w3-xlarge">
    <p class="w3-left">Products</p>
    
  </header>
<body>
<?php foreach($product_list as $products){?>
 <div class="w3-container" style="float:left">
        <div class="w3-display-container" >
          <img src="<?php echo base_url();?>/uploads/<?php echo $products["product_image"];?>" style="width:100%;height:100px">
          <span class="w3-tag w3-display-topleft"><?php echo $products["product_status"]; ?></span>
          <div class="w3-display-middle w3-display-hover">
          <button id="s-<?php echo  $products['product_id'];?>" class="activeclass w3-button w3-black" ><i class="fa fa-shopping-cart"></i> </a>
          </div>
        </div>
        <p><?php echo $products["product_name"]; ?><br><b class="w3-text-red"><?php echo $products["price"]; ?></b></p>
      </div>
    <?php }?>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


  <script>
$(document).ready(function(){ });
    $(".activeclass").click(function(){
    
    var staidstr   = $(this).attr('id');

    var staid      = staidstr.split("-");
    var staid      = staid[1];
    var staobj      = $(this).attr('class');
     if(staid>0){
    $.ajax({  
                    type: "POST",
                    url: "<?php echo base_url();?>products/addToCart",
                    data: {"id" : staid            
                          },
                           success: function(data) {
                           	window.location = "<?php echo base_url();?>cart";
                           }             
            });
            
        } 
    });

</script>

