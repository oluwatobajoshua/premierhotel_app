<section class="content-header">
  <h1>
    Relationship
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Information'); ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($relationship->name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($relationship->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($relationship->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($relationship->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Next Of Kins') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($relationship->next_of_kins)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Employee Id') ?></th>
                    <th scope="col"><?= __('Name') ?></th>
                    <th scope="col"><?= __('Relationship Id') ?></th>
                    <th scope="col"><?= __('Address') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Email') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($relationship->next_of_kins as $nextOfKins): ?>
              <tr>
                    <td><?= h($nextOfKins->id) ?></td>
                    <td><?= h($nextOfKins->employee_id) ?></td>
                    <td><?= h($nextOfKins->name) ?></td>
                    <td><?= h($nextOfKins->relationship_id) ?></td>
                    <td><?= h($nextOfKins->address) ?></td>
                    <td><?= h($nextOfKins->phone) ?></td>
                    <td><?= h($nextOfKins->email) ?></td>
                    <td><?= h($nextOfKins->created) ?></td>
                    <td><?= h($nextOfKins->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'NextOfKins', 'action' => 'view', $nextOfKins->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'NextOfKins', 'action' => 'edit', $nextOfKins->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextOfKins', 'action' => 'delete', $nextOfKins->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nextOfKins->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>
