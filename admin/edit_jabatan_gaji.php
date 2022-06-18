<?php
require_once "../templates/sidebar.php";

//simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
$id = $_GET['id'];

// hasil dari proses result akan disimpan ke variabel data
$data = query("SELECT * FROM pegawai INNER JOIN jabatan_gaji ON pegawai.id_jabatan_gaji=jabatan_gaji.id_jabatan_gaji WHERE nip='$id'");

$data_jabatan = array("Staff Marketing", "Staff IT", "Security");
?>

<div class="container-fluid">
    <div class="col-md-9 ms-sm-auto col-lg-10 pt-4 pb-1 px-3 d-flex align-items-center fs-6 bread">
        <nav aria-label="breadcrumb fs-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?= adm_url('jabatan_gaji') ?>">Data Jabatan dan Gaji</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit Data</li>
            </ol>
        </nav>
    </div>

    <div class="card col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="card-body">
            <form method="POST" action="<?= base_url('config/proses_jabatan_gaji') ?>?edit">
                <div class="form-group row mb-2">
                    <label for="id" class="col-sm-3 col-form-label">Pegawai</label>
                    <div class="col-sm-9">
                        <input type="hidden" name="id" id="id" class="form-control" value="<?= $data[0]['id_jabatan_gaji'] ?>">
                        <input type="hidden" name="nip" id="nip" class="form-control" value="<?= $data[0]['nip'] ?>">
                        <input type="text" name="id2" id="id2" class="form-control" value="<?= ucwords($data[0]['nama_pegawai']) . ' - ' . $data[0]['nip'] ?>" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="jabatan" class="col-sm-3 col-form-label">Pilih Jabatan</label>
                    <div class="col-sm-9">
                        <select class="form-control" name="jabatan" id="jabatan" required autocomplete="off" autofocus onchange="jabatanFunc(this.options[this.selectedIndex].value)">
                            <?php
                            foreach ($data_jabatan as $jabatan) : ?>
                                <option value="<?= $jabatan ?>"><?= $jabatan ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="gaji_pokok" class="col-sm-3 col-form-label">Gaji Pokok</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="gajipokok" id="gaji_pokok" value="4000000" readonly></input>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="gaji_lembur" class="col-sm-3 col-form-label">Gaji Lembur</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" name="gajilembur" id="gaji_lembur" value="500000" readonly></input>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="tmt" class="col-sm-3 col-form-label">Dari Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="tmt" required>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label for="sampai_tgl" class="col-sm-3 col-form-label">Sampai Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" class="form-control" value="<?= date('Y-m-d'); ?>" name="st" required>
                    </div>
                </div>
            </div>
            <div class="card-footer" style="background-color: #ffffff;">
                <button type="submit" class="btn btn-success"><i class='bx bx-save'></i> Simpan</button>
            </div>
        </form>
    </div>
</div>

<script>
    var dataJabatan = {
        "Staff Marketing": [4000000, 500000],
        "Staff IT": [10000000, 700000],
        "Security": [3000000, 500000]
    };

    function jabatanFunc(x) {
        var pokok = dataJabatan[x][0];
        var lembur = dataJabatan[x][1];
        document.getElementById("gaji_pokok").setAttribute("value", pokok);
        document.getElementById("gaji_lembur").setAttribute("value", lembur);
    }
</script>