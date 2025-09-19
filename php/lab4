<!DOCTYPE html> 
<html> 
<head> 
<title>Quiz Application</title> 
</head> 
<body> 
<h1>Quiz Application</h1> 
<form method="post"> 
4.ARRAY 
<p>Question 1: What is the capital of France?</p> 
<input type="radio" name="q1" value="Paris" required> Paris<br> 
<input type="radio" name="q1" value="London"> London<br> 
<input type="radio" name="q1" value="Berlin"> Berlin<br> 
<p>Question 2: What is 2 + 2?</p> 
<input type="radio" name="q2" value="3"> 3<br> 
<input type="radio" name="q2" value="4" required> 4<br> 
<input type="radio" name="q2" value="5"> 5<br> 
<input type="submit" name="submit" value="Submit"> 
</form> 
<?php 
// Function to check quiz answers and calculate the score 
function checkAnswers($userAnswers) { 
$correctAnswers = array('q1' => 'Paris', 'q2' => '4'); 
$score = 0; 
foreach ($userAnswers as $question => $userAnswer) { 
if (isset($correctAnswers[$question]) && $correctAnswers[$question] === $userAnswer) { 
$score++; 
} } 
return $score; 
} 
if (isset($_POST['submit'])) { 
$userAnswers = array( 
'q1' => $_POST['q1'], 
'q2' => $_POST['q2'] 
); 
$score = checkAnswers($userAnswers); 
echo "<h2>Quiz Results:</h2>"; 
echo "<p>Your Score: $score out of 2</p>"; 
} 
?> 
</body> 
</html> 
