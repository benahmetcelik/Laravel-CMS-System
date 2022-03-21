<?php

namespace App\Business;

class PostCutter
{


    public static function cut($input, $length, $ellipses = true, $strip_html = true)
    {



        //strip tags, if desired
        if ($strip_html) {
            $input = strip_tags($input);
        }




        //no need to trim, already shorter than trim length
        if (strlen($input) <= $length) {
            return $input;
        }

        //find last space within length
        $last_space = strrpos(substr($input, 0, $length), ' ');
        if ($last_space !== false) {
            $trimmed_text = substr($input, 0, $last_space);
        } else {
            $trimmed_text = substr($input, 0, $length);
        }
        //add ellipses (...)
        if ($ellipses) {
            $trimmed_text .= '...';
        }

        return $trimmed_text;
    }


}
