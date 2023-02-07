@extends('user.userdash')
@section('user_content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif

    <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Appointments</strong></h1>
    <div class="card p-2">
        <div class="row">
            {{-- filter box --}}
            <div style="width: 50%">
                <form action="/filterUserAppointments" method="POST">
                    @csrf
                    <label class="form-check form-check-inline">
                        <input name="statusCheck[]" class="form-check-input" type="radio" value="2">
                        <span class="form-check-label">
                            Done
                        </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input name="statusCheck[]" class="form-check-input" type="radio" value="0">
                        <span class="form-check-label">
                            Scheduled
                        </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input name="statusCheck[]" class="form-check-input" type="radio" value="1">
                        <span class="form-check-label">
                            Canceled
                        </span>
                    </label>
                    <input type="submit" value="Filter" class="btn btn-info">
                </form>
            </div>

            {{-- Searche bar --}}
            <div class="d-flex justify-content-end" style="width: 50%">
                <form action="/searchUserAppointments" method="get">

                    <div class="form-group">
                        <input style="padding-bottom: 5px;padding-left: 15px" type="date" name="query"
                            placeholder="Enter appointment date">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>


    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-12 d-flex p-3">
            <div class="card flex-fill p-2">
                <div class="card-header">

                    <h5 class="card-title mb-0">Appointments</h5>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered border-primary table-hover  text-center">
                        <thead>
                            <tr>

                                <th scope="col">Doctor Name</th>
                                <th scope="col">Doctor Phone</th>
                                <th scope="col">Date</th>
                                <th scope="col">Time</th>
                                <th scope="col">Status</th>


                            </tr>
                        </thead>
                        <tbody>


                            @if ($appointments != null)
                                @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->doctor->FName }} {{ $appointment->doctor->LName }}</td>
                                        <td>{{ $appointment->doctorInfos->phone }}</td>
                                        <td>{{ $appointment->date }}</td>
                                        <td>{{ $appointment->time }}</td>



                                        @if ($appointment->status == 0)
                                            <td style="color: rgb(9, 84, 204);font-weight:bold">
                                                Scheduled
                                            </td>
                                        @elseif($appointment->status == 1)
                                            <td style="color: rgb(205, 20, 20);font-weight:bold"> Canceled</td>
                                        @else
                                            <td style="color:green;font-weight:bold">Done</td>
                                        @endif

                                    </tr>
                                @endforeach
                            @endif



                        </tbody>
                    </table>
                </div>
                <span>
                    {{ $appointments->links() }}
                </span>
            </div>
        </div>




    </div>


@endsection
