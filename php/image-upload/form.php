<!DOCTYPE html>
<html lang="en-US">
    <head>
        <meta charset="UTF-8">
        <title>iframe文件上传-模拟ajax</title>
        <style type="text/css" media="screen">
            /*隐藏iframe*/
            iframe{
                height: 0;
                width: 0;
                border: 0;
                display: hidden;
            }
            
           .placeholder{
               padding: 15px;
               border: 1px solid #ccc;
           }
        </style>
    </head>
    <body>
        <h4>选择文件后自动上传</h4>
        <p>demo只做逻辑演示，未考虑兼容性和代码优化</p>
        <form action="upload.php" method="post" enctype="multipart/form-data" target="ajax-post" id="form-box">
            <p>
                <input type="file" name="myfile" id="myfile" />
            </p>
        </form>
        <div class="placeholder">
            <p>图片展示区域</p>
            <div id="thumbnail"></div>
        </div>
        <script type="text/javascript">
            //图片预览区域
            var thumbnail = document.getElementById('thumbnail');
            
            //上传按钮
            var sub_btn = document.getElementById('sub_btn');
            
            //获取iframe上传后返回值插入页面
            var fileUp = function(){
                thumbnail.innerHTML = window.frames['ajax-post'].document.body.innerHTML;
                this.parentNode.removeChild(this);
            }
            
            function upload(elem){
                thumbnail.innerHTML = '<img src="images/loading.gif" />';
                
                //创建iframe
                var iframe = document.createElement('iframe');
                    iframe.setAttribute('name','ajax-post');
                    iframe.id = 'ajax-post';
                var form = document.getElementById('form-box');
                    form.appendChild(iframe);
                    
                var ajax_post = document.querySelector('#ajax-post');
                
                elem.form.submit();
                
                //清除之前的事件堆砌
                ajax_post.removeEventListener('load',fileUp);
                
                //重新加载iframe框架
                ajax_post.addEventListener('load',fileUp);
            }
            
            document.getElementById('myfile').onchange = function(){
                upload(this);
            }
        </script>
    </body>
</html>