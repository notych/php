<?php
    include 'config.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>file meneger</title>
</head>
<body>
   <form enctype="multipart/form-data" action="" method="POST">
       <input type="hidden" name="MAX_FILE_SIZE" value="<?=MAXSIZE?>" />
       Send file <input name="inputfile" type="file" />
       <input type="submit" value="Send file" />
   </form>  
   <?php
      echo $rez;
   ?>
   <table border='1'>
   <tr>
    <th>N</th> <th>File name</th> <th>Size</th> <th>Delete</th>  </tr>
   <?php
    if(isset($tab_file)){
         foreach ( $tab_file as $key => $value ) {
			?>
	        <tr>
		    <td><?=$key+1?></td>
			<td><?=$value["name"]?></td> 
			<td><?=$value["size"]?></td>
			<td> <a href='?filedel=<?=$value["name"]?>' > Del </a> </td>
			 </tr>
   <?php
     }    
   }
   ?>
   
   </table>
  
 </body>
</html>
