<!DOCTYPE html>
<html lang="en">
<head>
	<title>Statistics</title>
	<meta charset="UTF-8">
</head>
<body>
	
		<h1>
			Statistics
		</h1>

        <table class="table">
  <thead>
    <tr>
      <th scope="col"></th>
      <?php 
      foreach ($report->groups as $group) {
        echo '<th scope="col">' . $group . '</th>';
      }
      ?>
    </tr>
  </thead>
  <tbody>
    <?php 
    $count = count($report->groups);
    foreach ($report_table AS $area => $row) {
        echo '<tr>';
        echo '<th scope="row">' . $area . '</th>';
        for ($i=0; $i<$count; $i++) {
            echo '<td>'.$row[$i].'</td>';
        }
        /*
        echo '<td>'.$row[1].'</td>';
        echo '<td>'.$row[2].'</td>';
        echo '<td>'.$row[3].'</td>';
        echo '<td>'.$row[4].'</td>';
        echo '<td>'.$row[5].'</td>';
        echo '<td>'.$row[6].'</td>';
        echo '</tr>';
        */
      }
    ?>
  </tbody>
</table>


</body>
</html>