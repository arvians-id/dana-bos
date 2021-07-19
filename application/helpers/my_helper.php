<?php

// fungsi untuk mengecek apakah sudah login atau belum
// Jika sudah login maka akan dialhikan ke halaman admin
function is_logged_in()
{
	$ths = &get_instance();
	// Cek jika user udah login, tapi mau balik ke halaman login
	if ($ths->session->userdata('username')) {
		// Redirect in aja ke admin
		redirect('admin');
	}
}

// fungsi untuk mengecek apakah sudah login atau belum
// Jika belum login maka akan dialhikan ke halaman login
function is_logged_not_in()
{
	$ths = &get_instance();
	if (!$ths->session->userdata('username')) {
		$ths->session->set_flashdata('error', 'Login terlebih dahulu');
		redirect('');
	}
}

// Untuk mengaktifkan menu di home
function activeMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'active';
}
// Untuk show menu di home
function showMenu($arrayMenu)
{
	$ths = &get_instance();
	return !in_array($ths->uri->segment(2), $arrayMenu) ?: 'show';
}
function expandedMenu($arrayMenu)
{
	$ths = &get_instance();
	return in_array($ths->uri->segment(2), $arrayMenu) ? 'true' : 'false';
}
