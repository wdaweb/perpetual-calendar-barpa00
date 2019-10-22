<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>calendar</title>
    <style>

    .border{
        background-color:skyblue;
        padding:20px;
        color: white;
        height: 230px;
        width:260px;
        border-width:10px;
        border-color:deeppink;
        border-style: solid double solid double;
        text-align:center;
        position:absolute; top:50%;

    }
    
    body{
        /*background: linear-gradient(to right, #654ea3, #eaafc8); */
        font-family:'Helvetica Neue', Helvetica, Arial, sans-serif;
        font-size: 1.8em;
    }
    .button1{
        position:absolute; top:45%;
        font-size:20px;
    }
    .button2{
        position:absolute; top:45%; left:20%;
        font-size:20px;
        

    }
    *{
        list-style-type:none;
    }

    .bg{
        border-radius:50%;
        background:pink;
    }
    </style>
</head>
<body>
<?php
    if(!empty($_GET['month'])){
        $month=$_GET['month'];
    }else{
        $month=date("m",time());
    }
    if(!empty($_GET['year'])){
        $year=$_GET['year'];
    }else{
        $year=date("Y",time());
    }
    
    $today=date("Y-m-d");
    $todayDays=date("d");
    $start="$year-$month-01";
    $startDay=date("w",strtotime($start));
    $days=date("t",strtotime($start));
    $endDay=date("w",strtotime("$year-$month-$days"));
    echo"<br>";
    
    if(($month-1)>0){
        $premonth=$month-1;
        $preyear=$year;
    }else{
        $premonth=12;
        $preyear=$year-1;
    }
    if(($month+1)<=12){
        $nextmonth=$month+1;
        $nextyear=$year;
    }else{
        $nextmonth=1;
        $nextyear=$year+1;
    }

?>
<h2>
    <a href="index.php?month=<?php echo $premonth ?>&year=<?php echo $preyear ?>"><div class="button1">previous</div></a>
    <a href="index.php?month=<?php echo $nextmonth ?>&year=<?php echo $nextyear ?>"><div class="button2">next</div></a>
</h2>
<div class="border">
<table >
    <tr>
        <td>S</td>
        <td>M</td>
        <td>T</td>
        <td>W</td>
        <td>T</td>
        <td>F</td>
        <td>S</td>
    </tr>
    
<?php

for($i=0;$i<6;$i++){

    echo "<tr>";

    for($j=0;$j<7;$j++){
        if(!empty($sd[$i*7+$j+1-$startDay])){
            $str=$sd[$i*7+$j+1-$startDay];
        }else{
            $str="";
        }
        if($i==0){

            if($j<$startDay){
                 echo "<td></td>";

            }else{
                if(($i*7+$j+1-$startDay)==$todayDays){
                    
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{

                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }
        }else{

            if(($i*7+$j+1-$startDay)<=$days){
                if(($i*7+$j+1-$startDay)==$todayDays){
                    echo "    <td class='bg'>".($i*7+$j+1-$startDay).$str."</td>";    
                }else{
                    echo "    <td>".($i*7+$j+1-$startDay).$str."</td>";    
                }
            }else{
                echo "    <td></td>";    
            }
        }
   }
    echo "</tr>";
}

?>
</div>
   
</table>

</body>
</html>