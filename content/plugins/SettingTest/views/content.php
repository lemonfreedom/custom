<?php
$option = \Widgets\Option::alloc();
?>
<div class="tab-pane fade" id="test-setting">
    <form class="form" action="<?= site_url('/hook/setting-test-update') ?>" method="post">
        <div class="mb-3">
            <label class="form-label" for="title">测试字段</label>
            <input class="form-control" id="title" type="text" name="test" value="<?= $option->get('test') ?>" placeholder="">
        </div>
        <button class="btn btn-primary" type="submit">保存</button>
    </form>
</div>
