if(level == "Super Admin") {
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
        ajax: {"url": url_base+"agency/loadBatch", "type": "POST"},
        columns: [
            {"data": "status", render : function(data, row, iDisplayIndex){
                (data == 1 ? status = "checked" : status = "");
                return `
                <center>
                    <label class="form-switch">
                        <input class="form-check-input" type="checkbox" name="id_batch" value="`+iDisplayIndex.id_batch+`" `+status+`>
                    </label>
                </center>`
            }},
            {"data": "nama_batch"},
            {"data": "tgl_batch"},
            {"data": "link"},
            {"data": "agency", render : function(data){
                if(jQuery.browser.mobile == true) return data
                else return "<center>"+data+"</center>"
            }},
            {"data": "detail", render : function (data) {
                if(jQuery.browser.mobile == true) return data
                else return "<center>"+data+"</center>"
            }},
        ],
        order: [[1, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            $('td:eq(0)', row).html();
        },
        "columnDefs": [
        { "searchable": false, "targets": "" },  // Disable search on first and last columns
        { "targets": [3, 5], "orderable": false},
        ],
        "rowReorder": {
            "selector": 'td:nth-child(0)'
        },
        "responsive": true,
    });
} else {
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
        ajax: {"url": url_base+"agency/loadBatch", "type": "POST"},
        columns: [
            {"data": "nama_batch"},
            {"data": "tgl_batch"},
            {"data": "agency", render : function(data){
                if(jQuery.browser.mobile == true) return data
                else return "<center>"+data+"</center>"
            }},
            {"data": "detail", render : function (data) {
                if(jQuery.browser.mobile == true) return data
                else return "<center>"+data+"</center>"
            }},
        ],
        order: [[0, 'asc']],
        rowCallback: function(row, data, iDisplayIndex) {
            var info = this.fnPagingInfo();
            var page = info.iPage;
            var length = info.iLength;
            $('td:eq(0)', row).html();
        },
        "columnDefs": [
        { "searchable": false, "targets": "" },  // Disable search on first and last columns
        { "targets": [3], "orderable": false},
        ],
        "rowReorder": {
            "selector": 'td:nth-child(0)'
        },
        "responsive": true,
    });
}