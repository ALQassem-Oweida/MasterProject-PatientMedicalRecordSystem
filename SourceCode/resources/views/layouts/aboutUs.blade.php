@extends('layouts.master')
@section('content2')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif

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
@endsection
