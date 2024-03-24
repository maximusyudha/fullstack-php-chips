@extends('layouts.main')

@section('container')
<link rel="stylesheet" href="{{ asset('admin/css/home.css') }}">
<body>
    {{-- Header --}}
    <div class="row">
        <div class="col-2">  
            <h1>Welcome To Pena Room!</h1>
            <h5>Get the latest inspiration from our team on new works 
                Find interesting stories, unique writing, and exclusive content.</h5>
        </div>
        <div class="col-2">
            <img src="{{asset('admin/images/imagehome.png')}}">
        </div>
    </div>

    {{-- Display Artikel --}}
    <section class="small-class">
        <h4 id="artikel">Artikel</h4>
        <div class="line-with-border"></div>
        <div class="row">
            @foreach($articles as $article)
            <div class="col-4">
                <a href="{{ route('items.show', $article->id) }}">
                    <img src="{{ asset('images/' . $article->image) }}">
                    <h4>{{ $article->title }}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Display Essai --}}
    <section class="small-class">
        <h4 id="essai">Essai</h4>
        <div class="line-with-border"></div>
        <div class="row">
            @foreach($essays as $essay)
            <div class="col-4">
                <a href="{{ route('items.show', $essay->id) }}">
                    <img src="{{ asset('images/' . $essay->image) }}">
                    <h4>{{ $essay->title }}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- Display Puisi --}}
    <section class="testimonial">
        <h4 id="puisi">Puisi</h4>
        <div class="line-with-border"></div>
        <div class="row">
            @foreach($poems as $poem)
            <div class="col-4">
                <a href="{{ route('items.show', $poem->id) }}">
                    <img src="{{ asset('images/' . $poem->image) }}">
                    <h4>{{ $poem->title }}</h4>
                </a>
            </div>
            @endforeach
        </div>
    </section>

    {{-- JS script for toggle menu --}}
    <script>
        var MenuItems = document.getElementById("MenuItems");

        MenuItems.style.maxHeight = "0px";

        function menutoggle(){
            if(MenuItems.style.maxHeight = "0px")
            {
                MenuItems.style.maxHeight ="1px";
            }
            else
            {
                MenuItems.style.maxHeight ="0px";
            }
        }
    </script>
</body>

@endsection
