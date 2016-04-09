<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Addon Version'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addons'), ['controller' => 'Addons', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Addon'), ['controller' => 'Addons', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addonVersions index large-9 medium-8 columns content">
    <h3><?= __('Addon Versions') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('addon_id') ?></th>
                <th><?= $this->Paginator->sort('path') ?></th>
                <th><?= $this->Paginator->sort('version') ?></th>
                <th><?= $this->Paginator->sort('supported_supertux_versions') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addonVersions as $addonVersion): ?>
            <tr>
                <td><?= $this->Number->format($addonVersion->id) ?></td>
                <td><?= $addonVersion->has('addon') ? $this->Html->link($addonVersion->addon->name, ['controller' => 'Addons', 'action' => 'view', $addonVersion->addon->id]) : '' ?></td>
                <td><?= h($addonVersion->path) ?></td>
                <td><?= $this->Number->format($addonVersion->version) ?></td>
                <td><?= h($addonVersion->supported_supertux_versions) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $addonVersion->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addonVersion->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addonVersion->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addonVersion->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
