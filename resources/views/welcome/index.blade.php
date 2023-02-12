<x-header />
<body><!-- set class="dark" on body tag for DARK-THEME -->


<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-welcome relative">
            <!-- .close -->
            <a href=".." class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="author-image-large">
                <img src="assets/theme/images/author.png" alt="">
            </div>

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
                    <div class="col-xs-12 col-md-6 col-lg-7">
                        <div class="page-title">
                            <h2>{{ $user->name }} <span class="primary"></span> <span class="title-bg">About</span></h2>
                            <p>{{ $user->excerpt }}</p>
                            <p>{{ $user->description }}</p>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <nav class="page-nav clear">
                <div class="container">
                    <div class="flex flex-middle space-between">
                        <span class="prev-page"><a href="index" class="link">&larr; Prev Page</a></span>
                        <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                        <span class="next-page"><a href="about" class="link">Next Page &rarr;</a></span>
                    </div>
                </div>
                <!-- /.page-nav -->
            </nav>
            <!-- /.container -->

        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
</main> <!-- /.site-wrapper -->

<x-footer />

