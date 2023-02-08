@extends('user.userdash')
@section('user_content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success text-center">
            {{ $message }}
        </div>
    @endif
    <h1 class="card h3 p-2"><strong class="d-flex justify-content-center">Lab results and documents</strong></h1>

    <div class="card p-2">
        <div class="row">
            {{-- filter box --}}
            <div style="width: 50%">
                <form action="/filterFilesUser" method="POST">
                    @csrf
                    
                    <label class="form-check form-check-inline">
                        <input name="typeCheck" class="form-check-input" type="radio" value="pdf">
                        <span class="form-check-label">
                            PDF
                        </span>
                    </label>
                    <label class="form-check form-check-inline">
                        <input name="typeCheck" class="form-check-input" type="radio" value="image">
                        <span class="form-check-label">
                            Images
                        </span>
                    </label>
                    <input type="submit" value="Filter" class="btn btn-info">
                </form>
            </div>

            {{-- Searche bar --}}
            <div class="d-flex justify-content-end" style="width: 50%">
                <form action="/searchFilesUser" method="get">

                    <div class="form-group">
                        <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                            placeholder="Enter file name">
                        <button type="submit" class="btn btn-info">Search</button>
                    </div>
                </form>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-8 col-xxl-12 d-flex p-3">
            <div class="card flex-fill p-2">
                <div class="card-header">
                </div>

                <div class="table-responsive ">
                    <table class="table table-hover my-0">
                        <thead>
                            <tr>

                                <th class="d-none d-xl-table-cell">File Name</th>
                                <th class="d-none d-xl-table-cell">Add By</th>
                                <th>Uploaded at</th>
                                <th class="d-none d-md-table-cell">File type</th>
                                <th>View</th>
                            </tr>
                        </thead>
                        <tbody>
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
                                            <div class="modal fade" id="viewFilePopUp{{ $info->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">

                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                View File
                                                            </h1>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>

                                                        <div class="modal-body">


                                                            <img src="/files/{{ $info->path }}" alt="file_img"
                                                                style="max-width: 100%;
                                                        height: auto;">





                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
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
                                                    class="btn btn-primary">Download
                                                    PDF
                                                </a>
                                            @else
                                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                                    data-bs-target="#viewFilePopUp{{ $info->id }}">
                                                    &nbsp; View Image &nbsp;
                                                </button>
                                            @endif

                                        </td>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>

                <span>
                    {{ $files_infos->links() }}
                </span>
            </div>
        </div>




    </div>



    @endsection
