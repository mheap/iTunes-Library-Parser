<?php

class track {}
class iTunesLibrary { 
  private $_tracks; 

  function __construct( $path ) { 
    $fileContents = file_get_contents( $path );
    $xml = simplexml_load_string( $fileContents );

    foreach ( $xml->dict->dict->dict as $trackObject ) {
      preg_match_all( "/\<key\>(.+)\<\/key\>\<.+\>(.+)\<\/.+\>/", $trackObject->asXML(), $matches );
      $track = new track();
            
      foreach ( $matches[1] as $key => $value ) {
        $track->{ str_replace( " ", "_", $value ) } = str_replace( "&amp;", "&", str_replace( "\"", "”", strval( $matches[2][$key] ) ) );
      }

      preg_match_all( "/\<key\>(.+)\<\/key\>\<(true|false)\/\>/", $trackObject->asXML(), $matches );
      foreach ( $matches[1] as $key => $value ) {
        $track->{ str_replace( " ", "_", $value ) } = $matches[2][$key];
      }

      $this->addTrack( $track );
    }
  }

  public function getTracks() { return $this->_tracks; } 
  private function addTrack( $track ) { $this->_tracks[] = $track; } 
  private function removeTrack( $__k ) { unset( $this->_tracks[$__k] ); }
  public function getCount() { return count( $this->_tracks ); }
  
  public function getStarRating( $rating ) {
    switch ( $rating ) {
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

}
