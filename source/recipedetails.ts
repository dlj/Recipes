import defaultPage from './defaultPage'
import { DataObjects } from './dataobjects'

class recipeDetails extends defaultPage {
    templateTag = $("#recipedetailwalkthroughTemplate").prop("content");

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

            data.forEach(element => {
                let tmpGroup = element as DataObjects.RecipeGroup;
            
                
                this.getReceiptDetails(tmpGroup.id);
                /*
                (data => {
                    // Please error check this better
                    let ing = data[0] as DataObjects.Ingredient;
                    let recing = data[1] as DataObjects.RecipeIngredient;
                    let unit = data[2] as DataObjects.Unit;
                    this.createRecipeGroupDOM(tmpGroup, ing, unit, recing);
                    });
*/            
            });

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
    public getReceiptDetails(receipGroupId: number): Promise<{ ingredients: DataObjects.Ingredient, recipeingredients: DataObjects.RecipeIngredient, unit: DataObjects.Type }> {
        return new Promise<any>((resolve) => {
            var rtn = { ingredients: undefined, recipeingredients: undefined, type: undefined };

            $.get({ url: "/services/recipe_ingredients", data: { "recipegroup_id": receipGroupId }}).done(data => {
                    var test = [];
                    data.forEach(element => {
                        test.push({"id" : element.ingredient_id});
                    });
                        if (test.length > 0)
                        {
                  $.ajax({ url: "/services/ingredients[]", type : "post", data: JSON.stringify(test), headers:{ "X-http-override" : "GET" } } ).done(data => {
                    this.createRecipeDOM(data);
                  });
                        }
                
/*
                $.get({ url: "/services/ingredients", data: { "id": this.getId() } }).done(data => {
                    this.createRecipeDOM(data);
                });

                $.get({ url: "/services/units", data: { "id": this.getId() } }).done(data => {
                    this.createRecipeDOM(data);
                });
                */
            });


            resolve(rtn);
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
    public createRecipeGroupDOM(group: DataObjects.RecipeGroup, ingredients: DataObjects.Ingredient, units: DataObjects.Unit, xxx: DataObjects.RecipeIngredient) {
        let temp = $(this.templateTag).clone();
        $(temp).find(".recipedetailguides").text(group.instruction);
        $("#recipedetailsection").append(temp);
    }
}

var x = new recipeDetails();


