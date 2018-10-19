<form action="" method="get">
hasil perkalian
<input type="text" name="nilaia" id="nilaia">
X
<input type="text" onkeyup="lihat();" name="nilaib" id="nilaib">
<input type="text" name="jumlah" id="jumlah">
</form>

<script type="text/javascript" language="javascript">
function lihat(){    
    var nilai_a = document.getElementById('nilaia').value;
    var nilai_b = document.getElementById('nilaib').value;

    var jumlah = parseInt(nilai_a) * parseInt(nilai_b);
    if(!isNaN(jumlah)){

    var hasil = document.getElementById('jumlah').value = jumlah;
    }

}
</script>