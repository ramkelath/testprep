
<h1 class="text-center">
      PMP Exam Preparation
</h1>
<br>
<br>
<br>

<div style="width:80%; margin:auto">
<!---
<div class="text-left ml-5">
<ul class="breadcrumb" style="font-size:large">
  <li><a href="#">Home</a></li>
  <li><a href="#">Reports</a></li>
</ul>
</div>
<br/><br/>
---->
<div class="text-left">
<ul style="cell-padding:10px; line-height: 300%; font-size:x-large; list-style-type: none">
<li>
<a  href = "/testprep/examcontroller.php?assessment=PMP">PMP Exam</a>
</li>
<li>
<a  href = "/testprep/examcontroller.php?assessment=CAPM">CAPM Exam</a>
</li>
<li>
<a  href = "/testprep/examcontroller.php?assessment=Practice">Knowledge Area Practice</a>
</li>
<li>
<a href="/testprep/reportcontroller.php">History</a>
</li>
<?php

if (isset($_SESSION["role"]) and $_SESSION["role"] == 'admin') {

  echo '
  <li>
  <a href = "/testprep/questionmaintcontroller.php">Maintenance</a>
  </li>
  ';
}
?>
<li>
<a href="/testprep/index.php?reset=1">Log Out</a>
</li>
</ul> 
</div>
</div>