<x-header />
<body><!-- set class="dark" on body tag for DARK-THEME -->


<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-welcome relative">
            <!-- .close -->
            <a href=".." class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="author-image-large">
                <img src="{{ asset('storage/images/' . $lastAuthenticatedUser->image) }}" alt="User Image">

            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-6 col-lg-7">
                        <div class="page-title">
                            <h2>{{ $lastAuthenticatedUser->name }} <span class="primary"></span> <span class="title-bg">About</span></h2>
                            <p>{{ $lastAuthenticatedUser->excerpt }}</p>
                            <p>{{ $lastAuthenticatedUser->description }}</p>
                        </div>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <nav class="page-nav clear">
                <div class="container">
                    <div class="flex flex-middle space-between">
                        <span class="prev-page"><a href="/" class="link">&larr; Prev Page</a></span>
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

