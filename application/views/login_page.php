<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="<?php echo base_url(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
   
                    <h3> Login</h3>
                    <form id="logText" name="logForm">
                                <input class="form-control" placeholder="Username" type="text" name="username"></br>
                                <input class="form-control" placeholder="Password" type="password" name="password"></br>
                            <button type="submit" value="Login" name="logText"></button>
                        </form>
               
<script type="text/javascript">
    $(document).ready(function(){
        $('#logText').html('Login');
        $('#logForm').submit(function(e){
            e.preventDefault();
            $('#logText').html('Checking...');
            var url = '<?php echo base_url(); ?>';
            var user = $('#logForm').serialize();
            var login = function(){
                $.ajax({
                    type: 'POST',
                    url: url + 'user',
                    dataType: 'json',
                    data: user,
                    success:function(response){
                        $('#message').html(response.message);
                        $('#logText').html('Login');
                        if(response.error){
                            $('#responseDiv').removeClass('alert-success').addClass('alert-danger').show();
                        }
                        else{
                            $('#responseDiv').removeClass('alert-danger').addClass('alert-success').show();
                            $('#logForm')[0].reset();
                            setTimeout(function(){
                                location.reload();
                            }, 3000);
                        }
                    }
                });
            };
            setTimeout(login, 3000);
        });
 
        $(document).on('click', '#clearMsg', function(){
            $('#responseDiv').hide();
        });
    });
</script>
</body>
</html>