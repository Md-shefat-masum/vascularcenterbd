@php
    $page=[
        "seo"=>$website_info['Seo Kewords'][0],
        'description'=>strip_tags($about),
        'title'=>"About Us",
        'image'=>"/contents/frontend/images/fav-icon/favicon-32x32.png",
    ];
@endphp
@extends("fontend.layouts.fontend",['title'=>'About Page',$page])
@section("contents")
    <section id='about_section_one'>
        <div class="container">
            @include('fontend.home.about',['data' => $about, 'image' => $about_image])
        </div>
    </section>
@endsection