@extends('layouts.lessonTemplate')

@section("content")  

<!--Laravel doesn't seem to be recognizing this JQuery script-->
<script>
    $(document).ready(function(){
        $("#modalCenter").modal('show');
    });
</script>

<div class="container-flush">
    <div class="row px-1">
        <div class="col-12 col-md-8">
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
        
        <div class="col-12 col-md-4">
            {!! Form::open(['action' => "StudentController@store", 'method'=>'POST', 'class'=>"float-right px-1"]) !!}
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modalCenter">Instructions</button>
                {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
            {!! Form::close()!!}
        </div>
    </div>

  <!-- Modal -->
    <div class="modal fade" id="modalCenter" tabindex="-1" role="dialog" aria-labelledby="modalCenterTitle" aria-hidden="true">
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

    <div id="blocklyArea" class="row" style="height:450px"></div>   
    <div id="blocklyDiv" style="position: absolute"></div>

    <xml xmlns="https://developers.google.com/blockly/xml" id="toolbox" style="display: none">
        <block type="controls_if"></block>
        <block type="logic_compare"></block>
        <block type="controls_repeat_ext"></block>
        <block type="math_number">
            <field name="NUM">123</field>
        </block>
        <block type="math_arithmetic"></block>
        <block type="text"></block>
        <block type="text_print"></block>
    </xml>
</div>
 

@endsection