#proftpd配置使用

# 1、创建一个ftp用户组
    groupadd ftpusers

# 2、添加需要ftp的用户，指定用户组为ftpusers，使用/sbin/nologin
#   /sbin/nologin 用户禁止用户登录系统，但是可以使用ftp等功能
#   /bin/false 是最严格的禁止login选项，一切服务都不能用。如果想要用/bin/false在禁止login的同时允许ftp，则必须在/etc/shells里增加一行/bin/false。

    useradd -g ftpusers -s /sbin/nologin newUser

# 3、设置用户密码
    passwd newUser

# 4、首次使用proftpd，配置proftpd.conf文件
#   a、更改用户组为
       Group ftpusers
#   b、开启目录的上传文件覆盖功能
       AllowOverwrite on
#   c、设置用户的宿主目录为 ~
       DefaultRoot ~
