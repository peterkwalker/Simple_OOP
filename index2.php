<?php
require 'classes/Database.php';

$database = new Database;

$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

if ($post['submit']){
$title = $post['title'];
$body = $post['body'];

$database->query('insert into posts (title, body) Values(:title, :body)');
$database->bind(':title', $title);
$database->bind(':body', $body);
$database->execute();
if ($database->lastInsertId()){
	echo '<p>This has been added</p>';
}

}


$database->query('select * from posts');
$rows = $database->resultset();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  </head>

  <body>

<div class="container">








<h1>Add Post</h1>
<form style="margin-bottom: 50px;" method="post" action="<?php $_SERVER['PHP_SELF'];?>" >
<label>Post Title</label><br />
<input type="text" name="title" placeholder="Add title" class="form-control"><br />
<label>Post Body</label><br />
<textarea name="body" class="form-control"></textarea>
<br />
<input type="submit" name="submit" value="submit" class="btn btn-block">

	</form>


<h1>Posts</h1>



<table class="table table-striped table-hover">
	<thead class="thead-dark">
		<tr>
			<th>Post Title</th>
			<th>Post Content</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($rows as $row) : ?>
		<tr>
			<td><?php echo $row['title'];?></td>
			<td><?php echo $row['body'];?></td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>




</table>


</div>

   <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>