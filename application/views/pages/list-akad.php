<?php $this->load->view("_partials/header")?>
    <div class="wrapper" id="elementtoScrollToID">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header-form")?>
        </div>
        <div class="page-wrapper">
            <div class="container-xl">
                
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
                <div class="container-xl d-flex flex-column justify-content-center">
                    <?php if($akad ) : ?>
                        <?php foreach ($akad as $akad) :?>
                            <?= $akad?>
                        <?php endforeach;?>
                    <?php else :?>
                        <div class="alert alert-important alert-warning alert-dismissible" role="alert">
                            <div class="d-flex">
                                <div>
                                    <svg width="24" height="24" class="alert-icon">
                                        <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-alert-circle" />
                                    </svg>
                                </div>
                                <div>
                                    List Akad Kosong
                                </div>
                            </div>
                        </div>
                    <?php endif;?>
                </div>
            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>
<?php $this->load->view("_partials/footer")?>