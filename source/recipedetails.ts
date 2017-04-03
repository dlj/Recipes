class recipeDetails {
    public getRecipe(id: number): any {
        
        $.ajax({
            url: "/services/recipes_ingredients",
            type: "GET",
            data: { ingredients_id : 3}
        }).done(function(tmpData) {
        tmpData.name = "does this new";
        tmpData.id = 19;
        });

    }
}

var x = new recipeDetails();
x.getRecipe(1); 