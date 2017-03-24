<html>
<?php
 $t_id=$_GET['id'];
 ?>
<frameset cols="75%,25%">
  <frame src="file_view.php?id=<?php echo $t_id;?>">
  <frame src="b.php?id=<?php echo $t_id;?>">
</frameset>

</html>