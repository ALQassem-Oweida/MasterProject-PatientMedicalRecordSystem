@extends('admin.master_admin')
@section('admin_content')


    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif
        <div class="card p-2">
            <div class="d-flex justify-content-between">
                {{-- filter box --}}
                <div style="width: 40%">
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
                <button data-bs-toggle="modal" data-bs-target="#addDoctor" class="btn btn-info" style="width: 20%">Add a new
                    Doctor</button>
                {{-- Searche bar --}}
                <div class="d-flex justify-content-end" style="width: 40%">
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

        <h1 class="h3 mb-3"><strong>Doctors</strong></h1>
        @if (Auth::check())
            <div class="table-responsive">
                <table class="table table-striped">

                    <thead>
                        <th>Doctor ID</th>
                        <th>Name</th>
                        <th>email</th>
                        <th>Phone</th>
                        <th></th>
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
                                    <form class="float-end" method="post"
                                        action="{{ route('doctorList.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="status" value="{{ $row->status }}">
                                        <td><input onclick="return confirm('Are you sure you want to Disable this doctor?')"
                                                type="submit" class="btn btn-danger btn-sm" value="Disable" /></td>
                                    </form>
                                @elseif($row->status == 0)
                                    <form class="float-end" method="post"
                                        action="{{ route('doctorList.destroy', $row->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="status" value="{{ $row->status }}">
                                        <td><input onclick="return confirm('Are you sure you want to Enable this doctor?')"
                                                type="submit" class="btn btn-success btn-sm" value="Enable" /></td>
                                    </form>
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
    @endif





    <!-- Modal add doctor-->
    <div class="modal fade" id="addDoctor" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add an appointment
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
                                    class="form-control @error('national_id') is-invalid @enderror"
                                    name="national_id"  required
                                    autocomplete="national_id" autofocus>

                                @error('national_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="phone"
                                class="col-md-4 col-form-label text-md-end">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input id="phone" type="text"
                                    class="form-control @error('phone') is-invalid @enderror" name="phone"
                                     required autocomplete="phone" autofocus>

                                @error('phone')
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
                                    class="form-control @error('email') is-invalid @enderror" name="email"
                                  required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror"
                                    name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
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
