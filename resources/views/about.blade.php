

<x-header />
<main class="site-wrapper">
    <div class="pt-table">
        <div class="pt-tablecell page-about relative">
            <!-- .close -->
            <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
            <!-- /.close -->

            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-offset-1 col-md-10 col-lg-offset-2 col-lg-8">
                        <div class="page-title text-center">
                            <h2>About <span class="primary">me</span> <span class="title-bg">Name</span></h2>
                            @foreach($users as $user)
                            <p> {{ $user->excerpt }}</p>
                            @endforeach
                        </div>
                    </div>

                    <div class="col-xs-12 col-md-6">
                        <div class="about-author">
                            <figure class="author-thumb">
                                <img src='assets/theme/images/author.jpg' alt="">
                            </figure> <!-- /.author-bio -->
                            <div class="author-desc">
                                @foreach($users as $user)
                                <p><b>Date of birth:</b> {{ $user->date_of_birth }} </p>
                                <p><b>Language:</b> {{ $user->languages }}</p>
                                <p><b>Expert in:</b> {{ $user->expert_in }}</p>
                                <p><b>Freelance:</b> {{ $user->freelance }}</p>
                                @endforeach
                            </div>
                            <!-- /.author-desc -->
                        </div> <!-- /.about-author -->
                        @foreach($users as $user)
                        <p>{{ $user->description }}</p>
                        @endforeach
                    </div> <!-- /.col -->

                    <div class="col-xs-12 col-md-6">
                        <div class="section-title clear">
                            <h3>Skills</h3>
                        </div>
                        <div class="skill-wrapper">
                            @foreach($skills as $skill)
                            <div class="progress clear">
                                <div class="skill-name"> {{ $skill->name }}</div>
                                <div class="skill-bar">
                                    <div class="bar"></div>
                                </div>


                                <div class="skill-lavel" data-skill-value={{ $skill->percentage }}></div>
                            </div> <!-- /.progress -->
                            @endforeach


                        </div> <!-- /.progress -->
                        </div> <!-- /.skill-wrapper -->
                    </div> <!-- /.col -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->

            <nav class="page-nav clear">
                <div class="container">
                    <div class="flex flex-middle space-between">
                        <span class="prev-page"><a href="welcome2" class="link">&larr; Prev Page</a></span>
                        <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
                        <span class="next-page"><a href="services" class="link">Next Page &rarr;</a></span>
                    </div>
                </div>
                <!-- /.page-nav -->
            </nav>
            <!-- /.container -->
        </div> <!-- /.pt-tablecell -->
    </div> <!-- /.pt-table -->
</main> <!-- /.site-wrapper -->


<x-footer />
