<table class="table">
  <tr>
  <th scope="col">Question</th>
  <th scope="col">Parent</th>
  <th scope="col">Area</th>
  <th scope="col" width="30%">Intro Text</th>
  <th scope="col">Question Text</th>
  <th scope="col">Action</th>
  </tr>
  <?php foreach ($MaintainQuestionList  as $question){ ?>
     <tr>
     <form name = "updateQ"<?php echo $question->question_id; ?> action="updateQuestion.php" method="post">
     <td width="6%">
     <span><?php echo $question->question_id ?><input type="hidden" value="<?php echo $question->question_id ?>" />
     </td>
     <td width="6%">
     <span><?php echo $question->parent_question_id ?><input type="hidden" value="<?php echo $question->question_id ?>" />
     </td>
     <td width="10%"
     onclick="this.childNodes[1].style.display = 'inline';
              this.childNodes[0].style.display = 'none';"
     ><span><?php echo $question->area?>
     </span><span style="display:none"><input type="text" value = <?php echo $question->area?> /></span>
     </td>
     <td  width="30%"
     onclick="this.childNodes[1].style.display = 'inline';
              this.childNodes[0].style.display = 'none';"
     ><span><?php echo $question->intro_text ?>
     </span><span style="display:none"><<textarea cols=40 rows=5><?php echo $question->intro_text ?> </textarea></span>
     </td>
     <td  width="30%"
     onclick="this.childNodes[1].style.display = 'inline';
              this.childNodes[0].style.display = 'none';"
     ><span><?php echo $question->question_text?>
     </span><span style="display:none"><textarea cols=40 rows=5><?php echo $question->question_text ?></textarea></span>
     </td>
     <td>
     <span id="editbutton"><button type="submit" name="edit" value="update">Edit</button></span>
     <span id="savebutton" style="display:none">
        <button type="submit" name="save" value="delete">Save Changes</button>
        <button type="cancel" name="cance" value="update">Cancel</button>
    </span>
    </form>
    </tr>
    
  <?php } ?>
</table>
