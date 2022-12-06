<?php

function cekSession()
{
	$ci = get_instance();
	if(!$ci->session->userdata('role') == '1') {
		redirect('auth');
	} else if(!$ci->session->userdata('role') == '2') {
		redirect('auth');
	}
}

function cekPengunjung()
{
	$ci = get_instance();

	if(!$ci->session->userdata('pengunjung')){
		redirect('Pengunjung/auth');
	}
}

function cekMenu()
{
	$ci = get_instance();
	if($ci->session->userdata('role') == 2) {
		redirect('pegawai/dashboard');
	}
}

function keterangan_absensi($status){
	$ci = get_instance();
	if($status == 1){
		return "Hadir";
	}elseif($status == 2){
		return "Sakit";
	}else{
		return "Alpha";
	}
}

function jenis_kelamin($ket){
	$ci = get_instance();
	if($ket == "L"){
		return "Laki-laki";
	}elseif($ket == "P"){
		return "Perempuan";
	}else{
		return "Ga Jelas";
	}
}

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}