<div class="modal modal-blur fade" id="addLac" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah LAC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="formAddLac">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_lac" class="form-control form-control-sm required">
                        <label class="col-form-label">Nama LAC</label>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn me-3" data-bs-dismiss="modal">Tutup</button>
                    <button type="button" class="btn btn-primary btnTambah">Tambah</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal modal-blur fade" id="detailLac" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail LAC</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <input type="hidden" name="id_lac">
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
                            <a href="#tabs-link" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-user-aktif" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-check" />
                                </svg>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#tabs-user-nonaktif" class="nav-link" data-bs-toggle="tab">
                                <svg width="24" height="24">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user-off" />
                                </svg>
                            </a>
                        </li>
                    </ul>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tabs-profile">
                                <div id="edit">
                                    <input type="hidden" name="id_lac">
                                    <div class="form-floating mb-3">
                                        <input class='form-control required' type="text" name="nama_lac">
                                        <label for="nama_lac">Nama LAC</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <select name="status" class="form-control required">
                                            <option value="">Pilih Status</option>
                                            <option value="aktif">Aktif</option>
                                            <option value="nonaktif">Nonaktif</option>
                                        </select>
                                        <label for="">Status</label>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-success btnEdit">Edit</button>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-link">
                                <div class="form-floating mb-3">
                                    <textarea class='form-control' name="link" id="copy" style="height: 100px" readonly></textarea>
                                    <label for="link">Link</label>
                                </div>
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success" onclick="copyText()">
                                        Copy text
                                    </button>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-user-aktif">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Marketing Aktif <span class="badge bg-primary" id="countMarketingAktif"></span></h3>
                                    </div>
                                    <div class="list-group list-group-flush">
                                        <div id="marketing-aktif"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="tabs-user-nonaktif">
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