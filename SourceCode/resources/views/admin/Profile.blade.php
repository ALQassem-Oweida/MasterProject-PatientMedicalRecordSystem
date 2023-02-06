@extends('admin.master_admin')
@section('admin_content')  




    {{-- /////////////////////////////////////////////////////////////////////////////// --}}
    <div class="container mt-2">
        
        <div class="main-body">
            
            <div class="row">

                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <h1 class="h3 mb-3"><strong>Your Profile</strong> Data</h1>
                            <br>
                            <form method="post" action="{{ route('userprofile.update', $user->id) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="name" type="text" class="form-control"
                                            value="{{ $info[0]->FName }} {{ $info[0]->MName }} {{ $info[0]->LName }} "
                                            disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">National id</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="date_of_birth" type="text" class="form-control"
                                            value="{{ $user->national_id }}"disabled
                                            >
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Date of birth </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="date_of_birth" type="text" class="form-control"
                                            value="{{ $info[0]->date_of_birth }}"disabled
                                            >
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="email" type="text" class="form-control"
                                            value="{{ $user->email }}"
                                            >
                                    </div>
                                </div>


                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Phone</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="phone" type="text" class="form-control"
                                            value="{{ $user->phone }}"
                                            >
                                    </div>
                                </div>



                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Address</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <input name="address" type="text" class="form-control"
                                            value="{{ $info[0]->address }}"
                                            >
                                    </div>
                                </div>






                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4" value="Save Changes">
                                    </div>
                                </div>
                                <br><br>
                                <hr class="my-4">


             
                        </div>


                    </div>

                </div>


                <div class="col-lg-4">
                    <div class="card">

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

                        <div class="card-body">
                            <div class="d-flex flex-column align-items-center text-center"> <br> <br>
                                <img  src="./images/{{ $user->img }}" alt="Admin"
                                    class="rounded-circle p-1 bg-primary" width="150" height="150">

                                <div class="mt-3">
                                    <br>
                                    <h4>{{ $info[0]->FName }} {{ $info[0]->LName }} </h4>
                                    <br>
                                </div>
                            </div>
                            <div class="d-flex flex-column align-items-center text-center">
                                <input type="file" name="img" />
                                <input type="hidden" name="hidden_img" value="{{ $user->img }}" />
                            </div>



                            <hr class="my-4">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Registration Date : </label>
                                </div>
                                <div class="col-lg-6">
                                    <p class="text-secondary mb-1">{{ $user->created_at }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </form>






            </div>
        </div>




    





    </div>














   
@endsection
