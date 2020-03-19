<!DOCTYPE html>
<html>
   <head>
      <link rel="stylesheet" type="text/css" href="style.css">
   </head>
   <body>
      <div class="main">
         <h1>Mailchimp take home test</h1>
         <p>Please use the following small subset of markdown rules:
            <br /> # Heading 1
            <br /> ## Heading 2
            <br /> ...
            <br /> ###### Heading 6
            <br />
            <br /> Unformatted text
            <br />
            <br /> [Link text](https://www.example.com)
            <br />
            <br /> Blank line
            <br />
            <br /> Example MarkDown format:
            <br />
            <br /> # Header one
            <br />
            <br /> Hello there
            <br /> How are you?
            <br />
            <br /> What's going on?
            <br />
            <br /> ## Another Header
            <br />
            <br /> This is a paragraph [with an inline link](http://google.com). Neat, eh?
            <br /> ## This is a header [with a link](http://yahoo.com)
            <br />
         </p>
         <textarea class="textarea" rows="25" cols="80" name="markdownval" form="markdownform" required></textarea>
         <form id="markdownform">
            <input name="_token" type="hidden" value="{{ csrf_token() }}" />
            <input type="submit" class="parsebutton" value="Parse" />
         </form>
      </div>
      <div id="ajax-output">
         <div id="markdownform-html"></div>
         <div id="markdownform-text"></div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
      <script src="script.js"></script>
   </body>
</html>