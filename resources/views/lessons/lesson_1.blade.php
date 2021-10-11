@extends('layouts.lessonTemplate')

@section("content")  
<div>   
    <div id="size-target" class="row box">
        <!--Blockly Panel-->
        <div class="col-10">
            <table class="blockly_table">
                <tr>
                    <td id="blocklyArea"></td>
                </tr>
            </table>
            <div id="blocklyDiv" style="position: absolute"></div>
        </div>
        <!--Blockly Panel-->
        <!--Event Panel-->
        <div class="col-2">
            <h1>Blockly Test</h1>
            {!! Form::open(['action' => "StudentController@store", 'method'=>'POST']) !!}
            {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
        {!! Form::close()!!}
        </div>
        <!--Event Panel-->
    </div>

</div>



    
<xml xmlns="https://developers.google.com/blockly/xml" id="toolbox" style="display: none">
    <block type="controls_if"></block>
    <block type="logic_compare"></block>
    <block type="math_number">
        <field name="NUM">123</field>
    </block>
    <block type="math_arithmetic"></block>

    <block type="text"></block>
    <block type="text_length"></block>
    <block type="text_print"></block>

    <block type="controls_repeat_ext">
        <value name="TIMES">
            <block type="math_number">
                <field name="NUM">10</field>
            </block>
        </value>
    </block>
    <block type="controls_whileUntil"></block>
</xml>
<!-- Scripts -->

@endsection