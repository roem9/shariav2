var page = "";
        
// Detect pagination click
$('#pagination').on('click','a',function(e){
    e.preventDefault(); 
    var pageno = $(this).attr('data-ci-pagination-page');
    page = pageno;
    $("#skeleton").show()
    loadMobile(pageno);

});

// Load pagination
function loadMobile(pagno){
    // console.log(table)
    let search = $("input[name='search']").val();
    let data = {search:search, table:table, status:status};
    // let result = ajax(url_base+"marketing/loadMarketingMobile/"+pagno, "POST", data);
    let result = ajax(url_base+"akad/loadAkadMobile/"+pagno, "POST", data);
    
    if(result.total_rows != 0) {
        
        if(result.total_rows_perpage != 0){
            
            $('#pagination').html(result.pagination);
            createTable(result.result,result.row);

        } else {
            page = pagno - 1;
            let result = ajax(url_base+"akad/loadAkadMobile/"+page, "POST", "");

            $('#pagination').html(result.pagination);
            createTable(result.result,result.row);
        }

    } else {
        html = `
        <div class="d-flex flex-column justify-content-center">
            <div class="empty">
                <div class="empty-img"><img src="`+url_base+`assets/static/illustrations/undraw_printing_invoices_5r4r.svg" height="128"  alt="">
                </div>
                <p class="empty-title">Data kosong</p>
            </div>
        </div>`;

        $("#dataAjax").html(html);
    }
    
    $("#skeleton").hide()
}

// Create table list
function createTable(data,sno){

    sno = Number(sno);

    html = "";

    for(index in data){
        if(table == "marketing_si"){
            item = `
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                    </svg> `+data[index].nama_marketing+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-man" />
                    </svg> `+data[index].nama_lac+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                    </svg> `+data[index].no_doc+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                    </svg> `+data[index].tgl_akad+`
                </p>
                <div class="d-flex justify-content-end">
                    <a href="`+data[index].link+`" target="_blank" class="btn btn-success">
                        <svg width="24" height="24" class="me-1">
                            <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                        </svg> Link
                    </a>
                </div>`

        } else if(table == "marketing_agency"){
            item = `
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                    </svg> `+data[index].nama_marketing+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-building-community" />
                    </svg> `+data[index].nama_agency+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                    </svg> `+data[index].no_doc+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                    </svg> `+data[index].tgl_akad+`
                </p>
                <div class="d-flex justify-content-end">
                    <a href="`+data[index].link+`" target="_blank" class="btn btn-success">
                        <svg width="24" height="24" class="me-1">
                            <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                        </svg> Link
                    </a>
                </div>`

        } else if(table == "agency"){
            item = `
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-building-community" />
                    </svg> `+data[index].nama_agency+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-man" />
                    </svg> `+data[index].nama_pemilik+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-id" />
                    </svg> `+data[index].no_doc+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-calendar" />
                    </svg> `+data[index].tgl_akad+`
                </p>
                <p>
                    <svg width="24" height="24" class="me-2">
                        <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-stack" />
                    </svg> `+data[index].nama_batch+`
                </p>
                <div class="d-flex justify-content-end">
                    <a href="`+data[index].link+`" target="_blank" class="btn btn-success">
                        <svg width="24" height="24" class="me-1">
                            <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-link" />
                        </svg> Link
                    </a>
                </div>`;
        }

        html += `
        <div class="col-md-4">
            <div class="card">
                <ul class="nav nav-tabs" data-bs-toggle="tabs">
                <li class="nav-item">
                    <a href="#tabs-data-`+index+`" class="nav-link active" data-bs-toggle="tab">
                        <svg width="24" height="24">
                            <use xlink:href="`+url_base+`assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-database" />
                        </svg>
                    </a>
                </li>
                </ul>
                <div class="card-body">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tabs-data-`+index+`">
                            <div>
                                `+item+`
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>`;
    }

    $("#dataAjax").html(html);

};

if(jQuery.browser.mobile == true){
    loadMobile(0);
    $("#paging").show()
    $("#dataPc").hide()
} else {
    $("#searchBar").hide()
    $("#dataPc").show()
    var datatable = $('#dataTable').DataTable({ 
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": url_base+"akad/loadAkad",
            "type": "POST",
            "data": {table:table}
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [0, 5], //first column / numbering column
                "orderable": false, //set not orderable
            },
        ],
    });
}

$(document).on("keyup", "input[name='search']", function(){
    loadMobile(0);
})