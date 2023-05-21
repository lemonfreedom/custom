<?php require __DIR__ . '/modules/header.php'; ?>
<div class="main login mx-auto mt-5">
    <h2 class="my-4 text-center">
        <?= _t('用户登录') ?>
    </h2>
    <?php \Custom\Plugin::factory('admin/login.php')->begin() ?>
    <div class="card shadow-sm mx-auto">
        <div class="card-body">
            <form action="<?= site_url('/user/login') ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="email">邮箱</label>
                    <input class="form-control" id="email" type="text" name="email" autofocus placeholder="邮箱">
                </div>
                <div class="mb-3">
                    <div class="form-label d-flex justify-content-between">
                        <label for="password">密码</label>
                        <a class="text-decoration-none" href="">忘记密码？</a>
                    </div>
                    <input class="form-control" id="password" type="password" name="password" placeholder="密码">
                </div>
                <?php \Custom\Plugin::factory('admin/login.php')->formItem() ?>
                <div class="mb-3">
                    <div class="form-check">
                        <label class="form-check-label" for="rememberme">记住账号</label>
                        <input class="form-check-input" id="rememberme" type="checkbox" name="rememberme">
                    </div>
                </div>
                <div class="mb-2 d-grid gap-2">
                    <button class="btn btn-primary black" type="submit"><?= _t('登录') ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="my-3 text-center">
        <span class="text-secondary">还没有账号？</span>
        <a class="text-decoration-none" href="<?= base_url('/admin/register.php') ?>">立即注册</a>
    </div>
    <div class="d-grid gap-2">
        <?php \Custom\Plugin::factory('admin/login.php')->end() ?>
    </div>
</div>
<script>
    // 记住账号
    let loginEmail = window.localStorage.getItem('login_email')
    if (loginEmail) {
        document.querySelector('input[name="email"]').value = loginEmail
    }
    // 验证信息
    let notice = Cookies.get('custom_notice')
    if (notice) {
        const {
            content,
            type
        } = JSON.parse(notice)
        const alertEl = document.createElement('div');
        alertEl.classList.add('alert');
        alertEl.classList.add(`alert-${type}`)
        content.forEach((msg, i) => {
            const itemEl = document.createElement('p');
            if (content.length === i + 1) {
                itemEl.classList.add('mb-0')
            } else {
                itemEl.classList.add('mb-1')
            }
            itemEl.innerText = msg;
            alertEl.appendChild(itemEl)
        });
        document.querySelector('.card-body').insertAdjacentElement('afterBegin', alertEl)
        Cookies.remove('custom_notice')
    };

    // 登录
    document.querySelector('button[type="submit"]').addEventListener('click', function(e) {
        e.preventDefault();
        const formEl = document.querySelector('form')
        const formData = new FormData(formEl)
        // 记住账号
        if (formData.get('rememberme')) {
            window.localStorage.setItem('login_email', formData.get('email'))
        } else {
            window.localStorage.removeItem('login_email')
        }
        formEl.submit()
    });
</script>
<?php require __DIR__ . '/modules/footer.php'; ?>
