@include('layouts.app')



<div class="wrapper">



    {{-- nav --}}
    <nav id="sidebar" class="sidebar js-sidebar">
        <div class="sidebar-content js-simplebar">
            <a class="sidebar-brand" href="">
                <span class="align-middle">Admin Dashboard</span>
            </a>

            <ul class="sidebar-nav">
                <li class="sidebar-header">
                    Pages
                </li>

                <li class="sidebar-item ">
                    <a class="sidebar-link" href="/admin_dashboard">
                        <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('userprofileAdmin.index') }}">
                        <i class="align-middle" data-feather="user"></i> <span class="align-middle">Profile</span>
                    </a>


                <li class="sidebar-item">
                    <a class="sidebar-link" href="/userList">
                        <i class="align-middle" data-feather="users"></i> <span class="align-middle">Users Data</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/registeruser">
                        <i class="align-middle" data-feather="plus"></i> <span class="align-middle">Add a new user
                            infos</span>
                    </a>
                </li>



                <li class="sidebar-item">
                    <a class="sidebar-link" href="/doctorList">
                        <i class="align-middle" data-feather="book"></i> <span class="align-middle">Doctors Data</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/messages">
                        <i class="align-middle" data-feather="message-square"></i> <span
                            class="align-middle">Messages</span>
                    </a>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="/InsuranceCo">
                        <i class="align-middle" data-feather="heart"></i> <span class="align-middle">Insurance
                            Companys</span>
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


                @yield('admin_content')





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
