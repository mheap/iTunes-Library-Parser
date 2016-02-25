<?php
/*
 * This is an example usage file for iTunesLibrary.
 * The script will find any songs and output them in a table, providing a list of tracks
 */

require 'iTunesLibrary.php';

$library = new iTunesLibrary("Exported Library.xml");
$count = count($library->getTracks());

function get_star_rating($rating) {
	switch ($rating) {
		case 100:
			return "*****";
		case 80:
		 	return "****";
		case 60:
		 	return "***";
		case 40:
		 	return "**";
		case 20:
		 	return "*";
		default:
			return "";
	}
}

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
			<tr><th>Artist</th><th>Album</th><th>Name</th><th>Rating</th><th>Play Count</th><th>Kind</th><th>Genre</th><th>Comments</th></tr>
		</thead>
		<tbody>

HEADER;

foreach( $library->getTracks() as $track ) {
	if ( strstr( $track->Kind, 'audio file' ) && $track->Kind != 'Ringtone' && $track->Genre != 'Audiobook' && $track->Genre != 'Podcast' ) { 
		echo "\t\t\t<tr><td>"
		. $track->Artist . "</td><td>"
		. $track->Album . "</td><td>"
		. $track->Name . "</td><td>"
		. get_star_rating($track->Rating) . "</td><td>"
		. $track->Play_Count . "</td><td>"
		. $track->Kind . "</td><td>"
		. $track->Genre . "</td><td>"
		. $track->Comments . "</td></tr>\n";
	}
}

echo <<<FOOTER
		</tbody>
	</table>
</body>
</html>
FOOTER;
