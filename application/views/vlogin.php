<html>
<head>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.1/dist/jquery.validate.js"></script>

</head>
<body bgcolor="silver">
         <form action="" method="post">
            <h1 align="center"> Login Form</h1>
                <table align="center" border="2" height="150" bgcolor="powderblue" cellspacing="5" cellpadding="5">
                    <tr><th><label for="username">Username</label></th>
                     <td><input type="text"  name="uname" required></td><br/><br/>
                    <tr><th><label for="password">Password</label></th>
                     <td><input type="password" name="pass" required></td><br/><br/>
                 <tr><td colspan="2" align="center"><input type="submit" name="login" value="Login"></td></tr>
            </table>
             </form>
</body>
</html>
<?php
?>