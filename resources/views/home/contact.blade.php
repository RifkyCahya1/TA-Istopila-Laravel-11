@extends('main')

@section('content')
@include('Navbar_Footer.navbar')
<div class="container-fluid" style="padding: 30px 25px !important;">
    <div class="row">
        <div class="col-md-12">
            <h4 class="judul-map">Halo!</h4>
            <p class="teks">Senang bisa membantu. Kami siap menjawab pertanyaan tentang apapun yang terlintas di pikiranmu.</p>

            <p class="teks" style="font-weight: bold;">Klik tombol di bawah ini jika ada pertanyaan</p>
            <a href="https://api.whatsapp.com/send?phone=6287790010062&text=Hallo%20kak%20istopila" class="custom-button" style="width: 100%;"><i class="bi bi-whatsapp" style="margin-right: 5px;"></i>Whatsapp</a>
            <a href="https://www.instagram.com/istopila/" class="custom-button" style="width: 100%;"><i class="bi bi-instagram" style="margin-right: 5px;"></i>Instagram</a>

            <hr style="border: 1px solid black; margin-top: 30px;">
            <h4 class="judul-map">Frequently Asked Questions</h5>
            <p class="teks">Temukan jawaban dari pertanyaan sering dari setiap customer kami untuk membantu Anda cepat mendapat informasi.</p>
            
            <div class="accordion accordion-flush" id="accordionFlushFaq">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        Bagaimana Cara Melakukan Pemesanan ?
                    </button>
                    </h2>
                    <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body"><h6>Sebelum melakukan pemesanan pastikan kamu punya akun terlebih dahulu yaa. Klik disini untuk <a href="register">Registrasi</a> atau <a href="login">Login</a>
                        </h6><br>Untuk melakukan pemesanan, Anda dapat mengisi form pemesanan yang sudah kami siapkan. Setelah Anda mengisi form pemesanan tersebut, kami akan memberikan total biayanya. Jika Anda setuju dengan biaya tersebut, Anda dapat melakukan pembayaran sesuai dengan metode pembayaran yang kami sediakan.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        Apa saja paket foto yang tersedia ? 
                    </button>
                    </h2>
                    <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushFaq">
                    <div class="accordion-body">Kami meyediakan paket foto mulai dari harga Rp. 500.0000. 
                        <br>Paket foto yang tersedia sebagai berikut : 
                        <h6> 
                            <ol><br>
                            <li style="margin-bottom: 10px;">Couple : 3 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive)</li>
                            <li style="margin-bottom: 10px;">Pre-Wedding : 6 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive)</li>
                            <li style="margin-bottom: 10px;">Wedding : 10 jam sesi pemotretan, All Images Color Edited, Online Client Gallery (Google Drive),  Wedding Album 20x30 30s</li>
                            </ol>
                        </h6>
                    </div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                        Bagaimana cara saya menerima foto saya ? 
                    </button>
                    </h2>
                    <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body">Untuk menerima foto, kami biasanya memerlukan waktu hingga 7 hari untuk menyelesaikan proses pengeditan sesuai dengan antrian. Setelah selesai, kami akan memberikan akses ke folder file foto Anda melalui Google Drive, baik melalui chat WhatsApp maupun email. Jika Anda berada di Daerah Khusus Jakarta, kami dapat mengirimkan hasil cetakan foto langsung ke alamat Anda tanpa biaya tambahan dalam waktu 1-2 hari kerja.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingfour">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefour" aria-expanded="false" aria-controls="flush-collapsefour">
                        Bisakah kami memilih lokasi pemotretan sendiri?
                    </button>
                    </h2>
                    <div id="flush-collapsefour" class="accordion-collapse collapse" aria-labelledby="flush-headingfour" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body">Tentu saja! Kami sangat fleksibel dalam pemilihan lokasi. Kami juga bisa memberikan rekomendasi lokasi jika diperlukan.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingfive">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsefive" aria-expanded="false" aria-controls="flush-collapsefive">
                        Apakah Istopila menerima permintaan khusus atau tema tertentu untuk pemotretan?
                    </button>
                    </h2>
                    <div id="flush-collapsefive" class="accordion-collapse collapse" aria-labelledby="flush-headingfive" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body">Ya, kami sangat terbuka untuk bekerja dengan tema atau konsep tertentu. Anda dapat berdiskusi dengan kami mengenai ide atau permintaan khusus Anda.</div>
                    </div>
                </div>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="flush-headingsix">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapsesix" aria-expanded="false" aria-controls="flush-collapsesix">
                        Bagaimana cara menghubungi Istopila untuk konsultasi atau pertanyaan lebih lanjut?
                    </button>
                    </h2>
                    <div id="flush-collapsesix" class="accordion-collapse collapse" aria-labelledby="flush-headingsix" data-bs-parent="#accordionFlushFaq">
                        <div class="accordion-body">Anda dapat menghubungi kami melalui nomor telepon, email, atau formulir kontak di website kami. Kami akan dengan senang hati menjawab semua pertanyaan Anda.</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection