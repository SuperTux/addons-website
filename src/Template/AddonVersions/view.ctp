<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Addon Version'), ['action' => 'edit', $addonVersion->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Addon Version'), ['action' => 'delete', $addonVersion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addonVersion->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addon Version'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addons'), ['controller' => 'Addons', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addon'), ['controller' => 'Addons', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addonVersions view large-9 medium-8 columns content">
    <h3><?= h($addonVersion->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Addon') ?></th>
            <td><?= $addonVersion->has('addon') ? $this->Html->link($addonVersion->addon->name, ['controller' => 'Addons', 'action' => 'view', $addonVersion->addon->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Path') ?></th>
            <td><?= h($addonVersion->path) ?></td>
        </tr>
        <tr>
            <th><?= __('Supported Supertux Versions') ?></th>
            <td><?= h($addonVersion->supported_supertux_versions) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($addonVersion->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Version') ?></th>
            <td><?= $this->Number->format($addonVersion->version) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Nfo') ?></h4>
        <?= $this->Text->autoParagraph(h($addonVersion->nfo)); ?>
    </div>
</div>
