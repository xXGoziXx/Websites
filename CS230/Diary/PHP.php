<!DOCTYPE html>
<html lang="en">
<head>
	<title>CS230 | LAB VII</title>	
	<?php
	$firstime = True;
	// FOR CSS FILES
	$css = '';
	$handle = '';
	$file = '';
	// open the "css" directory
	if ($handle = opendir('css')) {
	    // list directory contents
	    while (false !== ($file = readdir($handle))) {
	        // only grab file names
	        if (is_file('css/' . $file)) {
	            // insert HTML code for loading Javascript files
	            $css .= '<link rel="stylesheet" href="css/' . $file .
	                '" type="text/css" media="all" />' . "\n";
	        }
	    }
	    closedir($handle);
	    echo $css;
	}

	// FOR JAVASCRIPT FILES
	$js = '';
	$handle = '';
	$file = '';
	// open the "js" directory
	if ($handle = opendir('js')) {
	    // list directory contents
	    while (false !== ($file = readdir($handle))) {
	        // only grab file names
	        if (is_file('js/' . $file)) {
	            // insert HTML code for loading Javascript files
	            $js .= '<script src="js/' . $file . '" type="text/javascript"></script>' . "\n";
	        }
	    }
	    closedir($handle);
	    echo $js;
	}
?>
</head>

<body>
	<?php
		error_reporting(E_ALL & ~E_NOTICE);	
		$servername = "localhost";
		$username = "root";
		$password = "";

		// Create connection
		$conn = new mysqli($servername, $username, $password);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		} 

		// Create database
		$sql = "CREATE DATABASE IF NOT EXISTS diary_database";
		if ($conn->query($sql) === TRUE) {
		} else {
		    echo "Error creating database: " . $conn->error;
		}
		$dbname = "diary_database";
		$conn = new mysqli($servername, $username, $password, $dbname);
	?>
    <form name="dForm" action="PHP.php" onsubmit="return validateForm()" method="post">
      <fieldset>
        <legend>Diary:</legend>
        When/Where:
        <br>
        <input type="text" name="Where" value="" id="where">
        <br>
        <br> Event:
        <br>
        <input type="text" name="Event" value="" id="event">
        <br>
        <br> Emotion:
        <br>
        <input type="text" name="Emotion" value="" id="emotion">
        <br>
        <br> Automatic thoughts:
        <br>
        <input type="text" name="Thoughts" value="" id="thoughts">
        <br>
        <br> Rational Response:
        <br>
        <input type="text" name="Response" value="" id="response">
        <br>
        <br>
        <br>
        <input type="submit" value="Save Entry">
      </fieldset>
    </form>
    <br>
    <input type="button" value="Show Diary" onclick="showDiary()"><input type="button" value="Hide Diary" onclick="hideDiary()">
    <br>
    <br>
    <?php
    	// sql to create table
		$sql = "CREATE TABLE IF NOT EXISTS Diary
		(
			ww TEXT NOT NULL,
			event TEXT NOT NULL, 
			emotion TEXT NOT NULL, 
			thoughts TEXT NOT NULL, 
			response TEXT NOT NULL
		);";
		mysqli_select_db($conn, "diary_database");
		mysqli_query( $conn, $sql);
		$Where = "";
		$Event = "";
		$Emotion = "";
		$Thoughts = "";
		$Response = "";
		if($Where == ""){

		}
			$Where = $_POST["Where"];
			$Event = $_POST["Event"];
			$Emotion = $_POST["Emotion"];
			$Thoughts = $_POST["Thoughts"];
			$Response = $_POST["Response"];
			if($Where == "" || $Event == "" || $Emotion == "" || $Thoughts == "" || $Response == ""){}
			else{
					$sql = "INSERT INTO Diary (ww, event, emotion, thoughts, response)
				VALUES ('$Where', '$Event', '$Emotion', '$Thoughts', '$Response');";
				if ($conn->query($sql) === TRUE) {
				} else {
				    echo "Error: " . $sql . "<br>" . $conn->error;
				}
			}
	?>
    <div class="diary">
      <h2>
      &nbsp;&nbsp; Diary:
    </h2>
      <table>
        <tr>
          <td>
            When/Where
          </td>
          <td>
            Event
          </td>
          <td>
            Emotion
          </td>
          <td>
            Automatic Thoughts
          </td>
          <td>
            Rational Response
          </td>
        </tr>
        <tr>
          <td id="Where">
			<?php
				$sql = "SELECT ww FROM Diary";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo $row["ww"] . "</br>" . "</br>";
				    }
				} else {
				    echo "0 results";
				}
			?>
          </td>
          <td id="Event">
				<?php
				$sql = "SELECT event FROM Diary";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo $row["event"] . "</br>" . "</br>";
				    }
				} else {
				    echo "0 results";
				}
			?>
          </td>
          <td id="Emotion">
				<?php
				$sql = "SELECT emotion FROM Diary";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo $row["emotion"] . "</br>" . "</br>";
				    }
				} else {
				    echo "0 results";
				}
			?>
          </td>
          <td id="Thoughts">
				<?php
				$sql = "SELECT thoughts FROM Diary";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo $row["thoughts"] . "</br>" . "</br>";
				    }
				} else {
				    echo "0 results";
				}
			?>
          </td>
          <td id="Response">
				<?php
				$sql = "SELECT response FROM Diary";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo $row["response"] . "</br>" . "</br>";
				    }
				} else {
				    echo "0 results";
				}
			?>
          </td>
        </tr>
        <script>hideDiary()</script>
      </table>
    </div>
</body>
</html>