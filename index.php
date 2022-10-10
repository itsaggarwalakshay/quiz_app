<?php
  $apiData = file_get_contents("https://the-trivia-api.com/api/questions?categories=music,film_and_tv,sport_and_leisure&limit=5&region=IN&difficulty=easy");
  $quiz = json_decode($apiData,true);
  $correct_ans = $quiz['0']['correctAnswer'];
  print_r($correct_ans);
  $incorrect_ans1 = $quiz['0']['incorrectAnswers']['0'];
  $incorrect_ans2 = $quiz['0']['incorrectAnswers']['1'];
  $incorrect_ans3 = $quiz['0']['incorrectAnswers']['2'];
  $Answers = array("$correct_ans", "$incorrect_ans1", "$incorrect_ans2","$incorrect_ans3");
  shuffle($Answers);

  $question = $quiz['0']['question'];

?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>quiz app</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<style>
body{
  background: rgb(2,0,36);
  background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(101,9,121,1) 59%, rgba(0,212,255,1) 100%);
}
.card1{
  background: rgba( 255, 255, 255, 0.25 );
  box-shadow: 0 8px 32px 0 rgba( 31, 38, 135, 0.37 );
  backdrop-filter: blur( 4px );
  -webkit-backdrop-filter: blur( 4px );
  border-radius: 10px;
  border: 1px solid rgba( 255, 255, 255, 0.18 );
  color: white;
  justify-content: center;
  display: flex; flex-direction: column;
  height:360px; 
  margin-top: 10rem;
  padding: 25px 20px;
}
</style>
<body>
<div class="container d-flex justify-content-center" style="height: 100vh;">
  <div class="col-md-5  card1">
    <h3 class="text-center">Play quiz</h3>
    <p><?php echo $question ?></p>
    <form name="myform" action="" method="GET">
      <input type="hidden" name="correct[]" id="correct" value="<?php echo $correct_ans?>" id="check">
      <div class="form-check">
        <input class="form-check-input" type="radio" name="check[]" value="<?php echo $Answers[0]?>" id="check">
        <label class="form-check-label" for="check"><?php echo $Answers[0]?></label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="check[]" value="<?php echo $Answers[1] ?>" id="check">
        <label class="form-check-label" for="check"><?php echo $Answers[1] ?></label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="check[]" value="<?php echo $Answers[2] ?>" id="check">
        <label class="form-check-label" for="check"><?php echo $Answers[2] ?></label>
      </div>
      <div class="form-check">
        <input class="form-check-input" type="radio" name="check[]" value="<?php echo $Answers[3] ?>" id="check">
        <label class="form-check-label" for="flexRadioDefault1"><?php echo $Answers[3] ?></label>
      </div>
      <input type="button" name="button" Value="Submit Ans" onClick="testResults(this.form)" class="btn btn-outline-light mt-2">
      <input type="submit" name="submit" class="btn btn-outline-light mt-2" value="Next Ques">
    </form>
    
  </div>
</div>
<SCRIPT LANGUAGE="JavaScript">
  function testResults (form) {
    var TestVar = form.check.value;
    var correct = form.correct.value;
    if (TestVar == correct) {
      alert ("You Give Correct Answer");
    }else{
      alert ("You Give Incorrect Answer");
    }   
  }
</SCRIPT>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"></script>
</body>
</html>