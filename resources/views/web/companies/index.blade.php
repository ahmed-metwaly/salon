@extends('web.layout.master')

@section('title')
    مراكز التجميل
@endsection

@section('content')
    <div class="page-head bg-cover position-relative">
        <div class="overlay position-absolute py-5">
            <div class="container">
                <div class="row py-md-4 py-0">
                    <div class="col-md-6 col-sm-12 d-flex align-items-center wow slideInRight">
                        <h2 class="h3 color-c5 font-weight-bold ">مراكز التجميل</h2>
                    </div>
                    <div class="col-md-6 col-sm-12 mt-0 mt-3 text-md-left text-right wow slideInLeft">
                        <a class="h5 color-c5 font-weight-bold" href="{{ route('home') }}">الرئيسية / </a>
                        <span class="h5 color-c5 font-weight-bold">مراكز التجميل</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="center">
        <div class="container">
            <div class="best py-5">
                <div class="container text-center">
                    <div class="text-center my-5 wow fadeInDown" data-wow-duration="1s">
                        <h2 class="color-c5">مراكز التجميل</h2>
                        <img class="img-fluid" src="{{ URL::asset('public/web/img/line.png') }}" alt="">
                    </div>
                    <div class="row">
                        @foreach($companies as $company)
                            <div class="col-md-4 col-sm-12 wow fadeInDown" data-wow-duration="1s">
                                <a href="{{ route('web.companies.show', Hashids::encode($company->id)) }}">
                                    <div class="card border-0 rounded-0 mb-5 mb-md-0 text-center bg-white">
                                        <hr class="mx-auto card-hr bg-c5 m-0 position-absolute">
                                        <div class="card-block px-4 mt-5 mb-4 w-100 position-absolute">
                                            <h4 class="card-title color-c5">{{ $company->name }}</h4>
                                            <p class="card-text color-777 font-weight-bold px-1">
                                                {{ $company->location_text }}, {{ $company->city->city }}
                                            </p>
                                        </div>
                                        <div class="card-img-top rounded-0 position-absolute">
                                            <img class="img-fluid trans" src="{{ url('public/uploads/users/' . $company->photo) }}" alt="{{ $company->name }}">
                                        </div>
                                    </div>
                                </a>
                            </div>
                        @endforeach
                    </div>
                    @if($companies->hasMorePages())
                        <a href="{{ $companies->nextPageUrl() }}" class="btn btn bg-c5 font-18 py-2 px-5 text-white mt-5 wow zoomIn btn-hover" data-wow-duration="1s">مزيد من المراكز</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!--<section class="img position-relative bg-cover">-->
    <!--    <div class="overlay position-absolute">-->
    <!--    </div>-->
    <!--</section>-->
@endsection