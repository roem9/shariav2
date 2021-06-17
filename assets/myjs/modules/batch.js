// add lac
$(document).on("click", ".btnTambah", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menambahkan Batch?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#addBatch";

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                
                let formData = {};
                $(form+" .form").each(function(index){
                    formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()});
                })

                let result = ajax(url_base+"agency/add_batch", "POST", formData);

                if(result == 1){
                    loadData();

                    $("#formAddBatch").trigger("reset");
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil menambahkan Batch',
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

$(document).on("click", ".editBatch", function(){
    let form = "#editBatch";

    let id_batch = $(this).data("id");
    let data = {id_batch: id_batch};
    let result = ajax(url_base+"agency/get_batch", "POST", data)
    
    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })
})

// edit lac
$(document).on("click", "#editBatch .btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data batch?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#editBatch";

            let eror = required(form);
            
            if( eror == 1){
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'lengkapi isi form terlebih dahulu'
                })
            } else {
                let formData = {};
                $(form+" .form").each(function(index){
                    formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()});
                })

                let result = ajax(url_base+"agency/edit_batch", "POST", formData);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data batch',
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