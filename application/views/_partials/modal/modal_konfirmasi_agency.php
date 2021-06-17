<div class="modal modal-blur fade" id="profileAgency" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Profil Agency</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" class="form" name="id_agency" readonly>
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
                            <div class="tab-pane active show" id="tabs-profile">
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="no_ktp" readonly>
                                    <label>No. KTP</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="nama_agency" readonly>
                                    <label>Nama Agency</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="nama_pemilik" readonly>
                                    <label>Nama Pemilik</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="email" name="email" readonly>
                                    <label>Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="no_wa" readonly>
                                    <label>No. WA</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="no_hp" readonly>
                                    <label>No. HP</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <textarea name="alamat" class="form form-control required" style="height: 120px" readonly></textarea>
                                    <label>Alamat</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="date" name="tgl_akad" readonly>
                                    <label>Tgl Akad</label>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-bank">
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="no_rek" readonly>
                                    <label for="no_rek">No. Rekening</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="nama_bank" readonly>
                                    <label for="nama_bank">Nama Bank</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="cabang_bank" readonly>
                                    <label for="cabang_bank">Cabang Bank</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="an_rek" readonly>
                                    <label for="an_rek">A.N Rekening</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input class='form form-control required' type="text" name="npwp" readonly>
                                    <label for="npwp">No. NPWP</label>
                                </div>
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
                    <button type="button" class="btn me-3 btn-danger btnCancel">
                        <svg width="24" height="24">
                            <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-x" />
                        </svg>
                    </button>
                    <button type="button" class="btn btn-success btnKonfirm">
                        <svg width="24" height="24">
                            <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-circle-check" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>