<html>
 <link rel="stylesheet" href="css/recipe.css">
    <template id='recipeTemplate'>
      <!--  Move this to the CSS and make this with Flex instead -->
      <a class="recipeRef">
      <div class="recipeContainer">
        <div class="recipeImage"></div>
        <div class="recipeInformationContainer">
          <div class="recipeInformationTime"><span>Time : </span> <span class='recipeInformationTimeText'></span></div>
          <div class="recipeInformationDifficulty"><span>Difficulty : </span> <span class='recipeInformationDifficultyText'></span></div>
          <div class="recipeInformationName"><span class="recipeInformationNameText"></span></div>
        </div>
      </div>
      </a>
    </template>
    <div id="recipeContent">
    </div>
     <script src="javascript/recipes.js" ></script>
     
</html>