                                                <!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <style>
        body {
            font-family: arial;
        }

        .center {
            text-align: center;
        }
        .bold {
            font-weight: bold;
        }
        .fo-16{
            font-size: 16px;
        }
        .fo-11{
            font-size: 12px;
        }
        ol li {
            /* letter-spacing: 10px; */
        }
    </style>
</head><body style="text-align: justify;">
    
    <p class="center bold"><span style="font-size: 14px"><u>KONTRAK PERJANJIAN AGENCY <?= $agency['nama_agency']?> (MEMBER OF SHARIA GRUP INDONESIA) DENGAN AGEN PERSONAL</u></span></p>
    <p class="center bold"><span class="fo-16">NO. DOK : <?= $no_doc?></span></p>
    <p class="center"><i>Bismillahirrahmanirrahim</i></p>
    <p>Pada hari ini <?= $akad?> di <b>Bogor</b> yang bertanda tangan di bawah ini :</p>
    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
        <tr>
            <td style="width: 125px">Nama</td>
            <td style="width: 10px">:</td>
            <td><b> <?= $agency['nama_pemilik']?></b><td>
        </tr>
        <tr>
            <td style="width: 125px">No. KTP</td>
            <td style="width: 10px">:</td>
            <td><b> <?= $agency['no_ktp']?></b><td>
        </tr>
        <tr>
            <td style="width: 125px">Jabatan</td>
            <td style="width: 10px">:</td>
            <td>Owner Agency</td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Alamat</td>
            <td style="width: 10px" valign="top">:</td>
            <td><?= $agency['alamat']?></td>
        </tr>
    </table>
    <p>Dalam hal ini bertindak untuk dan atas nama <b>(AGENCY PROPERTY <?= $agency['nama_agency']?> MEMBER OF SHARIA GRUP INDONESIA)</b> yang selanjutnya disebut sebagai <b>PIHAK PERTAMA</b>.</p>
    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
        <tr>
            <td style="width: 125px">Nama</td>
            <td style="width: 10px">:</td>
            <td><b><?= $nama_marketing?></b><td>
        </tr>
        <tr>
            <td style="width: 125px">Nomor KTP</td>
            <td style="width: 10px">:</td>
            <td> <b><?= $no_ktp?></b></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Alamat KTP</td>
            <td style="width: 10px" valign="top">:</td>
            <td><b><?= $alamat?></b></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">No. Hp</td>
            <td style="width: 10px" valign="top">:</td>
            <td><b><?= $no_hp?></b></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Nama Bank</td>
            <td style="width: 10px" valign="top">:</td>
            <td><b><?= $nama_bank?></b></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">No. Rekening</td>
            <td style="width: 10px" valign="top">:</td>
            <td><?= $no_rek?></td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Domisili</td>
            <td style="width: 10px" valign="top">:</td>
            <td><?= $domisili?></td>
        </tr>
        <tr>
            <td style="width: 125px">No. NPWP</td>
            <td style="width: 10px">:</td>
            <td> <?= npwp($no_npwp)?></td>
        </tr>
    </table>
    <p>Dalam hal ini bertindak untuk dan atas nama Agen Personal yang selanjutnya disebut sebagai <b>PIHAK KEDUA</b>.</p>
    <p>Kedua belah pihak telah sepakat mengadakan perjanjian kerjasama Pemasaran Tanah Kavling dan Unit Perumahan menurut ketentuan sebagaimana tercantum dalam pasal-pasal berikut:</p>

    <pagebreak>

    
    <p class="center bold">PASAL 1</p>
    <ol type="1" style="padding-left: 15px">
        <li>Kerjasama ini diselenggarakan atas dasar kebutuhan dan manfaat dari kedua belah pihak secara timbal balik atas dasar sama derajat dan saling menghormati sesuai dalam batas kedudukan dan kewenangan masing-masing.</li><br>
        <li>Tujuan dari kerjasama ini adalah melakukan kegiatan bermanfaat bagi kedua pihak dalam hal ini memasarkan tanah dan unit rumah pada tipe dan lokasi yang sudah atau akan disepakati.</li><br>
        <li><b>PIHAK KEDUA</b> tidak memiliki akad perjanjian / tidak terikat dengan Agency Property manapun sesuai dengan peraturan dari AREBI (Asosiasi Real Estate Broker Indonesia). Jika memiliki keterikatan dengan lembaga tersebut, maka wajib mengajukan surat keluar, dan dilampirkan kepada <b>PIHAK PERTAMA</b> dalam hal ini berada di dalam naungan PT Sharia Grup Indonesia.</li><br>
    </ol>

    <p class="center bold">PASAL 2</p>
    <p><b>PIHAK PERTAMA</b> menerima dan bermitra dengan <b>PIHAK KEDUA</b> sebagai : </p>
    <table style="width:100%; padding: 0px; border-collapse:collapse; margin-bottom: 15px">
        <tr>
            <td style="width: 125px">Status</td>
            <td style="width: 10px">:</td>
            <td><b>Agen Personal Agency <?= $agency['nama_agency']?> Member of Sharia Grup Indonesia</b><td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Masa Kontrak</td>
            <td style="width: 10px" valign="top">:</td>
            <td><?= $masa_awal?> s/d <?= $masa_akhir?> (Kontrak ini dilakukan evaluasi setiap bulan)</td>
        </tr>
        <tr>
            <td style="width: 125px" valign="top">Proyek</td>
            <td style="width: 10px" valign="top">:</td>
            <td><b>Sesuai arahan dari leader (owner agency)</b></td>
        </tr>
    </table>
    
    <p class="center bold">Pasal 3<br>KEWAJIBAN PIHAK KEDUA</p>
    <ol type="1" style="padding-left: 15px">
        <li><b>PIHAK KEDUA</b> tidak boleh terikat dengan agency property lain memasarkan produk properti.</li><br>
        <li><b>PIHAK KEDUA</b> bertugas sebagai agent yang memasarkan dan menjual tanah dan rumah kepada calon konsumen (melalui internet online, media sosial online dan lain-lain ataupun secara offline). Dan bisa dilakukan tanpa menemani survey lokasi dengan ketentuan yang berlaku.</li><br>
        <li><b>PIHAK KEDUA</b> memiliki kewajiban untuk memberikan data konsumen sesuai dengan format yang telah ditentukan oleh <b>PIHAK PERTAMA</b> selaku coordinator yang berhubungan dengan PT Sharia Grup Indonesia dan tidak diharuskan untuk mendampingi konsumennya melakukan survey lokasi (ketentuan berlaku).</li><br>
        <li><b>PIHAK KEDUA</b> memiliki kewajiban memberikan informasi yang tepat dan dapat dipahami oleh Calon Konsumen.</li><br>
        <li><b>PIHAK KEDUA</b> memiliki kewajiban menjaga etika dalam berbisnis yaitu tidak diperkenankan memprospek calon konsumen yang sedang diprospek oleh Agen lainnya.</li><br>
        <li><b>PIHAK KEDUA</b> tidak diperbolehkan untuk menaikan harga jual objek tanpa sepengetahuan <b>PIHAK PERTAMA</b> selaku coordinator yang berhubungan dengan PT Sharia Grup Indonesia.</li><br>
        <li><b>PIHAK KEDUA</b> memiliki kewajiban untuk mengingatkan pembayaran cicilan DP kepada konsumennya hingga lunas DP karena ini akan mempengaruhi cepat lambatnya pembayaran fee manakala pembayaran DP dicicil oleh Konsumen.</li><br>
        <li><b>PIHAK KEDUA</b> tidak diperkenankan menerima uang cash dari konsumen mulai dari booking fee, DP, ataupun uang pembelian cash.</li><br>
        <li><b>PIHAK KEDUA</b> wajib mengikuti peraturan yang diberikan melalui koordinator agen.</li><br>
        <li><b>PIHAK KEDUA</b> tidak memiliki tanggung jawab atas segala permasalahan yang terjadi dalam proses pembangunan yang dilakukan oleh <b>PIHAK DEVELOPER</b>.</li><br>
        <li><b>PIHAK KEDUA</b> bersedia dipotong fee atau komisi untuk pajak yang diberlakukan yaitu 2.5% apabila mempunyai NPWP atau 3% apabila belum mempunyai NPWP dari total penerimaan agen.</li><br>
        <li><b>PIHAK KEDUA</b> bersedia dipotong fee atau komisi sebesar Rp6.500,- rupiah, jika tidak menggunakan akun bank yang disarankan oleh <b>PIHAK PERTAMA</b> dalam hal ini adalah Owner Agency/Leader Agency setelah mendapatkan pencarian dari Sharia Grup Indonesia.</li><br>
    </ol>
    
    <br>
    <p class="center bold">PASAL 4<br>KEWAJIBAN AGENCY <?= $agency['nama_agency']?> MEMBER SHARIA GRUP INDONESIA</p>
    <ol type="1" style="padding-left: 15px">
        <li><b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia harus berkoodinasi dengan proyek yang dijualkan terkait calon konsumen di kantor pemasaran atau lokasi proyek dimana kewajiban ini bisa dilakukan oleh pihak yang ditunjuk/dipercayakan.</li><br>
        <li><b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia harus berkoodinasi untuk menyediakan tools marketing berupa data-data  gambar (soft copy brosur) untuk memudahkan semua Agen dalam memasarkan.</li><br>
        <li><b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Shara Grup Indonesia harus berkoodinasi dengan memiliki kewajiban memberikan Fee kepada <b>PIHAK KEDUA</b> sebagai jasa penjualan Agent tersebut diatas sesuai dengan kesepakatan kedua pihak.</li><br>
        <li>Setiap penjualan satu unit secara Kredit, Cash atau Cash bertahap, maka <b>PIHAK KEDUA</b> mendapat fee sesuai proyek yang dipasarkan (di grup dan arahan dari leader/owner agency).</li><br>
        <li>Setiap pembayaran dari konsumen, akan diterima oleh <b>PIHAK DEVELOPER atau yang dipercayakan/ditunjuk oleh</b> <b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia. <b>PIHAK KEDUA</b> berkewajiban untuk mengingatkan pembayaran kepada konsumen sampai dengan pembayaran DP Lunas (konsumen yang kredit) dan pembayaran lunas (konsumen yang cash keras dan bertahap).</li><br>
        <li><b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia harus berkoodinasi dan memiliki kewajiban memberikan informasi terkait program Pemasaran seperti Promo dan Diskon.</li><br>
    </ol>
    
    <p class="center bold">PASAL 5<br>PEMBATALAN KONSUMEN</p>
    <ol type="1" style="padding-left: 15px">
        <li>Apabila setelah terjadi pembayaran Booking Fee oleh Konsumen kemudian Konsumen membatalkan, maka uang Booking Fee buyer tersebut akan dikembalikan atau dihanguskan sesuai dengan peraturan pada setiap proyek.</li><br>
        <li>Apabila pembatalan konsumen terjadi saat cicilan DP, maka terjadi pemotongan oleh <b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia harus berkoodinasi kepada buyer sesuai dengan akad yang berlaku pada setiap proyek.</li><br>
        <li>Apabila pembatalan konsumen setelah pencairan komisi, maka Fee yang telah dibayarkan kepada <b>PIHAK KEDUA</b> tidak wajib dikembalikan. </li><br>
        <li>Pemotongan uang DP atau pembayaran dari konsumen, berlaku untuk biaya administrasi, komisi dan lain-lain.</li><br>
    </ol>

    <p class="center bold">Pasal 6<br>PERSELISIHAN</p>
    <ol type="1" style="padding-left: 15px">
        <li>Apabila terjadi perselisihan antara kedua pihak, akan diselesaikan secara musyawarah untuk mencapai mufakat serta hasil akan dituangkan kedalam suatu addendum yang  merupakan bagian yang tidak terpisahkan dari kontrak ini.</li><br>
        <li>Apabila terjadi perselisihan antara sesama Agen terkait dengan penjualan maka akan dilakukan musyawarah yang akan dimediasi oleh <b>PIHAK PERTAMA</b> selaku yang berhubungan dengan Sharia Grup Indonesia.</li><br>
        <li>Agen yang terbukti melanggar etika bisnis akan diberi peringatan hingga larangan menjualkan produk-produk yang dipasarkan selama 1 (satu) tahun.</li><br>
        <li>Agen yang terbukti melanggar secara hukum seperti menyebar berita bohong (hoax), fitnah, menuduh, dan tindakan hukum lainnya maka akan diproses sesuai undang undang yang berlaku.</li><br>
    </ol>
    
    <br><br><br><br><br><br><br><br>
    <p class="center bold">Pasal 7<br>PENUTUP</p>
    <p>Demikian kontrak perjanjian ini dibuat, semoga Allah Azza Wa Jalla memberikan keberkahan kepada kita yang melakukan perjanjian ini.</p>

    <table style="margin-left: 300px" width=100%>
        <tr>
            <td class="center" style="width: 200px">PIHAK PERTAMA</td>
        </tr>
        <tr>
            <td><br><br><br></td>
            <!-- <td class="center"><img src="<?=base_url()?>assets/img/ttd.jpg" width=300px height=70px></td> -->
        </tr>
        <tr>
            <td class="center"><u><b><?= $agency['nama_pemilik']?></b></u></td>
        </tr>
    </table><br>

    <p class="fo-11"><i>Dokumen ini sah dengan persetujuan Pihak Kedua dalam bentuk klik/centang pada form digital dan tanpa perlu membutuhkan tanda tangan Pihak Kedua.</i></p>

    <p class="fo-11"><i>Dokumen ini dikeluarkan dari Sistem PT SGI kepada Member Agency Property atas dasar data dari Pihak Kedua. Kebenaran dan keabsahan atas data yang ditampilkan dalam dokumen ini dan data yang tersimpan dalam Sistem PT SGI yang dituangkan ke Member Agency Property menjadi tanggung jawab Pihak Kedua sepenuhnya.</i></p>
    

</body></html>                    