<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addons'), ['controller' => 'Addons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Addon'), ['controller' => 'Addons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addonVersions form large-9 medium-8 columns content">
    <?= $this->Form->create(null, ['enctype' => 'multipart/form-data']) ?>
    <fieldset>
        <legend><?= __('Upload Addon') ?></legend>
        <?php
            echo $this->Form->input('addon', [
                'type' => 'file'
            ]);
            echo $this->Form->input('supported_supertux_versions');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'))//, ['disabled' => true]) ?>
    <?= $this->Form->end() ?>
</div>
