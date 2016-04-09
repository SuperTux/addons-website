<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $addon->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $addon->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Addons'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['controller' => 'AddonVersions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Addon Version'), ['controller' => 'AddonVersions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addons form large-9 medium-8 columns content">
    <?= $this->Form->create($addon) ?>
    <fieldset>
        <legend><?= __('Edit Addon') ?></legend>
        <?php
            echo $this->Form->input('name');
            echo $this->Form->input('token');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
