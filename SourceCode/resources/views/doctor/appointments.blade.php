@extends('doctor.master_doctor')
@section('doctor_content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif


    <table class="table table-bordered border-primary">
        <thead>
            <tr>

                <th scope="col">Name</th>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>


            @if ($appointments != null)
                @foreach ($appointments as $appointment)
                    <tr>

                        <td>{{ $appointment->FName }} {{ $appointment->LName }}</td>
                        <td>{{ $appointment->date }}</td>
                        <td>{{ $appointment->time }}</td>
                        <td>

                   

                            <button class="btn btn-danger" type="button" data-bs-toggle="modal"
                                data-bs-target="#del{{$appointment->id}}">Del</button>

                            <!-- Modal Del -->
                            <div class="modal fade" id="del{{$appointment->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            Are you sure you want to delete this appointment ?
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('appointments.destroy', $appointment->id) }}">
                                                @csrf
                                                @method('DELETE')
                                                <input type="submit" class="btn btn-danger" value="Yes" />
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div>


                            
                            <button class="btn btn-success" type="button" data-bs-toggle="modal"
                                data-bs-target="#edit{{$appointment->id}}">Edit</button>

                            <!-- Modal -->
                            <div class="modal fade-centered" id="edit{{$appointment->id}}" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">

                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">
                                            Add an appointment
                                        </h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('appointments.update', $appointment->id) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="form-group">
                                                <label for="appointment_date">Appointment Date:</label>
                                                <input type="date" class="form-control"
                                                    id="appointment_date" name="appointment_date"
                                                    required>
                                            </div>

                                            <div class="form-group">
                                                <label for="appointment_time">Appointment Time:</label>
                                                <input type="time" class="form-control"
                                                    id="appointment_time" name="appointment_time"
                                                    required>
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
                        </td>
                    </tr>
                @endforeach
            @endif



        </tbody>
    </table>
    <span>
      {{$appointments->links()}}
  </span>
@endsection
