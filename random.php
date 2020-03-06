<?php

namespace RandomQuotes;

class randomQuotes {
    
    public function getRandomQuotes() {
        
        // get quotes
        
    $quotes = file_get_contents( __DIR__ . '/../inc/quotes.json');
    
    // decoding quotes 
        
     $quotes = json_decode($quotes, true);    
    
    // get a random index number 
        
    $index = mt_rand( 0, count( $quotes ) );
        
    // return the random quote
    return $quotes[ $index ];
    
        
    }
    
    public function generate() {
    
    return $this->getRandomQuotes();
    
}
    
}


    
    