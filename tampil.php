<?php
$page = (isset($_GET['page']))?$_GET['page']:"main";
switch ($page) {
	// ini untuk input data akun



	case 'main':
		default : include 'akun/daftar_akun.php';
}
?>
