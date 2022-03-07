<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Leave $leave
 */
?>
<!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Leave
      <small><?php echo __('Edit'); ?></small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i> <?php echo __('Home'); ?></a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title"><?php echo __('Form'); ?></h3>
          </div>
          <!-- /.box-header -->
          <!-- form start -->
          <?php echo $this->Form->create($leave, ['role' => 'form']); ?>
            <div class="box-body">
              <?php
                echo $this->Form->control('employee_id', ['options' => $employees]);
                echo $this->Form->control('days_entitled');
                echo $this->Form->control('previous_outstanding');
                echo $this->Form->control('days_requested');
                echo $this->Form->control('outstanding_days');
                echo $this->Form->control('commencement_date');
                echo $this->Form->control('staff_signature');
                echo $this->Form->control('relieving_officer');
                echo $this->Form->control('hou_comments');
                echo $this->Form->control('hod_comments');
                echo $this->Form->control('hrm_comments');
                echo $this->Form->control('md_comments');
                echo $this->Form->control('status_id', ['options' => $statuses]);
              ?>
            </div>
            <!-- /.box-body -->

          <?php echo $this->Form->submit(__('Submit')); ?>

          <?php echo $this->Form->end(); ?>
        </div>
        <!-- /.box -->
      </div>
  </div>
  <!-- /.row -->
</section>
