@extends('layouts.master')
@section('content2')
    <div id="news-container">

        <marquee id="news-text" behavior="scroll" direction="left">

            @for ($i = 0; $i < count($data['articles']); $i++)
                <span style="color: blue;font-weight: bold">{{ $data['articles'][$i]['source']['name'] }}</span> :
                {{ $data['articles'][$i]['description'] }}&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            @endfor

        </marquee>


    </div>


    <!-- intro Start -->
    <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="display-2 text-white mb-md-4" style="text-transform:uppercase">All your medical records in one
                        place.</h1>
                    <div class="pt-2">
                        <a class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2"
                            href="{{ route('login') }}">{{ __('Login') }}</a>
                        <a class="btn btn-outline-light rounded-pill py-md-3 px-md-5 mx-2"
                            href="{{ route('register') }}">{{ __('Register') }}</a>
                    </div>


                </div>
            </div>
        </div>
    </div>
    <!-- intro End -->




    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/about.jpg" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="mb-4">
                        <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">About Us</h5>
                        <h1 class="display-4">One Place where you can find all your health records</h1>
                    </div><br />
                    <p>
                        We started Medica to end the frustrating search for our information when it comes to our most
                        precious asset - our health.
                    </p><br /><br />
                    <div class="row g-3 pt-3">
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-user-md text-primary mb-3"></i>
                                <h6 class="mb-0">Qualified<small class="d-block text-primary">Doctors</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-calendar-check-o text-primary mb-3"></i>
                                <h6 class="mb-0">Appointments<small class="d-block text-primary">Booking</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-microscope text-primary mb-3"></i>
                                <h6 class="mb-0">Testing<small class="d-block text-primary">Result</small></h6>
                            </div>
                        </div>
                        <div class="col-sm-3 col-6">
                            <div class="bg-light text-center rounded-circle py-4">
                                <i class="fa fa-3x fa-info text-primary mb-3"></i>
                                <h6 class="mb-0">Insurance<small class="d-block text-primary">Informations</small></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->



    <!-- Contact us Start -->
    <div class="container-fluid py-5">

        <div class="Main_contactus">
            <h2 class="display-6 text-white pb-5">It's your health. Own it.</h2>

            <a type="button" href="/contactUs" class="btn btn-light rounded-pill py-md-3 px-md-5 mx-2">Contact us</a>
            <h6 class="display-12 text-white mb-md-4 pt-2">For more informations</h6>
        </div>


    </div>


    <!-- Contact us End -->




    <!-- Youtube Video Start -->
    <section class="team-section py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5  mt-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Whay medical recoreds?</h5>
                <h1 class="display-4">Knowing is better than not knowing</h1>
            </div>

            <iframe width="100%" height="551" src="https://www.youtube.com/embed/Lo_3qOejQzI" 
                title="Why electronic health records?" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>

    </section>


    <!-- Youtube Video End -->



    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Insurance company</h5>
                <h1 class="display-4">Jordanian insurance companys</h1>
            </div>
            <div class="row justify-content-center">

                @foreach ($InsuranceCo as $company)
                    <div class="col-12 col-md-6 col-lg-3">

                        <div class="card border-0 shadow-lg  position-relative">
                            <div class="card-body p-4">

                                <div class="card-text">
                                    <h5 class="member-name mb-2 text-center text-primary font-weight-bold">
                                        <a href={{ $company->website }} target="_blank" title="Go to Company Website">
                                            <img src="/InsuranceCoimages/{{ $company->image }}" alt="file_img"
                                                style="max-width: 100%;height: auto;">
                                        </a>
                                    </h5>
                                    <div class="mb-3 text-center fw-bold ">
                                        {{ $company->name }}<br>
                                        ({{ $company->foundation_year }})
                                    </div>

                                </div>
                            </div>
                            <!--//card-body-->
                            <div class="card-footer theme-bg-primary border-0 text-center">
                                <div class="row d-flex justify-content-center">
                                    <ul class="social-list list-inline mb-0 mx-auto">
                                        <li class="list-inline-item">
                                            <i class="align-middle" data-feather="mail"></i> <span class="align-middle">

                                                {{ $company->email }}

                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="social-list list-inline mb-0 mx-auto">

                                        <li class="list-inline-item">
                                            <i class="align-middle" data-feather="phone"></i> <span class="align-middle">

                                                {{ $company->phone }}

                                            </span>
                                        </li>
                                    </ul>
                                    <ul class="social-list list-inline mb-0 mx-auto">
                                        <li class="list-inline-item">
                                            <i class="align-middle" data-feather="compass"></i> <span
                                                class="align-middle">

                                                {{ $company->address }}



                                            </span>
                                        </li>
                                    </ul>
                                </div>


                            </div>
                            <!--//card-footer-->
                        </div>
                        <!--//card-->


                    </div>
                @endforeach
                <span class="d-flex justify-content-center">
                    {{ $InsuranceCo->links() }}
                </span>

            </div>
        </div>
    </div>
@endsection
