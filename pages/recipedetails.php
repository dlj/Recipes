<?php
error_reporting(E_ALL);
ini_set("display_errors","On");

?>
<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Oxygen" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="../javascript/recipedetails.js"></script>
    <link href="../css/recipedetails.css" rel="stylesheet">
</head>

<body>

    <div id="recipedetailcontent" style='background-color:red;width:80%;height:100%;<margin:auto></margin:auto>'>
        <div id="recipedetailtop" style='width:calc(100% - 10px);height:32px;background-color:white;margin:5px;top:5px;position:relative'></div>
        <div style='display:flex;margin:5px'>
            <div style='flex:4;flex-shrink:1'> 
            <div class="recipedetailwalkthroughflex" style='display:flex;position:relative;'>
                <div class="recipedetailingredients" style='flex:3;background-color:blue'>
                    <div style="background-color:white;margin:5px">
                        <ul>
                        <li>1800	gram	Kogte kolde kartofler</li>
                        <li class="p1m">500	gram	Pølser</li>
                        <li>1		Løg</li>

                        </ul>
                    </div>
                </div>
                <div class="recipedetailguides" style='flex:5;background-color:green'>
                    Skær kartofler og <span class="p1m">pølser</span> i mindre stykker. Pil og hak løget. 
                </div>
            </div>
            <div class="recipedetailwalkthroughflex" style='display:flex;position:relative;'>
                <div class="recipedetailingredients" style='flex:3;background-color:blue'>
                    <div style="background-color:white;margin:5px">
                        <ul>
                            <li>10	gram	Smør</li>
                            <li>3	tsk.	Paprika, edelsuss</li>
                            <li>1	ds.	Tomatpure. koncentreret</li>
                            <li>2	dl.	Mælk</li>
                            <li>0.5	dl.	Piskefløde</li>
                            <li>0.5	tsk.	Groft salt</li>
                            <li>lidt	Peber</li>
                        </ul>
                    </div>
                </div>
                <div class="recipedetailguides" style='flex:5;background-color:green'>
                    <div>
                        Lad smørret blive gyldent og svits da løget der i i ca. i min. Tilsæt paprika og pølser og lad det svitse i ca. 3 min. Skru ned til jævn varme og tilsæt kartofler, tomatpure og de øvrige ingredienser. 
                    </div>
                </div>
            </div>
                        <div class="recipedetailwalkthroughflex" style='display:flex;position:relative;'>
                <div class="recipedetailingredients" style='flex:3;background-color:blue'>
                    <div style="background-color:white;margin:5px">
                    </div>
                </div>
                <div class="recipedetailguides" style='flex:5;background-color:green'>
                    <div>
                   lad retten koge i ca. 10 min og så er den klar til at blive serveret. 
                    </div>
                </div>
            </div>
            </div>
            <div style='flex:1;flex-shrink:0'>
                <div style='background-color:yellow;margin:5px 0;width:calc(100% - 5px);height:100px'></div>
            </div>
        </div>
    </div>
</body>

</html>


