<html>
<head>
<title>PMP Simulator</title>
</head>
<body>
      <div style = "background-size: cover; background-image: linear-gradient( 45deg, grey, blue);">
      &nbsp;<br><hr width="100%"></hr></div>
      <br>
      <form action="processtest.php" method="post">
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