<html>
<head>
<title>PMP Simulator</title>
</head>
<body>
      <style type="text/css" media="print">
      BODY {display:none;visibility:hidden;}
      </style>
      <div style = "background-size: cover; background-image: linear-gradient( 45deg, grey, darkgrey);">
      &nbsp;<br><hr width="100%"></hr></div>
      
      <br>
      <form action="processtest.php" method="post">
      <input type = "hidden" name ="answer_id" value= 1>
      <input type = "hidden" name ="user_id" value =1>
      <input type = "hidden" name ="test_id" value=1>
      <input type = "hidden" name ="question_id" value=<?php echo $Question->question_id;?>>
      <input type = "hidden" name ="correct" value=<?php echo $Question->correct_answer ?>>
      <div style="width: 100%;margin-left: 10%;">
      <div style="font-weight:bold" ><?php echo $Question->question_text ?>?</div><br>
      <?php
      for ($i= 0; $i < 3; $i++) {
      ?>  
        <input type = "radio" name="questionx"  value=<?php echo $Question->answer[$i]; ?>> 
        <label for = "this" ><?php echo $Question->answer[$i]; ?></label><br>
      <?php
      }
      ?>  
      <br><br>
      <input type = "submit" value="Answer"><br>
       </div>
      </form>
</body>
</html>