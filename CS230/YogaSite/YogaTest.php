<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title>Yoga Poses | Quiz</title>
    <link rel="stylesheet" type="text/css" href="css/testCss.css" />
</head>
<body>
    <?php 
        $_SESSION["userArr"] = [];
        for ($i=0; $i < sizeof($_SESSION["userArr"]); $i++) { 
            # code...
            if($_POST['Username'] == $_SESSION["userArr"][$i]){
                echo '<script> alert("Welcome back, ' . $_POST["Username"] . '!")';
            }
        }
        ?>
    <div id="page-wrap">
        <h1 class="transparent index-headline">Do You Know Your Yoga Poses?</h1>
        <form action="YogaGrade.php" method="POST" id="quiz">
            <ul id="test-questions">
                <?php
                    $dir = "img/";
                    $q = 0;
                    $a = 0;
                    // Open a directory, and read its contents
                    if (is_dir($dir)){
                      if ($dh = opendir($dir)){
                        while (($file = readdir($dh)) !== false){
                            if(strcasecmp(substr($file, (strlen($file)-7)), "-bc.jpg") == 0){//if its one of the question images
                                $qImgFile[$q] = $file;
                                $q++;
                            }
                            elseif(strcasecmp(substr($file, (strlen($file)-4)), ".jpg") == 0){
                                $aImgFile[$a] = $file;
                                $a++;
                            }
                        }
                        closedir($dh);
                      }
                    }
                    $_SESSION["aImgFile"]= $aImgFile;
                    $Skrit= ["Adho Muka Kapotasana", "Adho Muka Vrksasana", "Akarna Dhanurasana", "Ardha Padma Anantasana", "Astavakrasana", "Baddha Konasana", "Ardha Bheka Parsva Sarvangasana", "Bhuja Vrischikasana", "Navasana", "Ardha Chandrasana", "Sirsasana", "Parsva Sirsasana", "Utthita Pada Sirsasana", "Sun Salutation", "Yoganidrasana"];
                    $Eng= ["Downward Facing Pigeon Pose", "Downward Facing Tree", "Formation of a Bow", "Serpent Vishnu Slept On", "Ancient Sage cursed with Crooked Limbs", "Bound Angle Pose", "Half Frog Side Shoulderstand Pose", "Arm Balance Scorpion", "Boat Pose", "Half Moon Pose", "Headstand", "Side Headstand", "Extended Leg Headstand", "Step Back and Step Forward", "Yogic Sleep Pose"];
                    $_SESSION["Skrit"] = $Skrit;
                    $_SESSION["Eng"] = $Eng;
                    $qNum = 1;
                    $randQImgArr=array_rand($qImgFile,10);
                    $_SESSION["randQImgArr"] = $randQImgArr;
                    while ($qNum<11) {
                        if($qNum % 2 == 0){
                            //replace duplicates with random index of skrit
                            $random_keys=array_rand($Skrit,3);
                            $random_Skrit[0]=$Skrit[$random_keys[0]];
                            $random_Skrit[1]=$Skrit[$random_keys[1]];
                            $random_Skrit[2]=$Skrit[$random_keys[2]];
                            if(array_search($Skrit[$randQImgArr[$qNum-1]],$random_Skrit) != false){
                                do {   
                                    $n = rand(1,14);

                                } while(in_array($n, $random_keys));
                                $random_keys[array_search($Skrit[$randQImgArr[$qNum-1]],$random_Skrit)] = $n;
                                $random_Skrit[array_search($Skrit[$randQImgArr[$qNum-1]],$random_Skrit)] = $Skrit[$n];
                            }
                            
                            $random_Skrit[3]=$Skrit[$randQImgArr[$qNum-1]];

                            shuffle($random_Skrit);
                            echo '<li>' . 
                                    '<fieldset id="q' . $qNum . '">' .
                                        '<div class="quiz-overlay"></div>' .
                                        '<h3>' . $qNum . '.What is the Sanskrit name for this Yoga Pose?</h3>' .
                                        '<pre>   <img src="img/' . $qImgFile[$randQImgArr[$qNum-1]] . '" width="250" height="311"><pre>' . 
                                            '<div class="mtm">' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Skrit[0] . '" id="question-' . $qNum . '-answers-A" />' .
                                                '<label for="question-' . $qNum . '-answers-A" class="fwrd labela"> A) '. $random_Skrit[0] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Skrit[1] . '" id="question-' . $qNum . '-answers-B" />' .
                                                '<label for="question-' . $qNum . '-answers-B" class="fwrd labelb"> B) '. $random_Skrit[1] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Skrit[2] . '" id="question-' . $qNum . '-answers-C" />' .
                                                '<label for="question-' . $qNum . '-answers-C" class="fwrd labelc"> C) '. $random_Skrit[2] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Skrit[3] . '" id="question-' . $qNum . '-answers-D" />' .
                                                '<label for="question-' . $qNum . '-answers-D" class="fwrd labeld"> D) '. $random_Skrit[3] . '</label>' .
                                            '</div>' .
                                    '</fieldset>' .
                                '</li>';
                        }
                        else{
                            //replace duplicates with random index of Eng
                            $random_keys=array_rand($Eng,3);
                            $random_Eng[0]=$Eng[$random_keys[0]];
                            $random_Eng[1]=$Eng[$random_keys[1]];
                            $random_Eng[2]=$Eng[$random_keys[2]];
                            if(array_search($Eng[$randQImgArr[$qNum-1]],$random_Eng) != false){
                                do {   
                                    $n = rand(1,14);

                                } while(in_array($n, $random_keys));
                                $random_keys[array_search($Eng[$randQImgArr[$qNum-1]],$random_Eng)] = $n;
                                $random_Eng[array_search($Eng[$randQImgArr[$qNum-1]],$random_Eng)] = $Eng[$n];
                            }
                            
                            $random_Eng[3]=$Eng[$randQImgArr[$qNum-1]];

                            shuffle($random_Eng);
                            echo '<li>' . 
                                    '<fieldset id="q' . $qNum . '">' .
                                        '<div class="quiz-overlay"></div>' .
                                        '<h3>' . $qNum . '.What is the English name for this Yoga Pose?</h3>' .
                                        '<pre>   <img src="img/' . $qImgFile[$randQImgArr[$qNum-1]] . '" width="250" height="311"></pre>' . 
                                            '<div class="mtm">' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Eng[0] . '" id="question-' . $qNum . '-answers-A" />' .
                                                '<label for="question-' . $qNum . '-answers-A" class="fwrd labela"> A) '. $random_Eng[0] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Eng[1] . '" id="question-' . $qNum . '-answers-B" />' .
                                                '<label for="question-' . $qNum . '-answers-B" class="fwrd labelb"> B) '. $random_Eng[1] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Eng[2] . '" id="question-' . $qNum . '-answers-C" />' .
                                                '<label for="question-' . $qNum . '-answers-C" class="fwrd labelc"> C) '. $random_Eng[2] . '</label>' .
                                            '</div>' .
                                            '<div>' .
                                                '<input type="radio" name="question-' . $qNum . '-answers" value="'. $random_Eng[3] . '" id="question-' . $qNum . '-answers-D" />' .
                                                '<label for="question-' . $qNum . '-answers-D" class="fwrd labeld"> D) '. $random_Eng[3] . '</label>' .
                                            '</div>' .
                                    '</fieldset>' .
                                '</li>';
                        }
                        $qNum++;
                    }
                ?>
                <li>
                    <div class="quiz-overlay"></div>
                    <br><br><br><br><br><br><br><br><br>
                    <h3 class="anticipate">Now it’s time to see your results...</h3>
                    <input type="submit" value="Submit Quiz" id="submit-quiz" class="hvr-push hvr-grow-shadow" name="Submit" />
                </li>
            </ul>
    </form>
        <div class="nomargin"></div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js" ></script>
    <script>
           (function($) {
              var timeout= null;
              var $mt = 0;
              $("#quiz .fwrd").click(function(){
                clearTimeout(timeout);
                timeout = setTimeout(function(){ 
                    $mt = $mt - 585;
                    $("#test-questions").css("margin-top", $mt);
                }, 333);
              });
           }(jQuery))
    </script>
</body>
</html>