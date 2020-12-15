<?php
// we need this so that PHP does not complain about deprectaed functions
error_reporting( 0 );

// Connect to MySQL
/** $link = mysqli_connect( 'localhost', 'root', '' );
if ( !$link ) {
  die( 'Could not connect: ' . mysqli_error() );
}

// Select the data base
$db = mysqli_select_db( 'test', $link );
if ( !$db ) {
  die ( 'Error selecting database \'test\' : ' . mysqli_error() );
} **/

include "../conn.php";

// Fetch the data
$query = "
  SELECT *
  FROM my_chart_data
  ORDER BY category ASC";
$result = mysqli_query($koneksi, $query );

// All good?
if ( !$result ) {
  // Nope
  $message  = 'Invalid query: ' . mysqli_error() . "\n";
  $message .= 'Whole query: ' . $query;
  die( $message );
}

// Print out rows
$prefix = '';
echo "[\n";
while ( $row = mysqli_fetch_assoc( $result ) ) {
  echo $prefix . " {\n";
  echo '  "category": "' . $row['category'] . '",' . "\n";
  echo '  "value1": ' . $row['value1'] . ',' . "\n";
  echo '  "value2": ' . $row['value2'] . '' . "\n";
  echo " }";
  $prefix = ",\n";
}
echo "\n]";

// Close the connection
mysqli_close( $link );
?>