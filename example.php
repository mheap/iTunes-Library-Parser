<?php
/*
 * This is an example usage file for iTunesLibrary.
 * The script will find any songs and output them in a HTML table, providing a list of tracks
 */

require 'iTunesLibrary.php';

$library = new iTunesLibrary( "Library.xml" );
$count = count( $library->getTracks() );

echo <<<HEADER
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>iTunes Music Library: {$count} Music Titles</title>
  <style>
    table { border-collapse: collapse; }
    table, tr, th, td { border: 1px solid grey; }
    th { font-weight: bold; }
    td { padding: 3px; }
  </style>
</head>
<body>
  <table>
    <thead>
      <tr><th>Artist</th><th>Album</th><th>Name</th><th>Rating</th><th>Play Count</th><th>Kind</th><th>Genre</th><th>Compilation</th><th>Comments</th></tr>
    </thead>
    <tbody>

HEADER;

foreach( $library->getTracks() as $track ) {
  if ( strstr( $track->Kind, 'audio file' ) ) { 
    echo "      <tr><td>"
    . $track->Artist . "</td><td>"
    . $track->Album . "</td><td>"
    . $track->Name . "</td><td>"
    . $library->getStarRating($track->Rating) . "</td><td>"
    . $track->Play_Count . "</td><td>"
    . $track->Kind . "</td><td>"
    . $track->Genre . "</td><td>"
    . $track->Compilation . "</td><td>"
    . $track->Comments . "</td></tr>\n";
  }
}

echo <<<FOOTER
    </tbody>
  </table>
</body>
</html>

FOOTER;
