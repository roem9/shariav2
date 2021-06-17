<div class="modal modal-blur fade" id="akadAgency" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency">
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
                                    <input type="hidden" class="form" name="id_agency">
                                    <div class="form-floating mb-3">
                                        <input class='form form form-control required' type="date" name="tgl_akad">
                                        <label>Tgl Akad</label>
                                    </div>
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

<div class="modal modal-blur fade" id="profileAgency" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Agency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-profile" class="nav-link active" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-bank" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-coin" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-profile">
                                <div class="form-floating mb-3">
                                    <select name="status" class="form form-control required">
                                        <option value="">Pilih Status</option>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                    </select>
                                    <label>Status</label>
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
                            </div>
                            <div class="tab-pane" id="tabs-bank">
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
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailAgency" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-link" class="nav-link active" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-marketing-aktif" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-check" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-marketing-nonaktif" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-off" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-link">
                                <div class="d-grid gap-2 link">
                                </div>
                                <!-- <button type="button" class="copy btn btn-success" data-clipboard-text="`+result.agency.link1+`">
                                    `+icon("me-1", "copy")+`
                                    Salin Link 3 Bulan
                                </button> -->
                                <!-- <div class="form-floating mb-3">
                                    <textarea name="link" id="copy" class="form-control" style="height:100px" readonly></textarea>
                                    <label>Link Marketing</label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success" onclick="copyText()">
                                        Copy text
                                    </button>
                                </div> -->
                            </div>
                            <div class="tab-pane" id="tabs-marketing-aktif">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Marketing Aktif <span class="badge bg-primary" id="countMarketingAktif"></span></h3>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div id="marketing-aktif"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-marketing-nonaktif">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Marketing Nonaktif <span class="badge bg-primary" id="countMarketingNonaktif"></span></h3>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div id="marketing-nonaktif"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-auto" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="uploadGambar" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency">
                <div class="card">
                    <ul class="nav nav-tabs" data-bs-toggle="tabs">
                        <li class="nav-item">
                            <a href="#tabs-upload" class="nav-link active" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-upload" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-photo" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-photo" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-upload">
                                <form method="post" action="" enctype="multipart/form-data" class="myform">
                                    <input type="hidden" name="id_agency">
                                    <div class="form-floating mb-3">
                                        <input type="file" name="file" id="file" class="form-control required">
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="tabs-photo">
                                <div class="card">
                                    <div class="list-group list-group-flush">
                                        <div id="gallery"></div>
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

<div class="modal modal-blur fade" id="uploadLogo" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency">
                <div class="list-group list-group-flush">
                    <div class="gallery"></div>
                </div>
                <?php if($this->session->userdata("level") == "Super Admin") :?>
                    <div class="alert alert-important alert-info alert-dismissible" role="alert">
                        <div class="d-flex">
                            <div>
                                <svg width="24" height="24" class="alert-icon">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-info-circle" />
                                </svg>
                            </div>
                            <div>
                                Anda dapat mengubah logo agency dengan mengupload file melalui form berikut
                            </div>
                        </div>
                    </div>
                    <form method="post" action="" enctype="multipart/form-data" class="myform">
                        <input type="hidden" name="id_agency">
                        <div class="form-floating mb-3">
                            <input type="file" name="file" class="form-control required">
                        </div>
                    </form>
                <?php endif;?>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-dismiss="modal">Tutup</button>
                    <?php if($this->session->userdata("level") == "Super Admin") :?>
                        <button type="button" class="btn ms-3 btn-primary btnUpload">Upload</button>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
</div>