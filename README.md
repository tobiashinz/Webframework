# Webframework
This small Framework will help you to create and bring online small websites faster with less configurations so do.

To do so this framework uses:

* [SASS](http://sass-lang.com)
* [gulp.js](http://gulpjs.com)
* [Inuit.css](http://csswizardry.com)

## Getting Started
1. install ruby (usually pre-installed on Mac OS)
2. clone repository
3. install needed moduls via `npm install`
4. watch changes `gulp watch`

## Structure
|    Type    | instructions                                                                                |
|:----------:|---------------------------------------------------------------------------------------------|
| HTML       | please only do changes in the `index--dev.html`                                             |
| SCSS       | put all needed CSS regarding stuff into `css/ui/` and import the files in `css/screen.scss` |
| JavaScript | follow structure in `js/scripts.js`                                                         |

## Commands
```
gulp [option]
Options:
  watch       start to watch changes in files
  sprites     create a sprite-file
  critical    create critical path (above the fold)
  images      minify images
```