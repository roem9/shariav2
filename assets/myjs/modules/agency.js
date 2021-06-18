// akad agency 
$(document).on("click", ".akadAgency", function(){
    let id_agency = $(this).data("id");
    detailAkad(id_agency)
})

// tambah akad 
$(document).on("click", "#akadAgency .btnTambah", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan akad?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#akadAgency";
            
            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            let eror = required(form);

            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = formData;

                let result = ajax(url_base+"agency/add_akad", "POST", data);

                if(result == 1){
                    loadData();

                    $("#akadAgency #form").trigger("reset");
                    
                    detailAkad(formData.id_agency);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan akad agency',
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

// profil agency 
$(document).on("click", ".profileAgency", function(){
    let form = "#profileAgency";

    if(level != "Super Admin"){
        $(form+" .form-control").prop("readonly", true);
        $(form+" .btnEdit").hide();
    }

    let id_agency = $(this).data("id");
    let data = {id_agency: id_agency};
    let result = ajax(url_base+"agency/get_agency", "POST", data)
    
    if(level == "Keuangan"){
        $.each(result, function(key, value){
            if(key == "npwp" && value != "") $(form+" [name='"+key+"']").val(npwp(value));
            else $(form+" [name='"+key+"']").val(value);
        })
    } else {
        $.each(result, function(key, value){
            $(form+" [name='"+key+"']").val(value);
        })
    }
})

// edit agency
$(document).on("click", "#profileAgency .btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data agency?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#profileAgency";
            
            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = formData;
                
                let result = ajax(url_base+"agency/edit_agency", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data agency',
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

// detail agency 
$(document).on("click", ".detailAgency", function(){
    let form = "#detailAgency";

    let id_agency = $(this).data("id");
    let data = {id_agency:id_agency};
    let result = ajax(url_base+"agency/get_detail_agency", "POST", data);

    $(form+" .modal-title").html(result.agency.nama_agency)
    $(form+" #countMarketingAktif").html(result.marketing.aktif.length)
    $(form+" #countMarketingNonaktif").html(result.marketing.nonaktif.length)
    $(form+" [name='link']").html(result.agency.link)

    $(".link").html(`
        <button type="button" class="copyLink btn btn-success" data-clipboard-text="`+result.agency.link1+`">
            `+icon("me-1", "copy")+`
            Salin Link 3 Bulan
        </button>
        <button type="button" class="copyLink btn btn-success" data-clipboard-text="`+result.agency.link2+`">
            `+icon("me-1", "copy")+`
            Salin Link 6 Bulan
        </button>
        <button type="button" class="copyLink btn btn-success" data-clipboard-text="`+result.agency.link3+`">
            `+icon("me-1", "copy")+`
            Salin Link 1 Tahun
        </button>
    `);

    html = "";
    if(result.marketing.aktif.length != 0) {
        result.marketing.aktif.forEach(function(data){
            html += `
            <div class="list-group-item">
                <div class="row align-items-center">
                    <label>
                        `+data.nama_marketing+`
                    </label>
                </div>
            </div>`
        })
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
})

clipboard = new ClipboardJS('.copyLink', {
    container: document.getElementById('detailAgency')
});

clipboard.on('success', function(e) {
    Swal.fire({
        icon: "success",
        text: "Berhasil menyalin link",
        showConfirmButton: false,
        timer: 1500
    })
});

// modal gambar 
$(document).on("click", ".uploadGambar", function(){
    let id_agency = $(this).data("id");
    
    detail_gambar(id_agency)
})

// tambah gambar 
$("#uploadGambar .btnTambah").click(function(){
    let form = "#uploadGambar";

    var fd = new FormData();
    var files = $('#file')[0].files;
    
    // Check file selected or not
    if(files.length > 0 ){
        Swal.fire({
            icon: 'question',
            text: 'Yakin akan menambahkan gambar baru?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function (result) {
            if (result.value) {
                fd.append('file',files[0]);
                fd.append('id_agency', $(form+" input[name='id_agency']").val())

                let eror = required(form);

                loading();

                if( eror == 1){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'lengkapi isi form terlebih dahulu'
                    })
                } else {
                    $.ajax({
                        url: url_base+'agency/upload_data',
                        type: 'post',
                        //   data: {fd, nama_audio:nama_audio},
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response){

                            if(response == 1){
                                
                                detail_gambar($(form+" [name='id_agency']").val())
                                $(form+" .myform").trigger("reset");
                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    text: 'Berhasil mengupload file',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else if(response == 2){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    text: 'Gagal mengupload file. Format file harus PNG, JPG atau JPEG',
                                    // showConfirmButton: false,
                                    // timer: 1500
                                })
                            } else if(response == 0){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    text: 'Gagal mengupload file',
                                    // showConfirmButton: false,
                                    // timer: 1500
                                })
                            }

                            loadData();

                        },
                    });
                }
            }
        })
    }else{
        Swal.fire({
            position: 'center',
            icon: 'error',
            text: 'Pilih file terlebih dahulu',
            showConfirmButton: false,
            timer: 1500
        })
    }
});

$(document).on("click", ".uploadLogo", function(){
    let form = "#uploadLogo";
    let id_agency = $(this).data("id");

    let result = ajax(url_base+"agency/get_agency", "POST", {id_agency:id_agency});
    $(form+" .modal-title").html(result.nama_agency);
    $(form+" [name='id_agency']").val(result.id_agency);

    html = `
    <div class="d-block mb-3">
        <img src="`+url_base+`assets/logo/`+result.id_agency+`.png?t=`+Math.random()+`" onerror="this.onerror=null; this.src='`+url_base+`assets/tabler-icons-1.39.1/icons/x.svg'" class="card-img-top" width=100%>
    </div>`;

    $(form+" .gallery").html(html)
})

