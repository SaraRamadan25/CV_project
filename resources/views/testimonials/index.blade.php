<x-header />
<body><!-- set class="dark" on body tag for DARK-THEME -->


<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-quotes relative">
            <!-- .close -->
            <a href=".." class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="container">
                <div class="row">
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <div class="alert alert-success">
                            {{ \Illuminate\Support\Facades\Session::get('msg') }}
                        </div>
                    @endif

                        @if($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error )
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title text-center">
                            <h2>My <span class="primary">clients</span><span class="title-bg">Speech</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                    </div>
                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-xs-12">
                        <div class="testimonials">
                            @foreach($testimonials as $testimonial)
                            <div class="item">
                                <figure class="thumb">
                                    <div class="tm-hex" style="background-image: url('assets/theme/images/tm.jpg');">
                                        <div class="hexTop"></div>
                                        <div class="hexBottom"></div>
                                    </div>
                                    <figcaption>
                                        <h4> {{ $testimonial->name }}</h4>
                                        <span> {{ $testimonial->role }}</span>
                                    </figcaption>
                                </figure>
                                <div class="text">
                                    <p>{{ $testimonial->description  }} </p>
                                </div>
                            </div>
                            @endforeach
{{--
                            <div class="item">
                                <figure class="thumb">
                                    <div class="tm-hex" style="background-image: url('assets/theme/images/tm-2.jpg');">
                                        <div class="hexTop"></div>
                                        <div class="hexBottom"></div>
                                    </div>
                                    <figcaption>
                                        <h4>Adam Drigan</h4>
                                        <span>CEO, Ultra Solution</span>
                                    </figcaption>
                                </figure>
                                <div class="text">
                                    <p>Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum
                                        formas humanitatis per seacula quarta decima. </p>
                                </div>
                            </div>
--}}


                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <nav class="page-nav clear">
                <div class="container">
                    <div class="flex flex-middle space-between">
                        <span class="prev-page"><a href="work" class="link">&larr; Prev Page</a></span>
                        <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                        <span class="next-page"><a href="contact" class="link">Next Page &rarr;</a></span>
                    </div>
                </div>
                <!-- /.page-nav -->
            </nav>
            <!-- /.container -->

        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
</main> <!-- /.site-wrapper -->


<x-footer />
