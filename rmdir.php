<?php
	require_once './autoload.php';

	$path = $_POST['path'];
	if (rmdir(ROOT_DIR.'/'.$path )) {
	    echo json_encode(['status'=>'ok']);
	    exit();
	}


	echo json_encode(['status'=>'failed']);