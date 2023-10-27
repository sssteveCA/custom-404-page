const {join,resolve} = require('path')

const scssPath = join(__dirname,'src','scss')
const tsPath = join(__dirname,'src','ts')

const MiniCssExtractPlugin = require('mini-css-extract-plugin')
const FixStyleOnlyEntriesPlugin = require('webpack-fix-style-only-entries')

module.exports = {
    entry: {
        'css/admin_custom_page_menu': join(scssPath,'admin_custom_page_menu.scss'),
        'js/admin_custom_page_menu': join(scssPath,'admin_custom_page_menu.ts')
    },
    output: {
        path: resolve(__dirname,'dist'),
        filename: '[name].js',
        clean: true
    },
    module: {
        rules: [
            {
                test: /\.tsx?$/i,
                use: 'ts-loader',
                exclude: /node_modules/
            },
            {
                test: /\.(css|s[ac]ss)$/i,
                use: [MiniCssExtractPlugin.loader, 'css-loader','sass-loader'],
                exclude: /node_modules/
            }
        ]
    },
    plugins: [
        new FixStyleOnlyEntriesPlugin(),
        new MiniCssExtractPlugin({
            filename: '[name].css'
        })
    ],
    resolve: {
        extensions: ['.js','.ts','.tsx']
    }
}
