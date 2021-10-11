@extends("layouts.app")

@section("content")
        <h1>{{$title}}</h1>
        <!--Filter element-->
        <div class="row">
            <div class="col">
                <div class="media">
                    <div class="row">
                        <img class="align-self-start mr-3 col-12 col-md-3" src="/storage/images/noimage.jpg" style="height:50%;" alt="Generic placeholder image">
                        <div class="media-body col-12 col-md-9">
                            <h5 class="mt-0">Wilfred H.</h5>
                            <p>Founder</p>
                            <p class="mb-0">Responsible for the end to end creation of each experiment at FishBowl Lab, including product development and implementation. 
                                Wilfred is passionate about education, sports, and challenging existing paradigms.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection