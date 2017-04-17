export module DataObjects {
    export class Recipe {
        public id: number;
        public name: string;
        public difficulty: number;
        public description: string;
    }

    export class RecipeGroup {
        public id: number;
        public recipe_id: number;
        public group: string;
        public instruction: string;
        public sortindex: number;
        public time: number;
    }

    export class Ingredient {
        public id: number;
        public name: string;
        public type_id: number;
        public price_avg: number;
    }

    export class RecipeIngredient {
        public id: number;
        public amount: number;
        public text: string;
        public ingredient_id: number;
        public recipe_id: number;
        public recipegroup_id: number;
        public unit_id: number;
        public sortindex: number;
    }

    export class Type {
        public id: number;
        public name: string;
    }

    export class Unit {
        public id: number;
        public name: string;
        public symbol: string;
    }
}