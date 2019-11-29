<?php
session_start();
?>
<html lang="en">
    <head>
        <title>Quiz</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/util.css">
        <link rel="stylesheet" type="text/css" href="css/main.css">
    </head>
    <body onload="loader()">
        <div class="limiter">
            <div class="container-login100">
                <div id="mained" class="wrap-login100" style="vertical-align: middle;text-align: center;">
                    <div id="content" style="display: none;vertical-align: middle;"></div>
                </div>
            </div>
        </div>
        <script src="js/bootstrap.min.js" type="168b875311079e67a1884235-text/javascript"></script>
        <script src="js/main.js" type="168b875311079e67a1884235-text/javascript"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
        <script src="js/bootstrap.min.js" type="168b875311079e67a1884235-text/javascript"></script>
        <script>
<?php
date_default_timezone_set('Asia/Kolkata');
echo "var serv_curr_time = " . time() . sprintf('%03d', (int) (explode(" ", microtime())[0] * 1000)) . ";";
//echo "var start_time = " . (time() + 5) . "999;\n";
echo "var start_time = " . strtotime("2019-11-29 20:45:00") . "000;\n";
echo "var questions = ";
$fh = fopen('quiz_question.json', 'r');
while ($line = fgets($fh)) {
    echo($line);
}
fclose($fh);
?>
        //seconds
        var qus_time = 10;
        var buff_time = 10;
        var res_time = 10;
        var time_adj = serv_curr_time - new Date().getTime();
        function calTime() {
            return (new Date().getTime() + time_adj);
        }
        var no_of_qus = Object.keys(questions).length;
        var per_qus_time = (qus_time + buff_time + res_time) * 1000;
        var quiz_time = no_of_qus * per_qus_time;
        var qus_start = [0];
        var question, score = 0, name = "xyz", timerObject, x, y, serial = 0, answer = "0",total = 0;
        var curr_time = calTime();
        console.log("curr_time = " + curr_time);
        console.log("start_time    = " + start_time);
        for (i = 1; i <= no_of_qus; i++) {
            qus_start[i] = start_time + ((i - 1) * per_qus_time);

            console.log("ques_start[" + i + "] = " + qus_start[i]);
        }

        var main = document.getElementById("content");
        function pad(num) {
            var s = num + "";
            while (s.length < 2)
                s = "0" + s;
            return s;
        }
        function loader() {
            var curr_time = calTime();
            if (curr_time <= start_time + quiz_time - per_qus_time) {
                start();
            } else if (curr_time <= start_time + quiz_time) {
                main.innerHTML = "All Questions Over<br>Waiting for Participants to submit Answers";
                $("#content").fadeIn(500);
                setTimeout(function () {
                    finals();
                    clearInterval(x);
                }, start_time + quiz_time - curr_time);
            } else {
                finals();
            }
        }
        function start() {
            main.innerHTML = "Welcome"
                    + "<br><br>"
                    + "Enter your Name below:"
                    + "<br><br>"
                    + "<input name='name' id = 'name' type='text' style='' placeholder='Your Name Here'>"
                    + "<br><br>"
                    + "<input type='button' autofocus value = 'Start' class = 'btn btn-primary' onclick='saveName()'><br><br>"
                    + "<div id='timer_display'>--</div>";
            var curr_time = calTime();
            timer(start_time - curr_time, 1);
            $("#content").fadeIn(500);
        }
        function saveName() {
            console.log('save name');
            clearInterval(x);
            clearInterval(y);
            name = document.getElementById('name').value;
            $.get("quiz_name.php?name=" + name, function (data, status) {
                serial = data;
            });
            var curr_time = calTime();
            console.log('start : ' + start_time + ", curr : " + curr_time);
            if (start_time > curr_time) {
                waitForStart();
            } else {
                quiz();
            }
        }
        function waitForStart() {
            clearInterval(y);
            console.log('waitForStart');
            var curr_time = calTime();
            timer((start_time - curr_time), 2);
            main.innerHTML = "Waiting for others to join<br><div id='timer_display'>--</div>";
            $("#content").fadeIn(500);
            console.log('curr_time : ' + curr_time);
            console.log('start_time : ' + start_time);
        }
        function quiz() {
            clearInterval(y);
            console.log("quiz");
            question = getCurrQus();
            console.log("question : " + question);
            var curr_time = calTime();
            console.log('curr_time : ' + curr_time);
            if (curr_time < start_time + quiz_time) {
                var curr_qus_start = qus_start[question];
                if (curr_time < curr_qus_start + (qus_time * 1000)) {
                    var content = "Name : " + name + "<br>";
                    content += "Question : " + question + "/" + no_of_qus + "<br><br>";
                    content += questions["" + question]["question"] + "<br>";
                    content += "<input type='radio' value='a' onclick='calScore(" + curr_qus_start + ")' name = 'answer'> " + questions["" + question]["a"] + "<br>";
                    content += "<input type='radio' value='b' onclick='calScore(" + curr_qus_start + ")' name = 'answer'> " + questions["" + question]["b"] + "<br>";
                    content += "<input type='radio' value='c' onclick='calScore(" + curr_qus_start + ")' name = 'answer'> " + questions["" + question]["c"] + "<br>";
                    content += "<input type='radio' value='d' onclick='calScore(" + curr_qus_start + ")' name = 'answer'> " + questions["" + question]["d"] + "<br>";
                    content += "<input type='radio' value='0' onclick='calScore(" + curr_qus_start + ")' name = 'answer' checked='checked'> None of the Above<br><br>";
                    content += "<input type='button' onclick='submitAnswer()' class = 'btn btn-primary' align='center' value='Submit' id = 'qus_button'><br>";
                    content += " Auto Submit in : <div id='timer_display'>--</div>";
                    main.innerHTML = content;
                    console.log('curr_qus_start : ' + qus_start[question]);
                    console.log('qus_time : ' + qus_time);
                    console.log('timer : ' + ((curr_qus_start - curr_time) + (qus_time * 1000)));
                    timer(((curr_qus_start - curr_time) + (qus_time * 1000)), 3);
                } else {
                    var content = "Name : " + name + "<br>";
                    content += "Question : " + question + "/" + no_of_qus + "<br><br>";
                    content += "Your Missed the question";
                    content += "<br>Next Question in : <div id='timer_display'>--</div>";
                    main.innerHTML = content;
                    timer((curr_qus_start + per_qus_time - curr_time), 2);
                }
                $("#content").fadeIn(500);
            } else {
                finals();
            }
        }
        function getCurrQus() {
            var curr_time = calTime();
            var count = 0;
            while (count < no_of_qus) {
                if ((curr_time > ((count * per_qus_time) + start_time)) && (curr_time < (((count + 1) * per_qus_time) + start_time))) {
                    return count + 1;
                }
                count = count + 1;
            }
        }
        function submitAnswer() {
            clearInterval(x);
            console.log("submitAnswer");
            var temp = ((((question * per_qus_time) + start_time) - calTime()) - (res_time * 1000));
            var max = temp - 5000;
            if (temp < 5000)
            {
                max = 1;
            }
            var random = Math.floor(Math.random() * (+max - +0)) + +0;
            console.log("random : " + random);
            console.log("next question start at : " + ((question * per_qus_time) + start_time));
            main.innerHTML = "Waiting <div id='timer_display'>--</div>for others to submit";
            console.log("max (result in ): " + (max + 5000));
            var corr_answer = questions["" + question]["ans"];
            var message = "Your Answer : " + answer + "<br>" + "Correct Answer : " + corr_answer + "<br>";
            if (corr_answer != answer) {
                if (answer != "0") {
                    score = score * -1;
                    message += "Your score decreased by " + score + "<br>";
                } else {
                    message += "Your remains the same<br>";
                }
            } else {
                message += "Your score increased by " + score + "<br>";
            }
            total = total+score;
            message+="Your Total Score : "+total+"<br>";
            var resultTable = "";
            setTimeout(function () {
                ajaxSubmitAnswer(score);
                $.get("quiz_result.php", function (data, status) {
                    resultTable = data;
                });
            }, random);
            timer((max + 5000), 4);
            setTimeout(function () {
                clearInterval(x);
                result(message, resultTable);
            }, max + 5000);
        }
        function ajaxSubmitAnswer(score) {
            $.get("quiz_answer.php?serial=" + serial + "&score=" + score, function (data, status) {
            });
        }
        function calScore(qus_start) {
            var curr_time = calTime();
            score = Math.floor((qus_start + (qus_time * 1000) - curr_time) / 100);
            console.log("score : " + score);
            answer = "" + $("input[name='answer']:checked").val();
        }
        function result(message, resultTable) {
            main.innerHTML = message + "Results<br> Next Question in : <div id='timer_display'>--</div>" + resultTable;
            $("#content").fadeIn(500);
            console.log("result");
            console.log("next question in : " + next_qus);
            var next_qus = (question * per_qus_time) + start_time - calTime();
            timer(next_qus, 2);
        }
        function finals() {
            $.get("quiz_result.php", function (data, status) {
                document.getElementById("tab").innerHTML = data;
            });
            main.innerHTML = "Quiz Over<br>Final Results<div id='tab'></tab>";
            $("#content").fadeIn(500);
        }
        function timer(distance, type) {
            console.log("distance : " + distance);
            x = setInterval(function () {
                if (distance < 1000) {
                    clearInterval(x);
                    console.log("x terminated");
                    console.log("type : " + type);
                    if (type === 1) {
                        var bold_flag = 0;
                        var over = "Quiz has started";
                        y = setInterval(function () {
                            if (name === "xyz") {
                                var curr_time = calTime();
                                if (curr_time < start_time + quiz_time)
                                {
                                    if (bold_flag === 0) {
                                        document.getElementById("timer_display").innerHTML = over.bold();
                                        bold_flag = 1;
                                    } else {
                                        document.getElementById("timer_display").innerHTML = "--";
                                        bold_flag = 0;
                                    }
                                } else {
                                    clearInterval(y);
                                    finals();
                                }
                            } else {
                                clearInterval(y);
                            }
                        }, 400);
                    } else if (type === 2) {
                        console.log("timer over");
                        quiz();
                    } else if (type === 3) {
                        $("#qus_button").click();
                    }
                } else {
                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                    var countdown = "";
                    if (type !== 3 && type !== 4) {
                        countdown = "Quiz Starts in : ";
                    }
                    var flag = 0;
                    if (days > 0) {
                        countdown += pad(days) + "Days ";
                        flag = 1;
                    }
                    if (hours > 0 || flag === 1) {
                        countdown += pad(hours) + "Hours ";
                        flag = 1;
                    }
                    if (minutes > 0 || flag === 1) {
                        countdown += pad(minutes) + "Minutes ";
                        flag = 1;
                    }
                    if (seconds > 0 || flag === 1) {
                        countdown += pad(seconds) + " Seconds";
                        flag = 1;
                    }
                    if (flag === 0) {
                        countdown += "00 Seconds";
                    }
                    document.getElementById("timer_display").innerHTML = countdown;
                    distance = distance - 1000;
                }
            }, 1000);
        }
        </script>
    </body>
</html>
