<?php

// Connection parameters 
$host = 'mpcs53001.cs.uchicago.edu';
$username = 'yg79';
$password = '881222';
$database = $username.'DB';

// Attempting to connect 
$dbcon = mysqli_connect($host, $username, $password, $database)
   or die('Could not connect: ' . mysqli_connect_error());
print 'Connected successfully!<br>';

// Selecting a database
//   Unnecessary in this case because we have already selected 
//   the right database with the connect statement.  
mysqli_select_db($dbcon, $database)
   or die('Could not select database');
print 'Selected database successfully!<br>';

// Listing tables in your database
$query = 'SELECT * FROM Tweets';
$result = mysqli_query($dbcon, $query)
  or die('Show tweets failed: ' . mysqli_error());

print "All of the Tweets in the database are:<br>";

// Printing table names in HTML
print '<ul>';
while ($tuple = mysqli_fetch_row($result)) {
  print "<li>'Tweet_ID:'$tuple[0]";
  print "<li>'Send_User:'$tuple[1]";
  print "<li>'Content:'$tuple[2]";
  print "<hr>";
}
print '</ul>';

// Free result
mysqli_free_result($result);

// Closing connection
mysqli_close($dbcon);
?> 