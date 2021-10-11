@extends('layouts.app')

@section("content")
<h1>Products</h1>

<div class="card-header">Ongoing Experiments</div>
    <div class="card-group">
        <div class="card">
            <img class="card-img-top" src="/storage/images/noimage.jpg" alt="Card image cap">
            <div class="card-body" style="position:relative">
                <h4 class="card-title">Gr.9 Math Coding Lessons</h4>
                <p class="card-text">
                    Not a programmer?  Not a problem!  This experiment focuses on teaching math using computer programming concepts.
                    Through experiments and investigation, students can discover the relationship between variables and
                    rates of change using a visual coding interface.
                </p>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="/storage/images/noimage.jpg" alt="Card image cap">
            <div class="card-body" style="position:relative">
                <h4 class="card-title">Physics Mastery Model</h4>
                <p class="card-text">
                    Based on <a href="https://modernlearners.com/thinking-classrooms/#respond">Peter Liljedahl's</a> work on 
                    thinking classrooms, a skils-based grade 11 and 12 program with a data driven approach was created.
                    This tool is currently being converted into a web application to be used.
                </p>
            </div>
        </div>
    </div>
</div>
@endsection