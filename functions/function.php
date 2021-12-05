<?php

// fungsi global

function result($query)
{
	global $link;
	if($result = mysqli_query($link, $query) or die ('gagal menampilkan data'))
	{
		return $result;
	}
}

function run($query)
	{
		global $link;
		if(mysqli_query($link, $query))
		return true; else return false;	
	}

function escape($data)
{
	global $link;
	return mysqli_real_escape_string ($link, $data);

} 

function tampilkan_data()
{
	$query = "SELECT * FROM tbl_handri";
	return result($query);
}


function tampilkan_per_single($id)
{
	$query = "SELECT * FROM tbl_handri WHERE id = $id ";
	return result($query);

}

function update($kdvcd, $nama, $jumlah, $tanggal,$id){
	$query  		= " UPDATE tbl_handri SET 
	kdvcd			='$kdvcd',
	nama 			='$nama', 
	jumlah			='$jumlah',
	tanggal 		='$tanggal'
	WHERE id 		= '$id' ";
	return result($query);
}

function hapus($id){
	$query = " DELETE FROM tbl_handri WHERE id=$id ";
	return run($query);
}
?>