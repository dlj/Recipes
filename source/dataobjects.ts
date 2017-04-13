export module DataObjects {
    export class Recipe {
        public id: number;
        public name: string;
        public difficulty: number;
    }

    export class RecipeGroup {
        public id: number;
        public recipId: number;
        public group: string;
        public instruction: string;
        public sortindex: number;
        public time: number;
    }

    export class Ingredient {

    }

    export class RecipeIngredient {
        public id : number;
        public amount : number;
        public text : string;
        public ingredients_id : number;
        public recipe_id : number;
        public recipegroup_id : number;
        public type_id : number;
    }
}