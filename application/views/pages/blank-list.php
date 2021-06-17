<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header-form")?>
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
                    
                    <div class="card shadow mb-4" id="dataPc" style="display:none">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table card-table table-vcenter text-nowrap text-dark">
                                    <thead>
                                        <tr>
                                            <th class="text-dark" style="font-size: 11px" width="5%">No</th>
                                            <th class="text-dark" style="font-size: 11px" width="8%">Status</th>
                                            <th class="text-dark" style="font-size: 11px" width="10%"><center>Kd Marketing</center></th>
                                            <th class="text-dark" style="font-size: 11px">Nama Marketing</th>
                                            <th class="text-dark" style="font-size: 11px">Nama LAC</th>
                                            <th class="text-dark" style="font-size: 11px"></th>
                                            <?php if($this->session->userdata("level") == 'super'):?>
                                                <!-- <th><center>Arsip</center></th> -->
                                            <?php endif;?>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="d-block d-sm-none mb-3">
                        <div class="input-icon">
                            <span class="input-icon-addon">
                                <!-- Download SVG icon from http://tabler-icons.io/i/search -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><circle cx="10" cy="10" r="7" /><line x1="21" y1="21" x2="15" y2="15" /></svg>
                            </span>
                            <input type="text" name="search" class="form-control" placeholder="Cari Nama Marketing ..." aria-label="Search in website">
                        </div>
                        <div id="skeleton">
                            <div class="row">
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4">
                                    <div class="card">
                                    <div class="ratio ratio-21x9 card-img-top">
                                        <div class="skeleton-image"></div>
                                    </div>
                                    <div class="card-body">
                                        <div class="skeleton-heading"></div>
                                        <div class="skeleton-line"></div>
                                        <div class="skeleton-line"></div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }' id="dataAjax">
                        
                    </div>

                    <!-- Paginate -->
                    <div class="row" id="paging">
                        <div class="col-12">
                            <div class="mt-3" id='pagination'></div>
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
        $("#Marketing").addClass("active")
        $("#<?= $dropdown?>").addClass("active")
        var table = "<?= $table?>"
        var status = "<?= $status?>"
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