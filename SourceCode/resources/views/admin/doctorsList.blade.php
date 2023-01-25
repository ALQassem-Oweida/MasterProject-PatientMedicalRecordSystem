@extends('admin.master_admin')
@section('admin_content')  


    <div class="container">


        @if ($message = Session::get('success'))
            <div class="alert alert-success text-center">
                {{ $message }}
            </div>
        @endif
        <div class="card p-2">
            <div class="row">
                {{-- Searche bar --}}
                <div class="d-flex justify-content-end" style="width: 100%">
                    <form action="/searchdocadmin" method="get">
    
                        <div class="form-group">
                            <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                placeholder="Enter the national id">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                </div>
    
            </div>
        </div>

        <h1 class="h3 mb-3"><strong>All Users</strong></h1>
        @if (Auth::check())
        <div class="table-responsive">
            <table class="table table-striped">
           
                <thead>
                    <th>National_Number</th>
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

                            {{-- <td><a href="{{ route('admin.users.edit', $row->id) }}" class="btn btn-warning btn-sm">Edit</a></td> --}}

                            <form class="float-end" method="post" action="{{ route('userList.destroy', $row->id) }}">
                                @csrf
                                @method('DELETE')
                                <td><input onclick="return confirm('Are you sure you want to delete this user?')"
                                        type="submit" class="btn btn-danger btn-sm" value="Delete" /></td>
                            </form> 



                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
            <span>

                {{$users->links()}}
            </span>
    </div>
    @endif

@endsection
