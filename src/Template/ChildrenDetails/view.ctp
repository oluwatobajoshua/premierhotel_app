<section class="content-header">
  <h1>
    Children Detail
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
            <dd><?= $childrenDetail->has('employee') ? $this->Html->link($childrenDetail->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $childrenDetail->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Name') ?></dt>
            <dd><?= h($childrenDetail->name) ?></dd>
            <dt scope="row"><?= __('Gender') ?></dt>
            <dd><?= $childrenDetail->has('gender') ? $this->Html->link($childrenDetail->gender->name, ['controller' => 'Genders', 'action' => 'view', $childrenDetail->gender->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($childrenDetail->id) ?></dd>
            <dt scope="row"><?= __('Date Of Birth') ?></dt>
            <dd><?= h($childrenDetail->date_of_birth) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($childrenDetail->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($childrenDetail->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

</section>
