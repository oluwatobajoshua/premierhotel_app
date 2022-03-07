<section class="content-header">
  <h1>
    Other Department
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
            <dd><?= $otherDepartment->has('employee') ? $this->Html->link($otherDepartment->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $otherDepartment->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Department') ?></dt>
            <dd><?= $otherDepartment->has('department') ? $this->Html->link($otherDepartment->department->name, ['controller' => 'Departments', 'action' => 'view', $otherDepartment->department->id]) : '' ?></dd>
            <dt scope="row"><?= __('Comment') ?></dt>
            <dd><?= h($otherDepartment->comment) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($otherDepartment->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($otherDepartment->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($otherDepartment->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
