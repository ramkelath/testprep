
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
     <?php $id = $question->question_id ?>
     <form name = <?php echo "questionlist".$id; ?> action="questionmaintcontroller.php" method="post">
     <tr name="row">
     <td width="6%">
     <?php echo $id ?><input type="hidden" name = 'question_id' value="<?php echo $id ?>" />
     </td>
     <td width="6%">
     <span><?php echo $question->parent_question_id ?><input type="hidden" name ='parent_question_id' value=<?php echo $question->parent_question_id ?>></input>
     </td>
     <td width="10%"  class="inlineEdit" >
     <span  class="inlineEditA" style=displaye:inline"><?php echo $question->area?></span>
     <span  class="inlineEditB" style="display:none"><input type="text" name = 'area' value = <?php echo $question->area?> /></span>
     </td>
     <td  width="30%"  class="inlineEdit" >
     <span class="inLineEditA" ><?php echo $question->intro_text ?></span>
     <span   class="inlineEditB" style="display:none"><textarea name = 'intro_text' cols=40 rows=5><?php echo $question->intro_text ?> </textarea></span>
     </td>
     <td  width="30%"  class="inlineEdit" >
     <span  class="inlineEditA"><?php echo $question->question_text?></span
     ><span style="display:none"   class="inlineEditB" ><textarea name = 'question_text' cols=40 rows=5><?php echo $question->question_text ?></textarea></span>
     </td>
     <td>
     <input type="hidden" name = 'correct_answer' value="<?php echo $question->correct_answer ?>" />
     <input type="hidden" name = 'wrong_answer_1' value="<?php echo $question->wrong_answer_1?>" />
     <input type="hidden" name = 'wrong_answer_2' value="<?php echo $question->wrong_answer_2 ?>" />
     <input type="hidden" name = 'wrong_answer_3' value="<?php echo $question->wrong_answer_3 ?>" />
     <input type="hidden" name = 'wrong_answer_4' value="<?php echo $question->wrong_answer_4 ?>" />
     <input type="hidden" name = 'wrong_answer_5' value="<?php echo $question->wrong_answer_5 ?>" />
     <span ><button type="submit" class="editButtons" name="edit" style="display:inline">Edit</button></span>
     <span class="saveButtons" style="display:none">
        <button type="submit" name="update">Save</button>
        <button type="cancel" name="cancel">Cancel</button>
    </span>
    </tr>
    </form>
    
  <?php } ?>
</table>
<script>
  var inlineEditable = document.getElementsByClassName("inlineEdit");
  for (var i = 0; i < inlineEditable.length; i++) {
      inlineEditable[i].onclick = function() {
      var u = document.getElementsByClassName('inlineEditA');
      var v = document.getElementsByClassName('inlineEditB');
      //u[i].style.display = 'none';
      //v[i].style.display = 'inline';
      for (var j = 0; j < u.length; j++) {
            u[j].style.display = 'none';
            v[j].style.display = 'inline';
        }
      var x = document.getElementsByClassName('editButtons');
      var y = document.getElementsByClassName('saveButtons');
      for (var k = 0; k < x.length; k++) {
            x[k].style.display = 'none';
            y[k].style.display = 'inline';

        }
      }
 
    }
</script> 
