<table class="table">
  <tr>
  <th scope="col">Question ID</td>
  <th scope="col">Question Text</td>
  </tr>
  <?php foreach ($MaintainQuestionList  as $question){ ?>
     <tr>
    <td><?php echo $question->question_id ?></td>
    <td><?php echo $question->question_text ?></td>
    </tr>
    
  <?php } ?>
</table>
