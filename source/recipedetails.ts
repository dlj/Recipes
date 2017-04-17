import defaultPage from './defaultPage'
import { DataObjects } from './dataobjects'

class recipeDetails extends defaultPage {
    templateTag = $("#recipedetailwalkthroughTemplate").prop("content");
    listitemtemplateTag = $("#recipedetailingredientsitemTemplate").prop("content");

    public constructor() {
        super();
        this.load();
    }

    public load() {
        $.get({ url: "/services/recipes", data: { "id": this.getId() } }).done(data => {
            this.createRecipeDOM(data);
        });

        this.getRecipeGroup(this.getId()).done(data => {
            if (data == undefined)
                return;

            // Sorting is reversed so array pop can be used. Faster than splice.
            data = data.sort((f,s) => s.sortindex - f.sortindex );
            
            // Other ways to do this. When, add base element, then find it after the data is loaded.
            // We do it this way to make it easier to do the graphical show.
            let iterate = (ary) => {
                if (ary.length == 0)
                    return;

                let tmpGroup = ary.pop() as DataObjects.RecipeGroup;

                this.getReceiptDetails(tmpGroup.id).then(details => 
                {
                    this.createRecipeGroupDOM(tmpGroup, details.ingredients, details.units, details.recipeingredients);
                    iterate(ary);
                });
            };

            iterate(data);

            // x.createRecipeDOM(data);
        });
    }

    public getRecipeGroup(recipeId: number): JQueryPromise<any> {
        return $.ajax({
            url: "/services/recipegroups",
            type: "GET",
            data: { "recipe_id": recipeId }
        });
    }

    // This could be put into a view on the server part. But... not that needed for the scale of this
    public getReceiptDetails(receipGroupId: number): Promise<{ ingredients: DataObjects.Ingredient[], recipeingredients: DataObjects.RecipeIngredient[], units: DataObjects.Unit[] }> {
        return new Promise<any>((resolve) => {
            var rtn = { ingredients: undefined, recipeingredients: undefined, units: undefined };

            $.get({ url: "/services/recipe_ingredients", data: { "recipegroup_id": receipGroupId } }).done(recing => {
                rtn.recipeingredients = recing;

                var ingredientIds: any[] = [];
                var unitIds: any[] = [];

                recing.forEach(element => {
                    ingredientIds.push({ "id": element.ingredient_id });
                    unitIds.push({ "id": element.unit_id });
                });
                // No need to continue. And if there are no ingretdients, there are no units
                if (ingredientIds.length == 0) {
                    resolve(rtn);
                    return;
                }

                $.when($.ajax({ url: "/services/ingredients[]", type: "post", data: JSON.stringify(ingredientIds), headers: { "X-http-override": "GET" } }).done(ing => {
                    rtn.ingredients = ing;
                 }),
                    $.ajax({ url: "/services/units[]", type: "post", data: JSON.stringify(unitIds), headers: { "X-http-override": "GET" } }).done(unit => {
                        rtn.units = unit;
                 })).done(function() {
                     resolve(rtn);
                 })
              
            });


        
    });

    //return $.when($.get({ url: "/services/recipe", data: { "id": 1 } }));
}
    public createRecipeDOM(data: DataObjects.Recipe) {

    $("#recipedetailtopName > span").text(data.name);
    $("#recipedetailtopDetails .difficulty span:last-child").text(data.difficulty);
    $("#recipedetailtopDetails .time span:last-child").text(data.difficulty);
    //  $("#recipedetailtopDetails .peopleforquantity span:last-child").text(data.difficulty);
    $("#recipedetailtopDetails .lastused span:last-child").text(data.difficulty);

}
    public createRecipeGroupDOM(group: DataObjects.RecipeGroup, ingredients: DataObjects.Ingredient[], units: DataObjects.Unit[], recing: DataObjects.RecipeIngredient[]) {
    
    let ingredientsLookup = this.ArrayToJson<DataObjects.Ingredient>(ingredients,"id");
    let unitLookup = this.ArrayToJson<DataObjects.Unit>(units,"id");

    recing = recing.sort((f,s) => f.sortindex - s.sortindex );
    let temp = $(this.templateTag).clone();
    
    $(temp).find(".recipedetailguides").text(group.instruction);
    let ingredientList = $(temp).find(".list");

    recing.forEach(i => {
        var tmpItem = $(this.listitemtemplateTag).clone();
        tmpItem.find(".name").text(ingredientsLookup[i.ingredient_id].name);
        tmpItem.find(".amount").text(i.amount);

        if (unitLookup.hasOwnProperty(i.unit_id))
            tmpItem.find(".unit").text(unitLookup[i.unit_id].symbol);

        $(ingredientList).append(tmpItem);        
    });

    
    $("#recipedetailsection").append(temp);
    $("#recipedetailsection").children(":last").fadeTo("fast",1);
}
}

var x = new recipeDetails();


