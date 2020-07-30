<div class="ml-10 w-75 p-3" style="margin-left:8%">
<span>
<h3>Edit Question</h3>
</span>
<h4>Question ID: <?php echo($_POST['question_id']); ?></h4>
<br>
<form>
  <div class="form-group">
    <label for="parent_question_id">Parent Question ID</label>
    <input class="form-control" id="parent_question_id" value=<?php echo $_POST["parent_question_id"];?>>
  </div>
  <div class="form-group">
    <label for="area">Area</label>
    <input class="form-control" id="area" value=<?php echo $_POST["area"];?>>
  </div>
  <div class="form-group">
    <label for="intro_text">Intro Text</label>
    <textarea class="form-control" id="intro_text" columns="40" rows="3"><?php echo $_POST["intro_text"];?></textarea>
  </div>
  <div class="form-group">
    <label for="intro_text">Question Text</label>
    <textarea class="form-control" id="question_text" columns="40" rows="3"><?php echo $_POST["question_text"];?></textarea>
  </div>
  <input type="submit" id="update" value="Update">
</form>
</div>