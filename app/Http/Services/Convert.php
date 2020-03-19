<?php 

namespace App\Http\Services;

class Convert
{
    /**
    * Main function that will be parsing the MarkDown.
    * Converts a small subset of MarkDown, including header tags, paragraph tags, a href tags, and URLs
    */
    public function parseMarkdownToHTML($input)
    {
        $index = -1;
        $markDown = '';
        $inParagraph = false;

        $lines = explode("\n", $input);
        if (empty($lines)) { 
            return '';
        }
        
        while (isset($lines[++$index])) {
            $line = $lines[$index];
            $trimmedLine = trim($line);
            if (empty($trimmedLine)) {  
                if($inParagraph === true){
                    $markDown .= "</p>";
                    $inParagraph = false;
                }
                continue;
            }
        
            // Looking for <h1> - <h6> tags in the markdown
            if ($trimmedLine[0] === '#') {
                if($inParagraph === true){
                    $markDown .= "</p>";
                    $inParagraph = null;
                }
                //Counting how many #
                $headerLevel = strlen($trimmedLine) - strlen(ltrim($trimmedLine, '#'));
                $markDown .= "\n<h{$headerLevel}>" . ltrim($trimmedLine, '# ') . "</h{$headerLevel}>";
                continue;    
            }

            // Looking for <p> tags in the markdown
            if ($inParagraph === false) { 
                $markDown .= "\n<p>";
                $markDown .= "{$trimmedLine}";
                $inParagraph = true;
            }
            else {
                $markDown .= "\n<br />";
                $markDown .= "{$trimmedLine}";
            }
        }

        # Close remaining p tag
        if($inParagraph === true){
            $markDown .= "</p>";
        }

        // Looking for [link_title](url)<a href> tags in the markdown
        $markDown = preg_replace_callback('~\[(.+?)\]\s*\((.+?)\)~', function($e) {
            return "<a href=\"{$e[2]}\">{$e[1]}</a>";
        }, 
        $markDown);

        // Looking for URLs in the markdown
        $markDown = preg_replace_callback('~\((.+?)\)~', function($e) {
            return "<a href=\"{$e[1]}\">{$e[1]}</a>";
        }, $markDown);

        return $markDown;
    }
}
