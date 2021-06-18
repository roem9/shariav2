// detail marketing 
$(document).on("click", ".detailMarketing", function(){
    let form = "#detailMarketing";

    if(level != "Super Admin"){
        $(form+" .form-control").prop("readonly", true);
        $(form+" .btnEdit").hide();
    }
    
    let id_marketing = $(this).data("id");

    let data = {id_marketing:id_marketing, table:table}
    let result = ajax(url_base+"marketing/get_marketing", "POST", data);

    if(level == "Keuangan"){
        $.each(result, function(key, value){
            if(key == "no_npwp" && value != "") $(form+" [name='"+key+"']").val(npwp(value));
            else $(form+" [name='"+key+"']").val(value);
        })
    } else {
        $.each(result, function(key, value){
            $(form+" [name='"+key+"']").val(value);
        })
    }

})

// edit marketing 
$(document).on("click", ".btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data tes?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#detailMarketing";

            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()});
            })

            formData = Object.assign(formData, {table:table})

            // let id_marketing = $(form+" input[name='id_marketing']").val()
            // let nama_marketing = $(form+" input[name='nama_marketing']").val()
            // let alamat = $(form+" textarea[name='alamat']").val()
            // let email = $(form+" input[name='email']").val()
            // let no_wa = $(form+" input[name='no_wa']").val()
            // let no_hp = $(form+" input[name='no_hp']").val()
            // let tgl_masuk = $(form+" input[name='tgl_masuk']").val()
            // let nama_bank = $(form+" input[name='nama_bank']").val()
            // let cabang_bank = $(form+" input[name='cabang_bank']").val()
            // let no_rek = $(form+" input[name='no_rek']").val()
            // let an_rek = $(form+" input[name='an_rek']").val()
            // let no_npwp = $(form+" input[name='no_npwp']").val()

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                // data = {table:table, id_marketing:id_marketing, nama_marketing:nama_marketing, alamat:alamat, email:email, no_wa:no_wa, no_hp:no_hp, tgl_masuk:tgl_masuk, nama_bank:nama_bank, cabang_bank:cabang_bank, no_rek:no_rek, an_rek:an_rek, no_npwp:no_npwp}
                data = formData;
                let result = ajax(url_base+"marketing/edit_marketing", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data marketing',
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

$(document).on("click", ".arsipMarketing", function(){
    let id_marketing = $(this).data("id");

    Swal.fire({
        icon: 'question',
        text: 'Yakin akan mengarsipkan data marketing ini?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            data = {id_marketing: id_marketing, table: table}
            let result = ajax(url_base+"marketing/arsip", "POST", data);

            if(result == 1){
                loadData();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: 'Berhasil mengarsipkan data marketing',
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
    })
})

$(document).on("click", ".bukaArsipMarketing", function(){
    let id_marketing = $(this).data("id");

    Swal.fire({
        icon: 'question',
        text: 'Yakin akan membuka arsip data marketing ini?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            data = {id_marketing: id_marketing, table: table}
            let result = ajax(url_base+"marketing/buka_arsip", "POST", data);

            if(result == 1){
                loadData();

                Swal.fire({
                    position: 'center',
                    icon: 'success',
                    text: 'Berhasil membuka arsip data marketing',
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
    })
})

$(document).on("click", ".akadMarketing", function(){
    let id = $(this).data("id");
    detailMarketing(id);
})


$(document).on("click", "#akadMarketing .btnTambah", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan akad?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#akadMarketing";
            
            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()})
            })

            formData = Object.assign(formData, {table: table})

            let eror = required(form);

            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                data = formData;

                let result = ajax(url_base+"marketing/add_akad", "POST", data);

                if(result == 1){
                    loadData();

                    $("#akadMarketing #form").trigger("reset");
                    
                    detailMarketing(formData.id_marketing);

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan akad marketing',
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

function detailMarketing(id_marketing){
    let form = "#akadMarketing";
    
    let data = {id_marketing: id_marketing, table:table};
    let result = ajax(url_base+"marketing/get_marketing", "POST", data)

    console.log(result)

    $(form+" .modal-title").html(result.nama_marketing)
    $(form+" [name='id_marketing']").val(result.id_marketing)

    result = ajax(url_base+"marketing/get_akad", "POST",data);

    html = ""
    if(result.length != 0){
        result.forEach(function(data){
            if(table == "marketing_si") link = "si";
            else link = "agency";

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
                                <input type="hidden" id="link`+data.id_akad+`" value="`+url_base+`akad/marketing/`+link+`/`+data.link+`">
                                <button type="button" class="btn btn-success btnLink"  data-id="`+data.id_akad+`">
                                    <svg width="24" height="24">
                                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                                    </svg>
                                    Link
                                </button>
                                <a href="`+url_base+`akad/marketing/`+link+`/`+data.link+`" target="_blank" class="btn btn-primary">
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