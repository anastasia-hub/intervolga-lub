<?php


    $doc = new DOMDocument;
    $doc->loadhtmlfile('html/first.html');

    $body = $doc->getElementsByTagName('body');
    if ( $body && 0<$body->length ) {
        $body = $body->item(0);
        echo $doc->savehtml($body);
    }
    $doc1 = new DOMDocument;
    $doc1->loadhtmlfile('html/first.html');

    $body1 = $doc->getElementsByTagName('body');
    if ( $body1 && 0<$body1->length ) {
        $body1 = $body1->item(0);
        echo $doc1->savehtml($body1);
    }
?>
