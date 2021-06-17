<div class="modal modal-blur fade" id="addBatch" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="user" id="formAddBatch">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nama Batch</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="no_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nomor Batch</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Tgl Batch</label>
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

<div class="modal modal-blur fade" id="editBatch" data-backdrop="static" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Detail Batch</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="id_batch" class="form">
                <form class="user" id="formEditBatch">
                    <div class="form-floating mb-3">
                        <input type="text" name="nama_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nama Batch</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="no_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Nomor Batch</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="date" name="tgl_batch" class="form form-control form-control-sm required">
                        <label class="col-form-label">Tgl Batch</label>
                    </div>
                </form>
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