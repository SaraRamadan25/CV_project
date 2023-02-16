<x-header />
<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-works relative">
            <!-- .close -->
            <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title text-center">
                            <h2>My <span class="primary">works</span> <span class="title-bg">works</span></h2>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut
                                laoreet dolore magna aliquam erat volutpat.</p>
                        </div>
                    </div>
                </div> <!-- /.row -->

                <div class="row">
                    <div class="col-xs-12">
                        <ul class="filter list-inline">
                            <li><a href="/categories" class="active" data-filter="*">All</a></li>
                            <li><a href="/categories/{{ $category->name }}" >{{ $category->name }}</a></li>
                 {{--           <li><a href="#" data-filter=".Illustrator">Illustrator</a></li>
                            <li><a href="#" data-filter=".Indesign">Indesign</a></li>
                            <li><a href="#" data-filter=".Artworks">Artworks</a></li>--}}
                        </ul>
                    </div>
                </div>

                <div class="row isotope-gutter">
                    <div class="col-xs-12 col-sm-6 col-md-4 Photoshop Illustrator">
                        <figure class="works-item">
                            <img src="" alt="img">
                            <div class="overlay"></div>
                            <figcaption class="works-inner">
                                @foreach($projects as $project)
                                <h4>{{ $project->name }}</h4>
                                <p>{{ $project->type }}</p>
                            </figcaption>
                        </figure>
                    </div>
                    @endforeach




                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <nav class="page-nav clear">
                <div class="container">
                    <div class="flex flex-middle space-between">
                        <span class="prev-page"><a href="resume.html" class="link">&larr; Prev Page</a></span>
                        <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                        <span class="next-page"><a href="testimonials.html" class="link">Next Page &rarr;</a></span>
                    </div>
                </div>
                <!-- /.page-nav -->
            </nav>
            <!-- /.container -->

        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
</main> <!-- /.site-wrapper -->
<x-footer />
