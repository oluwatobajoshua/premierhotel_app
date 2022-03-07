<section class="content-header">
  <h1>
    Work Detail
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
            <dd><?= $workDetail->has('employee') ? $this->Html->link($workDetail->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $workDetail->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Organization') ?></dt>
            <dd><?= h($workDetail->organization) ?></dd>
            <dt scope="row"><?= __('Department') ?></dt>
            <dd><?= h($workDetail->department) ?></dd>
            <dt scope="row"><?= __('Job Title') ?></dt>
            <dd><?= h($workDetail->job_title) ?></dd>
            <dt scope="row"><?= __('Job Class') ?></dt>
            <dd><?= h($workDetail->job_class) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($workDetail->id) ?></dd>
            <dt scope="row"><?= __('Start Date') ?></dt>
            <dd><?= h($workDetail->start_date) ?></dd>
            <dt scope="row"><?= __('End Date') ?></dt>
            <dd><?= h($workDetail->end_date) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($workDetail->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($workDetail->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
