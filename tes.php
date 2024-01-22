<div class="panel">
    <div class="panel-heading">
        <h4>Dashboard</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading text-center" style="background-color: #3498db; color: #fff;">
                                <h1><i class="fas fa-user"></i></h1>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM users");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                                Jumlah Pelanggan
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-warning">
                            <div class="panel-heading text-center" style="background-color: #f39c12; color: #fff;">
                                <h1><i class="fas fa-retweet"></i></h1>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM buku");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                                Jumlah Cucian Di Proses
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-info">
                            <div class="panel-heading text-center" style="background-color: #3498db; color: #fff;">
                                <h1><i class="fas fa-info-circle"></i></h1>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM peminjaman");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                                Jumlah Cucian Siap Ambil
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-success">
                            <div class="panel-heading text-center" style="background-color: #2ecc71; color: #fff;">
                                <h1><i class="fas fa-check-circle"></i></h1>
                                <span class="pull-right">
                                    <?php
                                    $pelanggan = mysqli_query($koneksi, "SELECT * FROM kategoriBuku");
                                    echo mysqli_num_rows($pelanggan);
                                    ?>
                                </span>
                                Jumlah Cucian Selesai
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>