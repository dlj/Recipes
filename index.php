<?php
 include("services/objectDefinition.php");

 function changePage(String $page) 
 {
     require("pages/".$page.".php");
 }

function checkQueryString()
{
    $page = "recipes";
    $params = [];
    parse_str($_SERVER['QUERY_STRING'], $params);

    if (count($params) > 0) {
        foreach ($params as $key => $value) {
            if ($key == "p") 
            {
                $page = $value;
                break;
            }
        } 
    }
    changePage($page);
}

?>

<html>

<head>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.1.0.min.js" integrity="sha256-cCueBR6CsyA4/9szpPfrX3s49M9vUU5BgtiJj06wt/s=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js" integrity="sha256-eGE6blurk5sHj+rmkfsGYeKyZx3M4bG+ZlFyA7Kns7E=" crossorigin="anonymous"></script>
    <script src="javascript/index.js" ></script>
    <script src="bundle.js" ></script>
    <link href="css/index.css" rel="stylesheet">
</head>
<body>

    <div id="navigationMenu"> 
        <div class="topMenuItem"><span> Recipes </span></div>
        <div class="topMenuItem"><span> Planning (3)</span></div>
        <div class="topMenuItem" style="width:calc(100% - 18px)"><hr></div>
        <div id="addtoplan" class="topMenuItem"><span> Add to plan </span></div>
        <div id="favourite" class="topMenuItem"><span> Favourite </span></div>
        <div class="topMenuItem" style="width:calc(100% - 18px)"><hr></div>
        <div id="addrecipe" class="topMenuItem"> <span> Add recipe</span> </div>
        <div id="editrecipe" class="topMenuItem"> <span> Edit recipe</span> </div>
    </div>
    <div id="mainContent">
     <?php checkQueryString() ?>

    </div>
</body>
</html>