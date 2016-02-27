<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品展示</title>
    <link rel="stylesheet" href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="http://libs.baidu.com/jquery/2.0.0/jquery.js"></script>
    <script src="//cdn.bootcss.com/avalon.js/1.5.5/avalon.min.js"></script>
    <style>
        .hj-form{
            max-width: 750px;

        }
    </style>
</head>
<body ms-controller="app">
    <div class="form-horizontal hj-form">
        <div class="form-group">
            <label class="col-sm-2 control-label">商品名称</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" placeholder="商品名称">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品创建人</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="author" placeholder="商品创建人">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品所在地</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="address" placeholder="商品所在地">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品分类</label>
            <div class="col-sm-10">
                <select name="" id="classify" class="form-control">
                    <option ms-repeat="classify" ms-attr-value="el.classify">{{el.classify}}</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品价格</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="price" placeholder="商品价格">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品库存</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="stock" placeholder="商品库存">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">图片上传</label>
            <div class="col-sm-10">
                <iframe name=upImg id='exec_target' height="0" width="0" marginheight='0' marginwidth='0' frameborder='0'></iframe>
                <form method="post" action="<?php echo (APP_LINK); ?>Upload/upload" enctype="multipart/form-data" target="upImg" id='upImg'>
                    <input type="file" name="photo"/>
                    <input type="submit" value="提交" />
                </form>
                <img id="feedback"/>
                <input type="text" value="" id="imgSrc" style="display:none">
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品简介</label>
            <div class="col-sm-10">
                <textarea id="profiles" class="form-control" rows="10"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">商品详情</label>
            <div class="col-sm-10">
                <textarea id="content"></textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default" ms-click="go">提交</button>
                <button type="submit" class="btn btn-default">重写</button>
            </div>
        </div>
    </div>
    <script src="<?php echo (APP_URL); ?>ue/ueditor.config.js"></script>
    <script src="<?php echo (APP_URL); ?>ue/ueditor.all.js"></script>
    <script type="text/javascript">
        var ue = UE.getEditor('content',{
            initialFrameHeight:500
        });
        var vm = avalon.define({
            $id : 'app',
            classify:[],
            getClassify : function(){
                $.get("<?php echo (APP_LINK); ?>/Goods/showClassify?get=1",function(data,status){
                    vm.classify = data
                });
            },
            go : function(){
                if(check()){
                    $.post("<?php echo (APP_LINK); ?>Goods/addGoods",
                            {
                                name : $('#name').val(),
                                author : $('#author').val(),
                                address : $('#address').val(),
                                classify : $('#classify').val(),
                                price : $('#price').val(),
                                photo : $('#imgSrc').val(),
                                profiles : $("#profiles").val(),
                                content :  ue.getContent(),
                                stock : $('#stock').val()
                            },
                            function(data,status){
                                if(status == 'success'){
                                    if(data == '1'){
                                        alert('增加成功');
                                        setTimeout(function(){
                                            location.href='<?php echo (APP_LINK); ?>Goods/addGoods'
                                        },1000);
                                    }else{
                                        alert('增加失败，请检查填写信息')
                                    }
                                }else{
                                    alert('网络错误')
                                }
                            });
                }
            }
        });
        vm.getClassify();
        $("#exec_target").load(function(){
            var data = $(window.frames['upImg'].document.body).html();
            //若iframe携带返回数据，则显示在feedback中
            if(data != null){
                $("#feedback").attr('src','http://localhost/shop/Uploads/'+data);
                $('#imgSrc').val('http://localhost/shop/Uploads/'+data);
                $('#upImg').hide();
            }
        });
        function check(){
            var check = true;
            var name = $('#name').val()
            var author = $('#author').val()
            var address = $('#address').val()
            var classify = $('#classify').val()
            var price = $('#price').val()
            var photo = $('#imgSrc').val()
            var profiles = $("#profiles").val()
            var content = ue.getContent();
            var arr =[name,author,address,classify,price,photo,profiles,content];
            for(var x in arr){
                if(arr[x]==''){
                    alert('信息不完整');
                    $(':input').eq(x).focus();
                    check = false
                    break;
                }
            }
            return check;
        }
    </script>
</body>
</html>