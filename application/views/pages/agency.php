<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
            <?php $this->load->view("_partials/navbar")?>
        </div>
        <div class="page-wrapper">
            <div class="container-xl">
                <!-- Page title -->
                <div class="page-header d-print-none">
                    <div class="row align-items-center">
                        <div class="col">
                        <h2 class="page-title">
                            <?= $title?>
                        </h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="page-body">
                <div class="container-xl">
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <table id="dataTable" class="table card-table table-vcenter text-dark">
                                <thead>
                                    <tr>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Status</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Logo</th>
                                        <th class="text-dark desktop mobile-l mobile-p tablet-p tablet-l" style="font-size: 11px">Nama Agency</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Marketing Aktif</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Marketing Nonaktif</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Marketing Total</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Pdf</th>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Menu</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>

    <!-- load modal -->
    <?php 
        if(isset($modal)) :
            foreach ($modal as $i => $modal) {
                $this->load->view("_partials/modal/".$modal);
            }
        endif;
    ?>

    <script>
        $("#Batch").addClass("active")
        $("#<?= $dropdown?>").addClass("active");
    </script>

    <!-- load javascript -->
    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;
    ?>

    <!-- <script>
        $('.table-responsive').on('show.bs.dropdown', function () {
            $('.table-responsive').css( "overflow", "inherit" );
        });

        $('.table-responsive').on('hide.bs.dropdown', function () {
            $('.table-responsive').css( "overflow", "auto" );
        })
    </script> -->
    
<?php $this->load->view("_partials/footer")?>