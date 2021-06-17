$(document).on("click", ".btnKonfirmasi", function(){
    let form = "#profileAgency";
    let id = $(this).data("id");
    let data = {id_agency:id};
    let result = ajax(url_base+"agency/get_agency", "POST", data);

    $.each(result, function(key, value){
        $(form+" [name='"+key+"']").val(value)
    })

    result = ajax(url_base+"agency/get_image", "POST",data);

    html = ""
    if(result.length != 0){
        result.forEach(function(data){
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
})

$("#profileAgency .btnCancel").click(function(){
    let id_agency = $("[name='id_agency']").val();
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan menghapus data agency?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            data = {id_agency:id_agency};
            let result = ajax(url_base+"agency/delete_agency", "POST", data);
            if(result == 1){
                
                $("#profileAgency").modal("hide");
                Swal.fire({
                    icon: "success",
                    text: "Berhasil menghapus data agency",
                    showCloseButton: false,
                    timer: 1500
                })

                loadData();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "terjadi kesalahan silahkan refresh page",
                })
            }
        }
    })
})

$("#profileAgency .btnKonfirm").click(function(){
    let id_agency = $("[name='id_agency']").val();
    Swal.fire({
        icon: 'question',
        text: 'Yakin akan mengkonfirmasi agency?',
        showCloseButton: true,
        showCancelButton: true,
        confirmButtonText: 'Ya',
        cancelButtonText: 'Tidak'
    }).then(function (result) {
        if (result.value) {
            data = {id_agency:id_agency};
            let result = ajax(url_base+"agency/konfirmasi_agency", "POST", data);
            if(result == 1){
                
                $("#profileAgency").modal("hide");
                Swal.fire({
                    icon: "success",
                    text: "Berhasil mengkonfirmasi agency",
                    showCloseButton: false,
                    timer: 1500
                })

                loadData();
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "terjadi kesalahan silahkan refresh page",
                })
            }
        }
    })
})

function loadData(){
    if(jQuery.browser.mobile == true){
        loadMobile(page);
    } else {
        datatable.ajax.reload(null,false); //reload datatable ajax 
    }
}