<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Next Of Kins

    <div class="pull-right"><?php echo $this->Html->link(__('New'), ['action' => 'add'], ['class'=>'btn btn-success btn-xs']) ?></div>
  </h1>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('List'); ?></h3>

          <div class="box-tools">
            <form action="<?php echo $this->Url->build(); ?>" method="POST">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="table_search" class="form-control pull-right" placeholder="<?php echo __('Search'); ?>">

                <div class="input-group-btn">
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <thead>
              <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('employee_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('relationship_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($nextOfKins as $nextOfKin): ?>
                <tr>
                  <td><?= $this->Number->format($nextOfKin->id) ?></td>
                  <td><?= $nextOfKin->has('employee') ? $this->Html->link($nextOfKin->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $nextOfKin->employee->id]) : '' ?></td>
                  <td><?= h($nextOfKin->name) ?></td>
                  <td><?= $nextOfKin->has('relationship') ? $this->Html->link($nextOfKin->relationship->name, ['controller' => 'Relationships', 'action' => 'view', $nextOfKin->relationship->id]) : '' ?></td>
                  <td><?= h($nextOfKin->address) ?></td>
                  <td><?= h($nextOfKin->phone) ?></td>
                  <td><?= h($nextOfKin->email) ?></td>
                  <td><?= h($nextOfKin->created) ?></td>
                  <td><?= h($nextOfKin->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $nextOfKin->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $nextOfKin->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $nextOfKin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nextOfKin->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
</section>