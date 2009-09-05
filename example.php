<?php
/*
 * This is an example usage file for iTunesLibrary.
 * The script will find any songs that have a bitrate of under 256kbps
 * and output them in a table, providing a list of tracks for you to re-rip
 */

require 'iTunesLibrary.php';

$library = new iTunesLibrary("Library.xml");

echo '<table><tbody>';
foreach ($library->getTracks() as $t){
	if ( ($t->Bit_Rate < 256) && ($t->Genre != 'Podcast') ){ 
		echo '<tr><td style="border-right: 1px solid black; padding: 3px;">'.$t->Bit_Rate.'</td><td>'.$t->Name.'</td><td>'.$t->Artist.'</td><td>'.$t->Album.'</td></tr>';
	}
}
echo '</tbody></table>';

