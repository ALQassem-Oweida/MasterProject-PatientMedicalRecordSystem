@extends('doctor.master_doctor')
@section('doctor_content') 


    <div class="container">
        <form action="/search" method="get">
            <input type="text" name="query" placeholder="Enter the national id">
            <button type="submit">Search</button>
        </form>

        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif


        <h1 class="h3 mb-3"><strong>All Patients</strong></h1>
     
        @if (Auth::check())
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
                            <th scope="row"><a href="{{ route('patiendatapage.show', $row->id) }}">{{ $row->national_id }}</a></td>
                            <td>{{ $row->userinfo->FName }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>

                            {{-- <td><a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a></td> --}}

                    



                        </tr>
                    @endforeach
                </tbody>
            </table>
            <span>

                {{$users->links()}}
            </span>
    </div>
    @endif

@endsection
