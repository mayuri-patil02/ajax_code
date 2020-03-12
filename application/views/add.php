<!DOCTYPE html>
<html>
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  </head>
  <style type="text/css">
body {
    font-family: Georgia, Times, serif;
    color:black;
    background-color: #c5d5c5
}
h1 {
    font-family: Helvetica, Arial
}
</style>
<body>
  <center> 
     <form method="post" action="" id="createForm">
          <h1>Add Blog</h1>
          <table width="500" border="2" cellspacing="5" cellpadding="5"  bgcolor="#a2b9bc">
        <tr>
            <td ><b><font size="5">Blog  title</font></b> </td>
            <td><input type="text" id="createForm" name="blog"/></td>
        </tr>
        <tr>
            <td ><b><font size="5"> Blog Description</font></b> </td>
            <td><textarea name="dblog"/></textarea></td>
        </tr>
        <tr>
          <td><b><font size="5">Category</</font></b></td>
        <td><select name="cat" class="form-control">
         <option >select</option>
          <?php
          foreach($categories as $row)
          {
          echo '<option value="'.$row['cid'].'">'.$row['cat_name'].'</option>';
         }
    ?>  
</select>
         </td></tr>
        <tr>
          <td><b><font size="5">Tag</</font></b></td>
        <td><select name="tag" class="form-control">
         <option >select</option>
          <?php
          foreach($tags as $row)
          {
          echo '<option value="'.$row['tag_id'].'">'.$row['tag_name'].'</option>';
         }
    ?>  
    </select>
         </td></tr>
        <tr>
          <td><b><font size="5">Author</</font></b></td>
        <td><select name="author" class="form-control">
         <option >select</option>
          <?php
          foreach($authors as $row)
          {
          echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
         }
    ?>  
</select>
         </td></tr>

        <tr>
            <td colspan="2" align="center">
             <input type="submit" name="save" id="btn" value="Add"/></a></td>
        </tr>
       
        </table>
     </form>
  </center> 
</body>
<script>
    $(document).ready(function(){
    
    $("#btn").click(function() {
      
      $.ajax({
                url:"<?php echo base_url().'Blog_controller/savedata';?>",
                data: $("#createForm").serialize(),
                type: "post",
                success: function(response){
                  
                    $('#createForm')[0].reset();
                    alert('Successfully Added a Blog...');
                    },
               error: function()
               {
                //alert("error");
              }
              });
          });
    });
  </script>
</html>