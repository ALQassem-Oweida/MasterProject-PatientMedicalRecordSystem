@extends('admin.master_admin')
@section('admin_content')
    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif



        @if (Auth::check())
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

                            <h5 class="card-title mb-0">Users List</h5>
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
                                                <form class="float-end" method="post"
                                                    action="{{ route('userList.destroy', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="status" value="{{ $row->status }}">
                                                    <td><input
                                                            onclick="return confirm('Are you sure you want to Disable this user?')"
                                                            type="submit" class="btn btn-danger btn-sm" value="Disable" />
                                                    </td>
                                                </form>
                                            @elseif($row->status == 0)
                                                <form class="float-end" method="post"
                                                    action="{{ route('userList.destroy', $row->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="hidden" name="status" value="{{ $row->status }}">
                                                    <td><input
                                                            onclick="return confirm('Are you sure you want to Enable this user?')"
                                                            type="submit" class="btn btn-success btn-sm" value="Enable" />
                                                    </td>
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
                </div>




            </div>
        @endif
    </div>
@endsection
