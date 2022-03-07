<?php

use Cake\I18n\Time;
use Cake\I18n\Date;


/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */
?>

<section class="content-header">
  <h1>
    Employee
    <small><?php echo __('View'); ?></small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="<?php echo $this->Url->build(['action' => 'index']); ?>"><i class="fa fa-dashboard"></i>
        <?php echo __('Home'); ?></a></li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-info"></i>
          <h3 class="box-title"><?php echo __('Bio-Data Information'); ?></h3>
          <?= $this->Html->link(__('Edit'), ['action' => 'edit', $employee->id], ['class' => 'btn btn-warning btn-xs']) ?>
          <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $employee->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employee->name_desc), 'class' => 'btn btn-danger btn-xs']) ?>
          <?php endif ?>
          <?php if (in_array($user['role_id'], [1, 2])) : ?>
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
              <div class="input-group input-group-sm" style="width: 150px;">
                <?php echo $this->Form->select('id', $employees, ['value' => $employee->id, 'title' => 'Select an employee to view', 'rel' => 'tooltip', 'class' => 'form-control', 'onChange' => 'document.getElementById("empForm").submit();']); ?>
              </div>
            </form>
          <?php endif ?>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <dl class="dl-horizontal">
            <div class="col-md-4">
              <dt scope="row"><?= __('Staff No') ?></dt>
              <dd><?= h($employee->staff_no) ?></dd>
              <dt scope="row"><?= __('First Name') ?></dt>
              <dd><?= h($employee->first_name) ?></dd>
              <dt scope="row"><?= __('Last Name') ?></dt>
              <dd><?= h($employee->last_name) ?></dd>
              <dt scope="row"><?= __('Other Name') ?></dt>
              <dd><?= h($employee->other_name) ?></dd>
              <dt scope="row"><?= __('Gender') ?></dt>
              <dd><?= h($employee->gender->name) ?></dd>
              <dt scope="row"><?= __('Date Of Birth') ?></dt>
              <dd><?= h($employee->date_of_birth) ?></dd>
              <dt scope="row"><?= __('Age') ?></dt>
              <dd><?= h($employee->date_of_birth->diff(new Time())->format('%y years old')) ?></dd>
              <dt scope="row"><?= __('Date Joined') ?></dt>
              <dd><?= h($employee->date_joined) ?></dd>
            </div>
            <div class="col-md-4">
              <dt scope="row"><?= __('Tenor') ?></dt>
              <dd><?= h($employee->date_joined->diff(new Time('-1 day'))->format('%y years %m months and %d days')) ?>
              </dd>
              <dt scope="row"><?= __('Department') ?></dt>
              <dd><?= $employee->has('department') ? $this->Html->link($employee->department->name, ['controller' => 'Departments', 'action' => 'view', $employee->department->id]) : '' ?>
              </dd>
              <dt scope="row"><?= __('Grade') ?></dt>
              <dd><?= $employee->has('grade') ? $this->Html->link($employee->grade->name, ['controller' => 'Grades', 'action' => 'view', $employee->grade->id]) : '' ?>
              </dd>
              <dt scope="row"><?= __('State Of Origin') ?></dt>
              <dd><?= h($employee->state_of_origin->name) ?></dd>
              <dt scope="row"><?= __('Local Govt.') ?></dt>
              <dd><?= h($employee->local->name) ?></dd>
              <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                <dt scope="row"><?= __('Designation') ?></dt>
                <dd><?= $employee->has('designation') ? $this->Html->link($employee->designation->name, ['controller' => 'Designations', 'action' => 'view', $employee->designation->id]) : '' ?>
                </dd>
              <?php endif; ?>
              <dt scope="row"><?= __('Status') ?></dt>
              <dd><?= $employee->has('status') ? $this->Html->link($employee->status->name, ['controller' => 'Statuses', 'action' => 'view', $employee->status->id]) : '' ?>
              </dd>
              <dt scope="row"><?= __('Cadre') ?></dt>
              <dd><?= h($employee->cadre->name) ?>
              </dd>
            </div>
            <div class="col-md-4">
              <dt scope="row"><?= __('Branch') ?></dt>
              <dd><?= $employee->has('branch') ? $this->Html->link($employee->branch->name, ['controller' => 'Branches', 'action' => 'view', $employee->branch->id]) : '' ?>
              </dd>
              <dt scope="row"><?= __('Marital Status') ?></dt>
              <dd><?= h($employee->marital_status->name) ?></dd>
              <dt scope="row"><?= __('Physical Posture') ?></dt>
              <dd><?= h($employee->physical_posture->name) ?></dd>
              <dt scope="row"><?= __('Religion') ?></dt>
              <dd><?= h($employee->religion->name) ?></dd>
              <dt scope="row"><?= __('Highest Education') ?></dt>
              <dd><?= h($employee->highest_education->name) ?>
              </dd>
              <dt scope="row"><?= __('Years Of Experience') ?></dt>
              <dd><?= h($employee->years_of_experience) ?></dd>
            </div>
          </dl>
        </div>
      </div>
    </div>
  </div>
  <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-info"></i>
            <h3 class="box-title"><?php echo __('Payroll Information'); ?></h3>
          </div>
          <!-- /.box-header -->
          <div class="box-body">
            <dl class="dl-horizontal">
              <div class="col-md-4">
                <dt scope="row"><?= __('Acct No') ?></dt>
                <dd><?= h($employee->acct_no) ?></dd>
                <dt scope="row"><?= __('Service Charge Number') ?></dt>
                <dd><?= h($employee->service_charge_number) ?></dd>
                <dt scope="row"><?= __('Housing Upfront') ?></dt>
                <dd><?= h($employee->housing_upfront) ?></dd>
                <dt scope="row"><?= __('Tax Number') ?></dt>
                <dd><?= h($employee->tax_number) ?></dd>
                <dt scope="row"><?= __('Pension No') ?></dt>
                <dd><?= h($employee->pension_no) ?></dd>
                <dt scope="row"><?= __('Salary') ?></dt>
                <dd><?= $this->Number->format($employee->salary, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Service Charge') ?></dt>
                <dd><?= $employee->has('service_charge') ? $this->Html->link($employee->service_charge->bank_desc, ['controller' => 'Banks', 'action' => 'view', $employee->service_charge->id]) : '' ?>
                </dd>
                <dt scope="row"><?= __('Housing Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->housing_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Utility Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->utility_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Transport Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->transport_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Domestic Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->domestic_allowance, ['places' => 2]) ?></dd>

              </div>
              <div class="col-md-4">
                <dt scope="row"><?= __('Tax Relief') ?></dt>
                <dd><?= $this->Number->format($employee->tax_relief, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Tax Paid To Date') ?></dt>
                <dd><?= $this->Number->format($employee->tax_paid_to_date, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Medical Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->medical_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Entertainment Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->entertainment_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Other Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->other_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Personal Loan') ?></dt>
                <dd><?= $this->Number->format($employee->personal_loan, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Pers Loan Rep') ?></dt>
                <dd><?= $this->Number->format($employee->pers_loan_rep, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Pers Loan Paid') ?></dt>
                <dd><?= $this->Number->format($employee->pers_loan_paid, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Pers Loan Inst') ?></dt>
                <dd><?= $this->Number->format($employee->pers_loan_inst) ?></dd>
                <dt scope="row"><?= __('Car Loan') ?></dt>
                <dd><?= $this->Number->format($employee->car_loan, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Car Loan Rep') ?></dt>
                <dd><?= $this->Number->format($employee->car_loan_rep, ['places' => 2]) ?></dd>
              </div>
              <div class="col-md-4">
                <dt scope="row"><?= __('Car Loan Inst') ?></dt>
                <dd><?= $this->Number->format($employee->car_loan_inst) ?></dd>
                <dt scope="row"><?= __('Car Loan Paid') ?></dt>
                <dd><?= $this->Number->format($employee->car_loan_paid, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Whl CICS') ?></dt>
                <dd><?= $this->Number->format($employee->whl_cics, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Pension Control') ?></dt>
                <dd><?= $this->Number->format($employee->pension_control, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Salary Advance') ?></dt>
                <dd><?= $this->Number->format($employee->salary_advance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Salary Advance Rep') ?></dt>
                <dd><?= $this->Number->format($employee->salary_advance_rep, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Salary Advance Paid') ?></dt>
                <dd><?= $this->Number->format($employee->salary_advance_paid, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('Salary Advance Inst') ?></dt>
                <dd><?= $this->Number->format($employee->salary_advance_inst) ?></dd>
                <dt scope="row"><?= __('Drivers Allowance') ?></dt>
                <dd><?= $this->Number->format($employee->drivers_allowance, ['places' => 2]) ?></dd>
                <dt scope="row"><?= __('BRO CICS') ?></dt>
                <dd><?= $this->Number->format($employee->bro_cics, ['places' => 2]) ?></dd>
              </div>
            </dl>
          </div>
        </div>
      </div>
    </div>
  <?php endif ?>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('My Contribution'); ?></h3>
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
        <div class="box-body">
          <p><?= h($employee->contribution) ?></p>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Other Department(s) I can work'); ?></h3>
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
                <th scope="col"><?= $this->Paginator->sort('department_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->other_departments as $otherDepartment) : ?>
                <tr>
                  <td><?= $this->Number->format($otherDepartment->id) ?></td>
                  <td><?= $otherDepartment->has('department') ? $this->Html->link($otherDepartment->department->name, ['controller' => 'AddressTypes', 'action' => 'view', $otherDepartment->department->id]) : '' ?></td>
                  <td><?= h($otherDepartment->comment) ?></td>
                  <td><?= h($otherDepartment->created) ?></td>
                  <td><?= h($otherDepartment->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'OtherDepartments', 'action' => 'view', $otherDepartment->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'OtherDepartments', 'action' => 'edit', $otherDepartment->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'OtherDepartments', 'action' => 'delete', $otherDepartment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $otherDepartment->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Address'); ?></h3>

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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address_type_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->addresses as $address) : ?>
                <tr>
                  <td><?= $this->Number->format($address->id) ?></td>
                  <td><?= h($address->name) ?></td>
                  <td><?= $address->has('address_type') ? $this->Html->link($address->address_type->name, ['controller' => 'AddressTypes', 'action' => 'view', $address->address_type->id]) : '' ?></td>
                  <td><?= h($address->created) ?></td>
                  <td><?= h($address->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'Addresses', 'action' => 'view', $address->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Addresses', 'action' => 'edit', $address->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Addresses', 'action' => 'delete', $address->id], ['confirm' => __('Are you sure you want to delete # {0}?', $address->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Next of Kin'); ?></h3>

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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('relationship_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('address') ?></th>
                <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->next_of_kins as $nextOfKin) : ?>
                <tr>
                  <td><?= $this->Number->format($nextOfKin->id) ?></td>
                  <td><?= h($nextOfKin->name) ?></td>
                  <td><?= $nextOfKin->has('relationship') ? $this->Html->link($nextOfKin->relationship->name, ['controller' => 'Relationships', 'action' => 'view', $nextOfKin->relationship->id]) : '' ?></td>
                  <td><?= h($nextOfKin->address) ?></td>
                  <td><?= h($nextOfKin->phone) ?></td>
                  <td><?= h($nextOfKin->email) ?></td>
                  <td><?= h($nextOfKin->created) ?></td>
                  <td><?= h($nextOfKin->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'NextOfKins', 'action' => 'view', $nextOfKin->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'NextOfKins', 'action' => 'edit', $nextOfKin->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'NextOfKins', 'action' => 'delete', $nextOfKin->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nextOfKin->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Work Details'); ?></h3>

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
                <th scope="col"><?= $this->Paginator->sort('organization') ?></th>
                <th scope="col"><?= $this->Paginator->sort('department') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('job_class') ?></th>
                <th scope="col"><?= $this->Paginator->sort('start_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('end_date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->work_details as $workDetail) : ?>
                <tr>
                  <td><?= $this->Number->format($workDetail->id) ?></td>
                  <td><?= h($workDetail->organization) ?></td>
                  <td><?= h($workDetail->department) ?></td>
                  <td><?= h($workDetail->job_title) ?></td>
                  <td><?= h($workDetail->job_class) ?></td>
                  <td><?= h($workDetail->start_date) ?></td>
                  <td><?= h($workDetail->end_date) ?></td>
                  <td><?= h($workDetail->created) ?></td>
                  <td><?= h($workDetail->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'WorkDetails', 'action' => 'view', $workDetail->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'WorkDetails', 'action' => 'edit', $workDetail->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'WorkDetails', 'action' => 'delete', $workDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $workDetail->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Children'); ?></h3>

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
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date_of_birth') ?></th>
                <th scope="col"><?= $this->Paginator->sort('gender_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->children_details as $childrenDetail) : ?>
                <tr>
                  <td><?= $this->Number->format($childrenDetail->id) ?></td>
                  <td><?= h($childrenDetail->name) ?></td>
                  <td><?= h($childrenDetail->date_of_birth) ?></td>
                  <td><?= $childrenDetail->has('gender') ? $this->Html->link($childrenDetail->gender->name, ['controller' => 'Genders', 'action' => 'view', $childrenDetail->gender->id]) : '' ?></td>
                  <td><?= h($childrenDetail->created) ?></td>
                  <td><?= h($childrenDetail->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'ChildrenDetails', 'action' => 'view', $childrenDetail->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ChildrenDetails', 'action' => 'edit', $childrenDetail->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'ChildrenDetails', 'action' => 'delete', $childrenDetail->id], ['confirm' => __('Are you sure you want to delete # {0}?', $childrenDetail->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <h3 class="box-title"><?php echo __('Education'); ?></h3>

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
                <th scope="col"><?= $this->Paginator->sort('institution') ?></th>
                <th scope="col"><?= $this->Paginator->sort('course_of_study') ?></th>
                <th scope="col"><?= $this->Paginator->sort('highest_education_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($employee->educations as $education) : ?>
                <tr>
                  <td><?= $this->Number->format($education->id) ?></td>
                  <td><?= h($education->institution) ?></td>
                  <td><?= h($education->course_of_study) ?></td>
                  <td><?= $education->has('highest_education') ? $this->Html->link($education->highest_education->name, ['controller' => 'HighestEducations', 'action' => 'view', $education->highest_education->id]) : '' ?></td>
                  <td><?= h($education->date) ?></td>
                  <td><?= h($education->created) ?></td>
                  <td><?= h($education->modified) ?></td>
                  <td class="actions text-right">
                    <?= $this->Html->link(__('View'), ['controller' => 'Educations', 'action' => 'view', $education->id], ['class' => 'btn btn-info btn-xs']) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Educations', 'action' => 'edit', $education->id], ['class' => 'btn btn-warning btn-xs']) ?>
                    <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Educations', 'action' => 'delete', $education->id], ['confirm' => __('Are you sure you want to delete # {0}?', $education->id), 'class' => 'btn btn-danger btn-xs']) ?>
                    <?php endif; ?>
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
  <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
    <div class="row">
      <div class="col-md-12">
        <div class="box box-solid">
          <div class="box-header with-border">
            <i class="fa fa-share-alt"></i>
            <h3 class="box-title"><?= __('Transactions') ?> </h3>
            <div class="pull-right">
              <?php echo $this->Html->link(__('New Transaction'), ['controller' => 'transactions', 'action' => 'add', $employee->id], ['class' => 'btn btn-success btn-xs']) ?>
            </div>
          </div>
          <!-- /.box-header -->
          <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('date') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('basic_salary') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('housing_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('transport_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('utility_allowance') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('pension_deduction') ?></th>
                  <th scope="col"><?= $this->Paginator->sort('tax_amount') ?></th>
                  <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($employee->transactions as $transaction) : ?>
                  <tr>
                    <td><?= $this->Number->format($transaction->id) ?></td>
                    <td><?= h($transaction->date) ?></td>
                    <td><?= $this->Number->format($transaction->basic_salary, ['precision' => 2]) ?></td>
                    <td><?= $this->Number->format($transaction->housing_allowance, ['precision' => 2]) ?>
                    </td>
                    <td><?= $this->Number->format($transaction->transport_allowance, ['precision' => 2]) ?>
                    </td>
                    <td><?= $this->Number->format($transaction->utility_allowance, ['precision' => 2]) ?>
                    </td>
                    <td><?= $this->Number->format($transaction->pension_deduction, ['precision' => 2]) ?>
                    </td>
                    <td><?= $this->Number->format($transaction->tax_amount, ['precision' => 2]) ?></td>
                    <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transaction->id], ['class' => 'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transaction->id], ['class' => 'btn btn-warning btn-xs']) ?>
                      <?php if (in_array($user['role_id'], [1, 2, 3])) : ?>
                        <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transaction->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transaction->id), 'class' => 'btn btn-danger btn-xs']) ?>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  <?php endif; ?>
</section>