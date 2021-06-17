<?php $this->load->view("_partials/header")?>
    <div class="wrapper">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
            <?php $this->load->view("_partials/navbar")?>
        </div>
        <div class="page-wrapper">
            <div class="page-body">
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

                    <textarea name="text" class="mt-3" rows="70" style="width: 100%;">
                        <?= $string?>
                    </textarea>

                    <div class="d-flex justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-success btnSave">
                            <svg width="24" height="24" class="me-2">
                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                            </svg> save
                        </a>
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
        $("#Desain").addClass("active")
        $("#<?= $dropdown?>").addClass("active")
        $(".btnSave").click(function(){
            Swal.fire({
                icon: 'question',
                text: 'Yakin akan merubah akad?',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    let text = $("[name='text']").val();

                    let url = window.location.href;
                    let file = "<?= $file?>";

                    let data = {text:text, file:file}
                    let result = ajax("<?= base_url()?>desainakad/edit_file", "POST", data);
                    if(result == 1){
                        Swal.fire({
                            icon: "success",
                            text: "Berhasil merubah akad",
                            timer: 1500,
                            showConfirmButton: false
                        })
                    } else {
                        Swal.fire({
                            icon: "error",
                            text: "terjadi kesalahan",
                            timer: 1500,
                            showConfirmButton: false
                        })
                    }
                }
            })
        })
    </script>

    
<?php $this->load->view("_partials/footer")?>