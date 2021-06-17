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
                            <table id="dataTable" class="table card-table table-vcenter text-nowrap text-dark">
                                <thead>
                                    <tr>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">No. Doc</th>
                                        <?php if($table == "agency") :?>
                                            <th class="text-dark mobile-p mobile-l tablet-p tablet-l desktop" style="font-size: 11px">Nama Agency</th>
                                        <?php else :?>
                                            <th class="text-dark mobile-p mobile-l tablet-p tablet-l desktop" style="font-size: 11px">Nama Marketing</th>
                                        <?php endif;?>
                                        <th class="text-dark desktop w-1" style="font-size: 11px">Tgl. Akad</th>
                                        <?php if($table == "marketing_si") :?>
                                            <th class="text-dark desktop" style="font-size: 11px">Nama LAC</th>
                                        <?php elseif($table == "marketing_agency") :?>
                                            <th class="text-dark desktop" style="font-size: 11px">Nama Agency</th>
                                        <?php elseif($table == "agency") :?>
                                            <th class="text-dark desktop" style="font-size: 11px">Batch</th>
                                        <?php endif;?>
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
        $("#Akad").addClass("active")
        $("#<?= $dropdown?>").addClass("active")
        var table = "<?= $table?>"
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

    
<?php $this->load->view("_partials/footer")?>