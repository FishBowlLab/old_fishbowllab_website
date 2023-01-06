@extends("layouts.app")

@section("content")
  <header id="home" class="masthead">
      <div id="carousel"  class="carousel slide h-100 w-100" data-ride="carousel" data-interval="6000" data-pause="hover">
          <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" style="text-align: center">
            <div class="carousel-item active">
              <div class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                <div>
                    <h1> Slide 1 <br> subtitle   </h1> 
                    <a href="#game" class="btn btn-outline btn-xl js-scroll-trigger mb-2">buttonText </a>
                </div>  
                <img src="..." class="img-fluid" style="border-radius: 25px; width: 75vh;" alt="First slide">
              </div>
            </div>
            <div class="carousel-item">
              <div class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                <div>
                    <h1> Slide 2 <br> subtitle   </h1> 
                    <a href="#game" class="btn btn-outline btn-xl js-scroll-trigger mb-2">buttonText </a>
                </div>  
                <img src="..." class="img-fluid" style="border-radius: 25px; width: 75vh;" alt="Second slide">
              </div>
            </div>
            <div class="carousel-item">
              <div class="h-100 w-100 d-flex flex-column align-items-center justify-content-center">
                <div>
                    <h1> Slide 3 <br> subtitle   </h1> 
                    <a href="#game" class="btn btn-outline btn-xl js-scroll-trigger mb-2">buttonText </a>
                </div>  
                <img src="..." class="img-fluid" style="border-radius: 25px; width: 75vh;" alt="Third slide">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
  </header>
  <section id="features" class="features" >
    <div class="container">
      <div class="section-heading text-center">
        <h2>Feature/Product Header</h2>
        <p class="text-muted">Subheader text</p>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 my-auto">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-4">
              <div class="feature-item">
                <i class="text-primary icon-screen-desktop">Icon</i>
                  <h3>Product Tile 1</h3>
                  <p class="text-muted">Tile Description</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="feature-item">
                <i class="text-primary icon-screen-desktop">Icon</i>
                  <h3>Product Tile 2</h3>
                  <p class="text-muted">Tile Description</p>
              </div>
            </div>
            <div class="col-lg-4">
              <div class="feature-item">
                <i class="text-primary icon-screen-desktop">Icon</i>
                  <h3>Product Tile 3 </h3>
                  <p class="text-muted">Tile Description</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="about-us" class="text-center emailform">
    <div class="container">
      <div class="row ">
        <!--Template from https://freefrontend.com/css-subscribe-forms/ -->
        <div class="collapse show multi-collapse col-md-6 col-12 mx-auto">
          <h2 class="section-heading">Stay up to date with new features</h2>
        </div>     
        <div class="col-md-6 col-12 align-middle form-group subscribe-content">
          {!! Form::open(['class'=> "form-inline subscription" ,'action' => "PagesController@store", 'method'=>'POST']) !!}
            {{Form::text("email", "", ["class" => "form-control add-email", "placeholder" => "subscribe@email.com"])}}
            <!--Container ends before button reaches the end-->
            {{Form::submit("Sign Up", ["class" => "btn btn-primary submit-email"])}}
          {!! Form::close()!!}
        </div>
      </div>
    </div>
  </section>
@endsection