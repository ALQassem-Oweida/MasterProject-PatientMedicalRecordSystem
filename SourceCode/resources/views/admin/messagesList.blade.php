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

                <div style="width: 50%">
                    <form action="/filterMessages" method="get">
                        @csrf
                        <label class="form-check form-check-inline">
                            <input name="statusCheck[]" class="form-check-input" type="radio" value="1">
                            <span class="form-check-label">
                                Readed
                            </span>
                        </label>
                        <label class="form-check form-check-inline">
                            <input name="statusCheck[]" class="form-check-input" type="radio" value="0">
                            <span class="form-check-label">
                                Unread
                            </span>
                        </label>

                        <input type="submit" value="Filter" class="btn btn-info">
                    </form>
                </div>

                <div class="d-flex justify-content-end" style="width: 50%">
                    <form action="/searchMessages" method="get">

                        <div class="form-group">
                            <input style="padding-bottom: 5px;padding-left: 15px" type="text" name="query"
                                placeholder="Enter the subject">
                            <button type="submit" class="btn btn-info">Search</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <h1 class="h3 mb-3"><strong>Messages</strong></h1>
        @if (Auth::check())
            <section class="team-section py-5">
                <div class="container">
                    <div class="row justify-content-center">

                        @foreach ($messages as $message)
                            <div class="col-12 col-md-6 col-lg-4">
                                <div class="card border-0 shadow-lg  position-relative"
                                    @if ($message->status == 0) style="background-color: rgba(199, 28, 28, 0.208)" @endif>
                                    <div class="card-body p-4">

                                        <div class="card-text">
                                            <h5 class="member-name mb-2 text-center text-primary font-weight-bold">
                                                {{ $message->name }}
                                            </h5>
                                            <div class="mb-3 text-center">{{ $message->subject }}</div>
                                            <div style="height: 130px">{{ $message->message }} </div>
                                        </div>
                                    </div>
                                    <!--//card-body-->
                                    <div class="card-footer theme-bg-primary border-0 text-center">
                                        <ul class="social-list list-inline mb-0 mx-auto">
                                            <li class="list-inline-item">
                                                <i class="align-middle" data-feather="mail"></i> <span
                                                    class="align-middle">{{ $message->email }}</span>
                                            </li>
                                        </ul>
                                        <ul class="social-list list-inline mb-0 mx-auto">
                                            {{--                                        
                                        <label for="newsletter">Change status to readed</label>
                                        <input type="checkbox" id="newsletter" name="newsletter"> --}}

                                            <form class="pt-3" action="/update-status" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $message->id }}">
                                                <input type="hidden" name="status" value="{{ $message->status }}">

                                                @if ($message->status == 1)
                                                    <input type="checkbox" name="status0">
                                                    <label for="status">Change status to Unreaded</label>
                                                @else
                                                    <input type="checkbox" name="status1">
                                                    <label for="status">Change status to readed</label>
                                                @endif

                                                <button type="submit" class="btn btn-info btn-sm">Save</button>

                                            </form>
                                        </ul>

                                    </div>
                                    <!--//card-footer-->
                                </div>
                                <!--//card-->
                            </div>
                        @endforeach


                    </div>


                </div>

            </section>
            <span>

                {{ $messages->links() }}
            </span>
    </div>
    @endif
@endsection
