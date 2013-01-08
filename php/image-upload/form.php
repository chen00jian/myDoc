<!DOCTYPE html>
<html lang="zh-CN">
    <head>
        <meta charset="UTF-8">
        <title>图片边框上传</title>
        <link rel="stylesheet" type="text/css" href="style/file_upload.css" />
    </head>
    <body>
        <div class="box">
            <h4>选择文件后自动上传</h4>
            <form action="upload.php" method="post" enctype="multipart/form-data" target="ajax-post" id="form-box">
               <input type="file" name="myfile" id="myfile" />
            </form>
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