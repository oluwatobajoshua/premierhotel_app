<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Children Details

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
                  <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('gender_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($childrenDetails as $childrenDetail): ?>
                <tr>
                  <td><?= $this->Number->format($childrenDetail->id) ?></td>
                  <td><?= $childrenDetail->has('employee') ? $this->Html->link($childrenDetail->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $childrenDetail->employee->id]) : '' ?></td>
                  <td><?= h($childrenDetail->name) ?></td>
                  <td><?= h($childrenDetail->date_of_birth) ?></td>
                  <td><?= $childrenDetail->has('gender') ? $this->Html->link($childrenDetail->gender->name, ['controller' => 'Genders', 'action' => 'view', $childrenDetail->gender->id]) : '' ?></td>
                  <td><?= h($childrenDetail->created) ?></td>
                  <td><?= h($childrenDetail->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $childrenDetail->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $childrenDetail->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $childrenDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childrenDetail->id), 'class'=>'btn btn-danger btn-xs']) ?>
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