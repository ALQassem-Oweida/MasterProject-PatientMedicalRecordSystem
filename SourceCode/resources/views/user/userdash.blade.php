@include('layouts.app')



<div class="wrapper">



    {{-- nav --}}
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content  js-simplebar">
            <a class="sidebar-brand" href="">
                <span class="align-middle">User Dashboard</span>
            </a>

            <ul class="sidebar-nav ">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item active">
                    <a class="sidebar-link " href="/user_dashboard">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('userprofile.index') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Personal
                            information</span>
                    </a>


                <li class="sidebar-item">
                    <a class="sidebar-link userside" href="{{ route('medicalhistory.index') }}">
                        <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Medical
                            history</span>
                    </a>
                </li>





                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('medicalhistory2.index') }}">
                        <i class="align-middle" data-feather="link-2"></i> <span class="align-middle">Current
                            medications</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/userAppointments">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Appointments and
                            visits</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-blank.html">
                        <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Lab
                            results</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="pages-blank.html">
                        <i class="align-middle" data-feather="info"></i> <span class="align-middle">Insurance
                            information</span>
                    </a>
                </li>



            </ul>


        </div>
    </nav>







    <div class="main">
        <nav class="navbar navbar-expand navbar-light navbar-bg">
            <a class="sidebar-toggle js-sidebar-toggle">
                <i class="hamburger align-self-center"></i>
            </a>
        </nav>

        <main class="content">
            <div class="container-fluid p-0">


                @yield('user_content')





            </div>
        </main>


        {{-- Footer --}}
        <footer class="footer">
            <div class="container-fluid">
                <div class="row text-muted">
                    <div class="col-6 text-start">
                        <p class="mb-0">
                            <a class="text-muted" href="{{ url('/') }}"><strong> <span style="color: #A5C422">
                                        M</span>EDICA</strong></a> &copy;
                        </p>
                    </div>
                    <div class="col-6 text-end">
                        <ul class="list-inline">
                            <li class="list-inline-item">
                                <a class="text-muted" href="" target="_blank">Support</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="" target="_blank">Help Center</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="" target="_blank">Privacy</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="text-muted" href="" target="_blank">Terms</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </footer>




    </div>
</div>

{{-- <script src="{{ asset('js/app.js') }}"></script> --}}





<script>
    document.addEventListener("DOMContentLoaded", function() {
        var date = new Date(Date.now() - 5 * 24 * 60 * 60 * 1000);
        var defaultDate = date.getUTCFullYear() + "-" + (date.getUTCMonth() + 1) + "-" + date.getUTCDate();
        document.getElementById("datetimepicker-dashboard").flatpickr({
            inline: true,
            prevArrow: "<span title=\"Previous month\">&laquo;</span>",
            nextArrow: "<span title=\"Next month\">&raquo;</span>",
            defaultDate: defaultDate
        });
    });
</script>

</body>
