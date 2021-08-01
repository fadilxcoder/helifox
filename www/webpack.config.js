const path = require('path');

module.exports = {
  mode: "production",
  entry: {
    script: "./assets/js/script.js",
  },
  output: {
    filename: "[name].js",
    path: path.resolve(__dirname, "public/dist")
  },
  module: {
    rules: [
      {
        test: /\.js$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"]
          }
        }
      }
    ]
  },
  resolve: {
    fallback: {
        "fs": false
    },
  }
};