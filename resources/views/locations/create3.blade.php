<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Cycle</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Front')}}/css/bootstrap.min.css">
   
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="{{ asset('Front')}}/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="{{ asset('Front')}}/css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="{{ asset('Front')}}/images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="{{ asset('Front')}}/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link href="https://fonts.googleapis.com/css?family=Poppins:400,700|Raleway:400,700,800&display=swap" rel="stylesheet">
      <link rel="stylesheet" href="{{ asset('Front')}}/css/owl.carousel.min.css">
      <link rel="stylesoeet" href="{{ asset('Front')}}/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
<body>
<!-- header section start -->
      <div class="header_section header_bg">
         <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a href="#" class="logo"><img src="{{ asset('Front')}}/images/logo.png"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
               <ul class="navbar-nav mr-auto">
                  <li class="nav-item active">
                     <a class="nav-link" href="#">Acceuil</a>
                  </li>
                  <!-- <li class="nav-item">
                     <a class="nav-link" href="about.html">About</a>
                  </li> -->
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('trotinettes.index2') }}">Nos Trotinettes</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{route('velos.index2')}}">Nos Velos</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="{{ route('accessoires.index2') }}">Nos Accessoires</a>
                  </li>
                  <li
                   class="nav-item">
                     <a class="nav-link" href="{{ route('evenements.AllEvenement2') }}">Nos Evenements</a>
                  </li>
                  <li
                   class="nav-item">
                     <a class="nav-link" href="{{route('balades.AllBalade2')}}">Nos Balades</a>
                  </li>
                  <li
                   class="nav-item">
                     <a class="nav-link" href="{{route('posts.AllPost2')}}">Nos Posts</a>
                  </li>
               </ul>
               <!-- <form class="form-inline my-2 my-lg-0">
                  <div class="login_menu">
                     <ul>
                        <li><a href="#">Login</a></li>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/trolly-icon.png"></a></li>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/search-icon.png"></a></li>
                     </ul>
                  </div>
                  <div></div>
               </form> -->
            </div>
            <div id="main">
               <span style="font-size:36px;cursor:pointer; color: #fff" onclick="openNav()"><img src="{{ asset('Front')}}/images/toggle-icon.png" style="height: 30px;"></span>
            </div>
         </nav>
         <!-- banner section start -->
         <div class="banner_section layout_padding">
            <div id="main_slider" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="{{ asset('Front')}}/images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content </p>
                              <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="{{ asset('Front')}}/images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content </p>
                              <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item">
                     <div class="container">
                        <div class="row">
                           <div class="col-md-7">
                              <div class="best_text">Best</div>
                              <div class="image_1"><img src="{{ asset('Front')}}/images/img-1.png"></div>
                           </div>
                           <div class="col-md-5">
                              <h1 class="banner_taital">New Model Cycle</h1>
                              <p class="banner_text">It is a long established fact that a reader will be distracted by the readable content </p>
                              <div class="contact_bt"><a href="contact.html">Shop Now</a></div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
               <i class="fa fa-angle-left"></i>
               </a>
               <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
               <i class="fa fa-angle-right"></i>
               </a>
            </div>
         </div>
         <!-- banner section end -->
      </div>
      <!-- header section end -->

<!-- End Navbar --> 

