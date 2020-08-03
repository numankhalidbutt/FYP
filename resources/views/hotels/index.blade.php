@extends('layouts.template')

@section('content')

       <!-- Breadcrumb Section Begin -->
    <div class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text">
                        <h2>Hotels</h2>
                        <div class="bt-option">
                            <a href="{{ route('home') }}">Home</a>
                            <span>Hotels</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section End -->


   
    <!-- Rooms Section Begin -->
    <section class="rooms-section spad">
        <div class="container">

            <div class="row">
                <div class="offset-2 col-8">
                    <div class="card">
                        <div class="card-body">

                                <div class="row">
                                    <div class="col-12">
                                       <h5 class="float-left"> <b> Facilities: </b></h5>
                                       <input class="mr-1 ml-5 facilities_checkbox" type="checkbox" name="wifi" id="wifi"> 
                                       <label for="wifi"> Wifi </label>        
                                       <input class="mr-1 ml-5 facilities_checkbox" type="checkbox" name="parking" id="parking"> 
                                       <label for="parking"> Parking </label>        
                                       <input class="mr-1 ml-5 facilities_checkbox" type="checkbox" name="spa" id="spa"> 
                                       <label for="spa"> Spa </label>
                                       <input class="mr-1 ml-5 facilities_checkbox" type="checkbox" name="AC" id="AC"   > 
                                       <label for="AC"> AC </label>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-12">
                                       <h5 class="float-left"> <b> City: </b></h5>
                                       @foreach( \App\Hotels::select('city')->distinct('city')->get() as $row )
                                        <input class="mr-1 ml-5 cities_checkbox" type="checkbox" name="city" id="{{ $row->city }}"> 
                                        <label for="{{ $row->city }}"> {{ $row->city }} </label>  
                                       @endforeach    
                                    </div>
                                </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            
                        </div>
                    </div>

                </div>   
            </div>

            <div class="row" id="hotels_div">
            @foreach( $hotels as $hotel )
                <div class="col-lg-4 col-md-6">
                    <div class="room-item">
                        <img height="450px" src="{{ asset('../storage/app/'.$hotel->images->first()->path.$hotel->images->first()->unique_identifier) }}" alt="">
                        <div class="ri-text">
                            <h4> {{ $hotel->name }} </h4>
                            <h3> Rs. {{ $hotel->rate_per_person }}<span>/Perperson</span></h3>
                            <table>
                                <tbody>
                                    <tr>
                                        <td class="r-o">City:</td>
                                        <td>{{ $hotel->city }}</td>
                                    </tr>

                                    <tr>
                                        <td class="r-o">Capacity:</td>
                                        <td>{{ $hotel->capacity }}</td>
                                    </tr>

                                    <tr>
                                        <td class="r-o">Rate per Person:</td>
                                        <td>{{ $hotel->rate_per_person }}</td>
                                    </tr>

                                    <tr>
                                        <td class="r-o">Services:</td>
                                        <td>
                                            @if($hotel->facilities->wifi) Wifi, @endif
                                            @if($hotel->facilities->parking) Parking, @endif
                                            @if($hotel->facilities->spa) Spa, @endif
                                            @if($hotel->facilities->ac) Ac. @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <a href="{{ url('hotels/'.$hotel->id) }}" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            @endforeach

                </div>
       <!--          <div class="col-lg-12">
                    <div class="room-pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">Next <i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <!-- Rooms Section End -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/ajaxForm.js') }}"></script>
@endsection