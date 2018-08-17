<?php
include('navBar.php');
require_once '../static/function.php';
header("Content-Type: text/html;charset=utf-8");
myGetCurrentUser();
$data=myFetchAll("select count(*) as num ,category from article group by category;");
$comments=myFetchAll("select sum(count)as total,articleid from (select count(*) as count,commentfather.articleid  from commentfather where articleid!=228   group by articleid  union all
select count(*) as num,commentchild.articleid  from commentchild where articleid!=228  group by articleid ) as a  group by articleid 
;")
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>登陆</title>
    <style>
        #chart1{

            height:500px;

        }
        #chart2{
            height:500px;

        }
    </style>
</head>
<body>

<div class="jumbotron">
    <div class="container">
        <h1>泛银河系含漱爆破液的个人站后台管理</h1>
        <p>Slartbartfast's Blog</p>
        <a href="articleAdd.php"> <button class="btn btn-primary">写文章</button></a>
    </div>
</div>
<div class="container">
    <div class="row">
<div id="chart1" class="col-lg-6">
</div>
    <div id="chart2" class="col-lg-6">

    </div>
    </div>
</div>

<script src="../static/assets/vendors/echarts/echarts.min.js"></script>
<script>
    var myChart1 = echarts.init(document.getElementById('chart1'));
    option1 = {
        title : {
            text: '文章统计',
            subtext: '分类信息',
            x:'center'
        },
        tooltip : {
            trigger: 'item',
            formatter: "{a} <br/>{b} : {c} ({d}%)"
        },
        legend: {
            orient: 'vertical',
            left: 'left',
            data: [<?php foreach($data as $item): ?>
               "<?php echo $item['category']; ?>",

            <?php endforeach; ?>]

        },
        series : [
            {
                name: '分类',
                type: 'pie',
                radius : '55%',
                center: ['50%', '60%'],
                data:[
                    <?php foreach($data as $item): ?>
                    {value:<?php echo $item['num']  ?>, name:"<?php echo $item['category']; ?>"},
                    <?php endforeach; ?>
                ],
                itemStyle: {
                    emphasis: {
                        shadowBlur: 10,
                        shadowOffsetX: 0,
                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                    }
                }
            }
        ]
    };
    myChart1.setOption(option1);

</script>
<script>
    var myChart2 = echarts.init(document.getElementById('chart2'));
    option2 = {
        title : {
            text: '评论统计',
            subtext: '对应文章id',
            x:'center'
        },
        xAxis: {
            type: 'category',
            data: [<?php foreach($comments as $item): ?>
                "<?php echo $item['articleid']; ?>",

                <?php endforeach; ?>]
        },
        yAxis: {
            type: 'value'
        },
        series: [{
            data: [<?php foreach($comments as $item): ?>
                "<?php echo $item['total']; ?>",

                <?php endforeach; ?>],
            type: 'bar'
        }]
    };
    myChart2.setOption(option2);
</script>
</body>
</html>
