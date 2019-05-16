<style type="text/css">
    .ex3 {
      height: 400px;
      width: auto;  
      overflow-y: auto;
    }
    .has-error {
        color:red;
    }
    .has-success {
        color:green;
    }
    .form-horizontal .state-error input, .smart-form .state-error select, .smart-form .state-error textarea, .smart-form .radio.state-error i, .smart-form .checkbox.state-error i, .smart-form .toggle.state-error i, .smart-form .state-error .select2-selection {
        background: #fff0f0;
        border-color: #A90329;
    }
</style>
<?php if ($this->session->flashdata('save_status') == 'success'): ?>
    <div style="margin-top: 40px;" id="success-alert" class="alert alert-success"><?php echo $this->session->flashdata('save_message'); ?></div>
<?php endif; ?>
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
             <form action="<?php echo site_url('member/submit_seller') ?>" method="POST">
                <p style="margin-top: 20px;">
                    <b>Privacy Policy</b>
                </p>
                
                <br>
                <div class="card-body pre-scrollable" style="height: 150px; width: 100%;">
                    <p>
                        Applicability
                        By accessing and using this site, your use indicates your agreement with the terms of this Policy. If you do not agree with this Policy, please do not use this site.
                        This Policy is applicable to this and certain other OPSIGO web/mobile sites, but not necessarily, for which special terms and conditions may apply as indicated. All OPSIGO sites to which this Policy is applicable are collectively referred to as this "site". Note that special use terms, or site or page specific terms (referred to as "special terms"), may apply to certain pages/services on this site, but the applicability of any such special terms will be expressly indicated. In the event of any inconsistency between any special terms and this Policy, the applicable special terms will prevail over the terms of this Policy.

                        Anonymous Use
                        In general, most of this site's pages are provided for informational purposes and you will be able to use this site without telling OPSIGO who you are or providing OPSIGO with any personal data about yourself. There are times, however, when in connection with your use of this site OPSIGO may need information about you.

                        Personal Data Provided by You
                        To respond to your questions, fulfill your requests or manage interactive customer programs, it may be necessary to ask for or obtain personal data. If you provide us with any personal data, we may use it to respond to your requests, customize your user experience with us, determine your satisfaction with OPSIGO products and/or services or contact you via mail, e-mail, mobile message or phone, or, in accordance with local law, contact you via the aforementioned channels to inform you of new products, services or promotions we may offer. By providing information to OPSIGO through this site, you acknowledge and consent to the collection, use and disclosure of personally identifying information of the type and for the limited purposes described in this Policy.
                        You expressly accept and give your consent that your personal data obtained in connection with your use of this site may be transferred, if permitted by applicable local legislation, across international borders to server locations supporting this site (including but not limited to transfers from those locations back to the country of your location) for operating and developing this site and OPSIGO services, including transfers to OPSIGO subcontractors or agents, as mentioned below, who perform tasks related to this site, or OPSIGO services, or for the purposes of storing the data in relevant databases, which may be located in Finland or in any other country where OPSIGO has operations. If you place an order for a product, request a service or submit content to this site, we may need to contact you for additional information required to process or fulfill your order and/or request. Unless compelled by applicable law or administrative or judicial order, we will not provide this information to a third party without your permission, except as necessary to process your order, fulfill your requests, manage interactive customer programs or, if you are a corporate user, enable administration of access and usage of this site by authorized personnel in your organization. If allowed by applicable local legislation, OPSIGO may also exchange information between OPSIGO's affiliated (related) companies for the purposes mentioned in this Policy.
                        Because OPSIGO is committed to protecting your privacy, OPSIGO does not engage in the practice of selling or trading personal data to other companies for promotional purposes.

                        Usage of Subcontractors
                        We may use subcontractors to provide some products or services to you. We also may need to share your personal data with these subcontractors so that they can provide services to us. Our subcontractors are not permitted to use such personal data for any other purposes and we impose confidentiality requirements on their services.

                        Visitor Identification - Usage of "Cookies"
                        From time to time, information may be placed on your computer to improve this site and OPSIGO's services for you. This information is commonly referred to as a "cookie", which many web sites use. Cookies are pieces of data stored on your computer's hard drive or browser, and not on this site. They typically enable collection of certain information about your computer, including your internet protocol address, your computer's operating system, your browser type and the address of any referring sites.
                        The use of cookies provides benefits to you, such as eliminating the need for you to enter your password frequently during a session, or, where applicable, re-enter items you place in a shopping cart from visit to visit if you do not finish a transaction on an earlier visit. By showing how and when our visitors use this site or other OPSIGO sites, the use of cookies allows OPSIGO to continue to improve the sites. If you do not wish to receive cookies, or want to be notified of when they are placed, you may set your web browser to do so, if your browser so permits. Please understand that if cookies are turned off, you may not be able to view certain parts of this site that may enhance your visit. Some of our business partners whose content is linked to or from this site may also use cookies. However, we have no access to or control over these cookies. This site also makes use of cookies for website traffic analysis and anonymous demographic profiling.

                        Security

                        OPSIGO has endeavored to take commercially reasonable measures to prevent unauthorized access to and improper use of your personal data submitted to OPSIGO via your use of this site. For example, OPSIGO uses encryption technology when collecting financial personal data such as credit card information. If this site supports on-line transactions, it will use an industry standard security measure, such as the one available through "Secure Sockets Layer" ("SSL"), to protect the confidentiality and security of online transactions. If used, industry standard security measures like SSL authentication ensure that credit card information, as well as other personal data submitted as part of the buying process, is reasonably safe from third party interception.
                        While there are always risks associated with providing personal data, whether in person, by phone or via the internet or other technologies, and no system of technology is completely safe or "tamper"/"hacker" proof, OPSIGO has endeavored to take reasonable precautions which are appropriate to the nature of the information to prevent and minimize such risks in connection with your use of this site.

                        Accuracy of Collected Data
                        OPSIGO will on its own initiative, or at your request, free of charge, replenish, rectify or erase any incomplete, inaccurate or outdated personal data retained by OPSIGO in connection with the operation of this site. Please consult the contact information posted below on this page, if any, or elsewhere on this site to determine how best to contact OPSIGO to update and/or review your personal data and/or opt out of receiving marketing communications from OPSIGO.

                        Minors
                        OPSIGO's policy is to request that "Minors" (the age of Minors is determined by local law where you reside) do not make purchases or engage in other legal acts on this site without the consent of a parent or legal guardian, unless permitted by applicable local law.

                        External Links
                        This site may contain links to other sites. Please note that OPSIGO is not responsible for the privacy practices or contents of any other sites. We recommend that you read the privacy policies of such sites.

                        Changes to this Policy
                        OPSIGO may from time to time change this Policy or change, modify or withdraw access to this site at any time with or without notice. However, if this Policy is changed in a material, adverse way, OPSIGO will post a notice advising of such change at the beginning of this Policy and on this site's home page for 30 days. We recommend that you re-visit this Policy from time to time to learn of any such changes to this Policy.
                        <br>
                        Copyright © OPSIGO, 2017. All rights reserved.
                    </p>
                </div>
                <p style="margin-top: 20px;">
                    <b>Disclaimer</b>
                </p>
                <br>
                <div class="card-body pre-scrollable" style="height: 150px; width: 100%;">
                    <p>
                        Acceptance of terms through use 
                        This web site is an electronic news and information service of OPSIGO. You may print and keep a copy of this Agreement. By using this site, you signify your agreement to all terms, conditions, and notices contained or referenced herein (the "Terms of Use"). It is your responsibility to access this document whenever you visit this web site to determine if there have been any changes to the terms of the Terms of Use. If you do not agree to these Terms of Use please do not access or use this site. We reserve the right, at our discretion, to update or revise these Terms and Conditions of Use at any time. Please check the Terms periodically for changes. Your continued use of this site following the posting of any changes to the Terms of Use constitutes acceptance of those changes. 
                        <br>
                        Copyright 
                        All content included on this site, such as text, graphics, logos, button icons, images, and audio clips, digital downloads, data compilations, and software, is the property of OPSIGO or its content suppliers and protected by Indonesia and international copyright laws. The compilation of all content on this site is the exclusive property of OPSIGO and protected by Indonesia and international copyright laws. All software used on this site is the property of OPSIGO or its software suppliers and protected by Indonesia and international copyright laws. 
                        <br>
                        Trademark 
                        OPSIGO is a registered trademark of OPSIGO in Indonesia and other countries. OPSIGO trademark and trade dress may not be used in connection with any product or service that is likely to cause confusion among customers, or in any manner that disparages or discredits OPSIGO. All other trademarks not owned by OPSIGO or its subsidiaries that appear on this site are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by OPSIGO or its subsidiaries. 
                        <br>
                        Proprietary rights 
                        You acknowledge and agree that all content and materials available on this site are protected by copyrights, trademarks, service marks, patents, trade secrets, or other proprietary rights and laws. Except as expressly authorized by OPSIGO, you agree not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit, or create derivative works from such materials or content. Notwithstanding the above, you may print or download one copy of the materials or content on this site on any single computer for your personal, non-commercial use, provided you keep intact all copyright and other proprietary notices. Systematic retrieval of data or other content from this site to create or compile, directly or indirectly, a collection, compilation, database or directory without written permission from OPSIGO is prohibited. In addition, use of the content or materials for any purpose not expressly permitted in these Terms of Use is prohibited. 
                        As noted above, reproduction, copying, or redistribution for commercial purposes of any materials or design elements on this site is strictly prohibited without the express written permission of OPSIGO. 
                        <br>
                        User’s grant of limited license 
                        By posting or submitting content to this site, you: a) OPSIGO and its affiliates and licensees the right to use (in whole or part), reproduce, display, perform, edit, publish, translate, create derivative works from, adapt, modify, distribute, have distributed, and promote the content in any form, anywhere and for any purpose; and b) warrant and represent that you own or otherwise control all of the rights to the content and that public posting and use of your content by OPSIGO will not infringe or violate the rights of any third party. You also warrant that any «moral rights» in your material have been waived. 
                        <br>
                        Disclaimer of warranties 
                        ALL MATERIALS, INFORMATION, SOFTWARE, PRODUCTS, AND SERVICES INCLUDED IN OR AVAILABLE THROUGH THIS SITE (THE "CONTENT") ARE PROVIDED "AS IS" AND "AS AVAILABLE" FOR YOUR USE. THE SITE, INCLUDING, WITHOUT LIMITATION, ALL CONTENT, FUNCTIONS AND MATERIALS THEREON, IS PROVIDED "AS IS," WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, ANY WARRANTY FOR INFORMATION, DATA, DATA PROCESSING SERVICES, OR UNINTERRUPTED ACCESS, ANY WARRANTIES CONCERNING THE AVAILABILITY, ACCURACY, USEFULNESS, OR CONTENT OF INFORMATION, AND ANY WARRANTIES OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. OPSIGO DOES NOT WARRANT THAT THE SITE OR THE FUNCTIONS, FEATURES OR CONTENT CONTAINED THEREIN WILL BE TIMELY, SECURE, UNINTERRUPTED OR ERROR FREE, OR THAT DEFECTS WILL BE CORRECTED. OPSIGO MAKES NO WARRANTY THAT THE SITE WILL MEET USERS' REQUIREMENTS. NO ADVICE, RESULTS OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM OPSIGO OR THROUGH THE SITE SHALL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN. IF YOU ARE DISSATISFIED WITH THE SITE OR ANY CONTENT OR FUNCTION THEREON, YOUR SOLE REMEDY IS TO DISCONTINUE USING THE SITE. 
                        <br>
                        Limitation of liabilities 
                        UNDER NO CIRCUMSTANCES SHALL OPSIGO OR ANY OF ITS DIRECTORS, OFFICERS, EMPLOYEES, AGENTS, AFFILIATES, SUBSIDIARIES OR ITS LICENSORS BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF OR INABILITY TO USE, THIS SITE. THIS LIMITATION APPLIES WHETHER THE ALLEGED LIABILITY IS BASED ON CONTRACT, TORT, NEGLIGENCE AND STRICT LIABILITY, INCLUDING, WITHOUT LIMITATION, LOSS OF REVENUE, OR ANTICIPATED PROFITS OR LOST BUSINESS OR LOST SALES, EVEN IF OPSIGO HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. BECAUSE SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, OPSIGO’S LIABILITY IN SUCH JURISDICTIONS SHALL BE LIMITED TO THE EXTENT PERMITTED BY LAW. 
                        <br>
                        Indemnification 
                        Upon a request by OPSIGO, you agree to defend, indemnify, and hold harmless OPSIGO and its subsidiary and other affiliated companies, and their employees, contractors, officers, and directors from all liabilities, claims, and expenses, including attorney's fees that arise from your use or misuse of this site. OPSIGO reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to indemnification by you, in which event you will cooperate with OPSIGO in asserting any available defenses. 
                        <br>
                        International use 
                        OPSIGO makes no representation that materials on this site are appropriate or available for use in locations outside Indonesia, and accessing them from territories where their contents are illegal is prohibited. Those who choose to access this site from other locations do so on their own initiative and are responsible for compliance with local laws. 
                        <br>
                        Internet access 
                        You acknowledge and agree that in connection with your use of the Site you must: (a) provide for your own access to the World Wide Web and pay any service fees associated with such access, and (b) provide all equipment necessary for you to make such access and connection to the World Wide Web, including a computer, software, a modem and a means of connecting to or accessing the Internet. OPSIGO shall not be responsible for any malfunctions, errors, crashes or other adverse events that may occur from your use of the Site. 
                        <br>
                        Third party sites 
                        This site may produce automated search results or otherwise link you to other sites on the Internet. These sites may contain information or material that some people may find inappropriate or offensive. These other sites are not under the control of OPSIGO, and you acknowledge that OPSIGO is not responsible or liable directly or indirectly for the accuracy, copyright compliance, legality, decency, or any other aspect of the content of such sites. The inclusion of such a link does not imply endorsement of the site by OPSIGO or any association with its operators. 
                        Unsolicited Material 
                        Unless specifically requested, OPSIGO does not solicit nor does it wish to receive any confidential, secret or proprietary information or other material from you through the Site, any of its services, by e-mail, or in any other way. 
                        <br>
                        Choice of law 
                        We control and operate this Site from our offices in Indonesia. Your use of this web site and all related rights and obligations, shall be governed by the Indonesia laws. Any legal action or proceeding with respect to this web site, related to these Terms and Conditions of use or any matter related thereto may be brought exclusively in the courts of Jakarta, Indonesia. By using this web site, you expressly agree and accept generally and unconditionally the jurisdiction of the aforesaid courts and irrevocably waive any objection to such jurisdiction. 
                        <br>
                        Termination 
                        OPSIGO reserves the right, in its sole discretion, to terminate your access to all or part of this site, with or without notice. 
                        <br>
                        © Copyright by OPSIGO 2017 - All rights reserved.
                    </p>
                </div>
                <br><br>
                <div class="form-group">
                    <div class="controls col-md-8">
                        <div id="div_id_terms" class="checkbox required">
                            <label for="id_terms" class=" requiredField">
                                <label class="radio-inline"> 
                                    <input class="input-ms checkboxinput" id="id_terms" name="agree_policy_check_seller" required value="YES" style="margin-bottom: 10px" type="checkbox" />
                                    Agree with the terms and conditions
                                    <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                </label>
                            </label>
                        </div> 
                    </div>
                </div>
                <hr>
                <p style="margin-top: 30px; margin-left: 37px;">
                    <button class="btn btn-success btn-seller" type="submit">
                        Submit
                    </button>
                </p>
            </form>
        </section>

        <section id="content2" class="tab-content">
            <form class="form-horizontal" id="forms" method="POST" action="<?php echo site_url('member/submit_buyer') ?>" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <p>
                    <div class="form-group">
                        <div>
                            <label>Pilih Tipe Buyer</label>
                        <select class="form-control buyer-tipe-select" required name="buyer_type" id="buyer_type">
                            <option value="">-- Choose --</option>
                            <option value="1">API</option>
                            <option value="2">White Label</option>
                            <option value="3">Travel Agent</option>
                        </select>
                        </div>
                    </div>
                </p>
                <p>
                    <div class="form-group">
                        <div class="panel-body" id="form-api" style="display: none;">
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

                                                ITX, suatu perseroan terbatas yang didirikan berdasarkan hukum negara Republik Indonesia, berdomisili di Jl. Kebon Sirih No.12 RT.11/RW.2, Gambir Kota Jakarta Pusat 10110, Indonesia, dalam hal ini diwakili oleh  Edward Nelson Jusuf, dalam jabatannya selaku Direktur Utama dari dan karenanya sah bertindak untuk dan atas nama ITX; and

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
                                            <div class="form-group">
                                                <div class="controls col-md-8">
                                                    <div id="div_id_terms" class="checkbox required">
                                                        <label for="id_terms" class=" requiredField">
                                                            <label class="radio-inline"> 
                                                                <input class="input-ms checkboxinput" id="agree_nda_check" name="agree_nda_check" style="margin-bottom: 10px" type="checkbox" value="YES" />
                                                                <div>
                                                                    Agree with the terms and conditions
                                                                </div>
                                                            </label>
                                                        </label>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="panel panel-default ">
                                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                                        <h4 class="panel-title">
                                            <a href="#" class="ing">IP Whitelist</a>
                                        </h4>
                                    </div>
                                    <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                                        <div class="panel-body">
                                            <p>
                                                <div id="signupbox" style=" margin-top:10px" class="mainbox">
                                                    <div class="panel panel-info">
                                                        <div class="panel-heading">
                                                            <div class="panel-title">
                                                                <center>IP Registration Form</center></div>
                                                        </div>  
                                                        <div class="panel-body" >        
                                                            <div class="col-md-12">
                                                                <h4 style="margin-left: 90px">
                                                                    <strong>Please describe the details of IP Adresses for Development and Production Sites</strong>
                                                                    <hr>
                                                                </h4> <br>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Development IP Address (max 2)
                                                                        <span style="color: red;">*</span> 
                                                                    </label>
                                                                    <div class="controls col-md-8"> 
                                                                        <input class="input-md form-control" name="ip_dev_1" placeholder="IP Address (1)" style="margin-bottom: 10px" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4"></label>
                                                                    <div class="controls col-md-8"> 
                                                                        <input class="input-md form-control" name="ip_dev_2" placeholder="IP Address (2)" style="margin-bottom: 10px" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Production IP Address (only 1)
                                                                        <span style="color: red;">*</span> 
                                                                    </label>
                                                                    <div class="controls col-md-8"> 
                                                                        <input class="input-md form-control" name="ip_production" placeholder="Production IP Address (only 1)" style="margin-bottom: 10px" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Protocols
                                                                        <span style="color: red;">*</span>
                                                                    </label>
                                                                    <div class="controls col-md-8"> 
                                                                        <input class="input-md form-control" name="protocols" placeholder="Protocols" style="margin-bottom: 10px" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Ports 
                                                                        <span style="color: red;">*</span>
                                                                    </label>
                                                                    <div class="controls col-md-8"> 
                                                                        <input class="input-md form-control" name="ports" placeholder="Ports" style="margin-bottom: 10px" type="text" />
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label class="control-label col-md-4">Any others related information (optional) 
                                                                    </label>
                                                                    <div class="controls col-md-8"> 
                                                                        <textarea name="remark" class="form-control"></textarea>
                                                                    </div>
                                                                </div><br>
                                                                <h4 style="margin-left: 90px">
                                                                    <strong>For any change request please fill this.  </strong>
                                                                    <hr>
                                                                </h4> <br>
                                                                <div class="form-group">
                                                                    <label  class="control-label col-md-4"> Request<span style="color: red;">*</span> </label>
                                                                    <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                                                        <label class="radio-inline">
                                                                            <input type="radio" checked="checked" name="change_request" id="change_request" value="1"  style="margin-bottom: 10px">Permanent 
                                                                        </label>
                                                                        <label class="radio-inline"> 
                                                                            <input type="radio" name="change_request" id="change_request" value="2"  style="margin-bottom: 10px">Temporary 
                                                                        </label>
                                                                    </div>
                                                                </div> 
                                                                <div class="temporary" style="display: none;">
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">Start Date<span>*</span> </label>
                                                                        <div class="controls col-md-8"> 
                                                                            <input class="input-md form-control datepicker" id="temp_start_date" name="temp_start_date" placeholder="Start Date" style="margin-bottom: 10px" type="text" />
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label class="control-label col-md-4">End Date<span>*</span> </label>
                                                                        <div class="controls col-md-8"> 
                                                                            <input class="input-md form-control datepicker" id="" name="    temp_end_date" placeholder="End Date" style="margin-bottom: 10px" type="text" />
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="controls col-md-8">
                                                                    <div id="div_id_terms" class="checkbox required">
                                                                        <label for="id_terms" class=" requiredField">
                                                                            <label class="radio-inline"> 
                                                                                <input class="input-ms checkboxinput" id="agree_ip_whitelist" name="agree_ip_whitelist" required style="margin-bottom: 10px" type="checkbox" value="YES" />
                                                                                Agree with the terms and conditions
                                                                            </label>
                                                                            <input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
                                                                        </label>
                                                                    </div> 
                                                                </div>
                                                            </div> 
                                                        </div>
                                                    </div>
                                                </div> 
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </p>
                <p style="margin-top: 20px;">
                    <b>Privacy Policy</b>
                </p>
                <br>
                <div class="card-body pre-scrollable" style="height: 150px; width: 100%;">
                    <p>
                        Applicability
                        By accessing and using this site, your use indicates your agreement with the terms of this Policy. If you do not agree with this Policy, please do not use this site.
                        This Policy is applicable to this and certain other OPSIGO web/mobile sites, but not necessarily, for which special terms and conditions may apply as indicated. All OPSIGO sites to which this Policy is applicable are collectively referred to as this "site". Note that special use terms, or site or page specific terms (referred to as "special terms"), may apply to certain pages/services on this site, but the applicability of any such special terms will be expressly indicated. In the event of any inconsistency between any special terms and this Policy, the applicable special terms will prevail over the terms of this Policy.

                        Anonymous Use
                        In general, most of this site's pages are provided for informational purposes and you will be able to use this site without telling OPSIGO who you are or providing OPSIGO with any personal data about yourself. There are times, however, when in connection with your use of this site OPSIGO may need information about you.

                        Personal Data Provided by You
                        To respond to your questions, fulfill your requests or manage interactive customer programs, it may be necessary to ask for or obtain personal data. If you provide us with any personal data, we may use it to respond to your requests, customize your user experience with us, determine your satisfaction with OPSIGO products and/or services or contact you via mail, e-mail, mobile message or phone, or, in accordance with local law, contact you via the aforementioned channels to inform you of new products, services or promotions we may offer. By providing information to OPSIGO through this site, you acknowledge and consent to the collection, use and disclosure of personally identifying information of the type and for the limited purposes described in this Policy.
                        You expressly accept and give your consent that your personal data obtained in connection with your use of this site may be transferred, if permitted by applicable local legislation, across international borders to server locations supporting this site (including but not limited to transfers from those locations back to the country of your location) for operating and developing this site and OPSIGO services, including transfers to OPSIGO subcontractors or agents, as mentioned below, who perform tasks related to this site, or OPSIGO services, or for the purposes of storing the data in relevant databases, which may be located in Finland or in any other country where OPSIGO has operations. If you place an order for a product, request a service or submit content to this site, we may need to contact you for additional information required to process or fulfill your order and/or request. Unless compelled by applicable law or administrative or judicial order, we will not provide this information to a third party without your permission, except as necessary to process your order, fulfill your requests, manage interactive customer programs or, if you are a corporate user, enable administration of access and usage of this site by authorized personnel in your organization. If allowed by applicable local legislation, OPSIGO may also exchange information between OPSIGO's affiliated (related) companies for the purposes mentioned in this Policy.
                        Because OPSIGO is committed to protecting your privacy, OPSIGO does not engage in the practice of selling or trading personal data to other companies for promotional purposes.

                        Usage of Subcontractors
                        We may use subcontractors to provide some products or services to you. We also may need to share your personal data with these subcontractors so that they can provide services to us. Our subcontractors are not permitted to use such personal data for any other purposes and we impose confidentiality requirements on their services.

                        Visitor Identification - Usage of "Cookies"
                        From time to time, information may be placed on your computer to improve this site and OPSIGO's services for you. This information is commonly referred to as a "cookie", which many web sites use. Cookies are pieces of data stored on your computer's hard drive or browser, and not on this site. They typically enable collection of certain information about your computer, including your internet protocol address, your computer's operating system, your browser type and the address of any referring sites.
                        The use of cookies provides benefits to you, such as eliminating the need for you to enter your password frequently during a session, or, where applicable, re-enter items you place in a shopping cart from visit to visit if you do not finish a transaction on an earlier visit. By showing how and when our visitors use this site or other OPSIGO sites, the use of cookies allows OPSIGO to continue to improve the sites. If you do not wish to receive cookies, or want to be notified of when they are placed, you may set your web browser to do so, if your browser so permits. Please understand that if cookies are turned off, you may not be able to view certain parts of this site that may enhance your visit. Some of our business partners whose content is linked to or from this site may also use cookies. However, we have no access to or control over these cookies. This site also makes use of cookies for website traffic analysis and anonymous demographic profiling.

                        Security

                        OPSIGO has endeavored to take commercially reasonable measures to prevent unauthorized access to and improper use of your personal data submitted to OPSIGO via your use of this site. For example, OPSIGO uses encryption technology when collecting financial personal data such as credit card information. If this site supports on-line transactions, it will use an industry standard security measure, such as the one available through "Secure Sockets Layer" ("SSL"), to protect the confidentiality and security of online transactions. If used, industry standard security measures like SSL authentication ensure that credit card information, as well as other personal data submitted as part of the buying process, is reasonably safe from third party interception.
                        While there are always risks associated with providing personal data, whether in person, by phone or via the internet or other technologies, and no system of technology is completely safe or "tamper"/"hacker" proof, OPSIGO has endeavored to take reasonable precautions which are appropriate to the nature of the information to prevent and minimize such risks in connection with your use of this site.

                        Accuracy of Collected Data
                        OPSIGO will on its own initiative, or at your request, free of charge, replenish, rectify or erase any incomplete, inaccurate or outdated personal data retained by OPSIGO in connection with the operation of this site. Please consult the contact information posted below on this page, if any, or elsewhere on this site to determine how best to contact OPSIGO to update and/or review your personal data and/or opt out of receiving marketing communications from OPSIGO.

                        Minors
                        OPSIGO's policy is to request that "Minors" (the age of Minors is determined by local law where you reside) do not make purchases or engage in other legal acts on this site without the consent of a parent or legal guardian, unless permitted by applicable local law.

                        External Links
                        This site may contain links to other sites. Please note that OPSIGO is not responsible for the privacy practices or contents of any other sites. We recommend that you read the privacy policies of such sites.

                        Changes to this Policy
                        OPSIGO may from time to time change this Policy or change, modify or withdraw access to this site at any time with or without notice. However, if this Policy is changed in a material, adverse way, OPSIGO will post a notice advising of such change at the beginning of this Policy and on this site's home page for 30 days. We recommend that you re-visit this Policy from time to time to learn of any such changes to this Policy.
                        <br>
                        Copyright © OPSIGO, 2017. All rights reserved.
                    </p>
                </div>
                <p style="margin-top: 20px;">
                    <b>Disclaimer</b>
                </p>

                <br>
                <div class="card-body pre-scrollable" style="height: 150px; width: 100%;">
                    <p>
                        Acceptance of terms through use 
                        This web site is an electronic news and information service of OPSIGO. You may print and keep a copy of this Agreement. By using this site, you signify your agreement to all terms, conditions, and notices contained or referenced herein (the "Terms of Use"). It is your responsibility to access this document whenever you visit this web site to determine if there have been any changes to the terms of the Terms of Use. If you do not agree to these Terms of Use please do not access or use this site. We reserve the right, at our discretion, to update or revise these Terms and Conditions of Use at any time. Please check the Terms periodically for changes. Your continued use of this site following the posting of any changes to the Terms of Use constitutes acceptance of those changes. 
                        <br>
                        Copyright 
                        All content included on this site, such as text, graphics, logos, button icons, images, and audio clips, digital downloads, data compilations, and software, is the property of OPSIGO or its content suppliers and protected by Indonesia and international copyright laws. The compilation of all content on this site is the exclusive property of OPSIGO and protected by Indonesia and international copyright laws. All software used on this site is the property of OPSIGO or its software suppliers and protected by Indonesia and international copyright laws. 
                        <br>
                        Trademark 
                        OPSIGO is a registered trademark of OPSIGO in Indonesia and other countries. OPSIGO trademark and trade dress may not be used in connection with any product or service that is likely to cause confusion among customers, or in any manner that disparages or discredits OPSIGO. All other trademarks not owned by OPSIGO or its subsidiaries that appear on this site are the property of their respective owners, who may or may not be affiliated with, connected to, or sponsored by OPSIGO or its subsidiaries. 
                        <br>
                        Proprietary rights 
                        You acknowledge and agree that all content and materials available on this site are protected by copyrights, trademarks, service marks, patents, trade secrets, or other proprietary rights and laws. Except as expressly authorized by OPSIGO, you agree not to sell, license, rent, modify, distribute, copy, reproduce, transmit, publicly display, publicly perform, publish, adapt, edit, or create derivative works from such materials or content. Notwithstanding the above, you may print or download one copy of the materials or content on this site on any single computer for your personal, non-commercial use, provided you keep intact all copyright and other proprietary notices. Systematic retrieval of data or other content from this site to create or compile, directly or indirectly, a collection, compilation, database or directory without written permission from OPSIGO is prohibited. In addition, use of the content or materials for any purpose not expressly permitted in these Terms of Use is prohibited. 
                        As noted above, reproduction, copying, or redistribution for commercial purposes of any materials or design elements on this site is strictly prohibited without the express written permission of OPSIGO. 
                        <br>
                        User’s grant of limited license 
                        By posting or submitting content to this site, you: a) OPSIGO and its affiliates and licensees the right to use (in whole or part), reproduce, display, perform, edit, publish, translate, create derivative works from, adapt, modify, distribute, have distributed, and promote the content in any form, anywhere and for any purpose; and b) warrant and represent that you own or otherwise control all of the rights to the content and that public posting and use of your content by OPSIGO will not infringe or violate the rights of any third party. You also warrant that any «moral rights» in your material have been waived. 
                        <br>
                        Disclaimer of warranties 
                        ALL MATERIALS, INFORMATION, SOFTWARE, PRODUCTS, AND SERVICES INCLUDED IN OR AVAILABLE THROUGH THIS SITE (THE "CONTENT") ARE PROVIDED "AS IS" AND "AS AVAILABLE" FOR YOUR USE. THE SITE, INCLUDING, WITHOUT LIMITATION, ALL CONTENT, FUNCTIONS AND MATERIALS THEREON, IS PROVIDED "AS IS," WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESS OR IMPLIED, INCLUDING, WITHOUT LIMITATION, ANY WARRANTY FOR INFORMATION, DATA, DATA PROCESSING SERVICES, OR UNINTERRUPTED ACCESS, ANY WARRANTIES CONCERNING THE AVAILABILITY, ACCURACY, USEFULNESS, OR CONTENT OF INFORMATION, AND ANY WARRANTIES OF TITLE, NON-INFRINGEMENT, MERCHANTABILITY OR FITNESS FOR A PARTICULAR PURPOSE. OPSIGO DOES NOT WARRANT THAT THE SITE OR THE FUNCTIONS, FEATURES OR CONTENT CONTAINED THEREIN WILL BE TIMELY, SECURE, UNINTERRUPTED OR ERROR FREE, OR THAT DEFECTS WILL BE CORRECTED. OPSIGO MAKES NO WARRANTY THAT THE SITE WILL MEET USERS' REQUIREMENTS. NO ADVICE, RESULTS OR INFORMATION, WHETHER ORAL OR WRITTEN, OBTAINED BY YOU FROM OPSIGO OR THROUGH THE SITE SHALL CREATE ANY WARRANTY NOT EXPRESSLY MADE HEREIN. IF YOU ARE DISSATISFIED WITH THE SITE OR ANY CONTENT OR FUNCTION THEREON, YOUR SOLE REMEDY IS TO DISCONTINUE USING THE SITE. 
                        <br>
                        Limitation of liabilities 
                        UNDER NO CIRCUMSTANCES SHALL OPSIGO OR ANY OF ITS DIRECTORS, OFFICERS, EMPLOYEES, AGENTS, AFFILIATES, SUBSIDIARIES OR ITS LICENSORS BE LIABLE FOR ANY DIRECT, INDIRECT, PUNITIVE, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES THAT RESULT FROM THE USE OF OR INABILITY TO USE, THIS SITE. THIS LIMITATION APPLIES WHETHER THE ALLEGED LIABILITY IS BASED ON CONTRACT, TORT, NEGLIGENCE AND STRICT LIABILITY, INCLUDING, WITHOUT LIMITATION, LOSS OF REVENUE, OR ANTICIPATED PROFITS OR LOST BUSINESS OR LOST SALES, EVEN IF OPSIGO HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGE. BECAUSE SOME JURISDICTIONS DO NOT ALLOW THE EXCLUSION OR LIMITATION OF INCIDENTAL OR CONSEQUENTIAL DAMAGES, OPSIGO’S LIABILITY IN SUCH JURISDICTIONS SHALL BE LIMITED TO THE EXTENT PERMITTED BY LAW. 
                        <br>
                        Indemnification 
                        Upon a request by OPSIGO, you agree to defend, indemnify, and hold harmless OPSIGO and its subsidiary and other affiliated companies, and their employees, contractors, officers, and directors from all liabilities, claims, and expenses, including attorney's fees that arise from your use or misuse of this site. OPSIGO reserves the right, at its own expense, to assume the exclusive defense and control of any matter otherwise subject to indemnification by you, in which event you will cooperate with OPSIGO in asserting any available defenses. 
                        <br>
                        International use 
                        OPSIGO makes no representation that materials on this site are appropriate or available for use in locations outside Indonesia, and accessing them from territories where their contents are illegal is prohibited. Those who choose to access this site from other locations do so on their own initiative and are responsible for compliance with local laws. 
                        <br>
                        Internet access 
                        You acknowledge and agree that in connection with your use of the Site you must: (a) provide for your own access to the World Wide Web and pay any service fees associated with such access, and (b) provide all equipment necessary for you to make such access and connection to the World Wide Web, including a computer, software, a modem and a means of connecting to or accessing the Internet. OPSIGO shall not be responsible for any malfunctions, errors, crashes or other adverse events that may occur from your use of the Site. 
                        <br>
                        Third party sites 
                        This site may produce automated search results or otherwise link you to other sites on the Internet. These sites may contain information or material that some people may find inappropriate or offensive. These other sites are not under the control of OPSIGO, and you acknowledge that OPSIGO is not responsible or liable directly or indirectly for the accuracy, copyright compliance, legality, decency, or any other aspect of the content of such sites. The inclusion of such a link does not imply endorsement of the site by OPSIGO or any association with its operators. 
                        Unsolicited Material 
                        Unless specifically requested, OPSIGO does not solicit nor does it wish to receive any confidential, secret or proprietary information or other material from you through the Site, any of its services, by e-mail, or in any other way. 
                        <br>
                        Choice of law 
                        We control and operate this Site from our offices in Indonesia. Your use of this web site and all related rights and obligations, shall be governed by the Indonesia laws. Any legal action or proceeding with respect to this web site, related to these Terms and Conditions of use or any matter related thereto may be brought exclusively in the courts of Jakarta, Indonesia. By using this web site, you expressly agree and accept generally and unconditionally the jurisdiction of the aforesaid courts and irrevocably waive any objection to such jurisdiction. 
                        <br>
                        Termination 
                        OPSIGO reserves the right, in its sole discretion, to terminate your access to all or part of this site, with or without notice. 
                        <br>
                        © Copyright by OPSIGO 2017 - All rights reserved.
                    </p>
                </div>
                <p>
                    <div class="form-group">
                        <div class="controls col-md-8">
                            <div id="div_id_terms" class="checkbox required">
                                <label for="id_terms" class=" requiredField">
                                    <label class="radio-inline"> 
                                        <input class="input-ms checkboxinput" id="agree_policy_check_buyer" name="agree_policy_check_buyer" value="YES" required style="margin-bottom: 10px" type="checkbox" />
                                        Agree with the terms and conditions
                                    </label>
                                </label>
                            </div> 
                        </div>
                    </div>
                </p>
                <p style="margin-top: 30px; margin-left: 20px;">
                    <button type="submit" class="btn btn-submit btn-primary">Submit</button>
                </p>
            </form>
        </section>
    </div>
</div>
<!-- load js -->
<?php $this->load->view('member/account_role_js'); ?>
<!-- end load -->