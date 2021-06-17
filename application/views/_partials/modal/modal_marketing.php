<div class="modal modal-blur fade" id="detailMarketing" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Marketing</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-profile" class="nav-link active" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/home -->
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-bank" class="nav-link" data-bs-toggle="tab"><!-- Download SVG icon from http://tabler-icons.io/i/user -->
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-coin" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <input type="hidden" class="form" name="id_marketing">
                            <div class="tab-pane active show" id="tabs-profile">
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
                                    <input class='form form-control required' type="date" name="tgl_masuk">
                                    <label for="tgl_masuk">Tgl Masuk</label>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-bank">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnEdit ms-3">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="akadMarketing" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_marketing">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-add" class="nav-link active" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-upload" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-list" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-files" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-add">
                                <form id="form">
                                    <input type="hidden" class="form" name="id_marketing">
                                    <div class="form-floating mb-3">
                                        <input class='form form form form-control required' type="date" name="tgl_akad">
                                        <label>Tgl Akad</label>
                                    </div>

                                    <?php if($table == "marketing_agency") :?>
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
                                    
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabs-list">
                                <div class="card">
                                    <div class="list-group list-group-flush">
                                        <div id="akad"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>