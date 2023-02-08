@extends('doctor.master_doctor')
@section('doctor_content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif




    @if (Auth::check())
        @foreach ($users as $row)
            <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">{{ $row->userinfo->FName }}
                    {{ $row->userinfo->LName }}
                    Medical Details</strong></h1>

            <div class="container-fluid p-0">


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

                                    <a class="btn btn-primary btn-sm" href="/"><span
                                            data-feather="message-square"></span> Message</a>
                                </div>
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">Medication</h5>
                                @if ($m_infos != null)
                                    @foreach ($m_infos as $info)
                                        @if ($info->medication_name != null)
                                            <a href='https://www.google.com/search?q={{ $info->medication_name }}'
                                                class="badge bg-primary me-1 my-1" target="_blanck">
                                                {{ $info->medication_name }}
                                            </a>
                                        @endif
                                    @endforeach
                                @endif
                            </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <h5 class="h6 card-title">Allergys</h5>
                                @if ($m_infos != null)
                                    @foreach ($m_infos as $info)
                                        @if ($info->medication_name != null)
                                            <a href='https://www.google.com/search?q={{ $info->allergy }}'
                                                class="badge bg-primary me-1 my-1" target="_blanck">
                                                {{ $info->allergy }}
                                            </a>
                                        @endif
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
                                        Add a recored
                                    </button>
                                </h5>

                                <h5 class="h6 card-title">
                                    <!-- Button trigger modal add test file -->
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#addTestFilePopUp">
                                        Add a Test File
                                    </button>
                                </h5>

                                <!-- Add appointment Modal -->
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
                                                <form action="{{ route('appointments.store') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="email" value={{ $row->email }}>
                                                    <input type="hidden" class="form-control" id="user_id" name="user_id"
                                                        value={{ $row->userinfo->user_info_relation }}>
                                                    <input type="hidden" class="form-control" id="doctor_id"
                                                        name="doctor_id" value={{ Auth::user()->id }}>

                                                    <div class="form-group">
                                                        <label for="national_id">National ID</label>
                                                        <input type="text" class="form-control" id="national_id"
                                                            name="national_id" value={{ $row->national_id }} >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Fname">First Name:</label>
                                                        <input type="text" class="form-control" id="FName"
                                                            name="FName" value={{ $row->userinfo->FName }} >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Lname">Last Name:</label>
                                                        <input type="text" class="form-control" id="LName"
                                                            name="LName" value={{ $row->userinfo->LName }} >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="phone">Phone Number:</label>
                                                        <input type="tel" class="form-control" id="phone"
                                                            name="phone" value={{ $row->phone }} >
                                                    </div>

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

                                <!-- Add a test file Modal -->
                                <div class="modal fade" id="addTestFilePopUp" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">



                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                    Add a test file
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <form action="{{ route('uploadFile.store') }}" method="post"
                                                enctype="multipart/form-data">
                                                <div class="modal-body">

                                                    @csrf


                                                    <input type="hidden" name="email" value={{ $row->email }}>

                                                    <input type="hidden" class="form-control" id="user_id"
                                                        name="user_id" value={{ $row->userinfo->user_info_relation }}>

                                                    <input type="hidden" class="form-control" id="doctor_id"
                                                        name="doctor_id" value={{ Auth::user()->id }}>

                                                    <input type="hidden" class="form-control" id="national_id"
                                                        name="national_id" value={{ $row->national_id }}>



                                                    <div class="row mb-3">
                                                        <label for="file_name"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('File Name') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="text" name="file_name"
                                                                class="form-control @error('file_name') is-invalid @enderror"
                                                                name="file_name" required autofocus
                                                                value="{{ old('file_name') }}">

                                                            @error('file_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                    <div class="row mb-3">
                                                        <label for="file"
                                                            class="col-md-4 col-form-label text-md-end">{{ __('File') }}</label>

                                                        <div class="col-md-6">
                                                            <input type="file" name="file"
                                                                class="form-control @error('file') is-invalid @enderror"
                                                                name="file" required autofocus
                                                                value="{{ old('file') }}">

                                                            @error('file')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>


                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Uploade File</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Add recored Modal -->
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
                                                <form action="{{ route('addmedicalrecord.store') }}" method="post">
                                                    @csrf

                                                    <input type="hidden" class="form-control" id="user_id"
                                                        name="user_id" value={{ $row->userinfo->user_info_relation }}>
                                                    <input type="hidden" class="form-control" id="doctor_id"
                                                        name="doctor_id" value={{ Auth::user()->id }}>





                                                    <div class="form-group">
                                                        <label for="national_id">Event type</label>
                                                        <input type="text" class="form-control" id="event_type"
                                                            name="event_type">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Fname">Event description</label>
                                                        <input type="text" class="form-control" id="event_description"
                                                            name="event_description" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="Lname">Medication name</label>
                                                        <input type="text" class="form-control" id="medication_name"
                                                            name="medication_name">
                                                    </div>



                                                    <div class="form-group">
                                                        <label for="appointment_date">Event date</label>
                                                        <input type="date" class="form-control" id="event_date"
                                                            name="event_date" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="appointment_time">Dosage</label>
                                                        <input type="text" class="form-control" id="dosage"
                                                            name="dosage">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="appointment_time">Frequency</label>
                                                        <input type="text" class="form-control" id="frequency"
                                                            name="frequency">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="appointment_time">Allergy</label>
                                                        <input type="text" class="form-control" id="allergy"
                                                            name="allergy">
                                                    </div>





                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Add the recored</button>
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

                    <div class="col-md-12 col-xl-9 ">

                        <!-- Medical Details Card -->
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
                                                    <th>Add By</th>
                                                    <th>Edited By</th>

                                                    <th></th>
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
                                                            <td>{{ $info->doctorAdd->FName }}
                                                                {{ $info->doctorAdd->LName }}</td>
                                                            <td>
                                                                @if ($info->doctorEdited != null)
                                                                    {{ $info->doctorEdited->FName }}
                                                                    {{ $info->doctorEdited->LName }}
                                                                @else
                                                                    null
                                                                @endif

                                                            </td>
                                                            <td>

                                                                {{-- Edit modal tregar --}}
                                                                <button class="btn btn-success" type="button"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit{{ $info->id }}">Edit</button>
                                                                <!--Edit treger Modal -->

                                                                <div class="modal fade" id="edit{{ $info->id }}"
                                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">

                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">
                                                                                    Add a recored
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form
                                                                                    action="{{ route('addmedicalrecord.update', $info->id) }}"
                                                                                    method="post">
                                                                                    @csrf
                                                                                    @method('PATCH')

                                                                                    <input type="hidden"
                                                                                        class="form-control"
                                                                                        id="user_id" name="user_id"
                                                                                        value={{ $row->userinfo->user_info_relation }}>
                                                                                    <input type="hidden"
                                                                                        class="form-control"
                                                                                        id="doctor_id" name="doctor_id"
                                                                                        value={{ Auth::user()->id }}>
                                                                                    <div class="form-group">
                                                                                        <label for="Lname">Medication
                                                                                            name</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="medication_name"
                                                                                            name="medication_name"
                                                                                            value="{{ $info->medication_name }}">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="appointment_time">Dosage</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="dosage" name="dosage"
                                                                                            value="{{ $info->dosage }}">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="appointment_time">Frequency</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="frequency"
                                                                                            name="frequency"
                                                                                            value="{{ $info->frequency }}">
                                                                                    </div>

                                                                                    <div class="form-group">
                                                                                        <label
                                                                                            for="appointment_time">Allergy</label>
                                                                                        <input type="text"
                                                                                            class="form-control"
                                                                                            id="allergy" name="allergy"
                                                                                            value="{{ $info->allergy }}">
                                                                                    </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close</button>
                                                                                <button type="submit"
                                                                                    class="btn btn-primary">Add the
                                                                                    recored</button>
                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </td>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <span>
                                            {{ $m_infos->links() }}
                                        </span>
                                    </div>


                                </div>

                            </div>
                        </div>
                        <!-- Files Details Card -->
                        {{-- <div class="d-flex align-items-start justify-content-center"> --}}
                        <div class="card">
                            <div class="card-header">

                                <h5 class="card-title mb-0">Documents Details</h5>
                            </div>
                            <div class="card-body h-100 ">

                                <div class="d-flex align-items-start justify-content-center">
                                    <div class="table-responsive">
                                        <table class="table table-striped">
                                            <tbody>
                                                <tr>


                                                    <th>File Name</th>
                                                    <th>Add By</th>
                                                    <th>Uploaded at</th>
                                                    <th>File type</th>
                                                    <th>View</th>



                                                </tr>
                                                @if ($files_infos != null)
                                                    @foreach ($files_infos as $info)
                                                        <tr>

                                                            <td>{{ $info->file_name }}</td>
                                                            <td>{{ $info->doctorAdd->FName }}
                                                                {{ $info->doctorAdd->LName }}</td>
                                                            <td>{{ $info->created_at }}</td>
                                                            <td>
                                                                @if ($info->file_type == 'pdf')
                                                                    PDF file
                                                                @else
                                                                    Image file
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <!-- View file Modal -->
                                                                <div class="modal fade"
                                                                    id="viewFilePopUp{{ $info->id }}" tabindex="-1"
                                                                    aria-labelledby="exampleModalLabel"
                                                                    aria-hidden="true">

                                                                    <div class="modal-dialog modal-dialog-centered">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h1 class="modal-title fs-5"
                                                                                    id="exampleModalLabel">
                                                                                    View File
                                                                                </h1>
                                                                                <button type="button" class="btn-close"
                                                                                    data-bs-dismiss="modal"
                                                                                    aria-label="Close"></button>
                                                                            </div>

                                                                            <div class="modal-body">


                                                                                <img src="/files/{{ $info->path }}"
                                                                                    alt="file_img"
                                                                                    style="max-width: 100%;
                                                                                    height: auto;">





                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button"
                                                                                    class="btn btn-secondary"
                                                                                    data-bs-dismiss="modal">Close
                                                                                </button>

                                                                            </div>
                                                                            </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Button trigger modal view file or downlod for pdf-->
                                                                @if ($info->file_type == 'pdf')
                                                                    <a href="/files/{{ $info->path }}" download
                                                                        class="btn btn-primary">Download PDF
                                                                    </a>
                                                                @else
                                                                    <button type="button" class="btn btn-primary"
                                                                        data-bs-toggle="modal"
                                                                        data-bs-target="#viewFilePopUp{{ $info->id }}">
                                                                        &nbsp; View Image &nbsp;
                                                                    </button>
                                                                @endif

                                                            </td>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        <span>
                                            {{ $files_infos->links() }}
                                        </span>
                                    </div>
                                </div>

                            </div>


                        </div>
                        {{-- </div> --}}
                    </div>


                </div>

            </div>
        @endforeach
    @endif

@endsection
