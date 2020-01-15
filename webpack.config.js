const defaults = require("@wordpress/scripts/config/webpack.config");

const devPort = 8083; // This should be an available port to listen hmr, socket connections.

module.exports = {
    ...defaults,

    externals: {
        react: "React",
        "react-dom": "ReactDOM"
    },

    entry: './src/index.js',

    output: {
        path: __dirname,
        publicPath: '/',
        filename: 'bundle.js',
    },

    devServer: {
        // open: true,
        hotOnly: true,
        liveReload: false,
        publicPath: '/',
        port: devPort,
        proxy: {
            '/': {
                target: 'http://localhost:8000', // This is the url of your wordpress website.
                changeOrigin: true,
            }
        },
        headers: {
            'Access-Control-Allow-Origin': '*'
        }
    },
};
