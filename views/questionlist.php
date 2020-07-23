<table class="table">
  <tr>
  <th scope="col">Question ID</td>
  <th scope="col">Question Text</td>
  </tr>
  <?php foreach ($MaintainQuestionList  as $question){ ?>
     <tr>
     <form name = "updateQ"<?php echo $question->question_id; ?> action="updateQuestion.php" method="post">
     <td 
     onclick="this.childNodes[1].style.display = 'inline';
              this.childNodes[0].style.display = 'none';"
     ><span><?php echo $question->question_id ?>
     </span><span style="display:none"><input type="text" value = <?php echo $question->question_id ?> /></span>
     </td>
     <td 
     onclick="this.childNodes[1].style.display = 'inline';
              this.childNodes[0].style.display = 'none';"
     ><span><?php echo $question->question_text?>
     </span><span style="display:none"><input type="text" width = "50%" value =  "<?php echo $question->question_text ?>" /></span>
     </td>
     </tr>
    
  <?php } ?>
</table>
