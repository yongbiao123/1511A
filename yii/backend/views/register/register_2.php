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

.handler-button{
    text-align: center;
}

.a_button{
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
</style>

<div class="top">
    <h2>欢迎注册</h2>
</div>

<div class="main">
    <form action="index.php?r=register/register_3" method="post">
        <p>
            <span>昵称：</span>
            <input type="text" placeholder="请输入昵称" name="name"
                <?php
                    if(isset($data['name'])){
                ?>
                value="<?=$data['name']?>"
                <?php }?>
            >
        </p>
        <p>
            <span>生日：</span>
            <input type="text" placeholder="请输入您的出生年月日，格式 xxxx-xx-xx" name="year"
                <?php
                    if(isset($data['year'])){
                ?>
                value="<?=$data['year']?>"
                <?php }?>
            >
        </p>
        <p>
            <span>工作地址：</span>
            <input type="text" placeholder="请输入您现在的工作地址" name="address"
                <?php
                    if(isset($data['address'])){
                ?>
                value="<?=$data['address']?>"
                <?php }?>
            >
            <input type="hidden" name="id" value="<?=$id?>">

            <?php
                    if(isset($data['phone'])){
            ?>
            <input type="hidden" name="phone" value="<?=$data['phone']?>">
            <?php }?>
            <?php
                    if(isset($data['password'])){
            ?>
            <input type="hidden" name="password" value="<?=$data['password']?>">
            <?php }?>
            <?php
                    if(isset($data['qrpassword'])){
            ?>
            <input type="hidden" name="qrpassword" value="<?=$data['qrpassword']?>">
            <?php }?>
            <?php
                if(isset($moren)){
            ?>
            <input type="hidden" name="moren" value="<?=$moren?>">
            <?php }?>
        </p>

        <p class="handler-button">
            <a class="a_button" href="javascript:void(0);">上一步</a>
            <input type="submit" class="a_button" value="下一步">
        </p>

    </form>
</div>

<script src="./jquery-1.8.2.min.js"></script>
<script>
    $("p a").click(function(){
        var a = '';
        var name = $("input[name='name']").val();
        var year = $("input[name='year']").val();
        var address = $("input[name='address']").val();
        var phone = $("input[name='phone']").val();
        var password = $("input[name='password']").val();
        var qrpassword = $("input[name='qrpassword']").val();
        if(name!=''){
            a+='&name='+name;
        }
        if(year!=''){
            a+='&year='+year;
        }
        if(address!=''){
            a+='&address='+address;
        }
        window.location.replace("http://localhost/htdocs09/yii/backend/web/index.php?r=register/register&phone="+phone+"&password="+password+"&qrpassword="+qrpassword+""+a+"");
    })
</script>