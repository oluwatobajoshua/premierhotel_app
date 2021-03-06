<section class="content-header">
  <h1>
    Address
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
            <dd><?= $address->has('employee') ? $this->Html->link($address->employee->name_desc, ['controller' => 'Employees', 'action' => 'view', $address->employee->id]) : '' ?></dd>
            <dt scope="row"><?= __('Address Type') ?></dt>
            <dd><?= $address->has('address_type') ? $this->Html->link($address->address_type->name, ['controller' => 'AddressTypes', 'action' => 'view', $address->address_type->id]) : '' ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($address->id) ?></dd>
            <dt scope="row"><?= __('Created') ?></dt>
            <dd><?= h($address->created) ?></dd>
            <dt scope="row"><?= __('Modified') ?></dt>
            <dd><?= h($address->modified) ?></dd>
          </dl>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-text-width"></i>
          <h3 class="box-title"><?= __('Name') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <?= $this->Text->autoParagraph($address->name); ?>
        </div>
      </div>
    </div>
  </div>
</section>
