<?php
// head
$this->load->view('backend/layouts/head');
?>

<body class="hold-transition login-page">

<div class="login-box">
    <div class="login-logo">
        <a href="javascript:void(0)"><b>Sign In</a>
    </div>
    <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="" method="post">
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="userName" name="user-name" id="user-name">
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password" id="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="checkbox icheck">
                        <label>
                            <input type="checkbox"> <span style="position: relative;top: 2px;left: 3px;">Remember Me</span>
                        </label>
                    </div>
                </div>
                <div class="col-xs-12" style="margin-top: 10px;">
                    <button type="button" class="btn btn-primary btn-block btn-flat signIn">Sign In</button>
                </div>
            </div>
        </form>
        <a href="#" style="display: block;margin-top: 20px;">I forgot my password</a><br>
    </div>
</div>

<?php
// foot
$this->load->view('backend/layouts/foot');
?>

<script>
    $(function () {
        $('input').iCheck({
            checkboxClass: 'icheckbox_square-blue',
            radioClass: 'iradio_square-blue',
            increaseArea: '20%' // optional
        });

        $(".signIn").click(function () {
            var userName = $.trim($('input[name="user-name"]').val());
            var password = $.trim($('input[name="password"]').val());
            if (userName == '') {
                layer.tips('请输入用户名！', '#user-name', {
                    tips: [1, 'red'],
                    time: 2000
                });
                return false;
            }
            if (password == '') {
                layer.tips('请输入密码！', '#password', {
                    tips: [1, 'red'],
                    time: 2000
                });
                return false;
            }
            // loading层
            var index = layer.load(1, {
                shade: [0.1, '#fff'] //0.1透明度的白色背景
            });

            $.ajax({
                url: "<?php echo site_url('admin/account/sign_in_check'); ?>",
                type: "POST",
                data: {
                    userName: userName,
                    password: password
                },
                dataType: "json",
                success: function (msgs) {
                    layer.closeAll("loading");  // 取消loading
                    if (msgs.errCode == 0) {
                        layer.msg(msgs.errMsg);
                        window.location.href = "<?php echo site_url('admin/admin/index'); ?>";
                    } else {
                        layer.msg(msgs.errMsg);
                    }
                },
                error: function (xhr, status, error) {
                    console.log(xhr);
                    console.log(status);
                    console.log(error);
                }
            });
        });
    });
</script>
