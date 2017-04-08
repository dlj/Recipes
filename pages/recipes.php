<html>
 <link rel="stylesheet" href="css/recipe.css">
    <template id='recipeTemplate'>
    <a href="/pages/recipedetails.php?xxx"> 
      <!--  Move this to the CSS and make this with Flex instead -->
      <div style="width:250px;height:250px;margin:20px; position:relative;float:left;border:1px solid black">
      <div style="height:200px;background-image:url('http://www.pethealthnetwork.com/sites/default/files/why-should-i-spay-my-new-kitten-138101629.jpg ');background-repeat:round"></div>
      <div style="float:left;margin-left:5px;margin-top:3px;"><span>Time : </span> <span id='recipeTemplatePreparationTime'></span></div>
      <div style="float:right;margin-right:5px;margin-top:3px"><span>Difficulty : </span> <span id='recipeTemplateDifficulty'></span></div>
      <div id='recipeTemplateName' style="clear:both;margin-left:5px;"></div>
      </div>
      </a>
    </template>
    <div id="recipeContent">
    </div>
     <script src="javascript/recipes.js" ></script>
     
</html>