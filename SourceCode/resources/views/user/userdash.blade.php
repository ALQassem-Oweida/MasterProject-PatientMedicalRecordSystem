@include('layouts.app')



<div class="wrapper">



    {{-- nav --}}
    <nav id="sidebar" class="sidebar js-sidebar" >
        <div class="sidebar-content  js-simplebar" style="background-color: #6d8bb4;color:aliceblue">
            <a class="sidebar-brand" >
                <span class="align-middle">User Dashboard</span>
            </a>

            <ul class="sidebar-nav ">
                <li class="sidebar-header" style="color:aliceblue">
                    Pages
                </li>

                <li class="sidebar-item ">
                    <a class="sidebar-link " href="/user_dashboard" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link " href="{{ route('userprofile.index') }}" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Personal
                            information</span>
                    </a>


                <li class="sidebar-item">
                    <a class="sidebar-link userside" href="{{ route('medicalhistory.index') }}" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="activity"></i> <span class="align-middle">Medical
                            history</span>
                    </a>
                </li>





                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('medicalhistory2.index') }}" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="link-2"></i> <span class="align-middle">Current
                            medications</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/userAppointments" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="calendar"></i> <span class="align-middle">Appointments and
                            visits</span>
                    </a>
                </li>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="/userFiles" style="background-color: #6d8bb4;color:aliceblue">
                        <i class="align-middle" data-feather="clipboard"></i> <span class="align-middle">Lab
                            results and documents</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/userInsurance" style="background-color: #6d8bb4;color:aliceblue">
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
                            <a class="text-muted" href="/contactUs" target="_blank">Contact Us</a>
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
            defaultDate: Date.now(),
        });
    });
</script>

</body>
