@extends('doctor.master_doctor')
@section('doctor_content')


    <div class="container">




        @if (Auth::check())
            @foreach ($users as $row)
                <main class="content">
                    <div class="container-fluid p-0">

                        <div class="mb-3">
                            <h1 class="h3 d-inline align-middle">{{ $row->userinfo->FName }} {{ $row->userinfo->LName }}
                                Medical Details</h1>

                        </div>
                        <div class="row">
                            <div class="col-sm-10 col-md-12 col-xl-3">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h5 class="card-title mb-0">Profile Details</h5>
                                    </div>
                                    <div class="card-body text-center">
                                        <img src="/images/{{ $row->img }}" alt="{{ $row->userinfo->FName }}"
                                            class="img-fluid rounded-circle mb-2" width="128" height="128" />
                                        <h5 class="card-title mb-0">{{ $row->userinfo->FName }} {{ $row->userinfo->LName }}
                                        </h5>
                                        <div class="text-muted mb-2">{{ $row->userinfo->date_of_birth }}</div>

                                        <div>

                                            <a class="btn btn-primary btn-sm" href="#"><span
                                                    data-feather="message-square"></span> Message</a>
                                        </div>
                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h5 class="h6 card-title">Medication</h5>
                                        @if ($m_infos != null)
                                            @foreach ($m_infos as $info)
                                                <a href='https://www.google.com/search?q={{ $info->medication_name }}'
                                                    class="badge bg-primary me-1 my-1" target="_blanck">
                                                    {{ $info->medication_name }}
                                                </a>
                                            @endforeach
                                        @endif


                                    </div>
                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h5 class="h6 card-title">About</h5>
                                        <ul class="list-unstyled mb-0">
                                            <li class="mb-1"><span data-feather="home" class="feather-sm me-1"></span>
                                                Lives in : <a href="#">{{ $row->userinfo->address }}</a></li>
                                            <li class="mb-1"><span data-feather="tablet" class="feather-sm me-1"></span>
                                                Phone : <a href="#">{{ $row->phone }}</a></li>
                                        </ul>
                                    </div>


                                    <hr class="my-0" />
                                    <div class="card-body">
                                        <h5 class="h6 card-title">

                                            <!-- Button trigger modal add appointment -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#appointmentPopUp">
                                                Add an appointment
                                            </button>
                                        </h5>
                                        <h5 class="h6 card-title">
                                            <!-- Button trigger modal add recored -->
                                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#addRecPopUp">
                                                Add a recoured
                                            </button>
                                        </h5>

                                            <!-- Modal -->
                                            <div class="modal fade" id="appointmentPopUp" tabindex="-1"
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
                                                            <form action="{{ route('appointments.store') }}"
                                                                method="post">
                                                                @csrf

                                                                <input type="hidden" class="form-control" id="user_id"
                                                                    name="user_id"
                                                                    value={{ $row->userinfo->user_info_relation }}>
                                                                <input type="hidden" class="form-control" id="doctor_id"
                                                                    name="doctor_id" value={{ Auth::user()->id }}>

                                                                <div class="form-group">
                                                                    <label for="national_id">National ID</label>
                                                                    <input type="text" class="form-control"
                                                                        id="national_id" name="national_id"
                                                                        value={{ $row->national_id }}>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Fname">First Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="FName" name="FName"
                                                                        value={{ $row->userinfo->FName }}>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="Lname">Last Name:</label>
                                                                    <input type="text" class="form-control"
                                                                        id="LName" name="LName"
                                                                        value={{ $row->userinfo->LName }}>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label for="phone">Phone Number:</label>
                                                                    <input type="tel" class="form-control"
                                                                        id="phone" name="phone"
                                                                        value={{ $row->phone }}>
                                                                </div>

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

                                              <!-- Modal -->
                                            <div class="modal fade" id="addRecPopUp" tabindex="-1"
                                              aria-labelledby="exampleModalLabel" aria-hidden="true">

                                              <div class="modal-dialog modal-dialog-centered">
                                                  <div class="modal-content">
                                                      <div class="modal-header">
                                                          <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                              Add a recored
                                                          </h1>
                                                          <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                              aria-label="Close"></button>
                                                      </div>
                                                      <div class="modal-body">
                                                          <form action="{{ route('addmedicalrecord.store') }}"
                                                              method="post">
                                                              @csrf

                                                              <input type="hidden" class="form-control" id="user_id"
                                                                  name="user_id"
                                                                  value={{ $row->userinfo->user_info_relation }}>
                                                              <input type="hidden" class="form-control" id="doctor_id"
                                                                  name="doctor_id" value={{ Auth::user()->id }}>

                                                              <div class="form-group">
                                                                  <label for="national_id">event_type</label>
                                                                  <input type="text" class="form-control"
                                                                      id="event_type" name="event_type"
                                                                      >
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="Fname">event_description</label>
                                                                  <input type="text" class="form-control"
                                                                      id="event_description" name="event_description"
                                                                      >
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="Lname">medication_name</label>
                                                                  <input type="text" class="form-control"
                                                                      id="medication_name" name="medication_name"
                                                                     >
                                                              </div>

                                                             

                                                              <div class="form-group">
                                                                  <label for="appointment_date">event_date</label>
                                                                  <input type="date" class="form-control"
                                                                      id="event_date" name="event_date"
                                                                      required>
                                                              </div>

                                                              <div class="form-group">
                                                                  <label for="appointment_time">dosage</label>
                                                                  <input type="text" class="form-control"
                                                                      id="dosage" name="dosage"
                                                                      required>
                                                              </div>

                                                              <div class="form-group">
                                                                <label for="appointment_time">frequency</label>
                                                                <input type="text" class="form-control"
                                                                    id="frequency" name="frequency"
                                                                    required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label for="appointment_time">allergy</label>
                                                                <input type="text" class="form-control"
                                                                    id="allergy" name="allergy"
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







                                      
                                        <ul class="list-unstyled mb-0">
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-xl-9">
                                <div class="card">
                                    <div class="card-header">

                                        <h5 class="card-title mb-0">Medical Details</h5>
                                    </div>
                                    <div class="card-body h-100">

                                        <div class="d-flex align-items-start">

                                          
                                                <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <tbody>
                                                        <tr>

                                                            <th>Event Type</th>
                                                            <th>Event Date</th>
                                                            <th>Event Description</th>
                                                            <th>Medication Name</th>
                                                            <th>Dosage</th>
                                                            <th>Frequency</th>
                                                            <th>Allergy</th>
                                                        </tr>
                                                        @if ($m_infos != null)
                                                            @foreach ($m_infos as $info)
                                                                <tr>
                                                                    <td>{{ $info->event_type }}</td>
                                                                    <td>{{ $info->event_date }}</td>
                                                                    <td>{{ $info->event_description }}</td>
                                                                    <td>{{ $info->medication_name }}</td>
                                                                    <td>{{ $info->dosage }}</td>
                                                                    <td>{{ $info->frequency }}</td>
                                                                    <td>{{ $info->allergy }}</td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>
                                                </table>
                                                </div>


                                          
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </main>
            @endforeach


    </div>
    @endif
@endsection
