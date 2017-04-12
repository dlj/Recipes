module.exports = {
    entry:{
        index : '/source/index.ts',
        recipedetails : '/source/recipedetails.ts',
        recipes : '/source/recipes.ts'
    },
    output: {
        path: "/javascript",
       filename: '[name].js'
    },
    resolve: {
        modules: ["/source"],
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