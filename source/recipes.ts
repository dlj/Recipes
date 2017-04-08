class Recipes {
    templateTag  = $("#recipeTemplate").prop("content");

    public getRecipes(): JQueryPromise<any> {
        return $.ajax({
            url: "/services/recipe",
            type: "GET",});
    }

  public createRecipeDOM(input) {
      let temp = $(this.templateTag).clone();
      $(temp).find("#recipeTemplateName").text(input.id + " - " + input.name);
      $(temp).find("#recipeTemplatePreparationTime").text(input.preparationtime);
      $(temp).find("#recipeTemplateDifficulty").text(input.difficulty);
      
          

      $("#recipeContent").append(temp);
  }

}

let xx = new Recipes();
xx.getRecipes().done((recipes) => {
    for (let recipe of recipes)
        xx.createRecipeDOM(recipe)
  })


