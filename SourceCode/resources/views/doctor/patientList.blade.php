@extends('doctor.master_doctor')
@section('doctor_content')


    <div class="container">
        <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Patients List</strong></h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif




        @if (Auth::check())
            <div class="card p-2">
                <div class="container">
                    <div class="row">

                        {{-- Searche bar --}}
                        <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-end">
                            <form action="/search" method="get">
                                <div class="form-group">
                                    <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                        placeholder="Enter the national id">
                                    <button type="submit" class="btn btn-info ">Search</button>
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
                                    <th scope="col">National_Number</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">email</th>
                                    <th scope="col">Phone</th>


                                </thead>
                                <tbody>

                                    @foreach ($users as $row)
                                        <tr>
                                            <th scope="row"><a
                                                    href="{{ route('patiendatapage.show', $row->id) }}">{{ $row->national_id }}</a>
                                                </td>
                                            <td>{{ $row->userinfo->FName }}</td>
                                            <td>{{ $row->email }}</td>
                                            <td>{{ $row->phone }}</td>

                                            {{-- <td><a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a></td> --}}





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

    </div>
    @endif

@endsection
