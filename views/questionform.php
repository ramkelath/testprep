<div class="ml-10 w-75 p-3" style="margin-left:8%">
<span>
<h3>Edit Question</h3>
</span>
<h4>Question ID: <?php echo($_POST['question_id']); ?></h4>
<br>
<form action="questionmaintcontroller.php" method="post">
  <input type="hidden" name = 'question_id' value=<?php echo $_POST['question_id']; ?> />
  <div class="form-group">
    <label for="parent_question_id">Parent Question ID</label>
    <input class="form-control" name="parent_question_id" value=<?php echo $_POST["parent_question_id"];?>>
  </div>
  <div class="form-group">
    <label for="area">Area</label>
    <input class="form-control" name="area" value=<?php echo $_POST["area"];?>>
  </div>
  <div class="form-group">
    <label for="intro_text">Intro Text</label>
    <textarea class="form-control" name="intro_text" columns="40" rows="3"><?php echo $_POST["intro_text"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Question Text</label>
    <textarea class="form-control" name="question_text" columns="40" rows="3"><?php echo $_POST["question_text"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Correct Answer</label>
    <textarea class="form-control" name="correct_answer" columns="40" rows="3"><?php echo $_POST["correct_answer"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Wrong Answer 1</label>
    <textarea class="form-control" name="wrong_answer_1" columns="40" rows="3"><?php echo $_POST["wrong_answer_1"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Wrong Answer 2</label>
    <textarea class="form-control" name="wrong_answer_2" columns="40" rows="3"><?php echo $_POST["wrong_answer_2"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Wrong Answer 3</label>
    <textarea class="form-control" name="wrong_answer_3" columns="40" rows="3"><?php echo $_POST["wrong_answer_3"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Wrong Answer 4</label>
    <textarea class="form-control" name="wrong_answer_4" columns="40" rows="3"><?php echo $_POST["wrong_answer_4"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Wrong Answer 5</label>
    <textarea class="form-control" name="wrong_answer_5" columns="40" rows="3"><?php echo $_POST["wrong_answer_5"];?></textarea>
  </div>
  <input type="submit" name="update" value="Update">
</form>
</div>