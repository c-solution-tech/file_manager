<?php
	require_once './autoload.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>File Manager</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<!-- customer -->
	<link rel="stylesheet" type="text/css" href="./assets/styles/custom.css">
	<script type="text/javascript" src="./assets/scripts/core.js"></script>
</head>
<body>
	<nav class="navbar navbar-light bg-light">
		<div class="container-fluid">
		    <a class="navbar-brand" href="#">
		      	<img src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="30" height="24" class="d-inline-block align-text-top">
		      	File Management Tools
		    </a>
	   </div>
	</nav>
	<nav aria-label="breadcrumb">
	  	<ol class="breadcrumb">
	    	<li class="breadcrumb-item active" aria-current="page">Home</li>
	    	<li class="breadcrumb-item active" aria-current="page">Library</li>
	  	</ol>
	</nav>
	<div class="container-fluid">
		<div class="row">
			<div class="col-4">
				<ul id="myUL">
				  <li><span class="box">Beverages</span>
				    <ul class="nested">
				      <li>Water</li>
				      <li>Coffee</li>
				      <li><span class="box">Tea</span>
				        <ul class="nested">
				          <li>Black Tea</li>
				          <li>White Tea</li>
				          <li><span class="box">Green Tea</span>
				            <ul class="nested">
				              <li>Sencha</li>
				              <li>Gyokuro</li>
				              <li>Matcha</li>
				              <li>Pi Lo Chun</li>
				            </ul>
				          </li>
				        </ul>
				      </li>  
				    </ul>
				  </li>
				</ul>
			</div>
			<div class="col-8">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>#</th>
							<th>Name</th>
							<th>Size</th>
							<th>Permission</th>
							<th>Last Modified</th>
							<th>Actions</th>
						</tr>
					</thead>
				
					<tbody>
						<?php
							if ($handle = opendir(ROOT_DIR)) {
								$i = 1;
							    /* This is the correct way to loop over the directory. */
							    while (false !== ($entry = readdir($handle))) 
							    {
						?>
							<tr>
								<td><?=$i?></td>
								<td><?=File::getName($entry)?> </td>
								<td><?=File::getSize(ROOT_DIR.'/'.$entry)?></td>
								<td><?=FIle::getPerms(ROOT_DIR.'/'.$entry)?></td>
								<td><?=File::getmTime(ROOT_DIR.'/'.$entry)?></td>
								<td>
									<div class="dropdown">
									  	<button class="btn btn-light btn-sm dropdown" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
									  		<i class="bi bi-three-dots-vertical"></i>
									  	</button>
									  	<ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
									    	<li>
									    		<a class="dropdown-item" onclick="rmdir(event, '<?=$entry?>')">
									    			<i class="bi bi-trash"></i> Delete
									    		</a>
									    	</li>
									    	<li>
									    		<a class="dropdown-item" href="#">
									    			<i class="bi bi-pencil-fill"></i> Rename
									    		</a>
									    	</li>
									    	<li>
									    		<a class="dropdown-item" href="#">
									    			<i class="bi bi-pencil-square"></i> Edit
									    		</a>
									    	</li>
									  	</ul>
									</div>
								</td>
							</tr>
						<?php   	$i = $i + 1;

							    }

							    closedir($handle);
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>