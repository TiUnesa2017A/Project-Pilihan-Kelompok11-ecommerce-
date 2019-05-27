<?php
class user{
	function registeruser($con,$id_user,$username,$email,$password){$pm=base64_encode($password);
		$sql=mysqli_query($con,"INSERT into user set id_user='$id_user',username='$username',email='$email',password='$password' ");
		?><script type="text/javascript">alert("Selamat Bergabung Dengan Kami, Silahkan Login");window.location="../logreg";</script><?php
	}
	function loginuser($con,$usernameemail,$password){$pm=base64_encode($password);
		$sql=mysqli_fetch_array(mysqli_query($con,"SELECT * from user where (username='$usernameemail' OR email='$usernameemail') AND password='$password' "));
		if($sql!=NULL){
			session_start();$_SESSION['id_user']=$sql['id_user'];$_SESSION['username']=$sql['username'];
			header('location:../');
		}
		else{
			?><script type="text/javascript">alert("Username/Email dan Password Salah");window.location="../logreg";</script><?php
		}
	}
	function logout(){
		session_start();unset($_SESSION['id_user']);unset($_SESSION['username']);session_destroy();header('location:../');
	}
	function addcart($con,$iduser,$idproduk,$tanggal){
		$sub=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$idproduk' "));$harga=$sub['harga'];$subtotal=1*$harga;
		$ber=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM ongkirberat where id_berat='1' "));$b=$ber['ongkir'];$ongber=($sub['berat']*1)*$b;
		$sql=mysqli_query($con,"INSERT INTO cart set id_user='$iduser',id_produk='$idproduk',jumlah='1',tanggal='$tanggal',subtotal='$subtotal',ongberat='$ongber' ");
		header('location:../cart');
	}
	function updatecart($con,$iduser,$idproduk,$jumlah,$tanggal){
		$sub=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$idproduk' "));$harga=$sub['harga'];$subtotal=$jumlah*$harga;
		$ber=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM ongkirberat where id_berat='1' "));$b=$ber['ongkir'];$ongber=($sub['berat']*$jumlah)*$b; 
		$sql=mysqli_query($con,"UPDATE cart set jumlah='$jumlah',tanggal='$tanggal',subtotal='$subtotal',ongberat='$ongber' where id_user='$iduser' and id_produk='$idproduk' ");
		header('location:../cart');
	}
	function cancelproduct($con,$iduser,$idproduk){
		$sql=mysqli_query($con,"DELETE FROM cart where id_user='$iduser' and id_produk='$idproduk' ");
		header('location:../cart');
	}
	function insertcheckout($con,$id_checkout,$id_user,$an,$prov,$kab,$kec,$kel,$kodepos,$phone,$ongcart,$ongkirwil,$ongberat,$tanggal){
		$sql=mysqli_query($con,"INSERT INTO checkout set id_checkout='$id_checkout',id_user='$id_user',an='$an',prov='$prov',kab='$kab',kec='$kec',kel='$kel',kodepos='$kodepos',phone='$phone',ongcart='$ongcart',ongwil='$ongkirwil',ongberat='$ongberat',status='pending',tanggal='$tanggal' ");
		$tb=$ongcart+$ongkirwil+$ongberat;
		$kodeveri=substr(md5(rand()), 0,9);
		$sqla=mysqli_query($con,"INSERT INTO finish set id_checkout='$id_checkout',kode_veri='$kodeveri',totalbayar='$tb',status='pending',tanggal='$tanggal' ");
		header('location:../checkout');
	}
	function updatecheckout($con,$id_checkout,$id_user,$an,$prov,$kab,$kec,$kel,$kodepos,$phone,$ongcart,$ongkirwil,$ongberat,$tanggal){
		$sql=mysqli_query($con,"UPDATE checkout set id_user='$id_user',an='$an',prov='$prov',kab='$kab',kec='$kec',kel='$kel',kodepos='$kodepos',phone='$phone',ongcart='$ongcart',ongwil='$ongkirwil',ongberat='$ongberat',status='pending',tanggal='$tanggal' where id_checkout='$id_checkout' ");
		$tb=$ongcart+$ongkirwil+$ongberat;
		$sqla=mysqli_query($con,"UPDATE finish set totalbayar='$tb',status='pending',tanggal='$tanggal' where id_checkout='$id_checkout' ");
		header('location:../checkout');
	}
	function deletecheckout($con,$id_checkout){
		$sql=mysqli_query($con,"DELETE FROM checkout where id_checkout='$id_checkout' ");
		$sqla=mysqli_query($con,"DELETE FROM finish where id_checkout='$id_checkout' ");
		header('location:../cart');
	}
	function verifikasi($con,$id_user,$id_checkout,$tanggal){
		//update stok
		$us=mysqli_query($con,"SELECT * FROM cart where id_user='$id_user' ");while($has=mysqli_fetch_array($us)){ $up=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$has[id_produk]' "));
		$hasilstok=$up['stok']-$has['jumlah'];
		$upro=mysqli_query($con,"UPDATE produk set stok='$hasilstok' where id_produk='$has[id_produk]' ");
		$inslog=mysqli_query($con,"INSERT INTO log set id_checkout='$id_checkout',id_cart='$has[id_cart]',id_user='$id_user',id_produk='$has[id_produk]',jumlah='$has[jumlah]',tanggal='$has[tanggal]',subtotal='$has[subtotal]',ongberat='$has[ongberat]' ");
				}
		//
		$delcart=mysqli_query($con,"DELETE FROM cart where id_user='$id_user' ");
		$upcek=mysqli_query($con,"UPDATE checkout set status='success' where id_checkout='$id_checkout' ");
		$upsta=mysqli_query($con,"UPDATE finish set status='success',tanggal='$tanggal' where id_checkout='$id_checkout' ");
		session_start();
		$_SESSION['success']='ya';
		header('location:../verifikasisuccess');
	}
	function updateaccount($con,$id_user,$email,$username,$password){ $pm=base64_encode($password);
		$sql=mysqli_query($con,"UPDATE user set username='$username',email='$email',password='$password' where id_user='$id_user' ");
		header('location:../account');
	}
	function kirimtanya($con,$tanya){
		$sql=mysqli_query($con,"INSERT INTO service set tanya='$tanya',status='NO' ");
		header('location:../homefirst');
	}
	function komentar($con,$idp,$ius,$komentar){ $d=date('Y-m-d');
		$sql=mysqli_query($con,"INSERT INTO komentar set id_produk='$idp',id_user='$ius',komentar='$komentar',tanggal='$d' ");
		$np=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM produk where id_produk='$idp' "));
		header('location:../detailproduct?thisproduct='.base64_encode($idp).'&nameproduct='.$np['nama'].'');
	}
	function gantidaridefault($con,$iduser,$gambar){
		$sql=mysqli_query($con,"UPDATE user set gambar='$gambar' where id_user='$iduser' ");
		header('location:../account');
	}
	function gantisudahada($con,$iduser,$gambar){
		$sql=mysqli_query($con,"UPDATE user set gambar='$gambar' where id_user='$iduser' ");
		header('location:../account');
	}
	function hapusfoto($con,$iduser){
		$sql=mysqli_query($con,"UPDATE user set gambar='' where id_user='$iduser' ");
		header('location:../account');
	}
}
?>