<?php require __DIR__ . '/modules/header.php'; ?>
<div class="login">
    <div class="login-wrap">
        <div class="title">
            <h1><?= _t('用户登录') ?></h1>
            <span><?= _t('此页面受限') ?></span>
            <a href="<?= base_url('/admin/register.php') ?>"><?= _t('立即注册') ?></a>
        </div>
        <form action="<?= site_url('/user/login') ?>" method="POST">
            <div class="field">
                <label class="label" for=""><?= _t('邮件地址') ?></label>
                <input class="input" name="account" type="text" autofocus>
            </div>
            <div class="field">
                <label class="label" for=""><?= _t('密码') ?></label>
                <input class="input" name="password" type="password">
            </div>
            <div class="field">
                <label class="checkbox">
                    <input type="checkbox" name="rememberme" value="true">
                    <span><?= _t('记住账号') ?></span>
                </label>
            </div>
            <button class="btn btn-primary" type="submit"><?= _t('登录') ?></button>
            <button class="btn"><?= _t('忘记密码') ?></button>
        </form>
    </div>
</div>
<script>
    document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
        e.preventDefault();
        const formEl = document.querySelector('form');
        const formData = new FormData(formEl);
        // 记住账号
        if (formData.get('rememberme')) {
            window.localStorage.setItem('login_email', formData.setItem('email'))
        }
        formEl.submit()
    });
</script>
<?php require __DIR__ . '/modules/end.php'; ?>
