<section class="content-header">
  <h1>
    Leave Type
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
            <dd><?= h($leaveType->name) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($leaveType->id) ?></dd>
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
          <h3 class="box-title"><?= __('Leaves') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($leaveType->leaves)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Employee Id') ?></th>
                    <th scope="col"><?= __('Leave Type Id') ?></th>
                    <th scope="col"><?= __('Days Entitled') ?></th>
                    <th scope="col"><?= __('Previous Outstanding') ?></th>
                    <th scope="col"><?= __('Days Requested') ?></th>
                    <th scope="col"><?= __('Outstanding Days') ?></th>
                    <th scope="col"><?= __('Commencement Date') ?></th>
                    <th scope="col"><?= __('Staff Signature') ?></th>
                    <th scope="col"><?= __('Relieving Officer') ?></th>
                    <th scope="col"><?= __('Hou Comments') ?></th>
                    <th scope="col"><?= __('Hod Comments') ?></th>
                    <th scope="col"><?= __('Hrm Comments') ?></th>
                    <th scope="col"><?= __('Md Comments') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($leaveType->leaves as $leaves): ?>
              <tr>
                    <td><?= h($leaves->id) ?></td>
                    <td><?= h($leaves->employee_id) ?></td>
                    <td><?= h($leaves->leave_type_id) ?></td>
                    <td><?= h($leaves->days_entitled) ?></td>
                    <td><?= h($leaves->previous_outstanding) ?></td>
                    <td><?= h($leaves->days_requested) ?></td>
                    <td><?= h($leaves->outstanding_days) ?></td>
                    <td><?= h($leaves->commencement_date) ?></td>
                    <td><?= h($leaves->staff_signature) ?></td>
                    <td><?= h($leaves->relieving_officer) ?></td>
                    <td><?= h($leaves->hou_comments) ?></td>
                    <td><?= h($leaves->hod_comments) ?></td>
                    <td><?= h($leaves->hrm_comments) ?></td>
                    <td><?= h($leaves->md_comments) ?></td>
                    <td><?= h($leaves->status_id) ?></td>
                    <td><?= h($leaves->created) ?></td>
                    <td><?= h($leaves->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Leaves', 'action' => 'view', $leaves->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Leaves', 'action' => 'edit', $leaves->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Leaves', 'action' => 'delete', $leaves->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leaves->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