$("#uploadLogo .btnUpload").click(function(){
    let form = "#uploadLogo";

    var fd = new FormData();
    var files = $(form+' [name="file"]')[0].files;
    
    // Check file selected or not
    if(files.length > 0 ){
        Swal.fire({
            icon: 'question',
            text: 'Yakin akan mengupload logo?',
            showCloseButton: true,
            showCancelButton: true,
            confirmButtonText: 'Ya',
            cancelButtonText: 'Tidak'
        }).then(function (result) {
            if (result.value) {
                fd.append('file',files[0]);
                fd.append('id_agency', $(form+" input[name='id_agency']").val())

                let eror = required(form);

                loading();

                if( eror == 1){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'lengkapi isi form terlebih dahulu'
                    })
                } else {
                    $.ajax({
                        url: url_base+'agency/upload_logo',
                        type: 'post',
                        //   data: {fd, nama_audio:nama_audio},
                        data: fd,
                        contentType: false,
                        processData: false,
                        success: function(response){

                            if(response == 1){
                                $(form).modal("hide");
                                $(form+" .myform").trigger("reset");

                                Swal.fire({
                                    position: 'center',
                                    icon: 'success',
                                    text: 'Berhasil mengupload logo',
                                    showConfirmButton: false,
                                    timer: 1500
                                })
                            } else if(response == 2){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    text: 'Gagal mengupload file. Format file harus PNG',
                                    // showConfirmButton: false,
                                    // timer: 1500
                                })
                            } else if(response == 0){
                                Swal.fire({
                                    position: 'center',
                                    icon: 'error',
                                    text: 'Gagal mengupload file',
                                    // showConfirmButton: false,
                                    // timer: 1500
                                })
                            }

                            loadData();

                        },
                    });
                }
            }
        })
    }else{
        Swal.fire({
            position: 'center',
            icon: 'error',
            text: 'Pilih file terlebih dahulu',
            showConfirmButton: false,
            timer: 1500
        })
    }
});

$(document).on("keyup", "input[name='search']", function(){
    loadMobile(0);
})

function detailAkad(id_agency){
    let form = "#akadAgency";
    
    let data = {id_agency: id_agency};
    let result = ajax(url_base+"agency/get_agency", "POST", data)

    $(form+" .modal-title").html(result.nama_agency)
    $(form+" [name='id_agency']").val(result.id_agency)

    result = ajax(url_base+"agency/get_akad", "POST",data);

    html = ""
    if(result.length != 0){
        result.forEach(function(data){
            html += `
                <div class="list-group-item">
                    <div class="row align-items-center">
                            <p>
                                <svg width="24" height="24">
                                    <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                                </svg>
                                `+data.tgl_akad+`
                            </p>
                            <p>
                                <svg width="24" height="24">
                                    <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                                </svg>
                                `+data.doc+`
                            </p>
                            <div class="d-flex justify-content-between">
                                <input type="hidden" id="link`+data.id_akad+`" value="`+url_base+`akad/agency/`+data.link+`">
                                <button type="button" class="btn btn-success btnLink" data-id="`+data.id_akad+`">
                                    <svg width="24" height="24">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                                    </svg>
                                    Link
                                </button>
                                <a href="`+url_base+`akad/agency/`+data.link+`" target="_blank" class="btn btn-primary">
                                    <svg width="24" height="24">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-text" />
                                    </svg>
                                    Akad
                                </a>
                            </div>
                    </div>
                </div>`
        })
    } else {
        html += `<div class="empty">
            <p class="empty-title">List Kosong</p>
        </div>`
    }

    $("#akad").html(html)
}

function detail_gambar(id_agency){
    form = "#uploadGambar";
    let data = {id_agency: id_agency};
    let result = ajax(url_base+"agency/get_agency", "POST", data)

    $(form+" .modal-title").html(result.nama_agency)
    $(form+" [name='id_agency']").val(result.id_agency)

    result = ajax(url_base+"agency/get_image", "POST",data);

    html = ""
    if(result.length != 0){
        result.forEach(function(data){
            // html += `<a href="#" class="d-block mb-3"><img src="`+url_base+`assets/myimg/`+data.nama_file+`" class="card-img-top"></a>`
            html += `
                <div class="d-block mb-3">
                    <img src="`+url_base+`assets/myimg/`+data.nama_file+`" onerror="this.onerror=null; this.src='`+url_base+`assets/tabler-icons-1.39.1/icons/photo-off.svg'" class="card-img-top">
                </div>
            `
        })
    } else {
        html += `<div class="empty">
            <p class="empty-title">List Kosong</p>
        </div>`
    }

    $("#gallery").html(html)
}

$(document).on("click", ".btnLink", function(){
    let id = $(this).data("id");

    var copyText = document.getElementById("link"+id);
    copyText.type = 'text';
    copyText.select();
    document.execCommand("copy");
    copyText.type = 'hidden';
    Swal.fire({
        icon: "success",
        text: "Berhasil menyalin link",
        showConfirmButton: false,
        timer: 1500
    })
})

$(document).on("click", "input[name='id_batch']", function(){
    let id_batch = $(this).val();
    if($(this).is(":checked")) data = {id_batch:id_batch, status:1}
    else if($(this).is(":not(:checked)")) data = {id_batch:id_batch, status:0}

    let result = ajax(url_base+"agency/change_status_batch", "POST", data);
})