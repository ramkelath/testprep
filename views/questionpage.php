<html>
<head>
<title>PMP Simulator</title>
</head>
<body>
      <div style = "background-size: cover; background-image: linear-gradient( 45deg, grey, aqua);">
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
        <input type = "radio" name="questionx" id="wrong1" value=<?php echo $Question->wrong_answer_1; ?>> 
        <label for = "wrong1" ><?php echo $Question->wrong_answer_1; ?></label><br>
        <input type = "radio" name="questionx" id="correct" value=<?php echo $Question->correct_answer; ?>>
        <label for = "correct"><?php echo $Question->correct_answer; ?></label><br>
        <input type = "radio" name = "questionx" id="wrong2" value=<?php echo $Question->wrong_answer_2 ?>>
        <label for = "wrong2"><?php echo $Question->wrong_answer_2; ?></label><br><br>
        <input type = "submit" value="Answer"><br>
       </div>
      </form>
</body>
</html>