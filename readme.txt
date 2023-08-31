##TODO

Automatic separation of render blocking css and js

Auto minify html, example https://zuziko.com/tutorials/how-to-minify-html-in-wordpress-without-a-plugin/

Auto minify javascript

Make javascript async/deffer

Separated mobile and desktop css for css render blocking, Allow more detail for media tages on links, see https://classroom.udacity.com/courses/ud884/lessons/1469569174/concepts/15244185600923

Auto optimise/compression images uploaded to the media library

Create automatic search index

Separate version numbers for css and js into decimal


##TOTHINK ABOUT
Change the version number increment to an admin button like the edit post button or a text input for version number


OPTIMIZATION GUIDELINE

FILES:
Step 1: Reduce Bytes in the critical rendering path
Step 2: Reduce files in the critical rendering path (Deffer where possible)
Step 3: Reduce Critical path length (14kb per length, files can load in parallal), anythign over means more trips to the server https://classroom.udacity.com/courses/ud884/lessons/1469569174/concepts/15657086140923

CSS:
Make declarations general not specific
Use Media attributes to defer unessesary css

JAVASCRIPT:
Ensure appropriate tags are deffered or async as needed

#TODO

- feeds
- read more
- 