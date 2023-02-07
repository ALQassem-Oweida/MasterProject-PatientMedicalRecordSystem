@extends('doctor.master_doctor')
@section('doctor_content')
    <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Welcome Dr. {{$info[0]->FName}}</strong></h1>
    <div class="row">
        <div class="col-xl-8 col-xxl-7 d-flex">
            <div class="w-100">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title"># Of My appointments </h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="clipboard"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">
                                    {{ $appointmentsCount }}

                                </h1>

                            </div>
                        </div>


                    </div>
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col mt-0">
                                        <h5 class="card-title"># Of My Pataents</h5>
                                    </div>

                                    <div class="col-auto">
                                        <div class="stat text-primary">
                                            <i class="align-middle" data-feather="users"></i>
                                        </div>
                                    </div>
                                </div>
                                <h1 class="mt-1 mb-3">

                                    {{ $patentsCount }}

                                </h1>

                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>


        <div class="col col-md-12 col-xxl-5 d-flex order-1 order-xxl-1">
            <div class="card flex-fill">
                <div class="card-header">

                    <h5 class="card-title mb-0">Calendar</h5>
                </div>
                <div class="card-body d-flex">
                    <div class="align-self-center w-100">
                        <div class="chart">
                            <div id="datetimepicker-dashboard"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection
