@extends('admin.master_admin')
@section('admin_content')
    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif



        @if (Auth::check())
        <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Users Data</strong></h1>
            <div class="card p-2">
                <div class="container">
                    <div class="row">
                        {{-- filter box --}}
                        <div class="col-12 col-md-12 col-lg-6">
                            <form action="/filterusers" method="get">
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
                        {{-- Searche bar --}}
                        <div class="col-12 col-md-12 col-lg-6 d-flex justify-content-end">
                            <form action="/searchadmin" method="get">

                                <div class="form-group">
                                    <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                        placeholder="Enter the national id">
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
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped">

                                <thead>
                                    <th>National Number</th>
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

                                                    <!-- Button trigger modal add test file -->
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
                                                                        Disable user
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('userList.destroy', $row->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    <div class="modal-body">

                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="status"
                                                                            value="{{ $row->status }}">

                                                                        Are you sure you want to Disable
                                                                        this user?


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
                                                                        Enable user
                                                                    </h1>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <form method="post"
                                                                    action="{{ route('userList.destroy', $row->id) }}"
                                                                    enctype="multipart/form-data">
                                                                    <div class="modal-body">

                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="status"
                                                                            value="{{ $row->status }}">

                                                                        Are you sure you want to Enable this user?
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
@endsection
