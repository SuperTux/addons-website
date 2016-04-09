<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addons'), ['controller' => 'Addons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Addon'), ['controller' => 'Addons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addonVersions form large-9 medium-8 columns content">
    <?= $this->Form->create($addonVersion) ?>
    <fieldset>
        <legend><?= __('Add Addon Version') ?></legend>
        <?php
            echo $this->Form->input('addon_id', ['options' => $addons]);
            echo $this->Form->input('path');
            echo $this->Form->input('version');
            echo $this->Form->input('supported_supertux_versions');
            echo $this->Form->input('nfo');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
