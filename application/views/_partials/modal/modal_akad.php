<div class="modal modal-blur fade" id="detailAkadMarketing" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Akad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_akad" class="form">
                <input type="hidden" name="table" class="form">
                
                <?php if($table == 'marketing_agency') :?>
                    <div class="form-floating mb-3">
                        <select name="periode" class="form form-control required">
                            <option value="">Pilih Periode</option>
                            <option value="3">3 Bulan</option>
                            <option value="6">6 Bulan</option>
                            <option value="12">1 Tahun</option>
                        </select>
                        <label>Periode</label>
                    </div>
                <?php endif;?>

                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_marketing">
                    <label for="nama_marketing">Nama Marketing</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_ktp">
                    <label>No. KTP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="domisili">
                    <label>Domisili</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="alamat" class="form form-control required" style="height: 100px"></textarea>
                    <label for="alamat">Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="email">
                    <label for="email">Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_wa">
                    <label for="no_wa">No. WA</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_hp">
                    <label for="no_hp">No. HP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="date" name="tgl_akad">
                    <label for="tgl_akad">Tgl Akad</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_bank">
                    <label for="nama_bank">Nama Bank</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="cabang_bank">
                    <label for="cabang_bank">Cabang Bank</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_rek">
                    <label for="no_rek">No. Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="an_rek">
                    <label for="an_rek">A.N Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_npwp">
                    <label for="npwp">No. NPWP</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailAkadAgency" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Akad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_akad" class="form">
                <input type="hidden" name="table" class="form">
                <div class="form-floating mb-3">
                    <select name="waktu" class="form form-control required">
                        <option value="">Pilih Waktu</option>
                        <option value="1 (satu)">1 Tahun</option>
                        <option value="2 (dua)">2 Tahun</option>
                        <option value="3 (tiga)">3 Tahun</option>
                        <option value="4 (empat)">4 Tahun</option>
                    </select>
                    <label>Kurun Waktu</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_ktp">
                    <label>No. KTP</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_agency">
                    <label>Nama Agency</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_pemilik">
                    <label>Nama Pemilik</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="email" name="email">
                    <label>Email</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_wa">
                    <label>No. WA</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_hp">
                    <label>No. HP</label>
                </div>
                <div class="form-floating mb-3">
                    <textarea name="alamat" class="form form-control required" style="height: 100px"></textarea>
                    <label>Alamat</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="date" name="tgl_akad">
                    <label>Tgl Akad</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="no_rek">
                    <label for="no_rek">No. Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="nama_bank">
                    <label for="nama_bank">Nama Bank</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="cabang_bank">
                    <label for="cabang_bank">Cabang Bank</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="an_rek">
                    <label for="an_rek">A.N Rekening</label>
                </div>
                <div class="form-floating mb-3">
                    <input class='form form-control required' type="text" name="npwp">
                    <label for="npwp">No. NPWP</label>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>