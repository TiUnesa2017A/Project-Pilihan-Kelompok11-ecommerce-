<?php date_default_timezone_set('Asia/Jakarta');
if(empty($_GET['thisposition'])){
	header('location:../404');
}  
else{
	require '../../php/config.php'; require 'rootcon.php';
	$ru=new con();
	$to=base64_decode($_GET['thisposition']);
	if($to=='logincon'){
		$ru->logincon($con,$_POST['username'],$_POST['password']);
	}
	else if($to=='logout'){
		$ru->logout();
	}
	else if($to=='addkategori'){
		$ru->addkategori($con,$_POST['id_kat_produk'],$_POST['kat_produk']);
	}
	else if($to=='editkategori'){
		$ru->editkategori($con,$_POST['id_kat_produk'],$_POST['kat_produk']);
	}
	else if($to=='hapuskategori'){$cat=base64_decode($_GET['thiscat']);
		$dd=mysqli_query($con,"SELECT * from produk where id_kat_produk='$cat'");
		while($cc=mysqli_fetch_array($dd)){
			if($cc['gambar']!=NULL)
			{
				unlink('../'.$cc['gambar']);
			}
		}
		$ru->hapuskategori($con,$cat);
	}
	else if($to=='addproduct'){
		$har= str_replace(".", "", $_POST['harga']);
		$tmp_name=$_FILES['gambar']['tmp_name'];
		$name=$_FILES['gambar']['name'];
		$type=$_FILES['gambar']['type'];
		$loc="../img/produk/$name";$gambar="img/produk/$name";
		move_uploaded_file($tmp_name,$loc);
		$ru->addproduct($con,$_POST['id_produk'],$_POST['id_kat_produk'],$_POST['nama'],$har,$_POST['stok'],$gambar,$_POST['tanggal'],$_POST['deskripsi'],$_POST['berat']);
	}
	else if($to=='editproduct'){
		$har= str_replace(".", "", $_POST['harga']);
		if(isset($_POST['tetap'])){
			$ru->editproductq($con,$_POST['id_produk'],$_POST['id_kat_produk'],$_POST['nama'],$har,$_POST['stok'],$_POST['tanggal'],$_POST['deskripsi'],$_POST['berat']);
		}	
		else
		{
			$dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from produk where id_produk='$_POST[id_produk]'"));
			if($dd!=NULL)
			{
				unlink('../'.$dd['gambar']);
			}
			$tmp_name=$_FILES['gambar']['tmp_name'];
			$name=$_FILES['gambar']['name'];
			$type=$_FILES['gambar']['type'];
			$loc="../img/produk/$name";$gambar="img/produk/$name";
			move_uploaded_file($tmp_name,$loc);
			$ru->editproduct($con,$_POST['id_produk'],$_POST['id_kat_produk'],$_POST['nama'],$har,$_POST['stok'],$gambar,$_POST['tanggal'],$_POST['deskripsi'],$_POST['berat']);
		}
	}
	else if($to=='hapusproduct'){$pro=base64_decode($_GET['thispro']);
		$dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from produk where id_produk='$pro'"));
			if($dd!=NULL)
			{
				unlink('../'.$dd['gambar']);
			}
		$ru->hapusproduct($con,$pro);
	}
	else if($to=='addslider'){
		$tmp_name=$_FILES['gambar']['tmp_name'];
		$name=$_FILES['gambar']['name'];
		$type=$_FILES['gambar']['type'];
		$loc="../img/slider/$name";$gambar="img/slider/$name";
		move_uploaded_file($tmp_name,$loc);
		$ru->addslider($con,$gambar);
	}
	else if($to=='hapusslider'){$sli=base64_decode($_GET['thissli']);
		$dd=mysqli_fetch_array(mysqli_query($con,"SELECT * from slider where id_slider='$sli'"));
			if($dd!=NULL)
			{
				unlink('../'.$dd['gambar']);
			}
		$ru->hapusslider($con,$sli);
	}
	else if($to=='updateongkirwil'){
		$ongas= str_replace(".", "", $_POST['ongkirwil']);
		$ru->updateongkirwil($con,$_POST['id_prov'],$ongas);
	}
	else if($to=='addadmin'){
		$ru->addadmin($con,$_POST['user'],md5($_POST['password']));
	}
	else if($to=='deleteadmin'){ $control=base64_decode($_GET['thiscontrol']);
		$ru->deleteadmin($con,$control);
	}
	else if($to=='deletecart'){ $thisuser=base64_decode($_GET['thisuser']); $thisproduct=base64_decode($_GET['thisproduct']);
		$ru->deletecart($con,$thisuser,$thisproduct);
	}
	else if($to=='deletecheckout'){ $thischeck=base64_decode($_GET['thischeckout']);
		$cc=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM checkout where id_checkout='$thischeck' "));
		if($cc['status']=='success'){
			$ru->delchecksuc($con,$thischeck);
		}
		else{
			$ru->delcheckpen($con,$thischeck);
		}
	}
	else if($to=='editcontact'){
		$ru->editcontact($con,$_POST['id_contact'],$_POST['phone'],$_POST['paging'],$_POST['email'],$_POST['alamat']);
	}
	else if($to=='carabayar'){
		$ru->carabayar($con,$_POST['id_carabayar'],$_POST['rek'],$_POST['phone']);
	}
	else if($to=='jawab'){ $idser=base64_decode($_POST['id_service']);
		$ru->jawab($con,$idser,$_POST['jawab']);
	}
	else if($to=='tampilkan'){ $idser=base64_decode($_GET['thisservice']);
		$ru->tampilkan($con,$idser);
	}
	else if($to=='tutup'){ $idser=base64_decode($_GET['thisservice']);
		$ru->tutup($con,$idser);
	}
	else if($to=='hapusservice'){ $idser=base64_decode($_GET['thisservice']);
		$ru->hapusservice($con,$idser);
	}
	else if($to=='hapuskomentar'){$thiskomen=base64_decode($_GET['thiskomentar']);
		$ru->hapuskomentar($con,$thiskomen);
	}
}
?>