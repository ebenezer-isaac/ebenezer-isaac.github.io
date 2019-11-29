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
echo "var serv_curr_time = " . time() . "000;\n";
//echo "var start_time = " . time() . "999;\n";
echo "var start_time = " . strtotime("2019-11-29 14:50:00") . "000;\n";
echo "var questions = ";
$fh = fopen('question.json', 'r');
while ($line = fgets($fh)) {
    echo($line);
}
fclose($fh);
?>
        //seconds
        var qus_time = 10;
        var buff_time = 7;
        var res_time = 5;
        var qus_start;
        var no_of_qus = Object.keys(questions).length;
        var per_qus_time = (qus_time + buff_time + res_time) * 1000;
        var quiz_time = no_of_qus * per_qus_time;
        var name, curr_time, x;
        var main = document.getElementById("content");
        var d = new Date();
        var time_adj = serv_curr_time - d.getTime();
        function calculateTime()
        {
            var d = new Date();
            return (d.getTime() + time_adj);
        }
        function pad(num) {
            var s = num + "";
            while (s.length < 2)
                s = "0" + s;
            return s;
        }
        function timer(distance, type) {
            if (distance > 1 || type === 1) {
                x = setInterval(function () {
                    var bold_flag = 0;
                    var over = "Quiz has started";
                    if (distance < 1) {
                        clearInterval(x);
                        if (type === 1) {
                            x = setInterval(function () {
                                var curr_time = calculateTime();
                                if (curr_time < start_time + quiz_time)
                                {
                                    if (bold_flag === 0) {
                                        document.getElementById("timer_display").innerHTML = over.bold();
                                        bold_flag = 1;
                                    } else {
                                        document.getElementById("timer_display").innerHTML = "";
                                        bold_flag = 0;
                                    }
                                } else {
                                    clearInterval(x);
                                    finals();
                                }

                            }, 400);
                        } else if (type === 2) {
                            quiz();
                        } else if (type === 3) {
                            $("#qus_button").click();
                        } else if (type === 4) {
                            clearInterval(x);
                        }
                    } else {
                        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                        var countdown = "";
                        if (type !== 3 && type !== 4)
                        {
                            countdown = "Quiz Starts in : ";
                        }
                        if (type === 3) {
                            var score = (qus_start + (qus_time * 1000) - calculateTime()) / 10000;
                            document.getElementById('timeScore').value = score;
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
            } else {
                if (type === 2) {
                    quiz();
                } else if (type === 3) {
                    $("#qus_button").click();
                }
            }
        }
        function start() {
            var content = "Welcome";
            content += "<br><br>";
            content += "Enter your Name below:";
            content += "<br><br>";
            content += "<input name='name' id = 'name' type='text' style='' placeholder='Your Name Here'>";
            content += "<br><br>";
            content += "<input type='button' autofocus value = 'Start' class = 'btn btn-primary' onclick='saveName()'><br><br>";
            content += "<div id='timer_display'></div>";
            main.innerHTML = content;
            var curr_time = calculateTime();
            timer(start_time - curr_time, 1);
            $("#content").fadeIn(500);
        }
        function saveName() {
            clearInterval(x);
            name = document.getElementById('name').value;
            //ajax save name
            waitForStart();
        }
        function waitForStart() {
            content = "<div id='timer_display'></div>";
            main.innerHTML = content;
            $("#content").fadeIn(500);
            var curr_time = calculateTime();
            timer(start_time - curr_time, 2);

        }
        function result(question) {
            main.innerHTML = "Results";
            $("#content").fadeIn(500);
            var next_qus = (((question) * per_qus_time) + start_time) - calculateTime();
            console.log(next_qus);
            setTimeout(function () {
                quiz();
            }, next_qus);
        }
        function finals()
        {
            main.innerHTML = "Quiz Over<br>Final Results";
            $("#content").fadeIn(500);
        }
        function getCurrQus()
        {
            var curr_time = calculateTime();
            var count = 0;
            while (count < no_of_qus) {
                if ((curr_time > ((count * per_qus_time) + start_time)) && (curr_time < (((count + 1) * per_qus_time) + start_time))) {
                    return count + 1;
                }
                count = count + 1;
            }
        }
        function submitAnswer()
        {
            clearInterval(x);
            var question = document.getElementById('question').value;
            var answer = $("input[name='answer']:checked").val();
            var score = document.getElementById('timeScore').value;
            var min = 0;
            var max = ((score * 10) + buff_time) - 3;
            var random = Math.floor(Math.random() * (+max - +min)) + +min;
            console.log("old random : " + random);
            main.innerHTML = "Waiting score : " + score + "<br>buff_time : " + buff_time + "<br><div id='timer_display'></div>for others to submit";
            console.log("timer : " + (max + 3));
            setTimeout(function () {
                ajaxSubmitAnswer(question, answer, score);
            }, random * 1000);
            timer(((max + 3) * 1000), 4);
            var wait = ((question * per_qus_time) + start_time - res_time - calculateTime()) / 1000;
            console.log("new random : " + wait);
            if (question < no_of_qus) {
                setTimeout(function () {
                    clearInterval(x);
                    result(question);
                }, wait);
            } else {
                setTimeout(function () {
                    clearInterval(x);
                    finals();
                }, wait);
            }
        }
        function ajaxSubmitAnswer(question, answer, score) {
            if (score < 1) {
                score = 1;
            }
            //ajax to submit answer
        }
        function calScore(qus_start) {
            var curr_time = calculateTime();
            var score = (qus_start + (qus_time * 1000) - curr_time) / 10000;
            document.getElementById('timeScore').value = score;
        }
        function quiz() {
            clearInterval(x);
            console.log("quiz");
            var curr_qus = getCurrQus();
            var curr_time = calculateTime();
            if (curr_time < start_time + quiz_time + (buff_time * 1000)) {
                qus_start = ((curr_qus - 1) * per_qus_time) + start_time;
                if (curr_time < qus_start + (qus_time * 1000)) {
                    var content = "Name : " + name + "<br>";
                    content += "Question : " + curr_qus + "/" + no_of_qus + "<br><br>";
                    content += questions["" + curr_qus]["question"];
                    content += "<input type='text' hidden value = '" + curr_qus + "' id='question'><br>";
                    content += "<input type='text' hidden value = '0' id ='timeScore' id='timeScore'><br>";
                    content += "<input type='radio' value='a' onclick='calScore(" + qus_start + ")' name = 'answer'> " + questions["" + curr_qus]["a"] + "<br>";
                    content += "<input type='radio' value='b' onclick='calScore(" + qus_start + ")' name = 'answer'> " + questions["" + curr_qus]["b"] + "<br>";
                    content += "<input type='radio' value='c' onclick='calScore(" + qus_start + ")' name = 'answer'> " + questions["" + curr_qus]["c"] + "<br>";
                    content += "<input type='radio' value='d' onclick='calScore(" + qus_start + ")' name = 'answer'> " + questions["" + curr_qus]["d"] + "<br>";
                    content += "<input type='radio' value='0' onclick='calScore(" + qus_start + ")' name = 'answer' checked='checked'> None of the Above<br><br>";
                    content += "<input type='button' onclick='submitAnswer()' class = 'btn btn-primary' align='center' value='Submit' id = 'qus_button'><br>";
                    content += " Auto Submit in : <div id='timer_display'></div>";
                    main.innerHTML = content;
                    timer(((qus_start - curr_time) + qus_time * 1000), 3);
                } else {
                    var content = "Name : " + name + "<br>";
                    content += "Question : " + curr_qus + "/" + no_of_qus + "<br><br>";
                    content += "Your Missed the question";
                    main.innerHTML = content;
                    timer(((qus_start - curr_time) + qus_time * 1000), 3);
                }
                $("#content").fadeIn(500);
            } else {
                finals();
            }
        }
        function loader() {
            var curr_time = calculateTime();
            if (curr_time <= start_time + quiz_time - per_qus_time) {
                start();
            } else if (curr_time <= start_time + quiz_time) {
                main.innerHTML = "All Questions Over<br>Waiting for Participants to submit Answers";
                $("#content").fadeIn(500);
                x = setInterval(function () {
                    finals();
                    clearInterval(x);
                }, start_time + quiz_time + curr_time);
            } else {
                finals();
            }
        }
        </script>
    </body>
</html>
