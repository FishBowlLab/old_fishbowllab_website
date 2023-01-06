@extends('layouts.app')

@section("content")
<h1>Products</h1>

<div class="card-header">Ongoing Projects</div>
    <div class="card-deck">
        <div class="card">
            <img class="card-img-top" src="/storage/images/blockly-logo.png" alt="Card image cap">
            <div class="card-body" style="position:relative">
                <h4 class="card-title">Gr.9 Math Coding Lessons</h4>
                <p class="card-text">
                    This project is designed for Mathematics teachers who want lessons to address the coding competenties introduced in Ontario's 2021 Mathematics curiculum's coding competencies.
                </p>
                <p class="card-text">
                    This project is designed for teachers who have little or no experience with programming and focuses on teaching students math concepts through a visual interface.
                </p>
                <p class="card-text">
                    Through experiments and investigation, students can discover concepts universal to mathematics and programming such as variables and rates of change using a block coding interface.
                </p>
            </div>
            <div class="card-footer">
                <small class="text-muted">For access to these resources, please email us at <a href="mailto: info@fishbowllab.com" >info@fishbowllab.com</a> to schedule a consult</small>
            </div>
        </div>
        <div class="card">
            <img class="card-img-top" src="/storage/images/thinking-classrooms.jpg" alt="Card image cap">
            <div class="card-body" style="position:relative">
                <h4 class="card-title">Physics Mastery Model</h4>
                <p class="card-text">
                    Based on <a href="https://modernlearners.com/thinking-classrooms/#respond">Peter Liljedahl's</a> work on 
                    thinking classrooms, a skils-based grade 11 and 12 program with a data driven approach was created.
                </p>
                <p class="card-text">

                </p>
            </div>
            <div class="card-footer">
                <small class="text-muted">The prototype for this project can be found <a target="_blank" href="https://github.com/H3OCreations/MasteryAssessment" >here</a></small>
            </div>
        </div>
    </div>
</div>
@endsection