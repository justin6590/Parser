# Parser Markdown to HTML

You can find the working prototype at the following URL: https://mailchimpjnygaard.herokuapp.com/

Converts a very small subset of rules, works with h1 to h6, anchor tags, p tags, and break points. In the future I would like to flush it out more and handle a larger set of HTML tags.

It is a Laravel web application deployed on Heroku. Setting up Laravel on Heroku is quick and easy, if you have never done it this is a great starting point to look at, [Laravel Heroku Setup](https://devcenter.heroku.com/articles/getting-started-with-laravel).   

You can find my work contained in the following files:

- convert.blade.php - Front End UI and Form
- script.js - Contains the Logic for the AJAX Request
- style.css - Stylesheet
- Convert.php - Parsing Logic
- MarkDownController.php - Calls my Convert Service
- web.php - Routing Layer for my home page(/) and process endpoint(/process)
