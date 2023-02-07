<!DOCTYPE html>
<html lang="en">
<head>

     <title>Medica.com</title>

     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">

     <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
     <link rel="stylesheet" href="{{asset('css/animate.css')}}">
     <link rel="stylesheet" href="{{asset('css/owl.carousel.css')}}">
     <link rel="stylesheet" href="{{asset('css/owl.theme.default.min.css')}}">


     <!-- MAIN CSS -->
     <link rel="stylesheet" href="{{asset('css/tooplate-style.css')}}">
     

</head>
<body id="top" data-spy="scroll" data-target=".navbar-collapse" data-offset="50">

     <!-- PRE LOADER -->
     <!-- <section class="preloader">
          <div class="spinner">

               <span class="spinner-rotate"></span>
               
          </div>
     </section>   -->


     <!-- HEADER -->
     <header>
          <div class="container">
               <div class="row">

                    <div class="col-md-4 col-sm-5">
                         <p>Welcome</p>
                    </div>

                    <div class="col-md-8 col-sm-7 text-align-right">
                         <span class="phone-icon"><i class="fa fa-phone"></i> 00962 787 109 976</span>
                         <span class="email-icon"><i class="fa fa-envelope-o"></i> <a
                                   href="#">medica.suportt@gmail.com</a></span>
                         <span class="date-icon"><i class="fa fa-calendar-plus-o"></i>{{now()->format('H:i:s')}}</span>
                    </div>

               </div>
          </div>
     </header>


        <!-- MENU -->
        <section class="navbar navbar-default navbar-static-top" role="navigation">
            <div class="container">
  
                 <div class="navbar-header">
                      <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                           <span class="icon icon-bar"></span>
                           <span class="icon icon-bar"></span>
                           <span class="icon icon-bar"></span>
                      </button>
  
                      <!-- lOGO TEXT HERE -->
                      <a href="index.html" class="navbar-brand"><i class="fa fa">M</i>edica</a>
                 </div>
  
                 <!-- MENU LINKS -->
                 <div class="collapse navbar-collapse">
                      <ul class="nav navbar-nav navbar-right">
                           <li><a href="#top" class="smoothScroll">Home</a></li>
                           <li><a href="#about" class="smoothScroll">About Us</a></li>
                           <li><a href="#team" class="smoothScroll">Doctors</a></li>
                           <li><a href="#news" class="smoothScroll">News</a></li>
                           <li><a href="#google-map" class="smoothScroll">Contact</a></li>
                           <li class="appointment-btn"><a href="#appointment">Sign in</a></li>
                      </ul>
                 </div>
  
            </div>
            
       </section>

 