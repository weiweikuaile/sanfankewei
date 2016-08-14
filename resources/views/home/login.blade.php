<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>前台用户登录</title>
        <link rel="stylesheet" href="/homes/css/dengzhu.css">
</head>
<body>
        
    <div class="login-page passport-page yoho-page clearfix">
        <div class="passport-cover">
            <div class="cover-content">
                <!-- <img class="cover-img" src="other/70"> -->
            </div>
        </div> 

        <div class="content">
            @if(session('success'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{session('success')}}</li>
                    </ul>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger">
                    <ul>
                        <li>{{session('error')}}</li>
                    </ul>
                </div>
            @endif

            <ul class="login-ul">
                <li class="relative clearfix">
                    <h2 class="title">会员登录</h2>
                </li>
                <form action="/login/dologin" method="post">
                <li class="relative">
                    <input id="account" class="account input va" name="email" value="" type="text" placeholder="邮箱" autocomplete="off">
                    <span class="err-tip hide">
                        <i></i>
                        <em></em>
                    </span>
                </li>
                <li class="relative">
                    <input id="password" class="password input va" name="password" type="password" placeholder="密码" autocomplete="off" maxlength="20">
                    <span id="caps-lock" class="caps-lock hide">大写状态开启</span>
                    <span class="err-tip hide">
                        <i></i>
                        <em>请输入密码</em>
                    </span>
                </li>
                <li class="clearfix captcha-wrap hide">
                    <input id="captcha" class="input va captcha" type="text" name="captcha" placeholder="图形验证码" autocomplete="off" maxlength="4">
                    <img id="captcha-img" class="captcha-img" alt="">
                    <a class="link change-captcha">换一张</a>
                    <span class="err-tip hide">
                        <i></i>
                        <em></em>
                    </span>
                </li>
                <li>
                    <button id="login-btn" class="login-btn btn">登录</button>
                </li>
                {{csrf_field()}}
                </form>
                <li class="other-opts">
                    <span class="remember-me">
                        <i class="iconfont">&#xe613;</i>
                        记住登录状态
                    </span>
                    <span class="right">
                        <a class="forget-password" href="/login/yanemail">忘记密码?</a>
                        |
                        <a class="fast-reg" href="./register">快速注册</a>
                    </span>
                </li>
              
            </ul>
            <input id="country-code-hide" name="countryCode" type="hidden" value="+86">
        </div>
    </div>



  <!--   /*<script src="homes/js/libs.js"></script>
  <script src="homes/js/passport.login.js"></script>*/ -->
    <!-- Google Tag Manager -->
    <noscript><iframe src="//www.googletagmanager.com/ns.html?id=GTM-W958MG" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <script>
    var _hmt = _hmt || [];
    var _gaq = _gaq || [];
    (function() {
        function async_load(){
            (function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                '//www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-W958MG');
            (function() {
                _gaq.push(['_setAccount', 'UA-48997038-32']);
                _gaq.push(['_trackPageview']);
                var ga = document.createElement('script'); 
                ga.type = 'text/javascript'; ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
            })();
        }
        if (window.addEventListener) {
            window.addEventListener('load', async_load, false);
        } else if (window.attachEvent) {
           window.attachEvent('onload', async_load);
        }
    })();
    </script>
    <script>
        window._py = window._py||[];
        window._py.push(['a', 'MC..o8vMMWxEXDCiqYckD81lUX']);
        window._py.push(['domain','stats.ipinyou.com']);
        window._py.push(['e','']);
        if(typeof _goodsData!='undefined'){
            window._py.push(['pi',_goodsData]);
        }
        -function(d){
            var f = 'https:' == d.location.protocol;var c = d.createElement('script');c.type='text/javascript';c.async=1;
            c.src=(f ? 'https' : 'http') + '://'+(f?'fm.ipinyou.com':'fm.p0y.cn')+'/j/t/adv.js';
            var h = d.getElementsByTagName("script")[0];h.parentNode.insertBefore(c, h);
        }(document);
    </script>    
</body>
</html>

