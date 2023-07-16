@extends('layouts.lessonTemplate')

@section("content")
    <h1>Blockly Graph</h1>
    <hr>
    <title>Blockly Demo: Graph</title>

    <div class="row">
        <h3>Event</h3>
    </div>
    <div class="row">
        <div class="col col-md-4 order-2 order-md-1 px-2">
            <div id="visualization"></div>
            <div id="funcText">
                <img id="y1" src="../../media/1x1.gif">
            </div>
        </div>
        <div  id="blocklyContainer" class="col col-md-8 order-1 order-md-2">
            <div id="blocklyDiv" style="height: 400px"></div>
        </div>
        <xml id="toolbox" style="display: none">
            <category name="Math" colour="%{BKY_MATH_HUE}">
                <block type="math_number">
                    <field name="NUM">123</field>
                </block>
                <block type="math_arithmetic">
                    <value name="A">
                        <shadow type="math_number">
                            <field name="NUM">1</field>
                        </shadow>
                    </value>
                    <value name="B">
                        <shadow type="math_number">
                            <field name="NUM">1</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_single">
                    <value name="NUM">
                        <shadow type="math_number">
                            <field name="NUM">9</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_trig">
                    <value name="NUM">
                        <shadow type="math_number">
                            <field name="NUM">45</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_constant"></block>
                <block type="math_number_property">
                    <value name="NUMBER_TO_CHECK">
                        <shadow type="math_number">
                            <field name="NUM">0</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_round">
                    <value name="NUM">
                        <shadow type="math_number">
                            <field name="NUM">3.1</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_modulo">
                    <value name="DIVIDEND">
                        <shadow type="math_number">
                            <field name="NUM">64</field>
                        </shadow>
                    </value>
                    <value name="DIVISOR">
                        <shadow type="math_number">
                            <field name="NUM">10</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_random_int">
                    <value name="FROM">
                        <shadow type="math_number">
                            <field name="NUM">1</field>
                        </shadow>
                    </value>
                    <value name="TO">
                        <shadow type="math_number">
                            <field name="NUM">100</field>
                        </shadow>
                    </value>
                </block>
                <block type="math_random_float"></block>
            </category>
    
            <category name="Variables" colour="%{BKY_VARIABLES_HUE}">
                <block type="graph_get_x"></block>
            </category>
    
            <category name="Logic" colour="%{BKY_LOGIC_HUE}">
                <block type="logic_compare"></block>
                <block type="logic_operation"></block>
                <block type="logic_negate"></block>
                <block type="logic_boolean"></block>
            </category>
        </xml>
        
        <xml id="startBlocks" style="display: none">
            <block type="graph_set_y" deletable="false" x="100" y="100">
                <value name="VALUE">
                    <block type="math_arithmetic">
                        <field name="OP">POWER</field>
                        <value name="A">
                            <block type="graph_get_x"></block>
                            <shadow type="math_number">
                                <field name="NUM">1</field>
                            </shadow>
                        </value>
                        <value name="B">
                            <block type="math_number">
                                <field name="NUM">2</field>
                            </block>
                            <shadow type="math_number">
                                <field name="NUM">1</field>
                            </shadow>
                        </value>
                    </block>
                </value>
            </block>
        </xml>
    </div>
    <script src="https://www.google.com/jsapi"></script>
    <script src="https://unpkg.com/blockly/blockly.min.js"></script>
    <script src="{{ asset('js/blocklyGraph.js') }}" defer></script>
@endsection