<?php
class con{
	function logincon($con,$username,$password){$pm=md5($password);
		$sql=mysqli_fetch_array(mysqli_query($con,"SELECT * from control where user='$username' AND pass='$pm' "));
		if($sql!=NULL){
			session_start();$_SESSION['id_control']=$sql['id_control'];;$_SESSION['user']=$sql['user'];;$_SESSION['pass']=$sql['pass'];
			header('location:../main');
		}
		else{
			header('location:../log');
		}
	}
	function logout(){
		session_start();unset($_SESSION['id_control']);unset($_SESSION['user']);unset($_SESSION['pass']);session_destroy();header('location:../log');
	}
	function addkategori($con,$id_kat_produk,$kat_produk){
		$sql=mysqli_query($con,"INSERT INTO rkat_produk set id_kat_produk='$id_kat_produk',kat_produk='$kat_produk' ");
		header('location:../main?thisaction='.base64_encode('kategoriproduct').'');
	}
	function editkategori($con,$id_kat_produk,$kat_produk){
		$sql=mysqli_query($con,"UPDATE rkat_produk set kat_produk='$kat_produk' where id_kat_produk='$id_kat_produk' ");
		header('location:../main?thisaction='.base64_encode('kategoriproduct').'');
	}
	function hapuskategori($con,$id_kat_produk){
		$sql=mysqli_query($con,"DELETE FROM rkat_produk where id_kat_produk='$id_kat_produk' ");
		$dp=mysql_query($con,"DELETE FROM produk where id_kat_produk='$id_kat_produk' ");
		header('location:../main?thisaction='.base64_encode('kategoriproduct').'');
	}
	function addproduct($con,$id_produk,$id_kat_produk,$nama,$harga,$stok,$gambar,$tanggal,$des,$berat){ $tt=date('Y-m-d H:i:s');
		$sql=mysqli_query($con,"INSERT INTO produk set id_produk='$id_produk',id_kat_produk='$id_kat_produk',nama='$nama',harga='$harga',stok='$stok',gambar='$gambar',tanggal='$tt',deskripsi='$des',berat='$berat' ");
		if($sql){
			header('location:../main?thisaction='.base64_encode('listproduct').'');
		}else{
			echo "Gagal";
		}
	}
	function editproductq($con,$id_produk,$id_kat_produk,$nama,$harga,$stok,$tanggal,$des,$berat){  $tt=date('Y-m-d H:i:s');
		$sql=mysqli_query($con,"UPDATE produk set id_kat_produk='$id_kat_produk',nama='$nama',harga='$harga',stok='$stok',tanggal='$tt',deskripsi='$des',berat='$berat' where id_produk='$id_produk' ");
		header('location:../main?thisaction='.base64_encode('listproduct').'');
	}
	function editproduct($con,$id_produk,$id_kat_produk,$nama,$harga,$stok,$gambar,$tanggal,$des,$berat){  $tt=date('Y-m-d H:i:s');
		$sql=mysqli_query($con,"UPDATE produk set id_kat_produk='$id_kat_produk',nama='$nama',harga='$harga',stok='$stok',gambar='$gambar',tanggal='$tt',deskripsi='$des',berat='$berat' where id_produk='$id_produk' ");
		header('location:../main?thisaction='.base64_encode('listproduct').'');
	}
	function hapusproduct($con,$id_produk){
		$sql=mysqli_query($con,"DELETE FROM produk where id_produk='$id_produk' ");
		header('location:../main?thisaction='.base64_encode('listproduct').'');
	}
	function addslider($con,$gambar){
		$sql=mysqli_query($con,"INSERT INTO slider set gambar='$gambar' ");
		header('location:../main?thisaction='.base64_encode('slider').'');
	}
	function hapusslider($con,$id_slider){
		$sql=mysqli_query($con,"DELETE FROM slider where id_slider='$id_slider' ");
		header('location:../main?thisaction='.base64_encode('slider').'');
	}
	function updateongkirwil($con,$id_prov,$ongkir){
		$sql=mysqli_query($con,"UPDATE provinsi set ongkir='$ongkir' where id_prov='$id_prov' ");
		header('location:../main?thisaction='.base64_encode('ongkirwilayah').'');
	}
	function addadmin($con,$user,$pass){
		$sql=mysqli_query($con,"INSERT INTO control set user='$user',pass='$pass' ");
		header('location:../main?thisaction='.base64_encode('akunadmin').'');
	}
	function deleteadmin($con,$control){
		$sql=mysqli_query($con,"DELETE FROM control where id_control='$control' ");
		header('location:../main?thisaction='.base64_encode('akunadmin').'');
	}
	function deletecart($con,$id_user,$id_produk){
		$sql=mysqli_query($con,"DELETE FROM cart where id_user='$id_user' and id_produk='$id_produk' ");
		header('location:../main?thisaction='.base64_encode('cart').'');
	}
	function delchecksuc($con,$id_checkout){
		$dl=mysqli_query($con,"DELETE FROM log where id_checkout='$id_checkout' ");
		$df=mysqli_query($con,"DELETE FROM finish where id_checkout='$id_checkout' ");
		$dc=mysqli_query($con,"DELETE FROM checkout where id_checkout='$id_checkout' ");
		header('location:../main?thisaction='.base64_encode('checkout').'');
	}
	function delcheckpen($con,$id_checkout){
		$df=mysqli_query($con,"DELETE FROM finish where id_checkout='$id_checkout' ");
		$dc=mysqli_query($con,"DELETE FROM checkout where id_checkout='$id_checkout' ");
		header('location:../main?thisaction='.base64_encode('checkout').'');
	}
	function editcontact($con,$id_contact,$phone,$paging,$email,$alamat){
		$sql=mysqli_query($con,"UPDATE contact set phone='$phone',paging='$paging',email='$email',alamat='$alamat' where id_contact='$id_contact' ");
		header('location:../main?thisaction='.base64_encode('contact').'');
	}
	function carabayar($con,$id_carabayar,$rek,$phone){
		$sql=mysqli_query($con,"UPDATE carabayar set rek='$rek',phone='$phone' where id_carabayar='$id_carabayar' ");
		header('location:../main?thisaction='.base64_encode('carabayar').'');
	}
	function jawab($con,$id_service,$jawab){
		$sql=mysqli_query($con,"UPDATE service set jawab='$jawab' where id_service='$id_service' ");
		header('location:../main?thisaction='.base64_encode('service').'');
	}
	function tampilkan($con,$id_service){
		$sql=mysqli_query($con,"UPDATE service set status='YES' where id_service='$id_service' ");
		header('location:../main?thisaction='.base64_encode('service').'');
	}
	function tutup($con,$id_service){
		$sql=mysqli_query($con,"UPDATE service set status='NO' where id_service='$id_service' ");
		header('location:../main?thisaction='.base64_encode('service').'');
	}
	function hapusservice($con,$id_service){
		$sql=mysqli_query($con,"DELETE FROM service where id_service='$id_service' ");
		header('location:../main?thisaction='.base64_encode('service').'');
	}
	function hapuskomentar($con,$thiskomen){
		$sql=mysqli_query($con,"DELETE FROM komentar where id_komentar='$thiskomen' ");
		header('location:../main?thisaction='.base64_encode('komentar').'');
	}
}
?>