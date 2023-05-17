<?php require __DIR__ . '/modules/header.php'; ?>
<div class="login">
    <div class="login-wrap">
        <div class="title">
            <h1><?= _t('用户注册') ?></h1>
            <span><?= _t('此页面受限') ?></span>
            <a href="<?= base_url('/admin/login.php') ?>"><?= _t('立即登录') ?></a>
        </div>
        <form action="<?= site_url('/user/register') ?>" method="POST">
            <div class="field">
                <label class="label" for=""><?= _t('邮件地址') ?></label>
                <input class="input" name="account" type="text" autofocus>
            </div>
            <div class="field">
                <label class="label" for=""><?= _t('验证码') ?></label>
                <div class="input-group">
                    <input class="input" name="account" type="text" autofocus>
                    <button class="btn"><?= _t('发送验证码') ?></button>
                </div>
            </div>
            <div class="field">
                <label class="label" for=""><?= _t('密码') ?></label>
                <input class="input" name="password" type="password">
            </div>
            <div class="field">
                <label class="label" for=""><?= _t('确认密码') ?></label>
                <input class="input" name="password" type="password">
            </div>
            <button class="btn btn-primary" type="submit"><?= _t('注册') ?></button>
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
