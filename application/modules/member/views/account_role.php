<?php
    $accrole = $this->db->query("SELECT * FROM users_request WHERE user_id = '".$Member->id."'")->row();
    $scdok = $this->db->query("SELECT * FROM users_document WHERE user_id = '".$Member->id."'")->row();
?>
<style type="text/css">
    .ex3 {
      height: 400px;
      width: auto;  
      overflow-y: auto;
    }
</style>
<div class="tab-pane active" id="accountrole">
    <div style="padding:2%;">
        <h3 style="margin-bottom:10px;">Account Role</h3>
    </div>
    <div class="tab_container" style="margin-left: 10%">
        <input id="tab1" type="radio" class="tabs" name="tabs" checked>
        <label class="labels" for="tab1"><span>Seller</span></label>

        <input id="tab2" type="radio" class="tabs" name="tabs">
        <label class="labels" for="tab2"><span>Buyer</span></label>

        <section id="content1" class="tab-content">
            <p style="margin-top: 20px;">
                <b>Privacy Policy</b>
            </p>
            <br>
            <p>
                Duis autem eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat.
            </p>
            <hr>
            <p style="margin-top: 30px">
                <a class="btn btn-success btn-seller" href="">
                    Request
                </a>
            </p>
        </section>

        <section id="content2" class="tab-content">
            <p style="margin-top: 20px;">
                <b>Privacy Policy</b>
            </p>
            <br>
            <p>
                Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat. Ut wisi enim ad minim veniam, quis nostrud exerci tation.
            </p>
            <hr>
            <p>
                <div class="form-group">
                    <label>Pilih Tipe Buyer</label>
                    <select class="form-control buyer-tipe-select">
                        <option value="0">-- Choose --</option>
                        <option value="1">API</option>
                        <option value="2">White Label</option>
                        <option value="3">Travel Agent</option>
                    </select>
                </div>
            </p>
            <p>
                <div class="form-group">
                    <div class="panel-body" id="form-api" style="display: none;">
                        <form  class="form-horizontal" method="post" >
                            <!-- <label for="id_username" class="control-label col-md-4  requiredField">
                                NDA 
                            </label> -->
                            <div class="panel-group" id="faqAccordion">
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                                    <h4 class="panel-title">
                                            <a href="#" class="ing">NDA</a>
                                    </h4>

                                    </div>
                                    <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <p class="text-center ex3">
                                                <b style="text-align: center;">PERJANJIAN KERAHASIAAN </b><br>
                                                <b style="text-align: center;">ANTARA</b><br>
                                                <b style="text-align: center;">ITX</b><br>
                                                <b style="text-align: center;">DAN</b><br>
                                                <b style="text-align: center;">PT. _________________</b><br>
                                                <!-- RSP NO : ____ /DIR/NDA/V/2018<br> -->
                                                Perjanjian Kerahasiaan ini (selanjutnya disebut “Perjanjian”) ditandatangani pada tanggal ___ Mei 2018 (selanjutnya disebut “Tanggal Efektif”) oleh dan antara: <br>
  
                                                PT. REKA SINERGI PRATAMA, suatu perseroan terbatas yang didirikan berdasarkan hukum negara Republik Indonesia, berdomisili di Jl. K.H. Wahid Hasyim No.147, Jakarta Pusat 10240, Indonesia, dalam hal ini diwakili oleh  Edward Nelson Jusuf, dalam jabatannya selaku Direktur Utama dari dan karenanya sah bertindak untuk dan atas nama PT. REKA SINERGI PRATAMA; and

                                                PT. _____________, suatu perseroan terbatas yang didirikan berdasarkan hukum negara Republik Indonesia, berdomisili di Jl. ____________________, dalam hal ini diwakili oleh  ___________, dalam jabatannya selaku Direktur Utama dari dan karenanya sah bertindak untuk dan atas nama PT. _____________

                                                Masing-masing disebut Pihak, dan secara bersama-sama disebut Para Pihak. <br>

                                                <b style="text-align: center;">KONSIDERANS</b> <br>
                                                Para Pihak sedang menjajaki kerjasama bisnis yang saling menguntungkan (selanjutnya disebut “Hubungan Bisnis”). Para Pihak mengakui bahwa dalam proses diskusi untuk menyelenggarakan Hubungan Bisnis, masing-masing Pihak akan perlu mengungkapkan informasi rahasia tertentu kepada Pihak Lainnya (sebagaimana didefinisikan di bawah). Untuk itu perlu ditetapkan ketentuan guna mengatur pengungkapan Informasi Rahasia tersebut. 
                                                Pihak yang mengungkapkan informasi yang bersifat rahasia selanjutnya disebut “Pihak Yang Mengungkapkan” dan Pihak yang menerima informasi yang bersifat rahasia disebut “Pihak Yang Menerima”
                                                Pihak Yang Mengungkapkan dan Pihak Yang Menerima selanjutnya masing-masing disebut “Pihak”, dan bersama-sama disebut “Para Pihak”.
                                                Oleh karena itu, Para Pihak bermaksud untuk mengatur tentang pengungkapan, penggunaan, dan perlindungan Informasi Rahasia. Berdasarkan hal-hal tersebut di atas, Para Pihak menyetujui hal-hal sebagai berikut: <br>

                                                <b style="text-align: center;">Pasal 1 
                                                Definisi</b> <br> 

                                                    1. Dalam Perjanjian ini, “Informasi Rahasia” adalah semua informasi yang bersifat rahasia dalam segala bentuk dan yang diungkapkan dengan segala cara dari satu Pihak (“Pihak yang Mengungkapkan”) beserta Afiliasinya kepada Pihak lainnya (“Pihak yang Menerima”) beserta Afiliasinya, sehubungan dengan Maksud, termasuk, tetapi tidak terbatas pada, data-data, teknologi, pengetahuan, dokumen-dokumen, spesifikasi, informasi tentang pekerjaan riset serta pengembangan, dan/atau rahasia dagang dan usaha, rencana pemasaran dan usaha, anggaran, proyeksi dan analisis, informasi keuangan, dan informasi konsumen. Jika Informasi Rahasia berwujud, hanya apabila diberi tanda secara jelas sebagai rahasia ketika diungkapkan kepada Pihak yang Menerima, atau jika tidak berwujud, kerahasiaan dari informasi tersebut harus diberitahukan terlebih dahulu, dan dituangkan secara tertulis serta diberikan kepada Pihak yang Menerima dalam waktu 30 hari dari saat pengungkapan pertama, namun tidak dilakukannya hal tersebut, tidak dapat dianggap sebagai penyimpangan hak Pihak yang Mengungkapkan atas informasi yang diketahui oleh Pihak yang Menerima atau yang biasa berlaku dalam dunia usaha patut diketahuinya, sebagai rahasia. <br>


                                                    2. Pihak yang Mengungkapkan berhak menentukan sesuai kebijakannya sendiri macam Informasi Rahasia yang akan diungkapkan kepada Pihak lainnya. <br>

                                                    3.  Dalam Perjanjian ini, “Afiliasi” dari suatu Pihak berarti suatu entitas yang mengendalikan, dikendalikan oleh, atau berada dalam kendali yang sama dengan Pihak tersebut, dan “kendali” berarti kekuasaan untuk menentukan kebijakan manajemen dari entitas tersebut, secara langsung atau tidak langsung, melalui kepemilikan mayoritas hak suara dari sahamnya, atau untuk menunjuk mayoritas anggota manajemennya, atau berdasarkan perjanjian, atau lainnya. <br>

                                                    <b style="text-align: center;">Pasal 2
                                                    Tanpa Lisensi </b><br>

                                                    Perjanjian ini tidak memberikan hak kekayaan intelektual atau industri atau lisensi atas Informasi Rahasia kepada Pihak yang Menerima, baik secara langsung atau tersirat, atau lainnya. <br>

                                                    <b style="text-align: center;">Pasal 3
                                                    Kerahasiaan Informasi Rahasia </b><br>

                                                    1.  Pihak yang Menerima menyetujui untuk tidak menyalin dan/atau menggunakan Informasi Rahasia kecuali untuk Maksud. Pihak yang Menerima menyetujui untuk menjaga kerahasiaan Informasi Rahasia dan mengambil langkah-langkah yang wajar untuk melindungi Informasi Rahasia termasuk, tetapi tidak terbatas pada, langkah-langkah yang diambil untuk melindungi informasi rahasianya sendiri. <br>

                                                    2.  Pihak yang Menerima menyetujui bahwa Informasi Rahasia dibatasi pengungkapannya hanya kepada pegawainya, direkturnya, atau kontraktornya yang perlu mengetahui untuk Maksud dan yang terikat pada kewajiban kerahasiaan yang melarang pengungkapan lebih lanjut dari Informasi
                                                    Rahasia dan Pihak yang Menerima tidak akan mengungkapkan atau memberikan Informasi Rahasia kepada pihak ketiga mana pun tanpa izin tertulis dari Pihak yang Mengungkapkan, kecuali: (a) kepada Afiliasinya, yang perlu untuk mengetahuinya dan dengan ketentuan Afiliasi tersebut setuju untuk terikat pada ketentuan Perjanjian ini seolah-olah tercantum sebagai pihak dalam Perjanjian ini serta menggunakan Informasi Rahasia hanya untuk Maksud, atau (b) pihak yang berwenang sebagaimana disyaratkan oleh ketentuan perundang-undangan yang berlaku. <br>

                                                    <b style="text-align: center;">Pasal 4
                                                    Pengecualian <br>
                                                    Informasi Rahasia tidak termasuk informasi yang:</b>
                                                    <br>

                                                        a. telah diketahui umum pada saat pengungkapan, yang bukan disebabkan oleh kesalahan Pihak yang Menerima;
                                                        <br>
                                                        b. menjadi diketahui oleh umum, yang bukan disebabkan oleh kesalahan Pihak yang Menerima dengan melanggar Perjanjian ini;
                                                        <br>
                                                        c. diungkapkan kepada Pihak yang Menerima oleh pihak ketiga yang tidak, sepanjang pengetahuan Pihak yang Menerima, melanggar kewajiban kerahasiaan dan yang dapat diungkapkan tanpa pembatasan;
                                                        <br>
                                                        d. telah diketahui atau secara independen dikembangkan oleh Pihak yang Menerima tanpa menggunakan Informasi Rahasia, dengan ketentuan Pihak yang Menerima dapat membuktikan hal tersebut;
                                                        <br>
                                                        e. diungkapkan berdasarkan putusan pengadilan atau badan pemerintahan lain atau ketentuan perundang-undangan, dengan ketentuan Pihak yang Menerima, atas permintaan Pihak yang Mengungkapkan, melakukan tindakan-tindakan yang wajar untuk membatasi
                                                        pengungkapan tersebut sejauh yang diminta putusan atau ketentuan tersebut; atau
                                                        <br>
                                                        f. diungkapkan berdasarkan izin tertulis dari Pihak yang Mengungkapkan. <br>
                                                        <b style="text-align: center;">Pasal 5
                                                        Pengembalian Barang-Barang </b><br>

                                                        Dengan berakhirnya waktu Perjanjian ini atau diputuskannya Perjanjian ini atau berdasarkan permintaan tertulis dari Pihak yang Mengungkapkan, Pihak yang Menerima harus mengembalikan kepada Pihak yang Mengungkapkan, dan/atau menghapuskan semua berkas komputer, dan/atau menghancurkan berdasarkan instruksi tertulis Pihak yang Mengungkapkan, atas biaya Pihak yang Menerima, semua Informasi Rahasia yang berwujud yang ada dalam penguasaannya beserta salinannya. <br>

                                                        <b style="text-align: center;">Pasal 6
                                                        Tanpa Jaminan dan Penyerahan Hak Milik</b>
                                                        <br>
                                                            1. Informasi Rahasia dan salinannya tetap menjadi milik Pihak yang Mengungkapkan. Pihak yang Mengungkapkan menyatakan bahwa dirinya berhak membuat pengungkapan tersebut berdasarkan Perjanjian ini. Informasi Rahasia yang diungkapkan berdasarkan Perjanjian ini diberikan “apa adanya” dan Pihak yang Mengungkapkan tidak memberikan jaminan atas kelengkapan, ketepatan, kesesuaian untuk maksud tertentu dari Informasi Rahasia, atau segala penggunaan hasil dari Informasi Rahasia dan tidak dilanggarnya hak milik industri atau intelektual pihak ketiga.
                                                            <br>
                                                            2. Perjanjian ini tidak menghalangi suatu Pihak untuk membuat, menggunakan, memasarkan, melisensi, atau menjual segala teknologi, produk, atau barang yang dikembangkan secara mandiri, baik yang serupa atau berhubungan dengan Informasi Rahasia yang diungkapkan berdasarkan Perjanjian ini, dengan ketentuan Pihak tersebut tidak melakukannya dengan melanggar
                                                            <br>
                                                        <b style="text-align: center;">Pasal 7
                                                        Jangka Waktu dan Pemutusan</b>
                                                        <br>
                                                            1. Perjanjian ini berlaku pada Tanggal Efektif dan berakhir dalam waktu 1 (Satu) tahun dari tanggal Perjanjian. Setiap Pihak berhak memutuskan Perjanjian ini dengan pemberitahuan 30 hari sebelumnya. Kewajiban Pihak yang Menerima atas Informasi Rahasia tetap berlaku selamanya walaupun Perjanjian ini telah berakhir atau diputuskan.
                                                            <br>
                                                            2. Ketentuan Perjanjian ini juga berlaku surut terhadap Informasi Rahasia yang diungkapkan sehubungan dengan Maksud sebelum Tanggal Efektif. 
                                                            <br>
                                                            3. Untuk pemutusan Perjanjian ini, Para Pihak sepakat untuk menyampingkan Pasal 1266 dan Pasal 1267 Kitab Undang-Undang Hukum Perdata.
                                                            <br>
                                                        <b style="text-align: center;">Pasal 8
                                                        Hukum yang Berlaku 
                                                        dan 
                                                        Penyelesaian Perselisihan</b> <br>

                                                            1. Perjanjian ini tunduk kepada, dan ditafsirkan berdasarkan hukum Republik Indonesia, dengan mengecualikan prinsip hukum perselisihannya. 
                                                            <br>
                                                            2. Segala perselisihan yang timbul dari pelaksanaan atau penafsiran Perjanjian ini, yang tidak dapat diselesaikan oleh Para Pihak secara musyawarah, pada akhirnya akan diselesaikan berdasarkan peraturan administrasi dan prosedur Badan Arbitrase Nasional Indonesia (selanjutnya disebut “Peraturan”) oleh 3 arbiter yang ditunjuk berdasarkan Peraturan kecuali Para Pihak setuju atas 1 arbiter. Arbitrase dilangsungkan di Jakarta dan bahasa Indonesia dan/atau Inggris digunakan dalam beracara. Putusan BANI bersifat final dan mengikat Para Pihak.
                                                            <br>
                                                        <b style="text-align: center;">Pasal 9
                                                        Pemulihan </b><br>

                                                        Karena pengungkapan atau penggunaan Informasi Rahasia yang tidak sah akan mengurangi nilai hak kepemilikan dari Informasi Rahasia, Pihak yang Menerima menyatakan dan menyetujui bahwa ganti rugi bukanlah suatu pemulihan yang mencukupi dan karenanya, jika Pihak yang Menerima (atau Afiliasinya) melanggar kewajibannya berdasarkan Perjanjian ini, selain mendapatkan ganti rugi, Pihak yang Mengungkapkan berhak atas pemulihan lainnya berdasarkan hukum. <br>

                                                        <b style="text-align: center;">Pasal 10
                                                        Lain-lain </b><br>

                                                            1. Hubungan Para Pihak adalah hubungan yang independen. Perjanjian ini tidak membuktikan atau membuat suatu perwakilan, persekutuan, atau hubungan lainnya yang serupa antara Para Pihak. Setiap Pihak tidak berhak menggunakan nama, nama dagang, merek dagang, merek jasa, atau tanda lainnya dari Pihak lain dalam advertensi, publisitas, atau kegiatan lainnya. <br>

                                                            2. Jika salah satu ketentuan Perjanjian tidak dapat diberlakukan, Para Pihak sepakat bahwa ketidakberlakuan tersebut tidak mempengaruhi keberlakuan dari ketentuan yang lain dalam Perjanjian, dan selanjutnya Para Pihak sepakat untuk mengganti ketentuan yang tidak berlaku tersebut dengan ketentuan yang berlaku yang sedapat mungkin mencerminkan maksud semula dari Para Pihak.
                                                            <br>
                                                            3. Perjanjian ini tidak dapat dialihkan oleh salah satu Pihak tanpa izin tertulis Pihak lainnya. Pihak yang Menerima akan memberitahukan Pihak yang Mengungkapkan jika terjadi perubahan substansial terhadap kepemilikan atau hak atas saham yang mempengaruhi manajemen atau kendali dari Pihak yang Menerima.
                                                            <br>
                                                            4. Pengabaian salah satu Pihak untuk
                                                            mengharuskan Pihak lainnya dalam melaksanakan secara seksama ketentuan Perjanjian ini bukan dianggap sebagai penyampingan hak selanjutnya untuk mengharuskan pelaksanaan ketentuan tersebut atau ketentuan lainnya dari Perjanjian ini. 
                                                            <br>
                                                            5. Perjanjian ini termasuk konsideransnya merupakan pernyataan kesepakatan Para Pihak yang lengkap dan eksklusif, dan menghapuskan semua kesepakatan lainnya, secara lisan maupun tulisan, yang berhubungan dengan Maksud. Perjanjian ini hanya dapat diubah berdasarkan kesepakatan tertulis yang ditandatangani oleh Para Pihak.
                                                            <br>
                                                            6. Segala pemberitahuan atau dokumen yang diperlukan sehubungan dengan Perjanjian ini harus secara tertulis dan dikirimkan dan dianggap telah diberikan sebagaimana ditentukan sebagai berikut: (a) dikirimkan secara langsung atau melalui kurir pada tanggal penerimaan yang tercantum dalam tanda terima dari penerima atau konfirmasi pengiriman yang diterima pengirim dari kurir, (b) dikirimkan melalui faksimile, berdasarkan bukti pengiriman faksimile yang berhasil, dan (c) dikirimkan melalui e-mail, berdasarkan bukti pengiriman e-mail yang berhasil. Pemberitahuan atau dokumen dikirimkan kepada alamat yang tertera di atas atau alamat lainnya yang diberitahukan secara tertulis oleh tiap Pihak. 
                                                            <br>

                                                            7. Setiap judul dari pasal-pasal atau bagian lain Perjanjian hanya untuk memudahkan pembacaan Perjanjian dan tidak mempengaruhi penafsiran Perjanjian.
                                                            <br>
                                                            8. Perjanjian ini dibuat dalam bahasa Indonesia dan Inggris. Jika terdapat perbedaan penafsiran, versi bahasa Indonesia yang berlaku.
                                                            <br>

                                                        Demikian Perjanjian ini dilaksanakan dan ditandatangani oleh Para Pihak yang berwenang pada hari dan tahun sebagaimana tersebut pada awal Perjanjian.<br>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                         <h4 class="panel-title">
                                            <a href="#" class="ing">x</a>
                                      </h4>

                                    </div>
                                    <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <p>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                  <button type="submit" class="btn btn-primary">Request</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
               
            </p>
            
        </section>
    </div>
</div>

<script>

    $('.btn-seller').click(function() {
        $("#seller-form").show();
    });

    $('.buyer-tipe-select').on('change', function() {
        // alert( this.value );
        if(this.value == 1) {
            $('#form-api').show();    
            $('#form-white-label').hide();
            $('#form-ta').hide();
        } else if(this.value == 2) {
            $('#form-white-label').show();
            $('#form-api').hide();   
            $('#form-ta').hide();
        } else {
            $('#form-ta').show();
            $('#form-white-label').hide();
            $('#form-api').hide();   
        }
    });

// $(document).ready(function(){
//  $('#submitseller').click(function(){
//         if(confirm("Are You Sure?")){
//             $("#sellerfrm").submit();
//         }
//  });
// });

// $(document).ready(function(){
//  $('#submitbuyer').click(function(){
//         if(confirm("Are You Sure?")){
//             $("#buyerfrm").submit();
//         }
//  });
// });
</script>