@extends("layouts.app")

@section("content")
        <h1>{{$title}}</h1>
        <!--Filter element-->
        <div class="row">
            <div class="col">
                <div class="media">
                    <div class="row">
                        <img class="align-self-start mr-3 col-12 col-md-3" src="{{asset('storage/images/wilfredho.jpg')}}" style="height:50%;" alt="wilfredho">
                        <div class="media-body col-12 col-md-9">
                            <h5 class="mt-0">Wilfred H.</h5>
                            <p>Founder</p>
                            <p class="mb-0">
                                Wilfred is responsible for the end to end creation of each product at FishBowlLab, including product scoping, development and implementation. 
                                His experience in education and science enables to build assets on FishBowlLab to address gaps in the intersection between research, policy, and implementation in education.
                                Wilfred has a proven track record in challenging existing paradigms and is not afraid of exploring alternate avenues.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection