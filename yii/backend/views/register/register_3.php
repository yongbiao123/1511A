<meta charset="utf8">

<style>
table{ border-collapse: collapse; border: 1px solid #ddd; width: 800px; margin: 0 auto;margin-top: 50px; background: rgba(121, 217, 221, 0.4); color: #666}
table tr{ height: 40px;}
table td{ border: 1px solid #ddd; text-align: center}

*{margin: 0; padding:0 ; font-family: 微软雅黑}
a{ text-decoration: none; color: #666;}

.top{ width: 100%; text-align: center;}
.top h2{ margin-top: 50px;}

form{ width: 450px; margin: 0 auto; margin-top: 50px;}
form input{
    width: 300px;
    height: 40px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding-left: 5px;
    font-size: 14px;
}

form p{
    margin-top: 20px;
    width: 100%;
}

form span{
    width: 100px;
    text-align: right;
    display: inline-block;
}

.check_label{
    width: 600px;
    margin: 0 auto;
    margin-top: 50px;
}

.check_label p{
    width: 550px;
    margin: 0 auto;
    margin-top: 30px;
}

.check_label .intrest_label a{
    padding: 5px;
    border: 1px solid rgba(0, 150, 0, 0.55);
    border-radius: 3px;
    white-space:nowrap;
    display: inline-block;
    margin-top: 10px;
    margin-left: 10px;
    color: #666;
}

.check_label .a_selected{
    background: rgba(0, 150, 0, 0.55);
    color: #fff;
}

.check_label .a_button{
    width: 150px;
    height: 40px;
    line-height: 40px;
    text-align: center;
    background: green;
    color: #fff;
    display: inline-block;
    border: 1px solid green;
    border-radius: 5px;
    margin: 0 auto;
}

.handler-button{
    text-align: center;
}
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <div class="check_label">
        <h4>请选择您的兴趣标签</h4>
        <p class="intrest_label">
        <?php foreach($all as $key=>$val){?>
            <a  href="javascript:;" id="<?=$val['id']?>"
                <?php 
                if(isset($val['status'])){
                    if($val['status'] == 0){?>
                class="a_selected"
                <?php }}?>
            ><?=$val['able']?></a>
        <?php }?>
        </p>
        <input type="hidden" value="<?=$id?>">
        <p class="handler-button">
            <a class="a_button" href="javascript:void(0)">上一步</a>
            <a class="a_button" href="javascript:;" id="end">完成</a>
        </p>
    </div>
</div>

<script src="./jquery-1.8.2.min.js"></script>
<script>
    var arr = Array();
    $(".intrest_label a").toggle(function(){
        $(this).attr("class","a_selected");
    },function(){
        $(this).removeClass("a_selected");
    })

    $("#end").click(function(){
        var id = $("input").val();
        $(".intrest_label a.a_selected").each(function(){
            arr.push($(this).attr("id"));
        })
        $.ajax({
            type:"post",
            url:"index.php?r=register/add",
            data:{
                "arr":arr,
                "id":id
            },
            success:function(data){
                alert("添加成功");
                window.location.replace("http://localhost/htdocs09/yii/backend/web/index.php?r=register/register");
            }
        })
    })

    $(".handler-button a").eq(0).click(function(){
        var id = $("input").val();
        var moren = '&moren=';
        $(".intrest_label a.a_selected").each(function(){
            moren+=$(this).attr("id")+',';
        })
        window.location.replace("http://localhost/htdocs09/yii/backend/web/index.php?r=register/register_2&name=<?=$data['name']?>&year=<?=$data['year']?>&address=<?=$data['address']?>&phone=<?=$data['phone']?>&password=<?=$data['password']?>&qrpassword=<?=$data['qrpassword']?>&id=<?=$id?>"+moren+"");
      })
</script>