<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="UTF-8">
    <title>Simple Id Query #2</title>
</head>

<body>
    <?php
  class JukeboxDetail
     {
        private $user_id;
        private $jukebox_id;
        private $jukebox_user_album_id;
        private $user_album_id;

        
        public function getUser_id() {return $this->user_id;}
        public function getJukebox_id() {return $this->jukebox_id;}
	public function getJAlbum_id() {return $this->jukebox_user_album_id;}
	public function getUAlbum_id() {return $this->user_album_id;}
	
        
     }
  class SongDetails
	{
        private $artist_id;
        private $name;
        private $album_id;
        private $publisher_id;
        private $album_song_id;

        
        public function getArtist_id() {return $this->artist_id;}
        public function getName() {return $this->name;}
	public function getAblum_id() {return $this->album_id;}
	public function getPublisher_id() {return $this->publisher_id;}
        public function getAlbum_song_id() {return $this->album_song_id;}



	}

        function constructTable($data)
        {
            // We're going to construct an HTML table.
            print "    <table border='1'>\n";
                
            // Construct the HTML table row by row.
            $doHeader = true;
            foreach ($data as $row) {
                    
                // The header row before the first data row.
                if ($doHeader) {
                    print "        <tr>\n";
                    foreach ($row as $name => $value) {
                        print "            <th>$name</th>\n";
                    }
                    print "        </tr>\n";
                    $doHeader = false;
                }
                    
                // Data row.
                print "        <tr>\n";
                foreach ($row as $name => $value) {
                    print "            <td>$value</td>\n";
                }
                print "        </tr>\n";
            }
            
            print "    </table>\n";
        }

    
        $user_id = filter_input(INPUT_GET, "user_id");
        $artist_id = filter_input(INPUT_GET, "artist_id");
try {

	// Connect to the database.
     $con = new PDO("mysql:host=localhost;dbname=assignment04",
                           "root", "root");
     $con->setAttribute(PDO::ATTR_ERRMODE,
                               PDO::ERRMODE_EXCEPTION);

      
	// Constrain the query if we got first and last names.
            if ((strlen($user_id) > 0) && (strlen($artist_id) == 0)) {
                 print "<h1>User with id $user_id</h1>\n";
                    
		$query = "SELECT User.user_id, Jukebox.jukebox_id, JukeBoxUserAlbum.jukebox_user_album_id,
				JukeBoxUserAlbum.user_album_id ".
     		       "FROM User, Jukebox, JukeBoxUserAlbum ".
         		 "WHERE User.user_id= :user_id ". 
         		"AND Jukebox.user_id = User.user_id ".
         		"AND JukeBoxUserAlbum.jukebox_id = Jukebox.jukebox_id ".
         		"ORDER BY user_id";
                $ps = $con->prepare($query);
                $ps->bindParam(':user_id', $user_id);
                $ps->execute();
                $data = $ps->fetchAll(PDO::FETCH_ASSOC);
                        
		    // $data is an array.
		    if (count($data) > 0) {
		        constructTable($data);
		 
		    // Fetch the matching database table rows.     
		    $ps->setFetchMode(PDO::FETCH_CLASS, "JukeboxDetail");
		    
		    // Construct the HTML table row by row.
		    while ($jukebox_detail = $ps->fetch()) {
		        print "        <tr>\n";
		        print "            <td>" . $jukebox_detail->getUser_id()    . "</td>\n";
		        print "            <td>" . $jukebox_detail->getJukebox_id()  . "</td>\n";
		        print "            <td>" . $jukebox_detail->getJAlbum_id()   . "</td>\n";
		        print "            <td>" . $jukebox_detail->getUAlbum_id() . "</td>\n";
		  
		        print "        </tr>\n";
		    }
		    
		    print "    </table>\n";
		    }
		    else {
		        print "<h3>(No match.)</h3>\n";
		    }
		 
         //ARTIST id code
		}else if ((strlen($artist_id) > 0) && (strlen($user_id) == 0)) {        
		         print "<h1>Artist with id $artist_id</h1>\n";
		            
			$query = "SELECT Artist.artist_id, Artist.name, 				
		             Album.album_id, Album.publisher_id, AlbumSong.album_song_id ".
	     		       "FROM Artist, Album, ArtistAlbum, AlbumSong ".
		 		 "WHERE Artist.artist_id = :artist_id ". 
		 		"AND ArtistAlbum.artist_id = Artist.artist_id ".
		 		"AND Album.album_id = ArtistAlbum.album_id ".
				"AND AlbumSong.album_id = Album.album_id ". 
		 		"ORDER BY artist_id";

		    $ps = $con->prepare($query);
		    $ps->bindParam(':artist_id', $artist_id);
		    $ps->execute();
		    $data = $ps->fetchAll(PDO::FETCH_ASSOC);
		                
		    // $data is an array.
		    if (count($data) > 0) {
		        constructTable($data);
		  
		  $ps->setFetchMode(PDO::FETCH_CLASS, "SongDetails");
		   // Construct the HTML table row by row.
		    while ($song_detail = $ps->fetch()) {
		        print "        <tr>\n";
		        print "            <td>" . $song_detail->getArtist_id()    . "</td>\n";
		        print "            <td>" . $song_detail->getName()  . "</td>\n";
		        print "            <td>" . $song_detail->getAlbum_id()   . "</td>\n";
		        print "            <td>" . $song_detail->getPublisher_id() . "</td>\n";
		        print "            <td>" . $song_detail->getAlbum_song_id() . "</td>\n";
		        print "        </tr>\n";
		    }
		 
		    print "    </table>\n";
		     }
		    else {
		        print "<h3>(No match.)</h3>\n";
		    }
           }else
              print "<h3>Please enter only one value<h3>\n";
        }catch(Exception $ex) {
            echo 'ERROR: '.$ex->getMessage();
        }

    ?>
</body>
</html>

