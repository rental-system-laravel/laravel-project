<!-- resources/views/frontend/about.blade.php -->
@extends('layouts.master')

@section('title', 'Property Blade')

@section('content')
<!-- Breadcrumb Section Begin -->
<section class="breadcrumb-section spad set-bg" data-setbg="img/breadcrumb-bg.jpg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <h4>Property Grid</h4>
                    <div class="bt-option">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Property</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Breadcrumb Section End -->

<!-- Property Section Begin -->
<section class="property-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h4>PROPERTY Grid</h4>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ( $properties as $propertiy )

            <div class="col-lg-4 col-md-6">
                <div class="property-item">
                    <div class="pi-pic set-bg" data-setbg="img/property/property-1.jpg">
                        <div class="label" style="{{ $propertiy->availability == 1 ? 'background-color:green;' : 'background-color:red;' }}">
                            {{ $propertiy->availability == 1 ? 'available' : 'rented' }}
                        </div>
                                            </div>
                    <div class="pi-text">
                        <a href="#" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <div class="pt-price">{{ $propertiy->price_per_day }}<span>/Day</span></div>
                        <h5><a href="#">{{ $propertiy->title }}</a></h5>
                        <p><span class="icon_pin_alt"></span> {{ $propertiy->location }}</p>
                        <ul>
                            <li><i class="fa fa-object-group"></i> 2, 283</li>
                            <li><i class="fa fa-bathtub"></i> 03</li>
                            <li><i class="fa fa-bed"></i> 05</li>
                            <li><i class="fa fa-automobile"></i> 01</li>
                        </ul>
                        <div class="pi-agent">
                            <div class="pa-item">
                                <div class="pa-info">
                                    <img src="img/property/posted-by/pb-1.jpg" alt="">
                                    <h6>{{ $propertiy->user->name }}</h6>
                                </div>
                                <div class="pa-text">
                                    123-455-688
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        <div class="loadmore-btn">
            <a href="#">Load more</a>
        </div>
        </div>
    </div>
</section>
<!-- Property Section End -->
@endsection
