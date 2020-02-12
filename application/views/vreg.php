<html>
<head>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 </head>
<body  font-color="black">
<table border='1'cellpadding='5' cellspacing='5' align='center'>
<tr>
<form method="post" action="" name="registartion-form" enctype="multipart/form_data">
<tr>
<center><tr>
   <td align='center' colspan="2"><font size="10" ><b>Registration Form</b></font></td>
</tr></center>
</tr>
      <tr>
        <td align='center'><b><font size="5">First Name:</font></b></td>
    <td><input type="text" name="fname" required placeholder="enter first name" /></td>
    </tr>
    <tr> 
         <td align='center'><b><font size="5">Last Name:</font></b></td>
    <td><input type="text" name="lname" required placeholder="enter last name" /></td>
  </tr>
    <tr>
      <td align='center'><b><font size="5">Mobile No.:</font></b></td>
    <td><input type="text" name="mno"  pattern="[0-9]*" required placeholder="enter mobile no" /></td>
    </tr>
    <tr>
   
<td align='center'><b><font size="5">Country:</font></b></td>
    <td><select name="country" id="country" class="form-control input-lg">
    <option value="">Select Country</option>
    <?php
    foreach($country as $row)
    {
     echo '<option value="'.$row->country_id.'">'.$row->country_name.'</option>';
    }
    ?>
   </select></td></tr>
  </div>
  <br />
  <div class="form-group">
   <tr>
<td align='center'><b><font size="5">State:</font></b></td>
    <td><select name="state" id="state" class="form-control input-lg">
    <option value="">Select State</option>
   </select></td></tr>
  </div>
  <br />
  <div class="form-group">
   <tr>
    <td align='center'><b><font size="5">City:</font></b></td>
    <td><select name="city" id="city" class="form-control input-lg">
    <option value="">Select City</option>
   </select></td></tr>
   <tr>
  <center>
  <th colspan="2" align='center'><button type="submit" name="Register" value="Register" ><b><font size="5">Register</font></b></button></th>
  </center></tr>
</body>
</html>



<script>
$(document).ready(function(){
 $('#country').change(function(){
  var country_id = $('#country').val();
  if(country_id != '')
  {
   $.ajax({
    url:"creg/fetch_state",
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
    url:"creg/fetch_city",
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
</script>