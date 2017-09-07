<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="learning, coding, writing, 学习, 编程, 写作" />
    <meta name="description" content="学习是一种生活方式" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>YourLab</title>
    <link rel='stylesheet' href="/css/style.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/bootstrap.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/font-awesome.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/select2.min.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/share.min.css" type='text/css' media='all'/>
    <link rel='stylesheet' href="/css/jquery.Jcrop.css" type='text/css' media='all'/>

    {{--<script type='text/javascript' src="/js/all.js"></script>--}}
    <script type='text/javascript' src="/js/jquery.min.js"></script>
    <script type='text/javascript' src="/js/bootstrap.min.js"></script>
    <script type='text/javascript' src="/js/select2.min.js"></script>
    <script type='text/javascript' src="/js/jquery.share.min.js"></script>
    <script type='text/javascript' src="/js/social-share.min.js"></script>
    <script type='text/javascript' src="/js/jquery.form.js"></script>
    <script type='text/javascript' src="/js/jquery.Jcrop.min.js"></script>
    <style>
        .bs-docs-footer {
            padding-top: 50px;
            padding-bottom: 50px;
            margin-top: 100px;
            color: #99979c;
            text-align: center;
            background-color: #2a2730;
        }
        .bs-docs-footer a {
            color: #fff;
        }
        .bs-docs-footer-links {
            padding-left: 0;
            margin-bottom: 20px;
        }
        .bs-docs-footer-links li {
            display: inline-block;
        }
        .bs-docs-footer-links li + li {
            margin-left: 15px;
        }

    </style>
</head>
<body>
{{--nav--}}
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/discussions">YourLab</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="/discussions">首页</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if(Auth::check())
                    <li>
                        <a id="dropdownMenu1"  type="button"  aria-haspopup="true" aria-expanded="true"
                           class="dropdown-toggle" data-toggle="dropdown" role="button" >
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
                            <li><a href="/user/avatar"><i class="fa fa-user"></i>&nbsp;&nbsp; 更换头像</a></li>
                            <li><a href="#"><i class="fa fa-cog"></i>&nbsp;&nbsp; 更换密码</a></li>
                            <li><a href="#"><i class="fa fa-heart"></i>&nbsp;&nbsp; 个人中心</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="/user/logout"><i class="fa fa-sign-out"></i>&nbsp;&nbsp;退出登陆</a></li>
                        </ul>
                    </li>
                    <li><img src="{{Auth::user()->avatar}}" class = 'img-circle' width="50" alt=""></li>
                    {{--<li><a href="/user/logout">退出</a></li>--}}
                @else
                    <li><a href="/user/register">注册</a></li>
                    <li><a href="/user/login">登陆</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

{{--content--}}
@yield('content')
{{--<div id="wrapper">--}}
    {{--<div class="container">--}}
        {{--<section class="content">--}}
            {{--<div class="pad group">--}}

            {{--</div>--}}
        {{--</section>--}}
    {{--</div>--}}
{{--</div>--}}

{{--footer--}}
<footer class="bs-docs-footer">
    <div class="container">
        <ul class="bs-docs-footer-links">
            <li><a href="https://github.com/zhanxuewen">GitHub</a></li>
            <li><a href="#">标签分类</a></li>
            <li><a href="#">作品精选</a></li>
            <li><a href="../about/">关于</a></li>
        </ul>
        <div class="footer-inner">
            <div class="copyright">
                &copy;
                <span itemprop="copyrightYear">2017. All rights reserved</span>
                <span class="with-love"> <i class="fa fa-heart"></i> </span>
                <span class="author" itemprop="copyrightHolder">yourlab.cn</span>
            </div>
            <div>
                浙ICP备16043810号
            </div>
        </div>
    </div>
</footer>
</body>
</html>