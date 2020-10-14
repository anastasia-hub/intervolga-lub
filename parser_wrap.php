<?php
    $search = $_GET['find_text'];
    $html_files = ["first.html", "second.html"];

    foreach($html_files as $item)
    {
        $text = file_get_contents("html/".$item);
        $text = str_ireplace($search, "<span style=\"color:red;\">$search</span>", $text);
        echo $text;
    }
?>