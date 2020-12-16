<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Home View</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger " href="#page-top">EVENT</a>
                    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                        Menu
                        <i class="fas fa-bars ml-1"></i>
                     </button>
                    <div class="collapse navbar-collapse" id="navbarResponsive">
                        <ul class="navbar-nav text-uppercase ml-auto">
                    <div class="m-3">
                <form  action="{{ route('acara.cari') }}" method="POST" class="d-sm-inline-block form-inline m-10  my-2 my-md-0 mw-100 navbar-search m=3">
                    @csrf
                        <div class="input-group">
                            <input type="text" class="form-control bg-white border-0 small" placeholder="Search for..."aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                        </div>
                </form>
            </div>
                        <li ><a class="nav-link js-scroll-trigger" href="#umum">Umum</a></a></li>
                        <li ><a class="nav-link js-scroll-trigger" href="#kampus">Kampus</a></li>
                        <li ><a class="nav-link js-scroll-trigger" href="#jurusan">Jurusan</a></li>
                        <li ><a class="nav-link js-scroll-trigger" href="#kelas">Kelas</a></li>
                        <li ><a class="nav-link js-scroll-trigger" href="#lain">Lainnya</a></li>
                        @if (Route::has('login'))
                        @auth
                            <li class="nav-item"><a href="{{ url('/dashboard') }}" class="nav-link js-scroll-trigger">Dashboard</a></li>
                            @else
                                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link js-scroll-trigger">Login</a></li>
                            @if (Route::has('register'))
                                <li class="nav-item"><a href="{{ route('register') }}" class="nav-link js-scroll-trigger">Register</a></li>
                                @endif
                            @endif
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">ENJOY YOUR EVENT</h2>
                    <h3 class="section-subheading text-muted">Acara terbaru Politeknik Elektronika Negeri Surabaya</h3>
                </div>

        @isset($posts)
        @foreach ($posts as $post)
            <center>
                <td> <h4> {{ $post->title }} </h4></td> <br>
                <td>
                    <img src="{{ url('uploads/'.$post->foto)}}" alt="foto" class="h-50 w-50">
                </td> <br>
            </center>
            <td>{{ $post->updated_at }}</td> <br>
            <td>{!! $post->ket !!}</td> <br>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                    <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Read More</a>
                    </a>
                </form> <br>
            </td>

    @endforeach
    @endisset
    <div class="justify-content-center d-flex ">{{ $posts->links() }}</div>
    <br>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">STRUKTUR ORGANISASI</h2>
                    <h3 class="section-subheading text-muted">POLITEKNIK ELEKTRONIKA NEGERI SURABAYA</h3>
                </div>
            </div>
        </section>

        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Anda Dapat Memberikan Kritik dan Saran Kepada Kami</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-info btn-xl text-uppercase js-scroll-trigger" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © EventPens2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Portfolio Modals-->
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->
        <script src="assets/mail/jqBootstrapValidation.js"></script>
        <script src="assets/mail/contact_me.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>

</html>
