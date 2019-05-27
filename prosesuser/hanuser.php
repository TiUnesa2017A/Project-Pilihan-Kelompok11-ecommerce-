<?php date_default_timezone_set('Asia/Jakarta');
if(empty($_GET['thisposition'])){
	header('location:../notfound');
} 
else{
	require '../php/config.php'; require 'rootuser.php';
	$ru=new user();
	$to=base64_decode($_GET['thisposition']);
	if($to=='registeruser'){
		$cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM user where username='$_POST[username]' OR email='$_POST[email]' OR password='$_POST[password]' "));
		if($cek>0){?>
		<script>alert("Maaf Email atau Password sudah terdaftar");window.location="../logreg";</script>
		<?php }
		else{
		$ru->registeruser($con,$_POST['id_user'],$_POST['username'],$_POST['email'],$_POST['password']);}
	}
	else if($to=='loginuser'){
		$ru->loginuser($con,$_POST['usernameemail'],$_POST['password']);
	}
	else if($to=='logout'){
		$ru->logout();
	}
	else if($to=='addcart'){ $idproduk=base64_decode($_POST['thisproduk']); $iduser=base64_decode($_POST['thisuser']);
		$ru->addcart($con,$iduser,$idproduk,date('Y-m-d'));
	}
	else if($to=='updatecart'){ $idproduk=base64_decode($_POST['thisproduk']); $iduser=base64_decode($_POST['thisuser']); $cekstok=mysqli_fetch_array(mysqli_query($con,"SELECT * from produk where id_produk='$idproduk' "));
		if($_POST['jumlah']>$cekstok['stok']){
			?><script>alert("Maaf Jumlah Pesan Melebihi Stok Barang");window.location="../cart";</script><?php
		}else{
			$ru->updatecart($con,$iduser,$idproduk,$_POST['jumlah'],date('Y-m-d'));
		}
	}
	else if($to=='cancelcart'){ $idproduk=base64_decode($_GET['thisproduk']); $iduser=base64_decode($_GET['thisuser']);
		$ru->cancelproduct($con,$iduser,$idproduk);
	}
	else if($to=='insertcheckout'){
		//alamat
		$prov=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM provinsi where id_prov='$_POST[prov]' "));
		$kab=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kabupaten where id_kab='$_POST[kab]' "));
		$kec=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kecamatan where id_kec='$_POST[kec]' "));
		$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelurahan where id_kel='$_POST[kel]' "));
		$ongcart=mysqli_fetch_array(mysqli_query($con,"SELECT sum(subtotal) as total from cart where id_user='$_POST[id_user]' "));
		$ongberat=mysqli_fetch_array(mysqli_query($con,"SELECT sum(ongberat) as ongberat from cart where id_user='$_POST[id_user]' "));
		//
		$ru->insertcheckout($con,$_POST['id_checkout'],$_POST['id_user'],$_POST['an'],$prov['nama'],$kab['nama'],$kec['nama'],$kel['nama'],$_POST['kodepos'],$_POST['phone'],$ongcart['total'],$prov['ongkir'],$ongberat['ongberat'],date('Y-m-d'));
	}
	else if($to=='updatecheckout'){
		//alamat
		$prov=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM provinsi where id_prov='$_POST[prov]' "));
		$kab=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kabupaten where id_kab='$_POST[kab]' "));
		$kec=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kecamatan where id_kec='$_POST[kec]' "));
		$kel=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelurahan where id_kel='$_POST[kel]' "));
		$ongcart=mysqli_fetch_array(mysqli_query($con,"SELECT sum(subtotal) as total from cart where id_user='$_POST[id_user]' "));
		$ongberat=mysqli_fetch_array(mysqli_query($con,"SELECT sum(ongberat) as ongberat from cart where id_user='$_POST[id_user]' "));
		//
		$ru->updatecheckout($con,$_POST['id_checkout'],$_POST['id_user'],$_POST['an'],$prov['nama'],$kab['nama'],$kec['nama'],$kel['nama'],$_POST['kodepos'],$_POST['phone'],$ongcart['total'],$prov['ongkir'],$ongberat['ongberat'],date('Y-m-d'));
	}
	else if($to=='deletecheckout'){ $id_checkout=base64_decode($_GET['thischeckout']);
		$ru->deletecheckout($con,$id_checkout);
	}
	else if($to=='verifikasi'){
		$cad=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM finish where kode_veri='$_POST[kode_veri]' "));
		if($cad!=NULL){ $iduser=base64_decode($_GET['thisuser']);$id_checkout=base64_decode($_GET['thischeckout']);
			$ru->verifikasi($con,$iduser,$id_checkout,date('Y-m-d'));
		}
		else{
			?><script>alert("Maaf Kode Verifikasi Tidak Cocok");window.location="../checkout";</script><?php
		}
	}
	else if($to=='updateaccount'){ $iduser=base64_decode($_POST['id_user']);
		/*$cek=mysqli_num_rows(mysqli_query($con,"SELECT * FROM user where username='$_POST[username]' OR email='$_POST[email]' OR password='$_POST[password]' "));
		if($cek>0){?>
		<script>alert("Maaf Email atau Password sudah terdaftar");window.location="../account"</script>
		<?php }
		else{*/
		$ru->updateaccount($con,$iduser,$_POST['email'],$_POST['username'],$_POST['password']);//}
	}
	else if($to=='kirimtanya'){
		$ru->kirimtanya($con,$_POST['tanya']);
	}
	else if($to=='komentar'){ $idp=base64_decode($_POST['product']); $ius=base64_decode($_POST['user']);
		$ru->komentar($con,$idp,$ius,$_POST['komentar']);
	}
	else if($to=='gantidaridefault'){$iduser=base64_decode($_POST['user']);
		$tmp_name=$_FILES['gambar']['tmp_name'];
		$name=$_FILES['gambar']['name'];
		$type=$_FILES['gambar']['type'];
		$loc="../control/img/user/$name";$gambar="img/user/$name";
		move_uploaded_file($tmp_name,$loc);
		$ru->gantidaridefault($con,$iduser,$gambar);
	}
	else if($to=='gantisudahada'){$iduser=base64_decode($_POST['user']);
		$dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where id_user='$iduser' "));
			if($dd['gambar']!=NULL)
			{
				unlink('../control/'.$dd['gambar']);
			}
		$tmp_name=$_FILES['gambar']['tmp_name'];
		$name=$_FILES['gambar']['name'];
		$type=$_FILES['gambar']['type'];
		$loc="../control/img/user/$name";$gambar="img/user/$name";
		move_uploaded_file($tmp_name,$loc);
		$ru->gantisudahada($con,$iduser,$gambar);
	}
	else if($to=='hapusfoto'){$iduser=base64_decode($_GET['thisuser']);
		$dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where id_user='$iduser' "));
			if($dd['gambar']!=NULL)
			{
				unlink('../control/'.$dd['gambar']);
			}
		$ru->hapusfoto($con,$iduser);
	}
}
?>