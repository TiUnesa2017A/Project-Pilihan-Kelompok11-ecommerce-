<?php require 'header.php';
for($a=1;$a<=50;$a++){
    echo '<i class="icon-'.$a.'"></i>';echo $a;
}echo '<br>'; 
for($b=51;$b<=100;$b++){
    echo '<i class="icon-'.$b.'"></i>';echo $b;
}echo '<br>';
for($c=101;$c<=150;$c++){
    echo '<i class="icon-'.$c.'"></i>';echo $c;
}echo '<br>'; 
for($e=151;$e<=200;$e++){
    echo '<i class="icon-'.$e.'"></i>';echo $e;
}echo '<br>'; 
for($f=1;$f<=10;$f++){
	echo '<button class="button-'.$f.'">'.$f.'</button>';
}echo '<br>'; 
for($h=11;$h<=20;$h++){
	echo '<button class="button-'.$h.'">'.$h.'</button>';
}
?>
<p>Provinsi <span class="neccesary">*</span></p>
                            <select class="input-line" name="prop" id="prop" onchange="ajaxkota(this.value)">
    <?php if($cc!=NULL){ $idp=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM provinsi where nama='$cc[prov]' ")); ?>
                              <option value="$idp['id_prov']"><sapn style="font-color:#428bca;"><?php echo $cc['prov']; ?></sapn></option><?php } ?>
					          <option value="">Pilih Provinsi</option>
					          <?php 
					          $query=$db->prepare("SELECT id_prov,nama FROM provinsi ORDER BY nama");
					          $query->execute();
					          while ($data=$query->fetchObject()){
					          echo '<option value="'.$data->id_prov.'">'.$data->nama.'</option>';
					          }
					          ?>
					        <select>
					        <p>Kabupaten / Kota <span class="neccesary">*</span></p>
                            <select class="input-line" name="kab" id="kota" onchange="ajaxkec(this.value)">
    <?php $idk=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kabupaten where nama='$cc[kab]' ")); ?>
                              <option value="$idk['id_kab']"><sapn style="font-color:#428bca;"><?php echo $cc['kab']; ?></sapn></option>
          
        					</select>
					        <p>Kecamatan <span class="neccesary">*</span></p>
                            <select class="input-line" name="kec" id="kec" onchange="ajaxkel(this.value)">
    <?php $idke=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kecamatan where nama='$cc[kec]' ")); ?>
                              <option value="$idke['id_kec']"><sapn style="font-color:#428bca;"><?php echo $cc['kec']; ?></sapn></option>
          
        					</select>
					        <p>Desa / Kelurahan <span class="neccesary">*</span></p>
                            <select class="input-line" name="kel" id="kel">
    <?php $idl=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM kelurahan where nama='$cc[kel]' ")); ?>
                              <option value="$idl['id_kel']"><sapn style="font-color:#428bca;"><?php echo $cc['kel']; ?></sapn></option>
          
        					</select>