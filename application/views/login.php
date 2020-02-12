
<html>
<head>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js">
	</script>
	
</head>
	<script>
		$(document).ready(function(){
		
		$("#btn").click(function() {
			
			$.ajax({
		            url:"<?php echo base_url().'user/create';?>",
		            data: $("#createForm").serialize(),
		            type: "POST",
		            success: function(response){
		              
		                $('#createForm')[0].reset();
		                alert('Successfully inserted');
		                //if(response.d==true) {
		                	window.location.href= "<?php echo base_url('reg_control'); ?>";
		                //}
		               
		               },
		           error: function()
		           {
		            //alert("error");
		       		}
		       		});
          });
		});
	</script>
<body>
    
    		<form id="createForm" name="logForm">
    			<table align="center" border="2"cellpadding="5" cellspacing="2">         	<tr><td>Username:</td>
    				<td><input type="text" name="username" id="username"></td></tr>
    				<tr><td>Password:</td>
                    <td><input type="password" name="password" id="password"></td></tr>
              		<tr><td colspan="2" align="center"><button type="button" name="login" id="btn" value="login" ><b><font size="4">Login</font></b></button>
              		</td></tr>
                    </form>
                </table>
</body>
</html>