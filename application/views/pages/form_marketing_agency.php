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
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <div class="progress">
                                <div class="progress-bar" style="width: 25%" role="progressbar" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php if($this->session->flashdata("msg")) :?>
                                <div class="success-msg">
                                    <?= $this->session->flashdata("msg") ;?>
                                </div>
                            <?php endif;?>
                            <form action="<?= base_url()?>form/add_marketing" method="POST" id="formMarketing">
                                <input type="hidden" name="tipe" class="form" value="<?= $tipe?>">
                                
                                <?php if($tipe == "agency") :?>
                                    <input type="hidden" name="periode" class="form" value="<?= $periode?>">
                                <?php endif;?>

                                <input type="hidden" name="id" class="form" value="<?= $id?>">
                                <div id="form-1">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="" class="form-control" value="<?= $nama?>" readonly>
                                        <?php if($tipe == "si") :?>
                                            <label>Nama LAC</label>
                                        <?php else :?>
                                            <label>Nama Agency</label>
                                        <?php endif;?>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama" class="form form-control form-1">
                                        <label>Nama Lengkap</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="no_ktp" class="number form form-control form-1" maxlength="16">
                                        <label>No KTP</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="email" class="form form-control form-1" autocapitalize="off">
                                        <label>Email</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="no_wa" class="number form form-control form-1" maxlength="13">
                                        <label>No Whatsapp</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="no_hp" class="number form form-control form-1" maxlength="13">
                                        <label>No Handphone</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="t4_lahir" class="form form-control form-1">
                                        <label>Tempat Lahir</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" name="tgl_lahir" class="form form-control form-1">
                                        <label>Tgl Lahir</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="date" name="tgl_masuk" class="form form-control form-1">
                                        <label>Tgl Masuk</label>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="form-2" style="display:none">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="domisili" class="form form-control form-2">
                                        <label>Domisili</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <textarea name="alamat" data-bs-toggle="autosize" class="form form-control form-2"></textarea>
                                        <label>Alamat</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="rt" class="number form form-control form-2">
                                        <label>RT</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="rw" class="number form form-control form-2">
                                        <label>RW</label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="mb-1">Kelurahan / Desa</label>
                                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                            <label class="form-selectgroup-item flex-fill">
                                                <input type="radio" name="kel_desa" value="Kelurahan" class="form-selectgroup-input">
                                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                    Kelurahan
                                                </div>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="form-selectgroup form-selectgroup-boxes d-flex flex-column">
                                            <label class="form-selectgroup-item flex-fill">
                                                <input type="radio" name="kel_desa" value="Desa" class="form-selectgroup-input">
                                                <div class="form-selectgroup-label d-flex align-items-center p-3">
                                                <div class="me-3">
                                                    <span class="form-selectgroup-check"></span>
                                                </div>
                                                <div>
                                                    Desa
                                                </div>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="kel" class="form form-control form-2">
                                        <label>Kelurahan / Desa</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="kec" class="form form-control form-2">
                                        <label>Kecamatan</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="kab_kota" class="form form-control form-2">
                                        <label>Kab/Kota</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="provinsi" class="form form-control form-2">
                                        <label>Provinsi</label>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-md btn-success btnBack">
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                            </svg>
                                            Back
                                        </button>
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="form-3" style="display:none">
                                    <div class="form-floating mb-3">
                                        <input type="text" name="nama_bank" class="form form-control form-3">
                                        <label>Nama Bank</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="cabang_bank" class="form form-control form-3">
                                        <label>Cabang Bank</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="no_rek" class="form form-control form-3 number">
                                        <label>No Rekening</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="an_rek" class="form form-control form-3">
                                        <label>Nama Pemilik Rekening</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" name="npwp" class="form form-control form-3 number" maxlength="15">
                                        <label>NPWP</label>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-md btn-success btnBack">
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                            </svg>
                                            Back
                                        </button>
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <div id="form-4" style="display: none">
                                    <?php $this->load->view("pages/akad/marketing_agency_form");?>
                                    <div class="d-flex justify-content-between mt-3">
                                        <button type="button" class="btn btn-md btn-success btnBack">
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                            </svg>
                                            Back
                                        </button>
                                        <button type="button" class="btn btn-md btn-primary btnSimpan">
                                            <svg width="20" height="20" class="me-1">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                            </svg>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>
<?php $this->load->view("_partials/footer")?>

