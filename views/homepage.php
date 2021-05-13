
<h1 class="text-center">
      PMP Test Preparation Home
</h1>
<br>
<br>
<br>

<div style="width:80%; margin:auto">
<div class="text-left ml-5">
<ul class="breadcrumb" style="font-size:large">
  <li><a href="#">Home</a></li>
  <li><a href="#">Reports</a></li>
</ul>
</div>
<br/><br/>
<div class="text-left">
<ul style="cell-padding:10px; line-height: 300%; font-size:xx-large; list-style-type: none">
<!---
<li>
<a  onclick="window.open('/testprep/examcontroller.php', 
                         'newwindow', 
                         'width=700,height=500',
                         'toolbar=no, location=no'); 
              return false;" target="_blank">Take the exam</a>
</li>
--->
<li>
<a  href = "/testprep/index.php?assesment=PMP">PMP Exam</a>
</li>
<li>
<a  href = "/testprep/index.php?assesment=CAPM">CAPM Exam</a>
</li>
<li>
<a  href = "/testprep/index.php?assesment=Practice">Knowledge Area Practice</a>
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