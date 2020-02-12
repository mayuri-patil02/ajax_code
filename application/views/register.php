<!DOCTYPE html>
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
  <?php 
    echo $this->session->userdata('id');
  ?>
	<title></title>
</head>
<body>
<form action="" method="post" id="myform" enctype="multipart/form-data">
			<table align="center" border="1" width="300" bgcolor="#5F9EA0" cellpadding="5" cellspacing="5">
					<tr>
						<td>Fisrt Name:</td>
						<td><input type="text" name="fname" id="fname">
						</td></tr>
						<tr><td>Last Name:</td>
						<td><input type="text" name="lname" id="lname">
						</td></tr>
						<tr><td>Mobile No:</td>
						<td><input type="number" id="mobile" name="mobile">
						</td></tr>
						<tr><td>Country</td>
						<!-- Country dropdown -->
						<td><select id="country" name="country">
   				 		<option value="">Select Country</option>
    					<?php
       						 foreach ($country as $row) {
								echo '<option value="'.$row->country_id.'">'
       						 	.$row->country_name.'</option>';
       						 }
        				?>
        			</select>
    				</tr>
    				<tr><td>State</td>
					</select><!-- State dropdown -->
					<td><select id="state" name="state">
    				<option value="">Select country first</option></td></tr>
    				</select>


					<!-- City dropdown -->
					<tr><td>City</td>
					<td><select id="city" name="city">
    				<option value="">Select state first</option></td></tr>
					</select>
					<tr><td colspan="2" align="center"><button type="button" id="btn">Submit
          </button></td></tr>
			</table>
			<div id="result"></div>
		</form>

</body>
</html>

<script>
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"reg_control/fetch_state",
    method:"POST",
    data:{country_id:country_id},
    success:function(data)
    {
     $('#state').html(data);
     $('#city').html('<option value="">Select City</option>');
    }
   });
  }
  else
  {
   $('#state').html('<option value="">Select State</option>');
   $('#city').html('<option value="">Select City</option>');
  }
 });

 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"reg_control/fetch_city",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#city').html(data);
    }
   });
  }
  else
  {
   $('#city').html('<option value="">Select City</option>');
  }
 });
 
});
    $("#btn").click(function() {
      
      $.ajax({
                url:"<?php echo base_url().'reg_control/create';?>",
                data: $("#myform").serialize(),
                type: "POST",
                success: function(response){
                  
                    $('#myform')[0].reset();
                    alert('Successfully inserted');
                                     
                   },
               error: function()
               {
                //alert("error");
              }
              });
          });
</script>