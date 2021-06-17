// add lac 
$(document).on("click", ".btnTambah", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan LAC?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#addLac";
            let nama_lac = $(form+" input[name='nama_lac']").val();

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = {nama_lac: nama_lac}
                let result = ajax(url_base+"lac/add_lac", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan LAC',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan'
                    })
                }
            }
        }
    })

})

// detail lac 
$(document).on("click", ".detailLac", function(){
    let id_lac = $(this).data("id");

    detail_lac(id_lac)

})

$(document).on("click", ".btnPindahkan", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan memindahkan marketing?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result){
        if(result.value){
            var minimalSatuCheckbox = $('input[name="id_marketing"]:checked').length;
            if(minimalSatuCheckbox == 0){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'pilih marketing yang akan dipindahkan terlebih dahulu'
                })
            } else {
                let form = "#detailLac"
                let id_marketing = [];
                $.each($("input[name='id_marketing']:checked"), function(){
                    id_marketing.push($(this).val())
                })

                lac = $(form+" select[name='lac']").val()
                let eror = required(form);

                if(eror == 0){
                    data = {id_marketing:id_marketing, id_lac:lac}
                    let result = ajax(url_base+"lac/pindah_lac", "POST", data)

                    if(result == 1){
                        loadData();
                        

                        id_lac = $(form+" input[name='id_lac']").val()
                        detail_lac(id_lac)

                        Swal.fire({
                            icon: 'success',
                            text: 'Berhasil memindahkan marketing',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }

                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'lengkapi form terlebih dahulu'
                    })
                }

            }
        }
    })
})

// edit lac 
$(document).on("click", "#detailLac .btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data lac?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#detailLac #edit";
            let id_lac = $(form+" input[name='id_lac']").val()
            let nama_lac = $(form+" input[name='nama_lac']").val()
            let status = $(form+" select[name='status']").val()

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = {id_lac: id_lac, nama_lac: nama_lac, status: status}
                let result = ajax(url_base+"lac/edit_lac", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data lac',
                        showConfirmButton: false,
                        timer: 1500
                    })
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'terjadi kesalahan'
                    })
                }
            }
        }
    })
})

$(document).on("keyup", "input[name='search']", function(){
    loadMobile(0);
})

function loadData(){
    if(jQuery.browser.mobile == true){
        loadMobile(page);
    } else {
        datatable.ajax.reload(null,false); //reload datatable ajax 
    }
}

function detail_lac(id_lac){
    let form = "#detailLac";
    let data = {id_lac:id_lac}
    let result = ajax(url_base+"lac/get_detail_lac", "POST", data);

    $(form+" input[name='id_lac']").val(result.lac.id_lac)
    $(form+" input[name='nama_lac']").val(result.lac.nama_lac)
    $(form+" select[name='status']").val(result.lac.status)
    $(form+" textarea[name='link']").html(result.lac.link)
    // remove form pindah lac 
    $(form+" #formPindah").remove();

    $(form+" #countMarketingAktif").html(result.marketing.aktif.length)
    $(form+" #countMarketingNonaktif").html(result.marketing.nonaktif.length)

    html = "";
    if(result.marketing.aktif.length != 0) {
        result.marketing.aktif.forEach(function(data){
            html += `
            <div class="list-group-item">
                <div class="row align-items-center">
                    <label>
                        <input type="checkbox" name="id_marketing" class="form-check-input me-2" value="`+data.id_marketing+`"> `+data.nama_marketing+`
                    </label>
                </div>
            </div>`
        })
        
        let option = "";
        let lac = ajax(url_base+"lac/get_all");
        lac.forEach(function(lac){
            option += `<option value="`+lac.id_lac+`">`+lac.nama_lac+`</option>`
        })

        $(`
            <div id="formPindah">
                <div class="form-floating mb-3 mt-3">
                    <select name="lac" class="form-control required">
                        <option value="">Pilih LAC</option>
                        `+option+`
                    </select>
                    <label for="">Pindahkan Marketing ke</label>
                </div>
                <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success btnPindahkan">Pindahkan</button>
                </div>
            </div>
            `).insertAfter("#tabs-user-aktif .card");

    } else {
        html += `
        <div class="empty">
            <p class="empty-title">List Kosong</p>
        </div>`;
    }

    $('#marketing-aktif').html(html);

    html = "";
    if(result.marketing.nonaktif.length != 0) {
        result.marketing.nonaktif.forEach(function(data){
            html += `
            <div class="list-group-item">
                <div class="row align-items-center">
                    `+data.nama_marketing+`
                </div>
            </div>`
        })
    } else {
        html += `
        <div class="empty">
            <p class="empty-title">List Kosong</p>
        </div>`;
    }

    $('#marketing-nonaktif').html(html);
}