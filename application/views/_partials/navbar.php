<div class="navbar-expand-md">
    <div class="collapse navbar-collapse" id="navbar-menu">
        <div class="navbar navbar-light">
        <div class="container-xl">
            <ul class="navbar-nav">
            <li class="nav-item dropdown" id="Marketing">
                <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                    <span class="nav-link-icon d-md-none d-lg-inline-block">
                        <svg width="24" height="24" class="me-3">
                            <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-user" />
                        </svg> 
                    </span>
                    <span class="nav-link-title">
                        Marketing
                    </span>
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" id="SI" href="<?= base_url()?>marketing/si" >
                        Sharia Institute
                    </a>
                    <a class="dropdown-item" id="Agency" href="<?= base_url()?>marketing/agency" >
                        Agency Partner
                    </a>
                    <a class="dropdown-item" id="arsipSi" href="<?= base_url()?>marketing/si/arsip" >
                        Arsip Sharia Institute
                    </a>
                    <a class="dropdown-item" id="arsipAgency" href="<?= base_url()?>marketing/agency/arsip" >
                        Arsip Agency Partner
                    </a>
                </div>
            </li>
            <?php if($this->session->userdata("level") == "Super Admin") :?>
                <li class="nav-item" id="Lac">
                    <a class="nav-link" href="<?= base_url()?>lac" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block"><!-- Download SVG icon from http://tabler-icons.io/i/checkbox -->
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-man" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            LAC
                        </span>
                    </a>
                </li>
            <?php endif;?>

            <?php if($this->session->userdata("level") == "Super Admin") :?>
                <li class="nav-item dropdown" id="Batch">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-stack" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            Batch
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="listBatch" href="<?= base_url()?>agency/batch" >
                            List Batch
                        </a>
                        <a class="dropdown-item" id="listAgency" href="<?= base_url()?>agency/list" >
                            List Agency
                        </a>
                        <a class="dropdown-item" id="listBatchKonfirmasi" href="<?= base_url()?>agency/konfirmasi" >
                            Konfirmasi Agency
                        </a>
                    </div>
                </li>
            <?php else :?>
                <li class="nav-item" id="Batch">
                    <a class="nav-link" href="<?= base_url()?>agency/list" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-building-community" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            Agency
                        </span>
                    </a>
                </li>
            <?php endif;?>

            <?php if($this->session->userdata("level") == "Super Admin") :?>
                <li class="nav-item dropdown" id="Desain">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-certificate" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            Desain Akad
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="AkadAgency" href="<?= base_url()?>desainakad/agency" >
                            Akad Agency
                        </a>
                        <a class="dropdown-item" id="AkadAgencyForm" href="<?= base_url()?>desainakad/agency/form" >
                            Akad Agency (Form)
                        </a>
                        <a class="dropdown-item" id="AkadSI" href="<?= base_url()?>desainakad/marketing_si" >
                            Akad Marketing SI
                        </a>
                        <a class="dropdown-item" id="AkadSIForm" href="<?= base_url()?>desainakad/marketing_si/form" >
                            Akad Marketing SI (Form)
                        </a>
                        <a class="dropdown-item" id="AkadMarketingAgency" href="<?= base_url()?>desainakad/marketing_agency" >
                            Akad Marketing Agency
                        </a>
                        <a class="dropdown-item" id="AkadMarketingAgencyForm" href="<?= base_url()?>desainakad/marketing_agency/form" >
                            Akad Marketing Agency (Form)
                        </a>
                    </div>
                </li>
            <?php endif;?>

            <?php if($this->session->userdata("level") == "Super Admin") :?>
                <li class="nav-item dropdown" id="Akad">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-mail" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            List Akad
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" id="listAkadAgency" href="<?= base_url()?>akad/list/agency" >
                            Akad Agency
                        </a>
                        <a class="dropdown-item" id="listAkadMarketingSI" href="<?= base_url()?>akad/list/marketing_si" >
                            Akad Marketing SI
                        </a>
                        <a class="dropdown-item" id="listAkadMarketingAgency" href="<?= base_url()?>akad/list/marketing_agency" >
                            Akad Marketing Agency
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#navbar-base" data-bs-toggle="dropdown" role="button" aria-expanded="false" >
                        <span class="nav-link-icon d-md-none d-lg-inline-block">
                            <svg width="24" height="24" class="me-3">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-file-export" />
                            </svg> 
                        </span>
                        <span class="nav-link-title">
                            Export
                        </span>
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="<?= base_url()?>marketing/export/marketing_si" >
                            Marketing SI
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>marketing/export/marketing_agency" >
                            Marketing Agency
                        </a>
                        <a class="dropdown-item" href="<?= base_url()?>agency/export" >
                            Agency
                        </a>
                    </div>
                </li>
            <?php endif;?>
            </ul>
        </div>
        </div>
    </div>
</div>