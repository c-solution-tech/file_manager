<?php
	$user = 'cheang';
	$pass = '2765';
	//initial connection
	$connection = ssh2_connect('localhost', 22);
    if (!$connection) die('Connection failed');
    //auth_password
    ssh2_auth_password($connection, $user, $pass);
    //open stream file
    $sftp = ssh2_sftp($connection);
	