<html>
<head>
    <link href="../css/recipedetails.css" rel="stylesheet">
</head>

<body>
<template id="recipedetailwalkthroughTemplate">
 <div class="recipedetailwalkthroughflex">
        <div class="recipedetailingredients" >
                <ul class="recipedetailingredientslist">
                    <li> assaddsa asd sa </li>
                    <li> assaddsa asd sa </li>
                </ul>
        </div>
        <div class="spacer"> </div>
        <div class="recipedetailguides">
        </div>
    </div>
</template>

    <div id="recipedetailcontent">
        <div id="recipedetailtop">
            <div id="recipedetailtopName"> <span> </span> </div>
            <div id="recipedetailtopImage"> </div>
            <div id="recipedetailtopDetails"> 
                <div class="difficulty"><span> Difficulty </span> <span> 5 out of 10 </span>  </div>
                <div class="time"><span>100 minutes</span> <span>duration</span>  </div>
                <div class="peopleforquantity">
                    <span> For </span> 
                    <!-- Could have been made in Javascript... but... meh -->
                    <select name="quantity"> 
                            <option value="1">1</option>
                            <option value="2" selected>2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                    </select>
                    <span> people </span> </div>
                <div class="spacer"> </div>
                <div class="lastused" > <span> Last used </span> <span> 10 days ago </span>  </div>
            </div>
        </div>
        <div id="recipedetailscontainer">
            <div style='flex:4;flex-shrink:1' id="recipedetailsection"> 
           
            </div>
            <div style='flex:1;flex-shrink:0;display:none'>
                <div style=';margin:5px 0;width:calc(100% - 5px);height:100px'></div>
            </div>
        </div>
        <div id="recipedetailpicturebox">

        </div>
    </div>
     <script src="../javascript/recipedetails.js"></script>
</body>

</html>


