<html>
<head>
<title>PMP Exam Simulator</title>
</head>
<body>
      <style type="text/css" media="print">
      BODY {display:none;visibility:hidden;}
      </style>
      <div style = "color: white; background-size: cover; background-image: linear-gradient( 45deg, grey, darkgrey);">
      <span style= "float: left; margin-left: 10%">Page: <?php echo $current + 1?></span>
      <span style= "float: right; margin-right: 10%">Overall Timer: <span id ="exam_time">00:00:00</span></span>
      <br>
      <span style= "float: right; margin-right: 10%">Question Timer: <span id ="page_time">00:00:00</span></span>
      <hr width="100%"></hr>
      </div>
      <?php if (isset($warning))  {?>
      <div class="alert alert-info" role="alert">
      <?php echo $warning; ?>
      </div>
      <?php } ?>
      <form action="/testprep/processresponse.php" method="post">
      <input type = "hidden" name ="user_id" value =<?php echo $_SESSION["user_id"]?>>
      <input type = "hidden" name ="test_id" value ="1">
      <input type = "hidden" name ="exam_started" id="exam_started" value=<?php echo $Exam->start_time?>>
      <input type = "hidden" name ="page_started" id="page_started" value=<?php $date = new DateTime(); echo $date->getTimestamp()?>>
       <div style="width: 80%;margin-left: 10%;">
      <?php
      $k = sizeof($QuestionGroup) ? sizeof($QuestionGroup) : 1;
      ?>
      <input type = "hidden" name = "length" value=<?php echo $k?>>
      <?php
      $j = 1;
      foreach ($QuestionGroup as $Question) {
        if ($Question->intro_text) { echo '<div style="width:80%">'.$Question->intro_text . '</div><br><br>';}
      ?>
        <div style = "width=80%"><b><?php echo "Question " . $Question->question_id  . ".</b><br><br>" . $Question->question_text ?></div><br>
        <input type = "hidden" name = <?php echo "question_id" . $j?> value=<?php echo $Question->question_id;?>>
        <input type = "hidden" name = <?php echo "correct". $j?> value="<?php echo $Question->correct_answer?>">
        <?php
        for ($i= 0; $i < 3; $i++) {
        ?>
          <div>
          <span style="width:100%">
          <input type = "radio" style="margin-top: 2px; " name="question<?php echo $j;?>" value="<?php echo $Question->answer[$i];?>">
        </span>
          <label style="width:90%; margin-left:8px;vertical-align: top;"><?php echo $Question->answer[$i]; ?></label><br><br>
          </div>
        <?php
        }
        ?>
        <br>
      <?php
      $j++;
      }
     ?>
      <br><br>
      <div>
      <?php if ( $Exam->first_pass ){?>
      <span  style="width:8%;padding-right:4%"><input type = checkbox name="review" id = "review"> Mark for Review?</span>
      <span  style="padding:2%"><input style = "border-style: outset; width:15%" type = submit value = "Back" name = "Back"></span>
      <?php }?>
      <?php if ($Exam->more_questions) {?>
      <span  style="padding:1%"><input style = "border-style: outset; width:15%" type = submit value = "Next" name = "Next"></span>
      <?php }?>
      <span  style="padding:5%"><input style = "border-style: outset; width:15%" type = button value = "End Exam"  onclick="window.open('', '_self', ''); window.close();"></span>
       </div>
      </form>
</body>
<script type="text/javascript">
    function secondsToHMS(secs) {
      function z(n){return (n<10?'0':'') + n;}
      var sign = secs < 0? '-':'';
      secs = Math.abs(secs);
      return sign + z(secs/3600 |0) + ':' + z((secs%3600) / 60 |0) + ':' + z(secs%60);
    }
    var examStarted = document.getElementById("exam_started").value;
    //var examStarted = new Date(dateValue).getTime()/1000;

    this.updateClocks = setInterval(function(){
      var pageStarted = document.getElementById("page_started").value;
      var timeNow = parseInt(new Date().getTime()/1000).toFixed(0);
      var examTime = Math.abs(timeNow - examStarted);
      var pageTime = Math.abs(timeNow - pageStarted);
      document.getElementById("exam_time").textContent=secondsToHMS(examTime);
      document.getElementById("page_time").textContent=secondsToHMS(pageTime);
    }, 1000);
</script>
</html>
