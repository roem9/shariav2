// detail marketing 
$(document).on("click", ".detailAkadMarketing", function(){
    let form = "#detailAkadMarketing";

    if(level != "Super Admin"){
        $(form+" .form-control").prop("readonly", true);
        $(form+" .btnEdit").hide();
    }
    
    let id_akad = $(this).data("id");
    let table = $(this).data("table");

    $(form+" [name='table']").val(table);

    let data = {id_akad:id_akad, table:table}
    let result = ajax(url_base+"akad/get_akad", "POST", data);

    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })

})

// edit marketing 
$(document).on("click", "#detailAkadMarketing .btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data akad?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#detailAkadMarketing";

            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()});
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
                let result = ajax(url_base+"akad/edit_akad", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data akad',
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

// detail akad 
$(document).on("click", ".detailAkadAgency", function(){
    let form = "#detailAkadAgency";

    if(level != "Super Admin"){
        $(form+" .form-control").prop("readonly", true);
        $(form+" .btnEdit").hide();
    }
    
    let id_akad = $(this).data("id");
    let table = $(this).data("table");

    $(form+" [name='table']").val(table);

    let data = {id_akad:id_akad, table:table}
    let result = ajax(url_base+"akad/get_akad", "POST", data);

    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })

})

// edit akad 
$(document).on("click", "#detailAkadAgency .btnEdit", function(){
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan merubah data akad?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            let form = "#detailAkadAgency";

            let formData = {};
            $(form+" .form").each(function(index){
                formData = Object.assign(formData, {[$(this).attr("name")]: $(this).val()});
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
                let result = ajax(url_base+"akad/edit_akad", "POST", data);

                if(result == 1){
                    loadData();

                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        text: 'Berhasil merubah data akad',
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