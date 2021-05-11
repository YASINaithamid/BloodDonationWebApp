


<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">

       body{ font: 20px sans-serif; }
      .wrapper{ width: 600px; padding: 20px; }
	  .box {
        width: 2002px;
        height: 30px;
        border: 1px solid #999;
        font-size: 18px;
        color: #1c87c9;
        background-color: #eee;
        border-radius: 5px;
        box-shadow: 4px 4px #ccc;
      }

    </style>
</head>
<body>
 <?php  include "menu.php"; ?>
  <<div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
  <img src="image/dam5.jpg" style="float: right" />
<script type="text/javascript" src="js/jquery-1.6.2.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#checkBoxAll').click(function() {
			if ($(this).is(":checked"))
				$('.chkCheckBoxId').prop('checked', true);
			else
				$('.chkCheckBoxId').prop('checked', false);
		});
	});
</script>
<?php
 require 'config.php' ;
if(isset($_POST['buttonDelete'])) {
	if(isset($_POST['id_o'])) {
		foreach ($_POST['id_o'] as $id_o) {
			$stmt = $pdo->prepare('delete from organisateur where id_o = :id_o');
			$stmt->bindValue('id_o', $id_o);
			$stmt->execute();
		}
	}
}
$stmt = $pdo->prepare('select * from organisateur');
$stmt->execute();
 
?>
<div class="wrapper">
        </br><h2>Supprimer un organisateur :</h2></br>
<form method="post" action="delete2.php">
	
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			<th><input type="checkbox" id="checkBoxAll" /></th>
			<th>id_o</th>
			
			<th>organisateur</th>
			<th>type d'organisateur</th>
			<th>addersse</th>
		</tr>
		<?php while($evenement = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
		<tr>
			<td><input type="checkbox" class="chkCheckBoxId"
				value="<?php echo $evenement->id_o; ?>" name="id_o[]" /></td>
			<td><?php echo $evenement->id_o; ?></td>
			<td><?php echo $evenement->organisateur; ?></td>
			<td><?php echo $evenement->type; ?></td>
			<td><?php echo $evenement->address; ?></td>
		</tr>
		<?php } ?>
	</table></br>
	<input type="submit" class="btn btn-primary" name="buttonDelete" value="supprimer" onclick="return confirm('Are you sure?')" />
	
</form>
</div>

</body>
</html>