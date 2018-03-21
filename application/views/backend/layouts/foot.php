<section class="common-section">

    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('public/common/libraries/bootstrap_v3/js/bootstrap.min.js'); ?>"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo base_url('public/common/libraries/layer/layer.js'); ?>"></script>

    <!-- pjax -->
    <script src="<?php echo base_url('public/common/plugins/jQuery-pjax/jquery_3x.pjax.js'); ?>"></script>
    <!-- nprogress -->
    <script src="<?php echo base_url('public/common/plugins/nprogress/js/nprogress.js'); ?>"></script>
    <!-- storage -->
    <script src="<?php echo base_url('public/common/plugins/localStorage/store.js'); ?>"></script>

    <!-- jQuery-slimscroll -->
    <script src="<?php echo base_url('public/common/plugins/jQuery-slimScroll/jquery.slimscroll.min.js'); ?>"></script>
    <!-- jQuery-validate -->
    <script src="<?php echo base_url('public/common/plugins/jQuery-validate/js/jquery.validate.min.js'); ?>"></script>
    <!-- jQuery-iCheck -->
    <script src="<?php echo base_url('public/common/plugins/jQuery-iCheck/icheck.js'); ?>"></script>

    <!-- AdminLTE App -->
    <script src="<?php echo base_url('public/backend/js/app.js'); ?>"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?php echo base_url('public/backend/js/app_menu.js'); ?>"></script>

    <!-- custom js -->
    <script src="<?php echo base_url('public/backend/js/common.js'); ?>"></script>
    <!-- custom tool -->
    <script src="<?php echo base_url('public/backend/js/tool.js'); ?>"></script>

    <script>

        var event = {
            pageInit: function () {
                // init menu style
                var currPageUrl = $('.breadcrumb').data('curr-page-url');
                $.each($('.sidebar-menu .treeview-menu li a'), function () {
                    var _this = $(this);
                    if (_this.data('url') == currPageUrl) {
                        _this.parent().addClass('active');
                    }
                });

                // pjax setting
                $.pjax.defaults.maxCacheLength = 0; // 全局禁止缓存
                $.pjax.defaults.timeout = 10000;    // 请求超时 时间 毫秒
                $.pjax.defaults.replate = true; // 全局禁止缓存

                // pjax event
                $(document).pjax('.pjax', '#pjax-container').on('pjax:click', function () {
                    // do something...
                }).on('pjax:send', function () {
                    NProgress.start();
                }).on('pjax:complete', function () {
                    NProgress.done();
                    // 改变title
                    document.title = $('#page-title').text();
                    // 选中当前菜单样式
                    var currPageUrl = $('.breadcrumb').data('curr-page-url');

                    // 清除菜单的激活样式
                    $.each($('.sidebar-menu .treeview-menu li a'), function () {
                        var _this = $(this);
                        if (!_this.parent().hasClass('treeview-child')) {
                            _this.parent().removeClass('active')
                        }
                        if (_this.data('url') == currPageUrl) {
                            _this.parent().addClass('active');
                        }
                    });
                });

                // 初始化验证表单
                $.validator.setDefaults({
                    errorPlacement: function (error, element) {
                        // radio 类型表单 错误的标签 定位
                        if (element.attr('type') == 'radio' || element.attr('type') == 'checkbox') {
                            element.parents('.form-checked-container').append(error);
                        } else {
                            error.insertAfter(element);
                        }
                    }
                });
            }
        };

        event.pageInit();
    </script>
</section>