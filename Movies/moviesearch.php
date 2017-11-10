<!DOCTYPE HTML>
<html>
<IMG 
STYLE="position:absolute; 
TOP:150px; 
RIGHT:200px; 
WIDTH:450px; 
HEIGHT:400px" 
SRC="film.jpg">
<IMG 
STYLE="position:absolute;
 TOP:150px; Left:200px;
 WIDTH:450px; 
 HEIGHT:400px" 
 SRC="reels.jpg">

	<head><center>
		<title>Search for movies</title>
	</center></head>
	<body><center>
		<h1>Search for movie by Year, Genre and Rating</h1>



		
<form action="index.html">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#42f4ee;
font-size:10pt;
" value="Home">
</form>
</br>
<form action="TitleSearch.php">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#42f4ee;
font-size:10pt;" 
value="Search by Title">
</form>
<center>
<table style="width:30%"><center>
<p>
<tr>
	<form action="" method="post">


<p>
<tr>
<h3><font color="red">Select Year to search for or previous to</font></h3>
		<td><h3><center>Year: <input type="number" name="year" "maxlength="4"/></h3></td>
</tr>
</p>
<tr>
</tr>
<p>
<table style="width:50%"><center>
<p>
<tr>
	<td><center><h3>Genre: <select id="genre" name="genre"></h3>
			<option value="0">--SELECT--</option>
			<option value="1">Action/Adventure</option>
			<option value="2">Animation</option>
			<option value="3">Comedy</option>
			<option value="4">Documentary</option>
			<option value="5">Drama</option>
			<option value="6">Family</option>
			<option value="7">Foreign</option>
			<option value="8">Horror</option>
			<option value="9">Music</option>
			<option value="10">Musical</option>
			<option value="11">Mystery/Suspense</option>
			<option value="12">SciFi</option>		
	</select></td>
</tr>
</p>
</table>
<table style="width:50%"><center>
<p>
<tr>
	<td><center><h3>Rating: <select id="rating"select name="rating"></h3>
			<option value="0">--SELECT--</option>
			<option value="1">G</option>
			<option value="2">PG</option>
			<option value="3">PG-13</option>
			<option value="4">R</option>
			<option value="5">VAR</option>
			<option value="6">NR</option>
	</select></td>
</tr>
</p>
</table>
</tr>
<table style="width:50%"><center>
    <p>
    <tr>
  
    <input type="submit" 
	style="width:300px;
	height:40px;
	background-color:#f0b3f9;
	font-size:10pt;" 
	name="submit" 
	id="submit" 
	class="button" 
	value="Search"/>
    </form>

    <p><table cellpadding='20'><tr><td>
	<h2 id="CHeadings" 
	style="color: #8942f4;"
	style="background-color: #cccc11;"
	>Title</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color:
	#8942f4;" 
	style="background-color:
	#cccccc;"
	>Studio</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color: #8942f4;"
	style="background-color: #cccccc;"
	>Status</h2>
	</td>
	<td>
	<h2 id="CHeadings" 
	style="color: #8942f4;"
	style="background-color: #cccccc;"
	>Sound</h2>
	</td>
	<td>
	<h2 id="CHeadings" 
	style="color: #8942f4;" 
	style="background-color: #cccccc;"
	>Version</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color: #8942f4;"
	style="background-color:#cccccc;"
	>Recomended Retail Price</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color: #8942f4;"
	style="background-color: #cccccc;"
	>Rating</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color: #8942f4;" 
	style="background-color: #cccccc;"
	>Year</h2>
	</td>
	<td>
	<h2 id="CHeadings" 
	style="color: #8942f4;"
	style="background-color: #cccccc;"
	>Genre</h2>
	</td>
	<td>
	<h2 id="CHeadings"
	style="color: #8942f4;" 
	style="background-color: #cccccc;"
	>Aspect Ratio</h2>
	</td>
	</tr>
	</p>

<?php

if(array_key_exists('submit', $_POST)) {
    $dbhost = "localhost";
    $dbuser = "script";
    $dbpass = "none";
    $dbname = "movies";
    
    
        $year = $_POST['year'];
        $genre = array('--SELECT--', 'Action/Adventure',
        'Animation', 'Comedy', 'Documentary',
        'Drama', 'Family', 'Foreign',
        'Horror', 'Music', 'Musical', 
        'Mystery/Suspense', 'SciFi');
        $selected_key = $_POST['genre'];
        $selected_genre = $genre[$_POST['genre']];

    $rating = array('--SELECT--', 'G', 'PG', 'PG-13', 'R','VAR', 'NR');
    $selected_Rkey = $_POST['rating'];
    $selected_rating = $rating[$_POST['rating']];
    echo "Searching for - Year:$year &nbsp; 
    Genre:$selected_genre &nbsp; Rating:$selected_rating";
    if( $_POST ) { $conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    try{

        if (($year == !null)&&($selected_key > 0)&&($selected_Rkey > 0)) {
            $sql = "SELECT * FROM films  WHERE Rating = '".$selected_rating."' 
            AND Genre ='".$selected_genre."' AND Year <='".$year."'";
            $result = mysqli_query($conn, $sql);
        }
        else if ($year == !null) {
            $sql = "SELECT * FROM films  WHERE Year <='".$year."'";
            $result = mysqli_query($conn, $sql);
        }
        else if (($selected_key>0)&&($selected_Rkey>0)) {
            $sql = "SELECT * FROM films  WHERE Rating = '".$selected_rating."' 
            AND Genre ='".$selected_genre."'";
            $result = mysqli_query($conn, $sql);
        }
        else if (($selected_key > 0)&&($selected_Rkey==0)) {
            $sql = "SELECT * FROM films  WHERE Genre ='".$selected_genre."'";
               $result = mysqli_query($conn, $sql);
        }
        else if (($selected_Rkey > 0)&&($selected_key==0)) {
            $sql = "SELECT * FROM films  WHERE Rating = '".$selected_rating."'";
            $result = mysqli_query($conn, $sql);
        }

        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['Title']}</td>
				<td>{$row['Studio']}</td>
				<td>{$row['Status']}</td>
				<td>{$row['Sound']}</td>
				<td>{$row['Version']}</td>
				<td><center>{$row['RecRetPrice']}</center></td>
				<td>{$row['Rating']}</td><td>{$row['Year']}</td>
				<td>{$row['Genre']}</td><td>{$row['Aspect']}</td></tr>\n";
            }
        }
        else {
            echo '<h2>
	<font color="red">Sorry no results found matching your criteria</font>
	</h2>';
        }


        mysqli_close($conn);


    }
    catch(PDOException $e) 
    {
        echo 'ERROR: ' . $e->getMessage();
    }



}
?>
</table>
</body>
</html>