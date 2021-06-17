var page = "";

// id batch 
var url = window.location.href;
var id_batch = url.substring(url.indexOf("batch/") + 6);

var datatable = $('#dataTable').DataTable({ 
    initComplete: function() {
        var api = this.api();
        $('#mytable_filter input')
            .off('.DT')
            .on('input.DT', function() {
                api.search(this.value).draw();
        });
    },
    oLanguage: {
    sProcessing: "loading..."
    },
    processing: true,
    serverSide: true,
    ajax: {"url": url_base+"agency/loadAgency/"+id_batch, "type": "POST"},
    columns: [
        {"data": "status"},
        {"data": "foto"},
        {"data": "nama_agency"},
        {"data": "marketing_aktif"},
        {"data": "marketing_nonaktif"},
        {"data": "marketing"},
        {"data": "pdf"},
        {"data": "action"},
    ],
    order: [[2, 'asc']],
    rowCallback: function(row, data, iDisplayIndex) {
        var info = this.fnPagingInfo();
        var page = info.iPage;
        var length = info.iLength;
        $('td:eq(0)', row).html();
    },
    "columnDefs": [
    { "searchable": false, "targets": [""] },  // Disable search on first and last columns
    { "targets": [1, 6, 7], "orderable": false},
    ],
    "rowReorder": {
        "selector": 'td:nth-child(0)'
    },
    "responsive": true,
});
