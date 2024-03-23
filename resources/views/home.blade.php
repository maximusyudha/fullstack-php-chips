@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
<body>
    {{-- Header --}}
    <div class="row">
        <div class="col-2">  
            <h1>Welcome</h1>
            <h5>Get the latest inspiration from our team on new works 
                Find interesting stories, unique writing, and exclusive content.</h5>
        </div>
        <div class="col-2">
            <img src="{{asset('admin/images/imagehome.png')}}">
        </div>
    </div>


{{-- Artikel --}}
    <section class="small-class">
        <h4 id="artikel">Artikel</h4>
        <div class="line-with-border"></div>
            <div class="row">
                {{-- <a href="{{ route('detail.index') }}"> --}}
                    <div class="col-4">
                        <img src="{{asset('admin/images/jantung.png')}}">
                        <h4>Apa Ciri-Ciri Penyakit Jantung Lemah? Berikut Penjelasannya</h4>
                        <h5>Penyakit jantung lemah (kardiomiopati) menyebabkan berkurangnya aliran darah ke seluruh tubuh. Akibatnya, organ dan jaringan tidak mendapatkan pasokan oksigen dan nutrisi penting yang cukup, seperti yang dikutip dari Very Well Health.
                        </h5>
                    </div>
                {{-- </a>                 --}}
                <div class="col-4">
                    <img src="{{asset('admin/images/belimbing.jpeg')}}">
                    <h4>Resep Jus Belimbing Jahe Kayu Manis,Minuman Rempang Untuk Tambah Imun</h4>
                    <h5>Menerapkan pola hidup sehat bisa dimulai dengan hal sederhana, misalnya mengonsumsi jus yang baik untuk kesehatan</h5>
                </div>
                <div class="col-4">
                    <img src="{{asset('admin/images/jalan.jpg')}}">
                    <h4>7 Tips Wisata ke Lembah Purba, Beli Paket mulai Rp 50.000</h4>
                    <h5>Menerapkan pola hidup sehat bisa dimulai dengan hal sederhana, misalnya mengonsumsi jus yang baik untuk kesehatan.</h5>
                </div>
        </div>
    </section>

    {{-- Featured products --}}
    <section class="small-class">
        <h4 id="essai">Essai</h4>
        <div class="line-with-border"></div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('admin/images/ojol.jpg') }}">
                    <h4>Sering Diremehkan, Profesi Ojol Malah Menyelamatkan Pemuda Tamatan SMA</h4>
                    <h5>Dulu, profesi ojol sempat diremehkan banyak orang. Namun, profesi ini justru menyelamatkan pemuda tamatan SMA dari status pengangguran.</h5>
                </div>
                <div class="col-4">
                    <img src="{{ asset('admin/images/mcd.jpg') }}">
                    <h4>McD Bukan Tempat Nugas yang Layak karena Warmindo dan Coffee Shop Lebih Masuk Akal. Benarkah?</h4>
                    <h5>Apakah benar, kalau McD itu tempat yang layak untuk nugas? Bukankah warmindo dan coffee shop lebih masuk akal buat mahasiswa? </h5>
                </div>
                <div class="col-4">
                    <img src="{{ asset('admin/images/pusing.jpeg') }}">
                    <h4>Pengalaman Menjadi Korban “Marketing Pemaksaan” Pedagang Pasar Tradisional yang Sempat Viral di Jogja</h4>
                    <h5>Trik pedagang di sebuah pasar tradisional Jogja itu sangat “jenius”. Saking jenius, calon pelanggan jadi sangat menyesal dan kapok datang lagi.</h5>
                </div>                
        </div>
    </section>

    {{-- Offer section --}}
    <section class="offer">

    </section>

    {{-- Artist testimonial --}}
    <section class="testimonial">
        <div class="small-container">
            <h4 id="puisi">Puisi</h4>
            <div class="line-with-border"></div>
            <div class="row">
                <div class="col-4">
                    <img src="{{ asset('admin/images/sapardi.jpg') }}" alt="Sapardi Djoko Darmono">
                    <h4>Sapardi Djoko Darmono</h4>
                </div>
                
                <div class="col-4">
                    <img src="{{ asset('admin/images/rendra.jpg') }}" alt="Chairil Anwar">
                    <h4>W.S Rendra</h4>
                </div>
                
                <div class="col-4">
                    <img src="{{ asset('admin/images/sapardi.jpg') }}" alt="Sapardi Djoko Darmono">
                    <h4>Sapardi Djoko Darmono</h4>
                </div>
                
                <div class="col-4">
                    <img src="{{ asset('admin/images/rendra.jpg') }}" alt="Chairil Anwar">
                    <h4>W.S Rendra</h4>
                </div>                
            </div>
        </div>
    </section>

    <!--artist-->
    <section class="small-class">
        <h4 id="essai">Novel</h4>
        <div class="line-with-border"></div>
            <div class="row">
                <div class="col-7">
                    <img src="{{ asset('admin/images/terpikat.jpg') }}">
                    <h3>Terpikat</h3>
                    <p>Ghefira Zakira</p>
                </div>    
                <div class="col-7">
                    <img src="{{ asset('admin/images/172days.jpg') }}">
                    <h3>172 Days</h3>
                    <p>Ghefira Zakira</p>
            </div>
    </section>

    {{-- JS script for toggle menu --}}
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight = "0px")
            {
                MenuItems.style.maxHeight ="200px";
            }
            else
            {
                MenuItems.style.maxHeight ="0px";
            }
        }
    </script>
</body>

@endsection