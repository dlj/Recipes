import defaultPage from './defaultPage'
import {DataObjects} from './dataobjects'

class recipeDetails extends defaultPage {
    templateTag  = $("#recipedetailwalkthroughTemplate").prop("content");
  
    public getRecipe(id: number): JQueryPromise<any> {  
        return $.ajax({
            url: "/services/recipe",
            type: "GET",
            data: { "id" : id }
        });

 /*       $.ajax({
            url: "/services/recipes_ingredients",
            type: "GET",
            data: { "recipe_id" : id }
        }).done(function(data) {

        }); */
    }
    public getRecipetGroup(recipeId : number) : JQueryPromise<any>
    {
        return $.ajax({
            url: "/services/recipegroup",
            type: "GET",
            data: { "recipe_id" : recipeId }
        });
    }

    public getReceiptDetails(receiptGroupId : number) : JQueryPromise<any>
    {
        return $.when()
    }
      public createRecipeDOM(data : DataObjects.Recipe) {

        $("#recipedetailtopName > span").text(data.name);
        $("#recipedetailtopDetails .difficulty span:last-child").text(data.difficulty);
        $("#recipedetailtopDetails .time span:last-child").text(data.difficulty);
      //  $("#recipedetailtopDetails .peopleforquantity span:last-child").text(data.difficulty);
        $("#recipedetailtopDetails .lastused span:last-child").text(data.difficulty);

      }
  public createRecipeGroupDOM(data : DataObjects.RecipeGroup) 
  {
      let temp = $(this.templateTag).clone();  
      $(temp).find(".recipedetailguides").text(data.instruction);
      $("#recipedetailsection").append(temp);
  }
}

var x = new recipeDetails();
x.getRecipe(x.getId()).done(data => {
    x.createRecipeDOM(data);
});
x.getRecipetGroup(x.getId()).done(data => {
    if (data != null) {
        data.forEach(element => {
            x.createRecipeGroupDOM(element);
        });
    }
   // x.createRecipeDOM(data);
});
