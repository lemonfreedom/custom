<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="<?= base_url('/admin/index.php') ?>"><?= $option->get('title') ?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <hr class="d-lg-none my-2">
            <ul class="navbar-nav me-auto mb-lg-0">
                <?php \Custom\Plugin::factory('admin/navbar.php')->navBegin() ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-text-fill" viewBox="0 0 16 16">
                            <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM4.5 9a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM4 10.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 1 0-1h4a.5.5 0 0 1 0 1h-4z" />
                        </svg>
                        <span>内容管理</span>
                    </a>
                    <ul class="dropdown-menu shadow-sm p-2">
                        <li><a class="dropdown-item rounded" href="#">文章管理</a></li>
                        <li><a class="dropdown-item rounded" href="#">评论管理</a></li>
                        <li><a class="dropdown-item rounded" href="#">分类管理</a></li>
                        <li><a class="dropdown-item rounded" href="#">文件管理</a></li>
                        <?php \Custom\Plugin::factory('admin/navbar.php')->navContentItem() ?>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                            <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                        </svg>
                        <span>用户管理</span>
                    </a>
                    <ul class="dropdown-menu shadow-sm p-2">
                        <li><a class="dropdown-item rounded" href="#">用户管理</a></li>
                        <li><a class="dropdown-item rounded" href="#">角色管理</a></li>
                        <li><a class="dropdown-item rounded" href="#">权限管理</a></li>
                        <?php \Custom\Plugin::factory('admin/navbar.php')->navUserItem() ?>
                    </ul>
                </li>
                <?php \Custom\Plugin::factory('admin/navbar.php')->navEnd() ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear-fill" viewBox="0 0 16 16">
                            <path d="M9.405 1.05c-.413-1.4-2.397-1.4-2.81 0l-.1.34a1.464 1.464 0 0 1-2.105.872l-.31-.17c-1.283-.698-2.686.705-1.987 1.987l.169.311c.446.82.023 1.841-.872 2.105l-.34.1c-1.4.413-1.4 2.397 0 2.81l.34.1a1.464 1.464 0 0 1 .872 2.105l-.17.31c-.698 1.283.705 2.686 1.987 1.987l.311-.169a1.464 1.464 0 0 1 2.105.872l.1.34c.413 1.4 2.397 1.4 2.81 0l.1-.34a1.464 1.464 0 0 1 2.105-.872l.31.17c1.283.698 2.686-.705 1.987-1.987l-.169-.311a1.464 1.464 0 0 1 .872-2.105l.34-.1c1.4-.413 1.4-2.397 0-2.81l-.34-.1a1.464 1.464 0 0 1-.872-2.105l.17-.31c.698-1.283-.705-2.686-1.987-1.987l-.311.169a1.464 1.464 0 0 1-2.105-.872l-.1-.34zM8 10.93a2.929 2.929 0 1 1 0-5.86 2.929 2.929 0 0 1 0 5.858z" />
                        </svg>
                        <span>系统设置</span>
                    </a>
                    <ul class="dropdown-menu shadow-sm p-2">
                        <li><a class="dropdown-item rounded" href="<?= base_url('/admin/setting.php'); ?>">站点设置</a></li>
                        <li><a class="dropdown-item rounded" href="<?= base_url('/admin/theme.php') ?>">前台管理</a></li>
                        <li><a class="dropdown-item rounded" href="<?= base_url('/admin/plugin.php') ?>">插件管理</a></li>
                        <?php \Custom\Plugin::factory('admin/navbar.php')->navSystemItem() ?>
                    </ul>
                </li>
            </ul>
            <ul class="navbar-nav">
                <?php \Custom\Plugin::factory('admin/navbar.php')->rightNavBegin() ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('/') ?>">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-houses-fill" viewBox="0 0 16 16">
                            <path d="M7.207 1a1 1 0 0 0-1.414 0L.146 6.646a.5.5 0 0 0 .708.708L1 7.207V12.5A1.5 1.5 0 0 0 2.5 14h.55a2.51 2.51 0 0 1-.05-.5V9.415a1.5 1.5 0 0 1-.56-2.475l5.353-5.354L7.207 1Z" />
                            <path d="M8.793 2a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Z" />
                        </svg>
                        <span>返回前台</span>
                    </a>
                </li>
                <?php \Custom\Plugin::factory('admin/navbar.php')->rightNavEnd() ?>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="theme"></button>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                            <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                        </svg>
                        <span>Admin</span>
                    </a>
                    <ul class="dropdown-menu shadow-sm p-2">
                        <li><a class="dropdown-item rounded" href="<?= site_url('/user/logout') ?>">退出登录</a></li>
                        <?php \Custom\Plugin::factory('admin/navbar.php')->rightNavUserItem() ?>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