<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                  <a class="btn btn-primary float-right" href="{{ route('velo.index') }}">Retour</a>
                <h4 class="card-title">Creer une location</h4>

                <div class="col-12 mt-2">
                    @if($errors->any())
                    <div class="row">
                        <div class="col-12">
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Some error occured!</strong>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                                @endforeach
                            </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
              </div>
              <div class="card-body">
                <div class="toolbar">
                </div>
                <h4 class="card-title">Velo model : {{ $velo->velo_name }}</h4>
                <form method="POST" action="{{route('store3.location', $velo->id)}}">
                    @csrf
                    <div class="">
                        <div class="form-group col-md-6">
                            <label for="idClient">Id Client</label>
                            <input type="text" class="form-control" id="idClient" name="idClient" placeholder="Id Client">
                        </div>
                        <div class="form-group col-md-6">
                           <label for="emailClient">Email Client</label>
                           <input type="text" class="form-control" id="emailClient" name="emailClient" placeholder="Email Client">
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="idStation">Station</label>
                            <input type="text" class="form-control" id="idStation" name="idStation" placeholder="Id Station">
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="dateDebut">Date Debut</label>
                            <input type="date" class="form-control" id="dateDebut" name="dateDebut" placeholder="Date Debut">
                        </div>
                        <div class="form-group">
                            <label for="dateFin">Date Fin</label>
                            <input type="date" class="form-control" id="dateFin" name="dateFin" placeholder="Date Fin">
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="form-group"> 
                            <label for="accessoires">Accessoires</label>
                            <select class="form-control" id="accessoires" name="accessoires">
                                <option value="0">Select Accessoire</option> 
                                @foreach($accessoires as $accessoire)
                                    <option value="{{$accessoire->id}}">{{$accessoire->nomAccessoire}}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group">
                            <label for="prix">Prix</label>
                            <input type="text" class="form-control" id="prix" name="prix" placeholder="Prix">
                        </div>
                        
                    <button type="submit" class="btn btn-primary float-right">Louer</button>
                </form>
              
              <!-- end content-->
            </div>
            <!--  end card  -->
          </div>
    </div>
    
</div>
</div>
       <!-- footer section start -->
      <div class="footer_section layout_padding">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-8 col-sm-12 padding_0">
                  <div class="map_main">
                     <div class="map-responsive">
                       <iframe src="https://maps.google.com/maps?width=100%25&amp;height=600&amp;hl=en&amp;q=Boulevard%20Sadok%20Mokaddem,%20Tunis%201053+(My%20Business%20Name)&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="600" height="400" frameborder="0" style="border:0; width: 100%;" allowfullscreen=""></iframe>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-12">
                  <div class="call_text"><a href="#"><img src="{{ asset('Front')}}/images/call-icon.png"><span class="padding_left_0">Appeler le +216 56150499</span></a></div>
                  <div class="call_text"><a href="#"><img src="{{ asset('Front')}}/images/mail-icon.png"><span class="padding_left_0">VETRO@gmail.com</span></a></div>
                  <div class="social_icon">
                     <ul>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/fb-icon1.png"></a></li>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/twitter-icon.png"></a></li>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/linkedin-icon.png"></a></li>
                        <li><a href="#"><img src="{{ asset('Front')}}/images/instagram-icon.png"></a></li>
                     </ul>
                  </div>
                  <input type="text" class="email_text" placeholder="Enter Your Email" name="Enter Your Email">
                  <div class="subscribe_bt"><a href="#">Subscribe</a></div>
               </div>
            </div>
         </div>
      </div>
      <!-- footer section end -->
      <!-- copyright section start -->
    
      <!-- copyright section end -->   
      <!-- Javascript files-->
      <script src="{{ asset('Front')}}/js/jquery.min.js"></script>
      <script src="{{ asset('Front')}}/js/popper.min.js"></script>
      <script src="{{ asset('Front')}}/js/bootstrap.bundle.min.js"></script>
      <script src="{{ asset('Front')}}/js/jquery-3.0.0.min.js"></script>
      <script src="{{ asset('Front')}}/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="{{ asset('Front')}}/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="{{ asset('Front')}}/js/custom.js"></script>
      <!-- javascript --> 
      <script src="{{ asset('Front')}}/js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         function openNav() {
           document.getElementById("mySidenav").style.width = "250px";
           document.getElementById("main").style.marginLeft = "250px";
         }
         
         function closeNav() {
           document.getElementById("mySidenav").style.width = "0";
           document.getElementById("main").style.marginLeft= "0";
          
         }

         $("#main").click(function(){
             $("#navbarSupportedContent").toggleClass("nav-normal")
         })
      </script>
   </body>
</html>

