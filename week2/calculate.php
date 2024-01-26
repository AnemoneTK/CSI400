<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Week 2</title>
</head>
<style>
.container{
    width:100vw;
    height:100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
form{
    width:100vw;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
}
input{
    margin:10px 0px;
    padding:15px;
    height:30px;
    width:250px;
    font-size:30px;
    text-align:center;
}
.btn{
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
}
button{
    margin:20px 10px;
    height: 50px;
    width:150px;
    font-size:20px;
}
.show h2{
    font-size:24px;
}
</style>
<body>
    <div class="container">
    
        <form action="" method="POST">
            <input type="text" name='numInput1' value=''>
            <input type="text" name='numInput2' value=''>
            <div class="btn">
                <button type="submit" name="plus" value="plus">บวก</button>
                <button type="submit" name="miuns" value="miuns">ลบ</button>
                <button type="submit" name="mult" value="mult">คูณ</button>
                <button type="submit" name="div" value="div">หาร</button>
                <button type="submit" name="mutiplus" value="mutiplus">บวกเรื่อยๆ</button>
                <button type="submit" name="multset" value="multset">สูตรคูณ</button>

            </div>
        </form>
        <div class="show">
            <h2><?php
                    $num1 = $_POST['numInput1'];
                    $num2 = $_POST['numInput2'];
                    
                    if(isset($_POST['plus'])){
                        $result =0;
                        $result = $num1 + $num2;
                        echo($result);
                    }

                    else if(isset($_POST['miuns'])){
                        $result =0;
                        $result = $num1-$num2;
                        echo($result);
                    }

                    else if(isset($_POST['mult'])){
                        $result =0;
                        $result = $num1*$num2;
                        echo($result);
                    }

                    else if(isset($_POST['div'])){
                        $result =0;
                        $result = $num1/$num2;
                        echo($result);
                    }

                    else if(isset($_POST['mutiplus'])){
                        for($i=1; $i<=$num2; $i++){
                            $result = $num1 + $i;
                            echo('ครั้งที่ '.$i .' : '.$num1 .' + '. $i.' = '. $result ."<br>");
                        }
                    }
                    else if(isset($_POST['multset'])){
                        for($j=1; $j<=12; $j++){
                            for($i=$num1; $i<=$num2; $i++){
                                $result = $i*$j;
                                echo ($i .' * '. $j .' = '.$result .' | ');
                            }
                            echo('<br>');
                        }
                    }
            ?></h2>
        </div>
    </div>
</body>
</html>