<?php

$page = (isset($_GET['page'])) ? $_GET['page'] : "main";
switch ($page) {
    // ini untuk input data akun
    case 'dasbord' :
        include "dasboard.php";
        break;
    case 'jual' :
        include "jual.php";
        break;
    case 'tes' : include "tes.php";
        break;
    case 'profile' : include "profile/profile.php";
        break;
    case 'seting' : include "seting.php";
        break;
    //Input akun
    case 'input_akun' : include "akun/input_akun.php";
        break;
    case 'exe_input_akun' : include "akun/exe_input_akun.php";
        break;
    case 'edit_akun' : include "akun/edit_akun.php";
        break;
    case 'exe_edit_akun' : include "akun/exe_edit_akun.php";
        break;
    case 'daftar_akun' : include "akun/daftar_akun.php";
        break;
    case 'delete_akun' : include "akun/delete_akun.php";
        break;
// yang bawah untuk input kategori
    case 'input_kategori' : include "kategori/input_kategori.php";
        break;
    case 'exe_input_kategori' : include "kategori/exe_input_kategori.php";
        break;
    case 'edit_kategori' : include "kategori/edit_kategori.php";
        break;
    case 'exe_edit_kategori' : include "kategori/exe_edit_kategori.php";
        break;
    case 'daftar_kategori' : include "kategori/daftar_kategori.php";
        break;
    case 'delete_kategori' : include "kategori/delete_kategori.php";
        break;

    case 'input_barang' : include "master_brg/input_barang.php";
        break;
    case 'exe_input_barang' : include "master_brg/exe_input_barang.php";
        break;
    case 'edit_barang' : include "master_brg/edit_barang.php";
        break;
    case 'exe_edit_barang' : include "master_brg/exe_edit_barang.php";
        break;
    case 'daftar_barang' : include "master_brg/daftar_barang.php";
        break;
    case 'delete_barang' : include "master_brg/delete_barang.php";
        break;

    case 'input_artikel' : include "input_artikel.php";
        break;
    case 'edit_artikel' : include "edit_artikel.php";
        break;
    case 'daftar_artikel' : include "daftar_artikel.php";
        break;
    case 'delete_artikel' : include "delete_artikel.php";
        break;

    case 'input_menu' : include "pilih_artikel_menu.php";
        break;
    case 'edit_menu' : include "edit_pilih_artikel_menu.php";
        break;
    case 'daftar_menu' : include "daftar_menu.php";
        break;
    case 'delete_menu' : include "delete_menu.php";
        break;

    case 'input_submenu' : include "pilih_artikel_submenu.php";
        break;
    case 'edit_submenu' : include "edit_submenu.php";
        break;
    case 'daftar_submenu' : include "daftar_submenu.php";
        break;
    case 'delete_submenu' : include "delete_submenu.php";
        break;


    case 'main':
    default : include 'dasboard.php';
}
?>