<!-- load javascript -->
<?php  
    if(isset($js)) :
        foreach ($js as $i => $js) :?>
            <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
            <?php 
        endforeach;
    endif;    
?>
<script>
    
    $("#form-1 .btnNext, #form-3 .btnBack").click(function(){
        $(".success-msg").html("");

        eror = 0;
        $(".form-1").each(function(){
            $(this).removeClass("list-group-item-danger");
            if($(this).val() == ""){
                eror = 1;
                $(this).addClass("list-group-item-danger");
            }
        })

        if(eror == 1){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Lengkapi Form Terlebih Dahulu",
                showConfirmButton: false,
                timer : 1500
            })
            scroll();
        } else {
            let email = $("[name='email']").val();
            let no_hp = $("[name='no_hp']").val();
            let no_wa = $("[name='no_wa']").val();

            data = {email:email, no_hp:no_hp, no_wa:no_wa};
            let result = ajax(url_base+`form/check_data`, "POST", data);
            if(result){
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: result
                })
                scroll();
            } else {
                $(".progress-bar").css("width", "50%");
                $("#form-1").hide();
                $("#form-2").show();
                $("#form-3").hide();
                $("#form-4").hide();
            }
        }
        
        scroll();

    })

    $("#form-2 .btnBack").click(function(){
        scroll();
        $(".progress-bar").css("width", "25%");

        $("#form-1").show()
        $("#form-2").hide();
        $("#form-3").hide();
        $("#form-4").hide();
    })
    
    $("#form-2 .btnNext, #form-4 .btnBack").click(function(){
        eror = 0;

        cek = $("[name='kel_desa']:checked").length;
        if(cek == 0) {
            eror = 1
            $(".form-selectgroup-boxes").addClass("list-group-item-danger")
        } else {
            $(".form-selectgroup-boxes").removeClass("list-group-item-danger")
        }

        $(".form-2").each(function(){
            $(this).removeClass("list-group-item-danger");
            if($(this).val() == ""){
                eror = 1;
                $(this).addClass("list-group-item-danger");
            }
        })

        if(eror == 1){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Lengkapi Form Terlebih Dahulu",
                showConfirmButton: false,
                timer : 1500
            })
            scroll();
        } else {
            $(".progress-bar").css("width", "75%");
            $("#form-1").hide()
            $("#form-2").hide();
            $("#form-3").show();
            $("#form-4").hide();

            $(".alamat").html($("[name='alamat']").val() + ` RT ` +$("[name='rt']").val()+ ` / RW ` + $("[name='rw']").val()+ `, `+$("[name='kel_desa']").val()+ ` `+$("[name='kel']").val()+ `, Kec. `+$("[name='kec']").val()+ ` - `+$("[name='kab_kota']").val() + ` Provinsi `+$("[name='provinsi']").val());
        }
        
        scroll();
    })

    $("#form-3 .btnNext").click(function(){
        eror = 0;
        $(".form-3").each(function(){
            $(this).removeClass("list-group-item-danger");
            if($(this).val() == ""){
                eror = 1;
                $(this).addClass("list-group-item-danger");
            }
        })

        if(eror == 1){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Lengkapi Form Terlebih Dahulu",
                showConfirmButton: false,
                timer : 1500
            })
            scroll();
        } else {
            scroll();
            $(".progress-bar").css("width", "100%");

            $("#form-1").hide()
            $("#form-2").hide();
            $("#form-3").hide();
            $("#form-4").show();
        }
        scroll();
    })

    $("#form-4 .btnSimpan").click(function(){
        eror = 0;
        
        if($("[name='setuju']:checked").length != 1) eror = 1

        if(eror == 1){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Harap menyetujui terlebih dahulu dengan menceklist checkbox",
            })
        } else {
            Swal.fire({
                icon: 'question',
                text: 'Yakin akan menyimpan data Anda?',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    $('.btnSimpan').html("Proses...")
                    $(".btnSimpan").prop("disabled", true)
                    $("#form-4 .btnBack").prop("disabled", true)
                    $("#formMarketing").submit();
                }
            })
        }
    })

    $(".form").keyup(function(){
        // console.log($(this).val())
        id = $(this).attr("name");

        if(id == 'npwp') $("."+id).html(npwp($(this).val()))
        else $("."+id).html($(this).val())
    })

    function scroll(){
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#elementtoScrollToID").offset().top
            }, 1000);
        }
    }

    
    $(".number").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });
</script>