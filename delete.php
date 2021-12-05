<?php
require_once "core/init.php";
	if(!$_SESSION['user'])
		{
			header('Location: login.php');
		}

	
	if(isset($_GET['id']))
	{
		if(hapus($_GET['id']))
			{
				header('location: index.php');
			}
		else echo "gagal menghapus data";
	}
?>