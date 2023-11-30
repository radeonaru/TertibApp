<?php $redirect = "" ?>

<div class="container-fluid">
    <div class="row-auto flex-column flex-lg-row position-relative" style="">

        <div class="col-auto sidebar shadow-sm">
            <?php Helper::importView('partials/nav_dashboard.view.php');
            ?>
        </div>

        <main class="col-auto position-relative" style="height:200vh">
            <div class="container-fluid " title="main">
                <div class="row py-2 my-4">
                    <h1>Report</h1>
                    <div class="col-auto rounded-5 p-4 m-2">
                        <form action="<?= $redirect ?>" method="post">
                            <div class="row gap-5">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="title" class="form-label">Judul</label>
                                        <input type="text" class="form-control" id="title" placeholder="Masukkan judul">
                                    </div>
                                    <div class="mb-3">
                                        <label for="namaOrNim" class="form-label">Mahasiswa</label>
                                        <input type="text" class="form-control" id="nameOrNim" placeholder="Masukkan NIM atau Nama Mahasiswa">
                                    </div>
                                    <div class="mb-3">
                                        <label for="violationOfRules" class="form-label">Pilih Pelanggaran Tata Tertib</label>
                                        <input type="text" class="form-control" id="violationOfRules" placeholder="Pilih Pelanggaran Tata Tertib">
                                    </div>
                                    <div class="mb-3">
                                        <label for="Location" class="form-label">Masukkan Lokasi Pelanggaran</label>
                                        <input type="text" class="form-control" id="Location" placeholder="Masukkan Lokasi Pelanggaran">
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Lampiran Pelanggaran</label>
                                        <input class="form-control" type="file" id="formFile">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="deskripsi" class="form-label">Isi Pelanggaran</label>
                                        <textarea class="form-control" id="deskripsi" rows="3" placeholder="Isi Deskripsi Pelanggaran"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <p>Nb: Demi kenyamanan dan keamanan anda (Pelapor), data pribadi anda akan kami rahasiakan dan apabila mengandung informasi sensitif akan menjadi aduan pribadi (hanya dapat diakses melalui akun anda)</p>
                            </div>
                            <div class="row justify-content-end">
                                <button class="btn btn-secondary col-4 text-white" type="submit">Kirim Aduan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>