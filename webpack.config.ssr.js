var Encore = require("@symfony/webpack-encore");

Encore.setOutputPath("var/webpack/")
  .setPublicPath("/")
  .addEntry("server-bundle", "./assets/js/app.js");

module.exports = Encore.getWebpackConfig();
