

<x-header />


<section class="site-wrapper">
  <div class="pt-table">
    <div class="pt-tablecell page-services relative">
      <a href="./" class="page-close"><i class="tf-ion-close"></i></a>
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-lg-offset-1 col-lg-10">
            <div class="page-title text-center">
              <h2>Awesome <span class="primary">Services</span> <span class="title-bg">Services</span></h2>
              <p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est
                notare quam littera gothica,quam nunc putamus parum claram anteposuerit.</p>
            </div>

            <div class="hexagon-menu services clear">
              <div class="service-hex">
                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                  x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;"
                  xml:space="preserve">
                  <g>
                    <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4" />
                    <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131" />
                  </g>
                </svg>
                  @foreach($services as $service)
                <div class="content">
                  <div class="icon">
                    <i class="et-line icon-lightbulb"></i>
                  </div>
                  <h4>{{ $service->name }}<br></h4>
                  <p>{{ $service->description }}</p>
                </div>
              </div>
              <div class="service-hex">

                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                  x="0px" y="0px" viewBox="0 0 372 424.5" style="enable-background:new 0 0 372 424.5;"
                  xml:space="preserve">
                  <g>
                    <polygon class="st0" points="359.9,314.1 186.9,414 14,314.1 14,114.4 186.9,14.6 359.9,114.4" />
                    <polygon class="st1" points="331.2,297.6 186.9,380.9 42.6,297.6 42.6,131 186.9,47.6 331.2,131" />
                  </g>
                </svg>
                  @endforeach

          </div> <!-- /.col-xs-12 -->

        </div> <!-- /.row -->
      </div> <!-- /.container -->

      <nav class="page-nav clear">
  <div class="container">
    <div class="flex flex-middle space-between">
      <span class="prev-page"><a href="about" class="link">&larr; Prev Page</a></span>
      <span class="copyright">Copyright &copy; 2021, Designed &amp; Developed by <a href="https://themefisher.com/">Themefisher</a>.</span>
      <span class="next-page"><a href="resume" class="link">Next Page &rarr;</a></span>
    </div>
  </div>
  <!-- /.page-nav -->
</nav>
      <!-- /.container -->

    </div> <!-- /.pt-tablecell -->
  </div> <!-- /.pt-table -->
</section> <!-- /.site-wrapper -->


<x-footer />
