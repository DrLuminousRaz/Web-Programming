<!DOCTYPE HTML>
<html>
<IMG STYLE="position:absolute;
 TOP:35px; RIGHT:200px;
 WIDTH:450px;
 HEIGHT:400px" 
 SRC="film.jpg">
<IMG STYLE="position:absolute;
 TOP:35px; Left:200px;
 WIDTH:450px;
 HEIGHT:400px"
 SRC="reels.jpg">

	<head><center>
		<title>Search for movies</title>
	</head>
	<body>
		<h1>Search for movie by title</h1>
		<h2><font color="red">
		Enter All or part of Film title</font></h2>
	

<form action="index.html">
<input type="submit" 
style="width:200px;
height:30px;
background-color:#42f4ee;
font-size:10pt;" value="Home">
</form>
<br />
<br />
<form action="moviesearch.php">
<input type="submit"
 style="width:300px;
 height:30px;
 background-color:#42f4ee;
 font-size:10pt;" 
 value="Search by Year, Genre and Rating">
</form>
<table style="width:30%"><center>
<p>
<tr>
	<form action="" method="post">

<table style="width:50%">
<p>
<tr>
		<td><h3><center>Title: <input type="text" name="title" /></h3></td>
</tr>
</p>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<tr>
</tr>
<p>
<tr>
<table style="width:50%"><center>
<p>
<tr>
  
<input type="submit" 
name="submit"  
style="width:300px;
height:40px;
background-color:#f0b3f9;
font-size:10pt;"id="submit" 
class="button" 
value="Search"/>
</form>
<br />
<br />
<br />
<br />
<p><table cellpadding='20'><tr>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccc11;"
>Title</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Studio</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Status</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Sound</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Version</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Recomended Retail Price</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Rating</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Year</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Genre</h2></td>
<td><h2 id="CHeadings" style="color: #8942f4;" style="background-color: #cccccc;"
>Aspect Ratio</h2></td>
</tr></p>
<?php

if(array_key_exists('submit', $_POST)) {
    $dbhost = "localhost";
    $dbuser = "script";
    $dbpass = "none";
    $dbname = "movies";
    $title = $_POST['title'];


    if( $_POST ) {$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
    }
    if (!$conn) {die("Connection failed: " . mysqli_connect_error());
    }

    try {

        if ($title == !null) {
            $sql = "SELECT * FROM films  WHERE Title LIKE '%".$title."%'";
            $result = mysqli_query($conn, $sql);
        }
        echo "Searching for - $title";
        if (mysqli_num_rows($result) > 0) {
            // output data of each row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr><td>{$row['Title']}</td>
                <td>{$row['Studio']}</td>
                <td>{$row['Status']}</td>
				<td>{$row['Sound']}</td>
				<td>{$row['Version']}</td>
				<td><center>{$row['RecRetPrice']}</center></td>
				<td>{$row['Rating']}</td>
				<td>{$row['Year']}</td>
				<td>{$row['Genre']}</td>
				<td>{$row['Aspect']}</td></tr>\n";
            }
        }
        else {
               echo '<h2><font color="red">
			   Sorry no results found matching your criteria</font></h2>';
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
