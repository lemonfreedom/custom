<?php require __DIR__ . '/modules/init.php'; ?>
<?php require __DIR__ . '/modules/header.php'; ?>
<div class="main login mx-auto mt-5">
    <h2 class="my-4 text-center">
        <?= _t('用户注册') ?>
    </h2>
    <div class="card shadow-sm mx-auto">
        <div class="card-body">
            <form action="<?= site_url('/user/login') ?>" method="POST">
                <div class="mb-3">
                    <label class="form-label" for="">邮箱</label>
                    <input class="form-control mb-2" name="account" type="text" autofocus placeholder="邮箱">
                    <div class="input-group">
                        <input class="form-control" name="code" type="text" placeholder="验证码">
                        <button class="btn btn-outline-secondary">发送验证码</button>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label" for="">账户安全</label>
                    <input class="form-control mb-2" name="password" type="password" placeholder="密码">
                    <input class="form-control" name="password" type="password" placeholder="确认密码">
                </div>
                <div class="mb-2 d-grid gap-2">
                    <button class="btn btn-primary black" type="submit"><?= _t('注册') ?></button>
                </div>
            </form>
        </div>
    </div>
    <div class="my-3 text-center">
        <span class="text-secondary">已有账号，</span>
        <a href="<?= base_url('/admin/login.php') ?>">立即登录</a>
    </div>
    <!-- <div class="mb-2 d-grid gap-2">
                <button class="btn btn-danger black" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                    </svg>
                    <?= _t('使用 GOOGLE 登录') ?></button>
                <button class="btn btn-danger black" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-tencent-qq" viewBox="0 0 16 16">
                        <path d="M6.048 3.323c.022.277-.13.523-.338.55-.21.026-.397-.176-.419-.453-.022-.277.13-.523.338-.55.21-.026.397.176.42.453Zm2.265-.24c-.603-.146-.894.256-.936.333-.027.048-.008.117.037.15.045.035.092.025.119-.003.361-.39.751-.172.829-.129l.011.007c.053.024.147.028.193-.098.023-.063.017-.11-.006-.142-.016-.023-.089-.08-.247-.118Z" />
                        <path d="M11.727 6.719c0-.022.01-.375.01-.557 0-3.07-1.45-6.156-5.015-6.156-3.564 0-5.014 3.086-5.014 6.156 0 .182.01.535.01.557l-.72 1.795a25.85 25.85 0 0 0-.534 1.508c-.68 2.187-.46 3.093-.292 3.113.36.044 1.401-1.647 1.401-1.647 0 .979.504 2.256 1.594 3.179-.408.126-.907.319-1.228.556-.29.213-.253.43-.201.518.228.386 3.92.246 4.985.126 1.065.12 4.756.26 4.984-.126.052-.088.088-.305-.2-.518-.322-.237-.822-.43-1.23-.557 1.09-.922 1.594-2.2 1.594-3.178 0 0 1.041 1.69 1.401 1.647.168-.02.388-.926-.292-3.113a25.78 25.78 0 0 0-.534-1.508l-.72-1.795ZM9.773 5.53a.095.095 0 0 1-.009.096c-.109.159-1.554.943-3.033.943h-.017c-1.48 0-2.925-.784-3.034-.943a.098.098 0 0 1-.018-.055c0-.015.004-.028.01-.04.13-.287 1.43-.606 3.042-.606h.017c1.611 0 2.912.319 3.042.605Zm-4.32-.989c-.483.022-.896-.529-.922-1.229-.026-.7.344-1.286.828-1.308.483-.022.896.529.922 1.23.027.7-.344 1.286-.827 1.307Zm2.538 0c-.484-.022-.854-.607-.828-1.308.027-.7.44-1.25.923-1.23.483.023.853.608.827 1.309-.026.7-.439 1.251-.922 1.23ZM2.928 8.99c.213.042.426.081.639.117v2.336s1.104.222 2.21.068V9.363c.326.018.64.026.937.023h.017c1.117.013 2.474-.136 3.786-.396.097.622.151 1.386.097 2.284-.146 2.45-1.6 3.99-3.846 4.012h-.091c-2.245-.023-3.7-1.562-3.846-4.011-.054-.9 0-1.663.097-2.285Z" />
                    </svg>
                    <?= _t('使用 QQ 登录') ?></button>
            </div> -->
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
<?php require __DIR__ . '/modules/footer.php'; ?>
