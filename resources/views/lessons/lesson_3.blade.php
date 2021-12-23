@extends('layouts.app')

@section("content")  
@if (Auth::user()->role == "teacher")
    <a href="{{route("modules.index")}}" class="btn btn-default">Go Back</a>
@else
    <a href="/student" class="btn btn-default">Go Back</a>
@endif

<h1>Generating Javascript</h1>

<div class="row">
    <div class="col-12 d-none d-md-block">    
        <p>
            This is a simple demo of generating code from blocks and running the code in a sandboxed JavaScript interpreter.
        </p>
    </div>
    <div class="col-12">
        <button class="btn btn-primary" onclick="showCode()">Show JavaScript</button>
        <button class="btn btn-primary" onclick="runCode()">Run JavaScript</button>
    </div>
</div>  
<div class="row">
    <!--Blockly Panel-->
    <div class="col-md-9 order-2 order-md-1">
        <table class="blockly_table">
            <tr>
                <td id="blocklyArea"></td>
            </tr>
        </table>
        <div id="blocklyDiv" style="position: absolute"></div>
    </div>
    <!--Blockly Panel-->
    <!--Event Panel-->
    <div class="col-md-3 order-1 order-md-2">
        <h1>Events</h1>
    </div>
    <!--Event Panel-->
</div>


<xml xmlns="https://developers.google.com/blockly/xml" id="toolbox" style="display: none">
    <category name="Logic" colour="%{BKY_LOGIC_HUE}">
        <block type="controls_if"></block>
        <block type="logic_compare"></block>
        <block type="logic_operation"></block>
        <block type="logic_negate"></block>
        <block type="logic_boolean"></block>
    </category>
    <category name="Loops" colour="%{BKY_LOOPS_HUE}">
        <block type="controls_repeat_ext">
            <value name="TIMES">
                <block type="math_number">
                <field name="NUM">10</field>
                </block>
        </value>
        </block>
        <block type="controls_whileUntil"></block>
    </category>
    <category name="Math" colour="%{BKY_MATH_HUE}">
        <block type="math_number">
            <field name="NUM">123</field>
        </block>
        <block type="math_arithmetic"></block>
        <block type="math_single"></block>
    </category>
    <category name="Text" colour="%{BKY_TEXTS_HUE}">
        <block type="text"></block>
        <block type="text_length"></block>
        <block type="text_print"></block>
    </category>
</xml>

<xml xmlns="https://developers.google.com/blockly/xml" id="startBlocks" style="display: none">
    <block type="text_print" inline="false">
        <value name="TEXT">
        <block type="text">
            <field name="TEXT">Hello World</field>
        </block>
        </value>
    </block>
</xml>

  <script src="https://unpkg.com/blockly/blockly.min.js"></script>
  <script src="{{ asset('js/blocklyBase.js') }}" defer></script>
  <!--script>
    Blockly.Xml.domToWorkspace(document.getElementById('startBlocks'),
                               demoWorkspace);    
  </!--script-->
    <!-- Scripts -->
    
{{--@endif--}}
@endsection