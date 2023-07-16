@extends('layouts.lessonTemplate')

@section("content")  


<div class="row px-1">
    <div class="col-8">
        <h1>Lesson One Template</h1>
        <div class="d-none d-md-block">
            <p >
                To Do:
                <ol>
                    <li>Inject some modals into the site to provide information</li>
                    <li>There is an issue with the absolute positioning of the blockly div hiding the nav bar</li>
                    <li>Once the blockly resizes in mobile, it creates a gap on the right that is wider than the body and/or html</li>
                    <li>Fit the blockly into the viewport</li>
                </ol>
            </p>
        </div>
    </div>
    
    <div class="col-4">
        {!! Form::open(['action' => "StudentController@store", 'method'=>'POST', 'class'=>"float-right px-1"]) !!}
            <button id="instructions" type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCenter">Instructions</button>
        {!! Form::close()!!}
    </div>
</div>
<!-- Modal -->
<div class="modal fade show" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...Place the instructions for the modal here...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<!--Blockly Window-->
<div class="row">
    <div id="blocklyDiv"></div>
</div>

<!-- Module scripts -->
<script src="{{asset('js/blocklyBase.js')}}"></script>
<!--Temp clicks the instructions-->
<script>
    window.onload = function() {
        document.getElementById("instructions").click();
    }
</script>
@endsection