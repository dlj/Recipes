import defaultPage from './defaultPage'

class recipeDetails extends defaultPage {
    templateTag  = $("#recipedetailwalkthroughTemplate").prop("content");
  

    public getRecipe(id: number): any {
        
        $.ajax({
            url: "/services/recipe",
            type: "GET",
            data: { "id" : id }
        }).done(function(tmpData) {
            //this.populateData(tmpData);
            $("#recipedetailtopName > span").text(tmpData.name);
            $("#recipedetailtopDetails .difficulty span:last-child").text(tmpData.difficulty);
            $("#recipedetailtopDetails .time span:last-child").text(tmpData.difficulty);
            $("#recipedetailtopDetails .peopleforquantity span:last-child").text(tmpData.difficulty);
            $("#recipedetailtopDetails .lastused span:last-child").text(tmpData.difficulty);


        });
        $.ajax({
            url: "/services/recipe",
            type: "GET",
            data: { id : 2 }
        }).done(function(data) {

        });
    }

      public createRecipeDOM(input) {
      let temp = $(this.templateTag).clone();  
      $(temp).find(".recipedetailguides").text("Is there any text here ?")
      $("#recipedetailsection").append(temp);
  }
}

var x = new recipeDetails();
x.getRecipe(x.getId()); 
console.log();
x.createRecipeDOM(null);
x.createRecipeDOM(null);
x.createRecipeDOM(null);