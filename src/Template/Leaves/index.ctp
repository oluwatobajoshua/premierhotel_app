<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Leaves

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
                  <th scope="col"><?= $this->Paginator->sort('days_entitled') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('previous_outstanding') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('days_requested') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('outstanding_days') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('commencement_date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('staff_signature') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('relieving_officer') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('hou_comments') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('hod_comments') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('hrm_comments') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('md_comments') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('status_id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($leaves as $leave): ?>
                <tr>
                  <td><?= $this->Number->format($leave->id) ?></td>
                  <td><?= $leave->has('employee') ? $this->Html->link($leave->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $leave->employee->id]) : '' ?></td>
                  <td><?= $this->Number->format($leave->days_entitled) ?></td>
                  <td><?= $this->Number->format($leave->previous_outstanding) ?></td>
                  <td><?= $this->Number->format($leave->days_requested) ?></td>
                  <td><?= $this->Number->format($leave->outstanding_days) ?></td>
                  <td><?= h($leave->commencement_date) ?></td>
                  <td><?= $this->Number->format($leave->staff_signature) ?></td>
                  <td><?= $this->Number->format($leave->relieving_officer) ?></td>
                  <td><?= $this->Number->format($leave->hou_comments) ?></td>
                  <td><?= $this->Number->format($leave->hod_comments) ?></td>
                  <td><?= $this->Number->format($leave->hrm_comments) ?></td>
                  <td><?= $this->Number->format($leave->md_comments) ?></td>
                  <td><?= $leave->has('status') ? $this->Html->link($leave->status->name, ['controller' => 'Statuses', 'action' => 'view', $leave->status->id]) : '' ?></td>
                  <td><?= h($leave->created) ?></td>
                  <td><?= h($leave->modified) ?></td>
                  <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['action' => 'view', $leave->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leave->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leave->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leave->id), 'class'=>'btn btn-danger btn-xs']) ?>
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