<?php require __DIR__ . '/modules/header.php'; ?>
<?php require __DIR__ . '/modules/navbar.php'; ?>
<?php $list = \Widgets\Theme::alloc()->getThemes(); ?>
<div class="main container">
    <h3 class="my-3"><?= _t('主题管理') ?></h3>
    <table class="table">
        <thead class="text-nowrap">
            <tr>
                <th scope="col" width="20%"><?= _t('名称') ?></th>
                <th scope="col" width="80%"><?= _t('信息') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $item) : ?>
                <tr>
                    <td><?= $item['name'] ?></td>
                    <td>
                        <p class="mb-1">描述：<?= $item['description'] ?></p>
                        <p class="mb-1">版本：<?= $item['version'] ?></p>
                        <p class="mb-0">作者：<?= $item['author'] ?></p>
                        <div class="my-2">
                            <div class="btn-group">
                                <?php if ($item['hasConfig']) : ?>
                                    <a href="<?= base_url('/admin/theme-setting.php?name=' . $item['name']) ?>" class="btn btn-primary"><?= _t('主题设置') ?></a>
                                <?php endif; ?>
                                <?php if (!$item['activated']) : ?>
                                    <a class="btn btn-success" href="<?= site_url('/theme/enable?name=' . $item['name']) ?>"><?= _t('启用') ?></a>
                                <?php else : ?>
                                    <a class="btn btn-danger" href="<?= site_url('/theme/enable?name=' . $item['name']) ?>"><?= _t('重置') ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?php require __DIR__ . '/modules/footer.php'; ?>
