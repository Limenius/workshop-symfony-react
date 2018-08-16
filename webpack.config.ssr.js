var Encore = require("@symfony/webpack-encore");

Encore.setOutputPath("var/webpack/")
  .setPublicPath("/")
  .addEntry("app", "./assets/js/app.js")
  .enableReactPreset();

module.exports = Encore.getWebpackConfig();
