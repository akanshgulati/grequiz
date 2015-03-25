<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>GRE QUIZ</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
<?php
if (isset($_GET['list']))$list=$_GET["list"];
$db = new mysqli('localhost', 'root', '', 'gre');
if($db->connect_errno>0){
    die($db->connect_error);
}
$total="select * from ".$list;
$result=$db->query($total);
$total_num=$result->num_rows;
global $rand_value;
$rand_value=rand(1,$total_num);

$sql= "select * from ".$list;
if(!$result=$db->query($sql)){
    die($db->error);
}
global $row;
while($row[]= $result->fetch_assoc());

?>
<div class="row">
    <div class="columns small-12 heading">Gre Quiz</div>
</div>
<div class="row counter">
    <div class="columns small-6" ><span id="launch">Play</span></div>
    <div class="columns small-6 right" ><div id="countdown"></div></div>
</div>
<div class="row">
    <div class="columns small-12 word" id="word"><?php echo $row[$rand_value]["word"] ?></div>
</div>
    <div class="row  group">
        <div class="columns small-12"><span id="group_name" style="display: none"><?php echo $row[$rand_value]["group"] ?></span></div>
    </div>

<div class="row ">
    <div class="columns small-6">
        <button class="middle button" value="Group" id="group">Group</button>
    </div>
    <div class="columns small-6">
        <button class="middle button" value="Next Word" id="next">Next Word</button>
    </div>
</div>
<script src="js/vendor/jquery.js"></script>
<script>
    $(document).foundation();
    $(document).ready(function() {
        //Body Color Randomization
        var body_array = ["#2c3e50","#8e44ad","#2980b9","#27ae60","#16a085","#d35400"];
        var random_body_color=body_array[Math.floor(Math.random()* body_array.length)];
        $("body").css("background-color",random_body_color);
        //Word
        var word_array = <?php echo json_encode($row);?>;
        $("#group").click(function () {
            $("#group_name").fadeIn(300);
        });
        $("#next").click(function () {
            var random = Math.floor(Math.random() * word_array.length);
            $("#word").html(word_array[random]['word']);
            $("#group_name").fadeOut(1);
            $("#group_name").html(word_array[random]['group']);
        });
        $("#launch").on("click",play);
        var status= 0,check,countdn;
        function countdown()
        {
            var count=4;

            $("#countdown").show().html(count);
          countdn= setInterval(function(){
                count--;
                $("#countdown").html(count);
                if(count==0)count=5;
            },1000);
        }

        function play() {
            $("#launch").html("Stop");
            $("#next").fadeOut(1000);
            if(status==0) {
                status=1;
                countdown();
                check=setInterval(function () {
                    var random = Math.floor(Math.random() * word_array.length);
                    $("#word").html(word_array[random]['word']);
                    $("#group_name").fadeOut(1);
                    $("#group_name").html(word_array[random]['group']);
                }, 5000);
            }
            else if(status==1)
            {
                $("#launch").html("Play");
                $("#next").show();
                status=0;
                clearInterval(check);
                clearInterval(countdn);

            }
        }

    });
</script>
</body>
</html>
