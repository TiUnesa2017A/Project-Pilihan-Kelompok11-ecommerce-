<?php require 'header.php'; ?><!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
<?php 
$BatasAwal = $contact['paging'];
    if (!empty($_GET['page'])) {
        $hal = $_GET['page'] - 1;
        $MulaiAwal = $BatasAwal * $hal;
    } else if (!empty($_GET['page']) and $_GET['page'] == 1) {
        $MulaiAwal = 0;
    } else if (empty($_GET['page'])) {
        $MulaiAwal = 0;
    }

if(empty($_GET['thiscategory'])){
    $pr=mysqli_query($con,"SELECT * FROM produk where stok>0 order by tanggal desc LIMIT $MulaiAwal , $BatasAwal ");
    $pg=mysqli_query($con,"SELECT * FROM produk where stok>0 ");
    $npr=mysqli_num_rows($pg);
    $cat="Semua Produk";   
} 
else{
    $tc=base64_decode($_GET['thiscategory']);
    $pr=mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$tc' and stok>0 order by tanggal desc LIMIT $MulaiAwal , $BatasAwal ");
    $pg=mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$tc' and stok>0 ");
    $npr=mysqli_num_rows($pg);
    $jp=mysqli_fetch_array(mysqli_query($con,"SELECT * FROM rkat_produk where id_kat_produk='$tc' "));
    $cat=$jp['kat_produk'];
}
?>
        <div class="content">
            <div class="container">
                <div class="all-products-details">
                    <div class="row">
                        <div class="col-md-7"><h2><?php echo $cat; ?></h2><span class="products-avalabile">Tersedia <?php echo $npr; ?> Produk</span></div>
                        <div class="col-md-5">
                            <div class="sort-dropdown float-right">
                                <span>Kategori Produk<i class="icon-515" title="515"></i></span>
                                <ul>
<?php //kategori produk
$tkp=mysqli_query($con,"SELECT * from rkat_produk order by kat_produk asc ");
while($rtkp=mysqli_fetch_array($tkp)) { $jp=mysqli_num_rows(mysqli_query($con,"SELECT * FROM produk where id_kat_produk='$rtkp[id_kat_produk]' and stok>0 ")); ?>
    <li><a href="product?thiscategory=<?php echo base64_encode($rtkp['id_kat_produk']); ?>"><?php echo $rtkp['kat_produk'].' ('.$jp.')'; ?></a></li>
    <?php }
?> 
                                </ul>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                <?php while($dui=mysqli_fetch_array($pr)) { ?>
                            <div class="col-md-3 col-xs-4">
                                <div class="product">
                                    <div class="product-cover">
                                        <div class="product-cover-hover"><span><a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>">Detail</a></span></div>
                                        <img style="width:300px;height:230px;" src="control/<?php echo $dui['gambar']; ?>" alt="product name" />
                                    </div>    
                                    <div class="product-details">    
                                        <a href="detailproduct?thisproduct=<?php echo base64_encode($dui['id_produk']) ?>&nameproduct=<?php echo $dui['nama']; ?>"><h1 style="font-size:80%;"><?php echo $dui['nama']; ?></h1></a>
                                        <p><?php echo substr($dui['deskripsi'], 0,50); ?>...</p>
                                        <div class="product-price">
                                            <button style="float:right;" class="btn btn-xs btn-info">Stok <?php echo rp($dui['stok']); ?></button>
                                            <div style="font-size:18px;"><?php echo 'Rp. '. rp($dui['harga']); ?></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                <?php } ?>            
                        </div>
                        <ul class="page-numbers">
<?php $cekQuery = $pg;
    $jumlahData = mysqli_num_rows($cekQuery);
    if ($jumlahData > $BatasAwal) {
        echo '<br/><center><div style="font-size:10pt;">Halaman : ';
        $a = explode(".", $jumlahData / $BatasAwal);
        $b = $a[0];
        $c = $b + 1;
        for ($i = 1; $i <= $c; $i++) {
            echo '<li><a class="page-numbers" style="';
            if ($_GET['page'] == $i) {
                echo 'color:red';
            }
            if(empty($_GET['thiscategory'])){
            echo '" href="?page=' . $i . '">' . $i . '</a> /</li>';
            }
            else{
             echo '" href="?thiscategory='.base64_encode($tc).'&page=' . $i . '">' . $i . '</a> /</li>';
            }
        }
    }
?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->f
<?php require 'footer.php'; ?>
