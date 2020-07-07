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
      <hr width="100%"></hr></div>
      <br>
      <form action="/testprep/processresponse.php" method="post">
      <input type = "hidden" name ="user_id" value =<?php echo $_SESSION["user_id"]?>>
      <input type = "hidden" name ="test_id" value =<?php echo $_SESSION["test_id"]?>>
      <input type = "hidden" name ="exam_started" id="exam_started" value=<?php echo $_SESSION["ExamStarted"]?>>
      <input type = "hidden" name ="page_started" id="page_started" value=<?php $date = new DateTime(); echo $date->getTimestamp()?>>
       <div style="width: 100%;margin-left: 10%;">
      <?php
      $k = sizeof($QuestionGroup);
      ?>
      <input type = "hidden" name = "length" value=<?php echo $k?>>
      <?php
      $j = 1;
      foreach ($QuestionGroup as $Question) {
        if ($Question->intro_text) { echo '<div style="width:80%">'.$Question->intro_text . '</div><br><br>';}
      ?>
        <div style = "font-weight: bold"><?php echo "Question " . $Question->question_id  . ".<br>" . $Question->question_text ?>?</div><br>
        <input type = "hidden" name = <?php echo "question_id" . $j?> value=<?php echo $Question->question_id;?>>
        <input type = "hidden" name = <?php echo "correct". $j?> value="<?php echo $Question->correct_answer?>">
        <?php
        for ($i= 0; $i < 3; $i++) {
        ?>  
          <input type = "radio" name="question<?php echo $j;?>" value="<?php echo $Question->answer[$i];?>"> 
          <label for = "this" ><?php echo $Question->answer[$i]; ?></label><br>
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
      <span  style="width:8%;padding-right:4%"><input type = checkbox name="review" id = "review"> Mark for Review?</span>
      <span  style="padding:2%"><input style = "border-style: outset; width:15%" type = submit value = "Back" name = "Back"></span>
      <span  style="padding:1%"><input style = "border-style: outset; width:15%" type = submit value = "Next" name = "Next"></span>
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