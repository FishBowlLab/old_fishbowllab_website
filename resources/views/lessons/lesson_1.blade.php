@extends('layouts.lessonTemplate')

@section("content")  

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
                <button type="button" class="btn btn-success">Instructions</button>
                {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
            {!! Form::close()!!}
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