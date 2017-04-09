class Recipes {
    templateTag  = $("#recipeTemplate").prop("content");

    public getRecipes(): JQueryPromise<any> {
        return $.ajax({
            url: "/services/recipe",
            type: "GET",});
    }

  public createRecipeDOM(input) {
      let temp = $(this.templateTag).clone();
      $(temp).find(".recipeInformationNameText").text(input.name);
      $(temp).find(".recipeInformationTimeText").text(input.preparationtime);
      $(temp).find(".recipeInformationDifficultyText").text(input.difficulty);
      
          

      $("#recipeContent").append(temp);
  }

}

let xx = new Recipes();
xx.getRecipes().done((recipes) => {
    for (let recipe of recipes)
        xx.createRecipeDOM(recipe)
  })


