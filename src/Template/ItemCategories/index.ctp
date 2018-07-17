<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ItemCategory[]|\Cake\Collection\CollectionInterface $itemCategories
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Item Category'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Item Sub Categories'), ['controller' => 'ItemSubCategories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Item Sub Category'), ['controller' => 'ItemSubCategories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="itemCategories index large-9 medium-8 columns content">
    <h3><?= __('Item Categories') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($itemCategories as $itemCategory): ?>
            <tr>
                <td><?= $this->Number->format($itemCategory->id) ?></td>
                <td><?= h($itemCategory->name) ?></td>
                <td><?= $this->Number->format($itemCategory->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $itemCategory->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $itemCategory->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $itemCategory->id], ['confirm' => __('Are you sure you want to delete # {0}?', $itemCategory->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
