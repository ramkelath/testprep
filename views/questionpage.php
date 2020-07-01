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
      <span style= "float: right; margin-right: 10%">Overall Timer: 03:58:12</span> 
      <br>
      <span style= "float: right; margin-right: 10%">Question Timer: 00:01:37</span> 
      <hr width="100%"></hr></div>
      <br>
      <form action="/testprep/processresponse.php" method="post">
      <input type = "hidden" name ="user_id" value =<?php echo $_SESSION["user_id"]?>>
      <input type = "hidden" name ="test_id" value =<?php echo $_SESSION["test_id"]?>>
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
        <div style = "font-weight: bold"><?php echo "Question: " . $Question->question_id  . "<br>" . $Question->question_text ?>?</div><br>
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
      <span><input type = checkbox name="review" id = "review"> Mark for Review?</span>
      <span  style="padding:2%"><input style = "border-style: outset;" type = submit value = "Back"></span>
      <span  style="padding:1%"><input style = "border-style: outset;" type = submit value = "Next"></span>
      <span  style="padding:5%"><input style = "border-style: outset;" type = button value = "End Exam"></span>
       </div>
      </form>
</body>
</html>