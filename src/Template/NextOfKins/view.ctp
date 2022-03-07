<section class="content-header">
  <h1>
    Next Of Kin
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
            <dd><?= $nextOfKin->has('employee') ? $this->Html->link($nextOfKin->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $nextOfKin->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($nextOfKin->name) ?></dd>
            <dt scope="row"><?= __('Relationship') ?></dt>
            <dd><?= $nextOfKin->has('relationship') ? $this->Html->link($nextOfKin->relationship->name, ['controller' => 'Relationships', 'action' => 'view', $nextOfKin->relationship->id]) : '' ?></dd>
            <dt scope="row"><?= __('Address') ?></dt>
            <dd><?= h($nextOfKin->address) ?></dd>
            <dt scope="row"><?= __('Phone') ?></dt>
            <dd><?= h($nextOfKin->phone) ?></dd>
            <dt scope="row"><?= __('Email') ?></dt>
            <dd><?= h($nextOfKin->email) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($nextOfKin->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($nextOfKin->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($nextOfKin->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
