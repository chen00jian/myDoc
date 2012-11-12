<?php
is_home();   //主页
is_single();     //文章页
is_page();   //页面
is_category();   //文章分类页
is_tag();    //文章标签页
is_archive();    //归档页
is_404();    //404页
is_search();    //搜索结果页
is_feed();   //订阅页

bloginfo('name');	//调用站点名称
bloginfo('url');	//调用网站首页
bloginfo('stylesheet','url');	//调用style文件
bloginfo('description');	//站点描述
	
wp_title(); //该函数用来显示页面的标题，如在文章页面，则显示文章标题；在分类页面，则显示分类名称
	
wp_title(); //函数可以跟三个参数，即wp_title(’separator’,echo,seplocation)，其中 separator是title和其余部分之间的分割符号，默认是>>；echo是个bool变量，取true显示标题，取false则将标 题作为一个PHP参量返回；seplocation定义分隔符的位置，取right定义分隔符在标题后面，取其他任何值，都表示将分隔符放在标题前面。

	
	
//post文章
	
the_title();    //文章标题
the_permalink();    //文章的地址
the_content();  //文章内容	
the_author();   //文章作者
the_category(); //文章所属分类
	
_e();   //多语言的支持，自动翻译
edit_post_link(’Edit’, ‘ | ‘, ”);   //编辑链接
the_ID();   //文章id
wp_list_cats();   //调用分类链接列表
wp_list_cats(’sort_column=name&optioncount=1&hierarchical=0′);
/*
    sort_column=name – 把分类按字符顺序排列
	optioncount=1 – 显示每个分类含有的日志数
	hierarchial=0 – 不按照层式结构显示子分类，这就解释了为什么子分类链接是列在列表中第一级。
*/
wp_list_pages();    //分页列表

wp_get_archives(’type=monthly’);    // 按月份显示发表的成果
get_links_list();   //友情链接列表

wp_loginout();  //登录按钮
	
function my_add_pages() {
    // 第一个参数'Help page'为菜单名称，第二个参数'使用帮助'为菜单标题
    // 'manage_options' 参数为用户权限
    // 'my_toplevel_page' 参数用于调用my_toplevel_page()函数，来显示菜单内容
    add_menu_page('Help page', '使用帮助', 'manage_options', __FILE__, 'my_toplevel_page');
}

// my_toplevel_page() 用于显示菜单的内容，填写菜单页面的HTML代码即可
function my_toplevel_page() {
    echo '
    这里填菜单页面的HTML代码
    ';

    // 如以下示例代码。 wrap 类是WordPress构建好的css类，可以在你的HTML代码中使用
    /*
    echo '
    <div class="wrap">
    <h2>使用帮助</h2>
    <p>这里是使用帮助，通过阅读本文你将了解本程序的使用！有事请<a href="#">与我联系</a></p>
    </div>
    ';
    */
}

// 通过add_action来自动调用my_add_pages函数
add_action('admin_menu', 'my_add_pages');

//摘要中文数字自定义,默认摘要截取55英文单词，并未考虑中文情况，截取规则是: implode('',$words);
function chinese_excerpt($text, $lenth=100) {
    $text = mb_substr($text,0, $lenth);
    return $text;
}
add_filter('the_excerpt', ' chinese_excerpt ');
	
?>	
