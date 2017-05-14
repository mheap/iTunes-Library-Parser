<?php
/*
 * This is an example usage file for iTunesLibrary.
 * The script will find any songs and output them in a CSV file, providing a list of tracks
 */

require 'iTunesLibrary.php';

$library = new iTunesLibrary( "Library.xml" );
$csvSeparator = '";"';
$tracks = '"Artist";"Album";"Name";"Rating";"Play Count";"Kind";"Genre";"Compilation";"Purchased";"Comments"' . "\n";

foreach( $library->getTracks() as $track ) {
  if ( strstr( $track->Kind, 'audio file' ) && $track->Kind != 'Ringtone' && $track->Genre != 'Audiobook' && $track->Genre != 'Podcast' ) { 
    $tracks .= '"'
      . $track->Artist . $csvSeparator
      . $track->Album . $csvSeparator
      . $track->Name . $csvSeparator
      . $library->getStarRating( $track->Rating ) . $csvSeparator
      . $track->Play_Count . $csvSeparator
      . $track->Kind . $csvSeparator
      . $track->Genre . $csvSeparator
      . $track->Compilation . $csvSeparator
      . $track->Purchased . $csvSeparator
      . $track->Comments . "\"\n";
  }
}

file_put_contents( "Library.csv", $tracks );
