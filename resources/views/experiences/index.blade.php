
<x-header />

<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-resume relative">
            <!-- .close -->
            <a href=".." class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title text-center">
                            <h2>My <span class="primary">history</span> <span class="title-bg">Resume</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                    </div>
                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-xs-12 col-sm-6 ">
                        <div class="history-block">
                            <div class="section-title light clear">
                                <h3>Education</h3>
                            </div>
                            <!-- /.section-title -->
                            <div class="history-scroller">
                                <div class="history-item">
                                    <div class="history-icon">
                                        <span class="history-hex"></span>
                                        <i class="tf-documents5"></i>
                                    </div>
                                    <div class="history-text">
                                        <h5>Merin Land College</h5>
                                        <span>2012 - 2014</span>
                                    </div>
                                </div>
                                <!-- /.history-item -->

                                @if ($educations !== null)
                                    @foreach($educations as $educations)

                                        <div class="history-item">
                                            <div class="history-icon">
                                                <span class="history-hex"></span>
                                                <i class="tf-documents5"></i>
                                            </div>
                                            <div class="history-text">
                                                <h5>{{ $educations->name }}</h5>
                                                <span>{{ \Carbon\Carbon::parse($educations->duration)->format('Y')}}</span>
                                                <p> {{ $educations->description }}<br></p>
                                            </div>

                                        </div>

                                    @endforeach
                                @endif


                            </div>
                        </div> <!-- /.history-block -->
                    </div> <!-- /.col -->

                </div> <!-- /.row -->
            </div> <!-- /.container -->

        </div>
    </div> <!-- /.history-block -->
    </div> <!-- /.col -->


    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="history-block">
                <div class="section-title light clear">
                    <h3>Experiences</h3>
                </div>
                <!-- /.section-title -->
                <div class="history-scroller">
                    <div class="history-item">
                        <div class="history-icon">
                            <span class="history-hex"></span>
                            <i class="tf-documents5"></i>
                        </div>
                        <div class="history-text">
                            <h5>Merin Land College</h5>
                            <span>2012 - 2014</span>
                        </div>
                    </div>
                    <!-- /.history-item -->

                    @if ($experiences !== null)

                        @foreach($experiences as $experience)

                            <div class="history-item">
                                <div class="history-icon">
                                    <span class="history-hex"></span>
                                    <i class="tf-documents5"></i>
                                </div>
                                <div class="history-text">
                                    <h5>{{ $experience->name }}</h5>
                                    <span>{{ \Carbon\Carbon::parse($experience->duration)->format('Y')}}</span>
                                    <p> {{ $experience->description }}<br></p>
                                </div>
                            </div>

                        @endforeach
                    @endif


                </div>
            </div> <!-- /.history-block -->
        </div> <!-- /.col -->

    </div> <!-- /.row -->
    </div> <!-- /.container -->

    </div>
    </div> <!-- /.history-block -->
    </div> <!-- /.col -->

    <nav class="page-nav clear">
        <div class="container">
            <div class="flex flex-middle space-between">
                <span class="prev-page"><a href="services.html" class="link">&larr; Prev Page</a></span>
                <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                <span class="next-page"><a href="works.html" class="link">Next Page &rarr;</a></span>
            </div>
        </div>
        <!-- /.page-nav -->
    </nav>
    <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
</main> <!-- /.site-wrapper -->


<x-footer />
