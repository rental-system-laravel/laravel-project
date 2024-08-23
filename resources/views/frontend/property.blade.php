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
<!-- Search Section Begin -->
<section class="search-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="section-title">
                    <h4>what would you rather to book?</h4>
                </div>
            </div>

        </div>
        <div class="search-form-content">
            <form action="#" class="filter-form">
                <select class="sm-width">
                    <option value="">Chose The City</option>
                </select>
                <select class="sm-width">
                    <option value="">Location</option>
                </select>
                <select class="sm-width">
                    <option value="">Property Status</option>
                </select>
                <select class="sm-width">
                    <option value="">Property Type</option>
                </select>
                <select class="sm-width">
                    <option value="">No Of Bedrooms</option>
                </select>
                <select class="sm-width">
                    <option value="">No Of Bathrooms</option>
                </select>
                <div class="room-size-range-wrap sm-width">
                    <div class="price-text">
                        <label for="roomsizeRange">Size:</label>
                        <input type="text" id="roomsizeRange" readonly>
                    </div>
                    <div id="roomsize-range" class="slider"></div>
                </div>
                <div class="price-range-wrap sm-width">
                    <div class="price-text">
                        <label for="priceRange">Price:</label>
                        <input type="text" id="priceRange" readonly>
                    </div>
                    <div id="price-range" class="slider"></div>
                </div>
                <button type="button" class="search-btn sm-width">Search</button>
            </form>
        </div>
        <div class="more-option">
            <div class="accordion" id="accordionExample">
                <div class="card">
                    <div class="card-heading active">
                        <a data-toggle="collapse" data-target="#collapseOne">
                            More Search Options
                        </a>
                    </div>
                    <div id="collapseOne" class="collapse" data-parent="#accordionExample">
                        <div class="card-body">
                            <div class="mo-list">
                                <div class="ml-column">
                                    <label for="air">Air conditioning
                                        <input type="checkbox" id="air">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lundry">Laundry
                                        <input type="checkbox" id="lundry">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="refrigerator">Refrigerator
                                        <input type="checkbox" id="refrigerator">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="washer">Washer
                                        <input type="checkbox" id="washer">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column">
                                    <label for="barbeque">Barbeque
                                        <input type="checkbox" id="barbeque">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="lawn">Lawn
                                        <input type="checkbox" id="lawn">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="sauna">Sauna
                                        <input type="checkbox" id="sauna">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="wifi">Wifi
                                        <input type="checkbox" id="wifi">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column">
                                    <label for="dryer">Dryer
                                        <input type="checkbox" id="dryer">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="microwave">Microwave
                                        <input type="checkbox" id="microwave">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="pool">Swimming Pool
                                        <input type="checkbox" id="pool">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="window">Window Coverings
                                        <input type="checkbox" id="window">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                                <div class="ml-column last-column">
                                    <label for="gym">Gym
                                        <input type="checkbox" id="gym">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="shower">OutdoorShower
                                        <input type="checkbox" id="shower">
                                        <span class="checkbox"></span>
                                    </label>
                                    <label for="tv">Tv Cable
                                        <input type="checkbox" id="tv">
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Search Section End -->
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
