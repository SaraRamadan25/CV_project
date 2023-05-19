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

                <div class="container">
                    @if(\Illuminate\Support\Facades\Session::has('msg'))
                        <div class="alert alert-success">
                            {{ \Illuminate\Support\Facades\Session::get('msg') }}
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <ul class="filter list-inline">
                            <li><a href="/category" class="active" data-filter="*">All</a></li>
                            @foreach($categories as $category)
                                <a href="{{ route('project.show', $category->name) }}">{{ $category->name }}</a>

                            @endforeach
                 {{--           <li><a href="#" data-filter=".Illustrator">Illustrator</a></li>
                            <li><a href="#" data-filter=".Indesign">Indesign</a></li>
                            <li><a href="#" data-filter=".Artworks">Artworks</a></li>--}}
                        </ul>
                    </div>
                </div>

                <div class="row isotope-gutter">
                    <div>
                        <figure class="works-item">
                            @foreach($projects as $project)

                               <img class="col-sm-2" src="/storage/{{ $project->image }}" width="20" alt="no image" >

                                <div class="overlay"></div>
                            <figcaption class="works-inner">
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
                        <span class="prev-page"><a href="education" class="link">&larr; Prev Page</a></span>
                        <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                        <span class="next-page"><a href="testimonial" class="link">Next Page &rarr;</a></span>
                    </div>
                </div>
                <!-- /.page-nav -->
            </nav>
            <!-- /.container -->

        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->

</main> <!-- /.site-wrapper -->
<x-footer />
