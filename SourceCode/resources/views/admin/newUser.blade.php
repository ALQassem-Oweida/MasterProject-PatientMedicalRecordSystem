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
            <div class="card p-2">
                <div class="container">
                    <div class="row">

                        {{-- filter box --}}
                        <div class="col-12 col-md-12 col-lg-5">
                            <form action="/filterUserInfos" method="get">
                                @csrf

                                <label class="form-check form-check-inline">
                                    <input name="statusCheck" class="form-check-input" type="radio" value="else">
                                    <span class="form-check-label">
                                        Regesterd users
                                    </span>
                                </label>

                                <label class="form-check form-check-inline">
                                    <input name="statusCheck" class="form-check-input" type="radio" value="null">
                                    <span class="form-check-label">
                                        Others
                                    </span>
                                </label>

                                <input type="submit" value="Filter" class="btn btn-info">
                            </form>
                        </div>
                        <div class="d-flex col-12 col-md-12 col-lg-3">
                            <button data-bs-toggle="modal" data-bs-target="#addUserInfo" class="btn btn-info">Add a
                                new User Infos</button>
                        </div>
                        {{-- Searche bar --}}
                        <div class="col-12 col-md-12 col-lg-4 d-flex justify-content-end">
                            <form action="/searchUserInfos" method="get">

                                <div class="form-group">
                                    <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                        placeholder="Enter the user id">
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

                            <h5 class="card-title mb-0">Users List</h5>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <th>National ID</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Family Name</th>
                                    <th>Date of birth</th>
                                    <th>Address</th>
                                    <th></th>


                                </thead>
                                <tbody>
                                    @foreach ($usersInfos as $row)
                                        <tr>
                                            <td>{{ $row->national_id }}</td>
                                            <td>{{ $row->FName }}</td>
                                            <td>{{ $row->MName }}</td>
                                            <td>{{ $row->LName }}</td>
                                            <td>{{ $row->date_of_birth }}</td>
                                            <td>{{ $row->address }}</td>
                                            <td>
                                                 <!-- triger modal add user-->
                                                <button data-bs-toggle="modal"
                                                    data-bs-target="#EditUserInfo{{ $row->id }}"
                                                    class="btn btn-primary">Edit</button>
                                            </td>

                                            <!-- Modal add user-->
                                            <div class="modal fade" id="EditUserInfo{{ $row->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                Edit user infos
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="{{ route('registeruser.update', $row->id) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PATCH')

                                                                <input type="hidden" name="user_info_relation"
                                                                    value="{{ $row->user_info_relation }}" />

                                                                <div class="row mb-3">
                                                                    <label for="national_id"
                                                                        class="col-md-4 col-form-label text-md-end">{{ __('National ID') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="national_id" type="text"
                                                                            class="form-control @error('national_id') is-invalid @enderror"
                                                                            name="national_id" required
                                                                            autocomplete="national_id" autofocus
                                                                            value="{{ $row->national_id }}" maxlength="10">

                                                                        @error('national_id')
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
                                                                        <input id="FName" type="text"
                                                                            class="form-control" name="FName" required
                                                                            value="{{ $row->FName }}">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="password-confirm"
                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Father Name') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="MName" type="text"
                                                                            class="form-control" name="MName" required
                                                                            value="{{ $row->MName }}">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="password-confirm"
                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Family Name') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="LName" type="text"
                                                                            class="form-control" name="LName" required
                                                                            value="{{ $row->LName }}">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="password-confirm"
                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Date of birth') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="date_of_birth" type="date"
                                                                            class="form-control" name="date_of_birth"
                                                                            required value="{{ $row->date_of_birth }}">
                                                                    </div>
                                                                </div>

                                                                <div class="row mb-3">
                                                                    <label for="password-confirm"
                                                                        class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                                                                    <div class="col-md-6">
                                                                        <input id="address" type="text"
                                                                            class="form-control" name="address" required
                                                                            value="{{ $row->address }}">
                                                                    </div>
                                                                </div>








                                                                <div class="row mb-0">
                                                                    <div class="col-md-6 offset-md-4">
                                                                        <button type="submit" class="btn btn-primary">
                                                                            {{ __('Update') }}
                                                                        </button>

                                                                    </div>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>



                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <span>

                            {{ $usersInfos->links() }}
                        </span>

                    </div>
                </div>




            </div>
        @endif
    </div>




    <!-- Modal add user-->
    <div class="modal fade" id="addUserInfo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">
                        Add a new user infos
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="/registeruser">
                        @csrf

                        <div class="row mb-3">
                            <label for="national_id"
                                class="col-md-4 col-form-label text-md-end">{{ __('National ID') }}</label>

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
