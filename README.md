PHP class to parse iTunes Library XML files.

## Usage

See example.php for example usage.

## Supported Properties

The library is an array of track objects. The track object has no methods, but contains the following properties:

* Album
* Album_Artist
* Album_Rating
* Artist
* Artwork_Count
* Bit_Rate
* BPM
* Comments
* Composer
* Content_Rating
* Date_Added
* Date_Modified
* Description
* Disc_Count
* Disc_Number
* Distinguished_Kind
* Episode
* Episode_Order
* File_Folder_Count
* File_Type
* Genre
* Grouping
* Kind
* Library_Folder_Count
* Location
* Name
* Normalization
* Persistent_ID
* Play_Count
* Play_Date
* Play_Date_UTC
* Rating
* Release_Date
* Sample_Rate
* Season
* Series
* Size
* Skip_Count
* Skip_Date
* Sort_Album
* Sort_Album_Artist
* Sort_Artist
* Sort_Composer
* Sort_Name
* Sort_Show
* Total_Time
* Track_Count
* Track_ID
* Track_Number
* Track_Type
* Video_Height
* Video_Width
* Volume_Adjustment
* Year

## Unsupported Properties

Properties having booleans are currently not parsed:

* Album Loved
* Album Rating Computed
* All Items
* Audiobooks
* Clean
* Compilation
* Disabled
* Explicit
* Folder
* Has Video
* HD
* iTunesU
* Loved
* Master
* Movie
* Movies
* Music
* Music Video
* Part Of Gapless Album
* Podcast
* Podcasts
* Purchased
* Purchased Music
* Rating Computed
* TV Show
* TV Shows
* Unplayed
* Visible
