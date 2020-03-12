<html>
<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<style type="text/css">
body {
    font-family: Georgia, Times, serif;
    color: black;
    background-color: #77a8a8
}
h1 {
    font-family: Helvetica, Arial
}
</style>
<body>
  <?php
  $i=1;
  foreach ($data as $row) {
  ?>
  
<center>
  <form  method="post" action="" id="Form">
    <h1>Update Blog</h1>
    <table width="500" border="4" cellspacing="5" cellpadding="5"  bgcolor="#f0efef">
      <tr>
        <td colspan="2"><b><font size="5">ID: <?php echo $row->sr_no; ?></font></b></td>
        
      <tr>
        <td><b><font size="5">Blog  Title</font></b></td>
        <td><input type="text" name="blog" value="<?php echo $row->blog_title; ?>"/></td>
      </tr>
      <tr>
        <td><b><font size="5">Blog  Description</font></b></td>
        <td><textarea  name="dblog"></textarea></td>
      </tr>
       <tr>
          <td><b><font size="5">Category</</font></b></td>
        <td><select name="cat"class="form-control">
         <option value="">select</option>
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
         <option value="">select</option>
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
        <td><select name="author"class="form-control">
         <option value="">select</option>
          <?php
          foreach($authors as $row)
          {
          echo '<option value="'.$row['author_id'].'">'.$row['author_name'].'</option>';
         }
    ?>  
</select>
         </td></tr>

      <tr>
            <a href="Blog_controller/dispdata"><td colspan="2" align="center">
            <input type="submit" name="update" id="btn" value="Update Blog"/></a></td>
        </tr>
        <tr>
            <a href="Blog_controller/dispdata"><td colspan="2" align="center">
            <input type="submit" name="update" id="btn" value="Close"/></a></td>
        </tr>
    </table>
  </form>
<?php } ?>
</center>
</body>
<script type="text/javascript">
  $(document).ready(function(){
    $("#btn").click(function() {
      $.ajax({
                url:"<?php echo base_url().'Blog_controller/updatedata';?>",
                data: $("#Form").serialize(),
                type: "post",
                success: function(response){
                  
                    $('#Form')[0].reset();
                    alert('Successfully Updated a Blog...');
                    },
               error: function()
               {
                //alert("error");
              }
              });
          });
  })
</script>
</html>