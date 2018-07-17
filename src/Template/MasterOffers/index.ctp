<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\MasterOffer[]|\Cake\Collection\CollectionInterface $masterOffers
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Master Offer'), ['action' => 'add']) ?></li>
    </ul>
</nav>
<div class="masterOffers index large-9 medium-8 columns content">
    <h3><?= __('Master Offers') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('percentage') ?></th>
                <th scope="col"><?= $this->Paginator->sort('is_deleted') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($masterOffers as $masterOffer): ?>
            <tr>
                <td><?= $this->Number->format($masterOffer->id) ?></td>
                <td><?= $this->Number->format($masterOffer->name) ?></td>
                <td><?= $this->Number->format($masterOffer->percentage) ?></td>
                <td><?= $this->Number->format($masterOffer->is_deleted) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $masterOffer->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $masterOffer->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $masterOffer->id], ['confirm' => __('Are you sure you want to delete # {0}?', $masterOffer->id)]) ?>
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
