# Login-signup-page-ajax-scss-json-mysql
This webpages has a login page, signup pgae and a user profile page which has written in html,css,js,php and we use scss/sass for style sheets, json and mysql for storing the entery cerdites

## about this Project

* This is a project where we have create three pages which are login, signup and user profile page 

# How to install the and run the files

-> to install the webpages into system we need some requriments 

## Requirements
* PHP
* Apache server
* MySQL
* Bootstrap
* JQuery 
* nodejs

## how to run webpages

* first go to config.php file and add the mysql password and change the database accordingly to your wish 
* copy the files into apache server and run the apache server 

## Now let see how to use scss in the webpages

* Now let's install Sass for our project:

Run this command:

     "npm install node-sass" 
 
 in our current directory.

This will create package.json and package-lock.json files for your project with default config.

We will create a simple watcher script so that whenever we change our scss file it gets compiled into the CSS.
We go to the package.json file and add another field called "scripts" above the "dependencies".
Our script name is going to be "watch:scss".

We start by defining a node-sass binary, then -w, followed by the path where our .scss file resides, 
and then we specify where we want our output  to be, which is our generated css.

        "scripts": {
           "watch:sass": "node-sass -w scss/style.scss css/style.css --output-style compressed"
         }

Now go to the terminal and type:

         node run watch:sass. 

This will start a watcher script.

SCSS contains all the features of CSS and contains more features that are not present in CSS which makes it a good choice for developers to use it. SCSS is full of advanced features. SCSS offers variables, you can shorten your code by using variables. It is a great advantage over conventional CSS.

## about json file 
* the login details which are used while signup will be stored in data.json file and we will use them while login in to user-profile page.
* you can see the signup credites in the data.json file after you have submit the details in the signup page.
* JSON document databases use the same document-model format that developers use in their application code, which make it much easier for them to store and query data. The flexible, semi-structured, and hierarchical nature of JSON document databases allows them to evolve with applications' needs.
* The php functions which are used to store the data in json files are written in the files login.class.php and register.class.php
-> in register.class.php you can change the elements in the funtion which to be store which to be not as you wish.

## Ajax Form 
* We create ajax form using js which is used By sending asynchronous requests, it allows an application to refresh a part of a page without having to reload the whole document. we have created loginajax.js for login form and signupajax.js for signup form which are in js folder.

**Without install above _requirements_ you can't get a output correctly**

