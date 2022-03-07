<section class="content-header">
  <h1>
    Leave
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
            <dt scope="row"><?= __('Employee') ?></dt>
            <dd><?= $leave->has('employee') ? $this->Html->link($leave->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $leave->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Status') ?></dt>
            <dd><?= $leave->has('status') ? $this->Html->link($leave->status->name, ['controller' => 'Statuses', 'action' => 'view', $leave->status->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($leave->id) ?></dd>
            <dt scope="row"><?= __('Days Entitled') ?></dt>
            <dd><?= $this->Number->format($leave->days_entitled) ?></dd>
            <dt scope="row"><?= __('Previous Outstanding') ?></dt>
            <dd><?= $this->Number->format($leave->previous_outstanding) ?></dd>
            <dt scope="row"><?= __('Days Requested') ?></dt>
            <dd><?= $this->Number->format($leave->days_requested) ?></dd>
            <dt scope="row"><?= __('Outstanding Days') ?></dt>
            <dd><?= $this->Number->format($leave->outstanding_days) ?></dd>
            <dt scope="row"><?= __('Staff Signature') ?></dt>
            <dd><?= $this->Number->format($leave->staff_signature) ?></dd>
            <dt scope="row"><?= __('Relieving Officer') ?></dt>
            <dd><?= $this->Number->format($leave->relieving_officer) ?></dd>
            <dt scope="row"><?= __('Hou Comments') ?></dt>
            <dd><?= $this->Number->format($leave->hou_comments) ?></dd>
            <dt scope="row"><?= __('Hod Comments') ?></dt>
            <dd><?= $this->Number->format($leave->hod_comments) ?></dd>
            <dt scope="row"><?= __('Hrm Comments') ?></dt>
            <dd><?= $this->Number->format($leave->hrm_comments) ?></dd>
            <dt scope="row"><?= __('Md Comments') ?></dt>
            <dd><?= $this->Number->format($leave->md_comments) ?></dd>
            <dt scope="row"><?= __('Commencement Date') ?></dt>
            <dd><?= h($leave->commencement_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($leave->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($leave->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
