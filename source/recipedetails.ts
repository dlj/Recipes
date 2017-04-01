class recipeDetails {
    public getRecipe(id: number): any {
        
        $.ajax({
            url: "/services/recipe/" + id,
            type: "GET"
        }).done(function(tmpData) {
        tmpData.name = "does this update?";
/*
        $.ajax({
            url: "/services/recipe/"+ id,
            type: "POST",
            data : JSON.stringify(tmpData)
        });
*/
        });

    }
}

var x = new recipeDetails();
x.getRecipe(1); 