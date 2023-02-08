@extends('user.userdash')
@section('user_content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif
    <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Insurance Detalis</strong></h1>


    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-12 d-flex p-3">
            <div class="card flex-fill p-2">
                {{-- <div class="card-header">
                </div> --}}


                <h6 class="text-center p-5">Sorry! this section is not available yet. Coming Soon ....</h6>

            </div>
        </div>




    </div>



    @endsection
