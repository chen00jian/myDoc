!/bin/sh
#检测ftp用户组
ftpusers='ftpusers'
group=`grep ^ftpusers /etc/group | wc -l`
if [ $group -lt 1 ] 
then
    echo "创建用户组:ftpusers ..."
    /usr/sbin/groupadd $ftpusers
    echo "ok"
fi

#创建用户
echo ""
echo "请输入新用户名:"
read userName
#检测用户名输入用户是否存在
userFlag=`grep ^$userName /etc/passwd | wc -l`
if [ $userFlag -lt 1 ] 
then
    /usr/sbin/useradd -g $ftpusers -s /sbin/nologin $userName
    echo "创建用户成功，用户名为：$userName"
    echo ""
else
    echo "用户已存在，脚本自动退出"
    exit
fi

#创建用户密码
echo '请输入用户名密码:'
/usr/bin/passwd $userName
echo ''
echo "添加用户完成。"
