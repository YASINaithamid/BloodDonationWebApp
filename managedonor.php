
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">

       body{ font: 20px sans-serif;
		background-color: #FFB6C1;
 }
      .wrapper{ width: 600px; padding: 20px;

	  }
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
  <div class="col-md-7">
        <img src="image/dam3.jpg" width="200px">
    </div>
  </div>
 
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
	if(isset($_POST['id'])) {
		foreach ($_POST['id'] as $id) {
			$stmt = $pdo->prepare('delete from donneurs where id = :id');
			$stmt->bindValue('id', $id);
			$stmt->execute();
		}
	}
}
$stmt = $pdo->prepare('select * from donneurs ');
$stmt->execute();
 
?>
<div class="wrapper">
        </br><h2>guerer les donneurs :</h2></br>
<form method="post" action="managedonor.php">
	
	<table cellpadding="2" cellspacing="2" border="1">
		<tr>
			<th><input type="checkbox" id="checkBoxAll" /></th>
			<th>id</th>
			<th>username</th>
			<th>password</th>
			<th>email</th>
			<th>created_at</th>
			<th>tel</th>
			<th>groupage</th>
			<th>rhesus</th>
			<th>kell</th>
			<th>phynotypage</th>
			<th>type_donneur</th>
		</tr>
		<?php while($evenement = $stmt->fetch(PDO::FETCH_OBJ)) { ?>
		<tr>
			<td><input type="checkbox" class="chkCheckBoxId"
				value="<?php echo $evenement->id; ?>" name="id[]" /></td>
			<td><?php echo $evenement->id; ?></td>
			<td><?php echo $evenement->username; ?></td>
			<td><?php echo $evenement->password; ?></td>
			<td><?php echo $evenement->email; ?></td>
			<td><?php echo $evenement->created_at; ?></td>
			<td><?php echo $evenement->tel; ?></td>
			<td><?php echo $evenement->groupage; ?></td>
			<td><?php echo $evenement->rhesus; ?></td>
			<td><?php echo $evenement->kell; ?></td>
			<td><?php echo $evenement->phynotypage; ?></td>
			<td><?php echo $evenement->type_donneur; ?></td>
			
			
		</tr>
		<?php } ?>
	</table></br>
	<input type="submit" class="btn btn-primary" name="buttonDelete" value="supprimer" onclick="return confirm('Are you sure?')" />
	
</form>
</div>

</body>
</html>