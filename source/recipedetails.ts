class recipeDetails {
    templateTag  = $("#recipedetailwalkthroughTemplate").prop("content");
    public id : number = null;

    public constructor()
    {
        var urlParams = new URLSearchParams(window.location.search);
        if (urlParams.has("id"))
            this.id =  parseInt(urlParams.get("id"))
        else
            alert("id not defined");
    }

    public getRecipe(id: number): any {
        
        $.ajax({
            url: "/services/recipes",
            type: "GET",
            data: { id : 3}
        }).done(function(tmpData) {

        });

    }

      public createRecipeDOM(input) {
      let temp = $(this.templateTag).clone();  
      $(temp).find(".recipedetailguides").text("Is there any text here ?")
      $("#recipedetailsection").append(temp);
  }
}

var x = new recipeDetails();
x.getRecipe(this.id); 
x.createRecipeDOM(null);
x.createRecipeDOM(null);
x.createRecipeDOM(null);