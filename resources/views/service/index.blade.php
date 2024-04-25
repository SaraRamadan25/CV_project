<x-header/>


<section class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-services relative">
            <a href=".." class="page-close"><i class="tf-ion-close"></i></a>
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-lg-offset-1 col-lg-10">
                        <div class="page-title text-center">
                            <h2>Awesome <span class="primary">Services</span> <span class="title-bg">Services</span>
                            </h2>
                            <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum.
                                Mirum est
                                notare quam littera gothica,quam nunc putamus parum claram anteposuerit.</p>
                        </div>
                        <div class="container">
                            <div class="row">
                                @if($services->isNotEmpty())
                                    <div class="hexagon-menu services clear">
                                        <div class="service-hex">
                                            <!-- Your SVG and service content here -->
                                        </div>

                                        <div class="service-hex">
                                            <!-- Your SVG and service content here -->
                                        </div>
                                    </div>
                                    <div class="pagination">
                                        {{ $services->links() }}
                                    </div>
                                @else
                                    <p>No services yet.</p>
                                @endif
                            </div>
                        </div>


                        <nav class="page-nav clear">
                            <div class="container">
                                <div class="flex flex-middle space-between">
                                    <span class="prev-page"><a href="user" class="link">&larr; Prev Page</a></span>
                                    <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a
                                            href="https://themefisher.com/">Themefisher</a>.</span>
                                    <span class="next-page"><a href="educations"
                                                               class="link">Next Page &rarr;</a></span>
                                </div>
                            </div>
                            <!-- /.page-nav -->
                        </nav>
                        <!-- /.container -->

                    </div> <!-- /.pt-tablecell -->
                </div> <!-- /.pt-table -->
            </div>
        </div>
</section> <!-- /.site-wrapper -->


<x-footer/>
