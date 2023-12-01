<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Transaksi</title>
  </head>
  <body>
    <div class="container mt-4">
      <h1>Transaksi</h1>
      <form method="post" action="<?= base_url() ?>transaksi/hitung_transaksi">
        <div class="form-group">
            <label for="exampleInputEmail1">No. Transaksi</label>
            <input type="text" class="form-control" value="<?= $id_transaksi ?>" name="no_transaksi" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Tgl. Transaksi</label>
            <input type="date" class="form-control" min="<?= date('Y-m-d'); ?>" value="<?= date('Y-m-d'); ?>" name="tgl_transaksi" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Nama Customer</label>
            <input type="text" class="form-control" name="nama_customer" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Customer">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Alamat</label>
            <input type="text" class="form-control" name="alamat" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Customer">
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
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>