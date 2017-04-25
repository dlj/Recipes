var path = require("path");
module.exports = {
    entry:{
        index : './source/index.ts',
        recipedetails : './source/recipedetails.ts',
        recipes : './source/recipes.ts',
        recipeeditor : './source/recipeeditor.ts'
    },
    output: {
        path: path.join(__dirname,"javascript"),
          filename: '[name].js',
    },
    devtool: 'source-map',
    resolve: {
        modules: ["./source"],
        // Add `.ts` and `.tsx` as a resolvable extension.
        extensions: ['.ts','.js']
    },
    module: {
        loaders: [
            // all files with a `.ts` or `.tsx` extension will be handled by `ts-loader`
            { 
                test: /\.ts$/, 
                loader: 'ts-loader' }
        ]
    },
    watchOptions: {
        poll: true
    },
}