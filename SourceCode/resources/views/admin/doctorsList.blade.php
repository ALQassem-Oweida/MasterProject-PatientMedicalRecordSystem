@extends('admin.master_admin')
@section('admin_content')


    <div class="container">


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
        <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Doctor Data</strong></h1>
            <div class="card p-2">
                
                <div class="container">
                    <div class="row">
                        
                            {{-- filter box --}}
                            <div class="col-12 col-md-12 col-lg-5">
                                <form action="/filterdoctors" method="get">
                                    @csrf
                                    <label class="form-check form-check-inline">
                                        <input name="statusCheck[]" class="form-check-input" type="radio" value="1">
                                        <span class="form-check-label">
                                            Active
                                        </span>
                                    </label>
                                    <label class="form-check form-check-inline">
                                        <input name="statusCheck[]" class="form-check-input" type="radio" value="0">
                                        <span class="form-check-label">
                                            Disabled
                                        </span>
                                    </label>

                                    <input type="submit" value="Filter" class="btn btn-info">
                                </form>
                            </div>
                            <div class="d-flex col-12 col-md-12 col-lg-2">
                                <button data-bs-toggle="modal" data-bs-target="#addDoctor" class="btn btn-info">Add a
                                    new
                                    Doctor</button>
                            </div>
                            {{-- Searche bar --}}
                            <div class="col-12 col-md-12 col-lg-5 d-flex justify-content-end">
                                <form action="/searchdocadmin" method="get">

                                    <div class="form-group">
                                        <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                            placeholder="Enter the doctor id">
                                        <button type="submit" class="btn btn-info">Search</button>
                                    </div>
                                </form>
                            </div>

                      
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 col-lg-8 col-xxl-12 d-flex p-3">
                    <div class="card flex-fill p-2">
                        <div class="card-header">

                            <h5 class="card-title mb-0">Doctors List</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <th>Doctor ID</th>
                                    <th>Name</th>
                                    <th>email</th>
                                    <th>Phone</th>
                                    <th></th>


                                </thead>
                                <tbody>
                                    @foreach ($users as $row)
                                        <tr>
                                            <td>{{ $row->national_id }}</td>
                                            <td>{{ $row->userinfo->FName }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>
                                            @if ($row->status == 1)
                                            <input type="hidden" name="status" value="{{ $row->status }}">
                                            <td>

                                                <!-- Button trigger modal Disable user -->
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#DisablePopUp{{ $row->id }}">
                                                    Disable
                                                </button>

                                                <!-- Disable user Modal -->
                                                <div class="modal fade" id="DisablePopUp{{ $row->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Disable doctor
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post"
                                                                action="{{ route('doctorList.destroy', $row->id) }}"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="status"
                                                                        value="{{ $row->status }}">

                                                                    Are you sure you want to Disable
                                                                    this doctor?


                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger">Disable</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                            </td>
                                        @elseif($row->status == 0)
                                            <td>
                                                <!-- Button trigger modal Enable user -->
                                                <button type="button" class="btn btn-success btn-sm"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#EnablePopUp{{ $row->id }}">
                                                    Enable
                                                </button>

                                                <!-- Enable user Modal -->
                                                <div class="modal fade" id="EnablePopUp{{ $row->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">

                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    Enable doctor
                                                                </h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <form method="post"
                                                                action="{{ route('doctorList.destroy', $row->id) }}"
                                                                enctype="multipart/form-data">
                                                                <div class="modal-body">

                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <input type="hidden" name="status"
                                                                        value="{{ $row->status }}">

                                                                    Are you sure you want to Enable this doctor?
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit"
                                                                        class="btn btn-success">Enable</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>



                                            </td>
                                        @endif

                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <span>

                            {{ $users->links() }}
                        </span>

                    </div>
                </div>




            </div>
        @endif


    </div>


    <!-- Modal add doctor-->
    <div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add a doctor
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/registerdoctor">
                        @csrf

                        <div class="row mb-3">
                            <label for="national_id"
                                class="col-md-4 col-form-label text-md-end">{{ __('Docotor ID') }}</label>

                            <div class="col-md-6">
                                <input id="national_id" type="text"
                                    class="form-control @error('national_id') is-invalid @enderror" name="national_id"
                                    required autocomplete="national_id" autofocus value="{{ old('national_id') }}"
                                    maxlength="10">

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror" name="email" required
                                    autocomplete="email" value="{{ old('email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="FName" type="text" class="form-control" name="FName" required
                                    value="{{ old('FName') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Father Name') }}</label>

                            <div class="col-md-6">
                                <input id="MName" type="text" class="form-control" name="MName" required
                                    value="{{ old('MName') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Family Name') }}</label>

                            <div class="col-md-6">
                                <input id="LName" type="text" class="form-control" name="LName" required
                                    value="{{ old('LName') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth"
                                    required value="{{ old('date_of_birth') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" required
                                    value="{{ old('address') }}">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone" required
                                    autocomplete="phone" autofocus value="{{ old('phone') }}">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>



                        <input id="role" type="hidden" name="role" value="3">


                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
