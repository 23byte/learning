const HOST = process.env.HOST;
module.exports = {
    publicPath: './',
    productionSourceMap: false,
    lintOnSave: false,
    devServer: {
        host: HOST || '0.0.0.0',
        port: 8080,
        open: true,
        disableHostCheck: true,
        proxy: {
            '/admin': {
                target: 'http://0.0.0.0:8000',
                changeOrigin: true,
                ws: true,
                pathRewrite: {
                    '^/admin': ''
                }
            }
        }
    }
}