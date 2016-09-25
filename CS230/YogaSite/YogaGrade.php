<?php
    session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Yoga Poses | Quiz</title>
        <link rel="stylesheet" type="text/css" href="css/gradeCss.css" />
    </head>
    <body>
        <div id="page-wrap">
            <h1 class="index-headline" >The Results are in...</h1>
            <?php
                if (isset($_POST['Submit'])) {
                    $answer1 = $_POST['question-1-answers'];

                    $answer2 = $_POST['question-2-answers'];

                    $answer3 = $_POST['question-3-answers'];

                    $answer4 = $_POST['question-4-answers'];

                    $answer5 = $_POST['question-5-answers'];

                    $answer6 = $_POST['question-6-answers'];

                    $answer7 = $_POST['question-7-answers'];

                    $answer8 = $_POST['question-8-answers'];

                    $answer9 = $_POST['question-9-answers'];

                    $answer10 = $_POST['question-10-answers'];
                }
                $answers = [$answer1, $answer2, $answer3, $answer4, $answer5, $answer6, $answer7, $answer8, $answer9, $answer10];
                $total = 0;
                for ($i=0; $i < 10; $i++) { 
                    if(($i+1)%2 == 0){
                        if($answers[$i] == $_SESSION["Skrit"][$_SESSION["randQImgArr"][$i]]){
                            $total++;
                        }
                    }
                    else{
                        if($answers[$i] == $_SESSION["Eng"][$_SESSION["randQImgArr"][$i]]){
                            $total++;
                        }
                    }
                }
            ?>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="results-overlay">
                
                <?php
                    if ($total >= 9) {
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeA.png" alt="GradeA" class="results-img" /><div class="results test-results2"><p class="score">Grade A</p><p class="score-details"></p>' . 
                                $total . ' out of 10 <br><br><br>' .
                                '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }
                    elseif (in_array($total, [7,8])) {
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeB.png" alt="GradeB" class="results-img" /><div class="results test-results2"><p class="score">Grade B</p><p class="score-details"></p>' .
                          $total . ' out of 10 <br><br><br>' .
                          '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }
                    elseif (in_array($total, [5,6])) {
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeC.png" alt="GradeC" class="results-img" /><div class="results test-results2"><p class="score">Grade C</p><p class="score-details"></p>' .
                          $total . ' out of 10 <br><br><br>' .
                          '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }
                    elseif (in_array($total, [3,4])) {
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeD.png" alt="GradeD" class="results-img" /><div class="results test-results2"><p class="score">Grade D</p><p class="score-details"></p>' .
                          $total . ' out of 10 <br><br><br>' .
                          '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }  
                    elseif (in_array($total, [1,2])) {
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeE.png" alt="GradeE" class="results-img" /><div class="results test-results2"><p class="score">Grade E</p><p class="score-details"></p>' .
                          $total . ' out of 10 <br><br><br><br>' .
                          '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }  
                    elseif ($total == 0){
                          echo '<div class="quiz-overlay result"></div><div class="results-text"><p class="you-chose">Your Score is:</p><img src="css/GradeF.png" alt="GradeF" class="results-img" /><div class="results test-results2"><p class="score">Grade F</p><p class="score-details"></p>' .
                          $total . ' out of 10 <br><br><br>' .
                          '<a id="replay" class="take-quiz-btn hvr-push hvr-grow-shadow" href="/YogaSite/YogaIndex.php">Play Again?</a></div>';
                    }   
                ?> 
                <br>
                <br>
                <br>
                <p> Images gotten from <a href="www.yogacards.com"/>yogacards.com</a></p>   
            </div>
        </div>
    </body>
</html>