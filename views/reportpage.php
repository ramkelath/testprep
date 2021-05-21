<!DOCTYPE html>
<html lang="en">
<head>
	<title>Testing Results</title>
	<meta charset="UTF-8">
</head>
<body style="padding-top: 10px; padding-left: 60px">
		<h3>
			Testing Results
		</h3>
<br>
Test date: 05/20/2021<br>
Test type: PMP<br><br>


<table style= "width:100%">
<tr>
<th style= "width:40% padding-right:10%">
Knowledge Areas
</th>
<th  style= "width:40%">
Process Groups
</th>
</tr>

<tr>


<!--- Knowledge Areas Report --->
<td >
  <table class="table" style="width:90%">
  <thead>
    <tr>
    <th scope="col"></th>
      <th scope="col">Correct</th>
      <th scope="col">Total</th>
      <th scope="col">Grade</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    
    foreach ($area_report AS $row) {
      $count = count($row);
        echo '<tr>';
        echo '<th>';
        echo $row['area'];
        echo '</th>';
        echo '<td>';
        echo $row['correct'];
        echo '</td>';
        echo '<td>';
        echo $row['total'];
        echo '</td>';
        echo '<td>';
        echo round($row['grade']) . '%';
        echo '</td>';
        echo '</tr>';
      }
    ?>
  </tbody>
</table>
</td>

<!--- Process Groups Report --->
<td >
  <table class="table" style="width:90%; height:100%">
  <thead>
    <tr>
    <th scope="col"></th>
      <th scope="col">Correct</th>
      <th scope="col">Total</th>
      <th scope="col">Grade</th>
    </tr>
  </thead>

  <tbody style="height:100%" class="align-top">


    <?php 
    
    foreach ($group_report AS $row) {
      $count = count($row);
        echo '<tr>';
        echo '<th>';
        echo $row['group_code'];
        echo '</th>';
        echo '<td>';
        echo $row['correct'];
        echo '</td>';
        echo '<td>';
        echo $row['total'];
        echo '</td>';
        echo '<td>';
        echo round($row['grade']) . '%';
        echo '</td>';
        echo '</tr>';
      }
    ?>

  </tbody>
</table>
</td>

</tr>


<table>
</body>
</html>
