<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Addon'), ['action' => 'edit', $addon->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Addon'), ['action' => 'delete', $addon->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addon->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Addons'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addon'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Addon Versions'), ['controller' => 'AddonVersions', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Addon Version'), ['controller' => 'AddonVersions', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="addons view large-9 medium-8 columns content">
    <h3><?= h($addon->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($addon->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Token') ?></th>
            <td><?= h($addon->token) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($addon->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Addon Versions') ?></h4>
        <?php if (!empty($addon->addon_versions)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Addon Id') ?></th>
                <th><?= __('Path') ?></th>
                <th><?= __('Version') ?></th>
                <th><?= __('Supported Supertux Versions') ?></th>
                <th><?= __('Nfo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($addon->addon_versions as $addonVersions): ?>
            <tr>
                <td><?= h($addonVersions->id) ?></td>
                <td><?= h($addonVersions->addon_id) ?></td>
                <td><?= h($addonVersions->path) ?></td>
                <td><?= h($addonVersions->version) ?></td>
                <td><?= h($addonVersions->supported_supertux_versions) ?></td>
                <td><?= h($addonVersions->nfo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'AddonVersions', 'action' => 'view', $addonVersions->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'AddonVersions', 'action' => 'edit', $addonVersions->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'AddonVersions', 'action' => 'delete', $addonVersions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addonVersions->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
