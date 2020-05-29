
<h1 class="text-center">
      Question
</h1>
      <br>
      <form action="processtest.php" method="post">
      <div style="width: 705;margin-left: 10%;">
        <div style="font-weight:bold" ><?php echo $row[0]; ?>?</div><br>
        <input type = "radio" name="questionx" id="wrong1" value=<?php echo $row[1]; ?>> 
        <label for = "correct" ><?php echo $row[1]; ?></label><br>
        <input type = "radio" name="questionx" id="correct" value=<?php echo $row[2]; ?>>
        <label for = "wrong1"><?php echo $row[2]; ?></label><br>
        <input type = "radio" name = "questionx" id="wrong2" value=<?php echo $row[3]; ?>>
        <label for = "wrong2"><?php echo $row[3]; ?></label><br><br>
        <input type = "submit" value="Answer"><br>
       </div>
      </form>
