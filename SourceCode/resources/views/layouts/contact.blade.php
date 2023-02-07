@extends('layouts.master')
@section('content2')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif


    <!-- Contact Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center mx-auto mb-5" style="max-width: 500px;">
                <h5 class="d-inline-block text-primary text-uppercase border-bottom border-5">Any Questions?</h5>
                <h1 class="display-4">Please Feel Free To Contact Us</h1>
               
            </div>
            <div class="row g-5 mb-5">
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-location-arrow text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">Prs. Basmah St, Amman, Jordan</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-phone text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">00962 787 109 976</h6>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="bg-light rounded d-flex flex-column align-items-center justify-content-center text-center"
                        style="height: 200px;">
                        <div class="d-flex align-items-center justify-content-center bg-primary rounded-circle mb-4"
                            style="width: 100px; height: 70px; transform: rotate(-15deg);">
                            <i class="fa fa-2x fa-envelope-open text-white" style="transform: rotate(15deg);"></i>
                        </div>
                        <h6 class="mb-0">medica.suportt@gmail.com</h6>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12" style="height: 500px">
                    <div class="position-relative h-100">
                        <iframe class="position-relative w-100 h-100"
                            src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d102196.78830746324!2d35.89725232725508!3d31.952418317362962!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x151ca0f459652023%3A0x84944f636c83e66d!2sPrs.%20Basmah%20St.%2C%20Amman!3m2!1d31.951722999999998!2d35.895212!5e0!3m2!1sen!2sjo!4v1674925821429!5m2!1sen!2sjo"
                            width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade" frameborder="0" style="border:0;" allowfullscreen=""
                            aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center position-relative" style="margin-top: -200px; z-index: 100;">
                <div class="col-lg-8 sm-12">
                    <div class="bg-white rounded p-5 m-5 mb-0">
                        <form method="post" action="{{ route('contactUs.store') }}">
                            @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                            @csrf
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input name="name" type="text" class="form-control bg-light border-0"
                                        placeholder="Your Name" style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input name="email" type="email" class="form-control bg-light border-0"
                                        placeholder="Your Email" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <input name="subject" type="text" class="form-control bg-light border-0"
                                        placeholder="Subject" style="height: 55px;">
                                </div>
                                <div class="col-12">
                                    <textarea maxlength="250" name="message" class="form-control bg-light border-0" rows="5"
                                        placeholder="Message (250 character allowed)"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
