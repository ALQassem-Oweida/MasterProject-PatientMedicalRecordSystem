@extends('doctor.master_doctor')
@section('doctor_content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif


    <div class="card p-2">
        <div class="row">
            {{-- filter box --}}
            <div style="width: 50%">
                <form action="/filterappointment" method="POST">
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
                <form action="/searchappointment" method="get">

                    <div class="form-group">
                        <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                            placeholder="Enter the national id">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-bordered border-primary table-hover  text-center">
            <thead>
                <tr>

                    <th scope="col">National Number</th>
                    <th scope="col">Name</th>
                    <th scope="col">Date</th>
                    <th scope="col">Time</th>
                    <th>Change date & time</th>
                    <th scope="col">Status</th>


                </tr>
            </thead>
            <tbody>


                @if ($appointments != null)
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->national_id }}</td>
                            <td>{{ $appointment->FName }} {{ $appointment->LName }}</td>
                            <td>{{ $appointment->date }}</td>
                            <td>{{ $appointment->time }}</td>
                            <td>
                                @if ($appointment->status == 0)
                                <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                    data-bs-target="#edit{{ $appointment->id }}">Edit</button>
                                @endif    
                            </td>
                            <!-- Modal Status -->
                            <div class="modal fade" id="del{{ $appointment->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Change appointment status
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex justify-content-center">
                                            <form method="post"
                                                action="{{ route('appointments.destroy', $appointment->id) }}">
                                                <select name="statusSelctor">
                                                    <option disabled selected>Scheduled</option>
                                                    <option value="2">Done</option>
                                                    <option value="1">Canceled</option>
                                                </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            @csrf
                                            @method('DELETE')
                                            <input type="submit" class="btn btn-danger" value="Update" />
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Edit-->
                            <div class="modal fade" id="edit{{ $appointment->id }}" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                Add an appointment
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('appointments.update', $appointment->id) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <div class="form-group">
                                                    <label for="appointment_date">Appointment Date:</label>
                                                    <input type="date" class="form-control" id="appointment_date"
                                                        name="appointment_date" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="appointment_time">Appointment Time:</label>
                                                    <input type="time" class="form-control" id="appointment_time"
                                                        name="appointment_time" required>
                                                </div>



                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Set the
                                                appointment</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @if ($appointment->status == 0)
                                <td style="color: rgb(9, 84, 204);font-weight:bold">Scheduled
                                    <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                        data-bs-target="#del{{ $appointment->id }}">Change</button>
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
@endsection
