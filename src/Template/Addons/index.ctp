<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Addon'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['controller' => 'AddonVersions', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Addon Version'), ['controller' => 'AddonVersions', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="addons index large-9 medium-8 columns content">
    <h3><?= __('Addons') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('name') ?></th>
                <th><?= $this->Paginator->sort('token') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($addons as $addon): ?>
            <tr>
                <td><?= $this->Number->format($addon->id) ?></td>
                <td><?= h($addon->name) ?></td>
                <td><?= h($addon->token) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $addon->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addon->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addon->id)]) ?>
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
