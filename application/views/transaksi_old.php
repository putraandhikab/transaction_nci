<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <center>
      <title>Transaksi Berhasil</title>
    </center>
  </head>
  <body>
    <div class="container mt-4">
      <h1>Transaksi</h1>
      <a href="<?= base_url() ?>transaksi" class="btn btn-primary">Kembali</a>
      <form>
        <div class="row">
          <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">No. Transaksi</label>
                <input type="text" class="form-control" value="<?= $no_transaksi ?>" name="no_transaksi" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Tgl. Transaksi</label>
                <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" value="<?= $tgl_transaksi ?>" name="tgl_transaksi" id="tgl_transaksi" aria-describedby="emailHelp" readonly>
            </div>
          </div>
          <div class="col-6">
            <div class="form-group">
                <label for="exampleInputEmail1">Customer</label>
                <input type="text" class="form-control" name="nama_customer" value="<?= $nama_customer ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Customer" readonly>
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <input type="text" class="form-control" name="alamat" value="<?= $alamat ?>" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Customer" readonly>
            </div>
          </div>
        </div>
        <div class="row">  
          <div class="col-6">
            <div class="form-group">
              <label for="exampleFormControlSelect1">Nama Barang</label>
              <select class="form-control" id="kode_barang" name="kode_barang" style="width: 400px">
                <option>-- Pilih --</option>
                <?php foreach($barang as $b) : ?>
                  <option value="<?= $b->kode_barang ?>"><?= $b->kode_barang ?> - <?= $b->nama_barang ?></option>
                <?php endforeach; ?>
              </select>
            </div>
          </div>
          <div class="col-6">
            <div class="d-inline-block form-group">
                <label for="exampleInputEmail1">QTY</label>
                <input type="number" class="form-control" id="qty" name="qty" style="width: 100px" aria-describedby="emailHelp" placeholder="QTY" autocomplete="off">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <!-- <a href="" onclick="addData()"><button class="btn btn-primary ml-2 mb-1">Submit</button></a> -->
          </div>
        </div>
        
        <table class="table mt-2">
          <thead class="thead-light" style="background-color: #D5E8D4">
            <tr>
              <th scope="col">No. urut</th>
              <th scope="col">Tgl. Trans</th>
              <th scope="col">Kode. BRG</th>
              <th scope="col">Nama BRG</th>
              <th scope="col">QTY</th>
              <th scope="col">Harga</th>
              <th scope="col">Sub Total</th>
            </tr>
          </thead>
          <tbody>
            
          </tbody>
        </table>
      </form>
    </div>

    <!-- <script>
      // Inisialisasi array untuk menyimpan data
      var dataArray = [];

      function addData() {
        var tgl_transaksi = document.getElementById('tgl_transaksi').value;
        var kode_barang = document.getElementById('kode_barang').value;
        var nama_barang = document.getElementById('kode_barang').value;
        var qty = document.getElementById('qty').value;

        if (inputData.trim() !== '' && inputData2.trim() !== '') {}
      }
    </script> -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>