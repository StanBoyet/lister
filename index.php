<?php 

// Open the directory 
$directory = opendir(".");
$totalSize = 0;

// Get each entries
while($entryName = readdir($directory)) {
	$dirArray[] = $entryName;
	$totalSize += filesize($entryName);
}

// Close the directory
closedir($directory);

//	Count elements in the array
$indexCount	= count($dirArray);

// sort them
sort($dirArray);

?>



<html lang="en"><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>The Lister - Directory Content</title>

<!-- Bootstrap core CSS -->
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">

<!-- Custom styles for this template -->
<link href="css/jumbotron-narrow.css" rel="stylesheet">

<!-- Just for debugging purposes. Don't actually copy this line! -->
<!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
      <style type="text/css"></style></head>

      <body>

      	<div class="container">
      		<div class="header">
      			<h3 class="text-muted">The Lister - Directory Content</h3>
      		</div>

      		<div class="row">

				<a href="zip_it.php" type="button" class="btn btn-primary pull-right" <?php if($totalSize > 1048576000){ echo "disabled='disabled'"; } ?> >Download the list</a>
				<br>
				<br>

      			<table class="table table-condensed table-striped table-bordered">
      				<tr>
      					<th>Filename</th>
      					<th>Filetype</th>
      					<th>Filesize</th>
      				</tr>

      				<?php 
      				for ($index=0; $index < $indexCount; $index++) { 
					if (substr("$dirArray[$index]", 0, 1) != "." && filetype($dirArray[$index]) != "dir" && !strstr($dirArray[$index],'.php') ){ // Don't list hidden files or directories
					?>

					<tr>
						<td>
							<?php echo '<a href="'.$dirArray[$index].'">'.$dirArray[$index].'</a>'?>
						</td>
						<td>
							<?php echo filetype($dirArray[$index])?>
						</td>
						<td>
							<?php echo number_format (filesize($dirArray[$index]) / 1048576, (filesize($dirArray[$index]) < 1048576 ? 2 : 0)) . " Mb" ?>
						</td>
					</tr>

					<?php
						}

					}
					?>
				</table>
			</div>

			<div class="footer">
				<p>Made with <span class="glyphicon glyphicon-heart"></span> by StanBoyet.</p>
				<p>Based on <a href="http://www.liamdelahunty.com/tips/php_list_a_directory.php"> this tutorial</a>, with <a href="http://stackoverflow.com/a/17708599">this script</a>, and from <a href="http://getbootstrap.com/examples/jumbotron-narrow/">this bootstrap template</a>.</p>
				<p>Contribute <a href="https://github.com/StanBoyet/lister">here</a>.</p>
			</div>

		</div> <!-- /container -->

	</body>

</html>