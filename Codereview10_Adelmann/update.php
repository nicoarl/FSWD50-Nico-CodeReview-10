<!DOCTYPE HTML>
<html>
<head>
	<title>EDIT / DELETE</title>
</head>
<body>
	<?php 
	include "includes/update_delete.inc.php";	
	include_once "navbar.php";
	include_once "includes/dbh.inc.php";
	?>
	<?php 
	if (isset($_GET['edit'])) {
		$id = $_GET['edit'];
		$update = true;
		$record = mysqli_query($conn, "SELECT * FROM media WHERE media_id=$id");

		if (@count($record) == 1 ) {
			$n = mysqli_fetch_array($record);
			$name = $n['media_title'];
			$image = $n['media_image'];
			$isbn = $n['media_ISBN'];
			$description = $n['media_short_description'];
			$date = $n['publish_date'];
			$type = $n['type'];
		}
	}
?>
	<?php $results = mysqli_query($conn, "SELECT * FROM media"); ?>
	
<table class="table bordered">
	<thead>
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>ISBN</th>
			<th>Description</th>
			<th>Date</th>
			<th>type</th>
		</tr>
	</thead>
	
	<?php while ($row = mysqli_fetch_array($results)) { ?>
		<tr>
			<td><?php echo $row['media_title']; ?></td>
			<td><?php echo $row['media_image']; ?></td>
			<td><?php echo $row['media_ISBN']; ?></td>
			<td><?php echo $row['media_short_description']; ?></td>
			<td><?php echo $row['publish_date']; ?></td>
			<td><?php echo $row['type']; ?></td>
			<?php if (isset($_SESSION['userId']))
			{
			echo '<td>
				<a href="update.php?edit='. $row['media_id']. '" class="btn btn-info" >Edit</a>
			</td>
			<td>
				<a href="update.php?del='.$row['media_id'].'" class="btn btn-danger">Delete</a>
			</td>';
			}
			?>
			</tr>
	<?php } ?>
</table>


<div class="inputform">
	<form method="post" action="includes/update_delete.inc.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group form-group">
			<label class="col">Name: </label>
			<input class="form-control" type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group form-group">
			<label class="col">Image: </label>
			<input class="form-control" type="text" name="image" value="<?php echo $image; ?>">
		</div>
		<div class="input-group form-group">
			<label class="col">ISBN: </label>
			<input class="form-control" type="text" name="isbn" value="<?php echo $isbn; ?>">
		</div>
		<div class="input-group form-group">
			<label class="col">Description: </label>
			<input class="form-control" type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group form-group">
			<label class="col">Date: </label>
			<input class="form-control" type="text" name="date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group form-group">
			<label class="col">Type: </label>
			<input class="form-control" type="text" name="type" value="<?php echo $type; ?>">
		</div>
		<div class="input-group form-group inputform">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
</div>
<?php 
require "footer.php"; ?>
<script src="javascript/search.js" type="text/javascript" charset="utf-8" async defer></script>
</body>
</html>