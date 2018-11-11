<!DOCTYPE HTML>
<html>
<head>
	<title>EDIT / DELETE</title>
		<link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="css/thumbnail-gallery.css" rel="stylesheet">
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
	
<table>
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
			<td>
				<a href="update.php?edit=<?php echo $row['media_id']; ?>" class="edit_btn" >Edit</a>
			</td>
			<td>
				<a href="update.php?del=<?php echo $row['media_id']; ?>" class="del_btn">Delete</a>
			</td>
		</tr>
	<?php } ?>
</table>
	<form method="post" action="includes/update_delete.inc.php" >
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="<?php echo $name; ?>">
		</div>
		<div class="input-group">
			<label>Image</label>
			<input type="text" name="image" value="<?php echo $image; ?>">
		</div>
		<div class="input-group">
			<label>ISBN</label>
			<input type="text" name="isbn" value="<?php echo $isbn; ?>">
		</div>
		<div class="input-group">
			<label>Description</label>
			<input type="text" name="description" value="<?php echo $description; ?>">
		</div>
		<div class="input-group">
			<label>Date</label>
			<input type="text" name="date" value="<?php echo $date; ?>">
		</div>
		<div class="input-group">
			<label>Type</label>
			<input type="text" name="type" value="<?php echo $type; ?>">
		</div>
		<div class="input-group">
			<?php if ($update == true): ?>
	<button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
<?php else: ?>
	<button class="btn" type="submit" name="save" >Save</button>
<?php endif ?>
		</div>
	</form>
</body>
</html>