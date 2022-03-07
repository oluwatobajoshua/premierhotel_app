<section class="content-header">
  <h1>
    Status
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
            <dd><?= h($status->name) ?></dd>
            <dt scope="row"><?= __('Description') ?></dt>
            <dd><?= h($status->description) ?></dd>
            <dt scope="row"><?= __('Id') ?></dt>
            <dd><?= $this->Number->format($status->id) ?></dd>
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
          <h3 class="box-title"><?= __('Employees') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->employees)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Branch Id') ?></th>
                    <th scope="col"><?= __('Staff No') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('Salary') ?></th>
                    <th scope="col"><?= __('Bank Id') ?></th>
                    <th scope="col"><?= __('Acct No') ?></th>
                    <th scope="col"><?= __('Service Charge Number') ?></th>
                    <th scope="col"><?= __('Service Charge Bank') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col"><?= __('Grade Id') ?></th>
                    <th scope="col"><?= __('Housing Allowance') ?></th>
                    <th scope="col"><?= __('Housing Upfront') ?></th>
                    <th scope="col"><?= __('Designation Id') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Cadre Id') ?></th>
                    <th scope="col"><?= __('Utility Allowance') ?></th>
                    <th scope="col"><?= __('Transport Allowance') ?></th>
                    <th scope="col"><?= __('Domestic Allowance') ?></th>
                    <th scope="col"><?= __('Tax Number') ?></th>
                    <th scope="col"><?= __('Tax Relief') ?></th>
                    <th scope="col"><?= __('Tax Paid To Date') ?></th>
                    <th scope="col"><?= __('Pension No') ?></th>
                    <th scope="col"><?= __('Medical Allowance') ?></th>
                    <th scope="col"><?= __('Entertainment Allowance') ?></th>
                    <th scope="col"><?= __('Other Allowance') ?></th>
                    <th scope="col"><?= __('Personal Loan') ?></th>
                    <th scope="col"><?= __('Pers Loan Rep') ?></th>
                    <th scope="col"><?= __('Pers Loan Paid') ?></th>
                    <th scope="col"><?= __('Pers Loan Inst') ?></th>
                    <th scope="col"><?= __('Car Loan') ?></th>
                    <th scope="col"><?= __('Car Loan Rep') ?></th>
                    <th scope="col"><?= __('Car Loan Inst') ?></th>
                    <th scope="col"><?= __('Car Loan Paid') ?></th>
                    <th scope="col"><?= __('Whl Cics') ?></th>
                    <th scope="col"><?= __('Pension Control') ?></th>
                    <th scope="col"><?= __('Salary Advance') ?></th>
                    <th scope="col"><?= __('Salary Advance Rep') ?></th>
                    <th scope="col"><?= __('Salary Advance Paid') ?></th>
                    <th scope="col"><?= __('Salary Advance Inst') ?></th>
                    <th scope="col"><?= __('Drivers Allowance') ?></th>
                    <th scope="col"><?= __('Bro Cics') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->employees as $employees): ?>
              <tr>
                    <td><?= h($employees->id) ?></td>
                    <td><?= h($employees->branch_id) ?></td>
                    <td><?= h($employees->staff_no) ?></td>
                    <td><?= h($employees->first_name) ?></td>
                    <td><?= h($employees->last_name) ?></td>
                    <td><?= h($employees->salary) ?></td>
                    <td><?= h($employees->bank_id) ?></td>
                    <td><?= h($employees->acct_no) ?></td>
                    <td><?= h($employees->service_charge_number) ?></td>
                    <td><?= h($employees->service_charge_bank) ?></td>
                    <td><?= h($employees->department_id) ?></td>
                    <td><?= h($employees->grade_id) ?></td>
                    <td><?= h($employees->housing_allowance) ?></td>
                    <td><?= h($employees->housing_upfront) ?></td>
                    <td><?= h($employees->designation_id) ?></td>
                    <td><?= h($employees->status_id) ?></td>
                    <td><?= h($employees->cadre_id) ?></td>
                    <td><?= h($employees->utility_allowance) ?></td>
                    <td><?= h($employees->transport_allowance) ?></td>
                    <td><?= h($employees->domestic_allowance) ?></td>
                    <td><?= h($employees->tax_number) ?></td>
                    <td><?= h($employees->tax_relief) ?></td>
                    <td><?= h($employees->tax_paid_to_date) ?></td>
                    <td><?= h($employees->pension_no) ?></td>
                    <td><?= h($employees->medical_allowance) ?></td>
                    <td><?= h($employees->entertainment_allowance) ?></td>
                    <td><?= h($employees->other_allowance) ?></td>
                    <td><?= h($employees->personal_loan) ?></td>
                    <td><?= h($employees->pers_loan_rep) ?></td>
                    <td><?= h($employees->pers_loan_paid) ?></td>
                    <td><?= h($employees->pers_loan_inst) ?></td>
                    <td><?= h($employees->car_loan) ?></td>
                    <td><?= h($employees->car_loan_rep) ?></td>
                    <td><?= h($employees->car_loan_inst) ?></td>
                    <td><?= h($employees->car_loan_paid) ?></td>
                    <td><?= h($employees->whl_cics) ?></td>
                    <td><?= h($employees->pension_control) ?></td>
                    <td><?= h($employees->salary_advance) ?></td>
                    <td><?= h($employees->salary_advance_rep) ?></td>
                    <td><?= h($employees->salary_advance_paid) ?></td>
                    <td><?= h($employees->salary_advance_inst) ?></td>
                    <td><?= h($employees->drivers_allowance) ?></td>
                    <td><?= h($employees->bro_cics) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Employees', 'action' => 'view', $employees->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Employees', 'action' => 'edit', $employees->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Employees', 'action' => 'delete', $employees->id], ['confirm' => __('Are you sure you want to delete # {0}?', $employees->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Profiles') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->profiles)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Last Name') ?></th>
                    <th scope="col"><?= __('First Name') ?></th>
                    <th scope="col"><?= __('Dob') ?></th>
                    <th scope="col"><?= __('Phone') ?></th>
                    <th scope="col"><?= __('Address') ?></th>
                    <th scope="col"><?= __('Passport') ?></th>
                    <th scope="col"><?= __('Sign') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Account Id') ?></th>
                    <th scope="col"><?= __('User Id') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->profiles as $profiles): ?>
              <tr>
                    <td><?= h($profiles->id) ?></td>
                    <td><?= h($profiles->last_name) ?></td>
                    <td><?= h($profiles->first_name) ?></td>
                    <td><?= h($profiles->dob) ?></td>
                    <td><?= h($profiles->phone) ?></td>
                    <td><?= h($profiles->address) ?></td>
                    <td><?= h($profiles->passport) ?></td>
                    <td><?= h($profiles->sign) ?></td>
                    <td><?= h($profiles->status_id) ?></td>
                    <td><?= h($profiles->account_id) ?></td>
                    <td><?= h($profiles->user_id) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Profiles', 'action' => 'view', $profiles->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Profiles', 'action' => 'edit', $profiles->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Profiles', 'action' => 'delete', $profiles->id], ['confirm' => __('Are you sure you want to delete # {0}?', $profiles->id), 'class'=>'btn btn-danger btn-xs']) ?>
                  </td>
              </tr>
              <?php endforeach; ?>
          </table>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="box box-solid">
        <div class="box-header with-border">
          <i class="fa fa-share-alt"></i>
          <h3 class="box-title"><?= __('Transactions') ?></h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <?php if (!empty($status->transactions)): ?>
          <table class="table table-hover">
              <tr>
                    <th scope="col"><?= __('Id') ?></th>
                    <th scope="col"><?= __('Employee Id') ?></th>
                    <th scope="col"><?= __('Department Id') ?></th>
                    <th scope="col"><?= __('Company Id') ?></th>
                    <th scope="col"><?= __('Date') ?></th>
                    <th scope="col"><?= __('Basic Salary') ?></th>
                    <th scope="col"><?= __('Domestic Allowance') ?></th>
                    <th scope="col"><?= __('Housing Allowance') ?></th>
                    <th scope="col"><?= __('Transport Allowance') ?></th>
                    <th scope="col"><?= __('Utility Allowance') ?></th>
                    <th scope="col"><?= __('Living In Allowance') ?></th>
                    <th scope="col"><?= __('Medical Allowance') ?></th>
                    <th scope="col"><?= __('Entertainment Allowance') ?></th>
                    <th scope="col"><?= __('Other Allowance') ?></th>
                    <th scope="col"><?= __('Gross') ?></th>
                    <th scope="col"><?= __('Pension Deduction') ?></th>
                    <th scope="col"><?= __('Other Deduction') ?></th>
                    <th scope="col"><?= __('Salary Advance') ?></th>
                    <th scope="col"><?= __('Drivers Allowance') ?></th>
                    <th scope="col"><?= __('Leave Allowance') ?></th>
                    <th scope="col"><?= __('Bar Account') ?></th>
                    <th scope="col"><?= __('Union Due') ?></th>
                    <th scope="col"><?= __('Ctcs') ?></th>
                    <th scope="col"><?= __('Arrears') ?></th>
                    <th scope="col"><?= __('Ileya Xmas Bonus') ?></th>
                    <th scope="col"><?= __('End Of Year Bonus') ?></th>
                    <th scope="col"><?= __('Service Charge') ?></th>
                    <th scope="col"><?= __('Personal Loan') ?></th>
                    <th scope="col"><?= __('Surcharge') ?></th>
                    <th scope="col"><?= __('Net Pay') ?></th>
                    <th scope="col"><?= __('Total Deduction') ?></th>
                    <th scope="col"><?= __('Paye') ?></th>
                    <th scope="col"><?= __('Tax Amount') ?></th>
                    <th scope="col"><?= __('Status Id') ?></th>
                    <th scope="col"><?= __('Created') ?></th>
                    <th scope="col"><?= __('Modified') ?></th>
                    <th scope="col" class="actions text-center"><?= __('Actions') ?></th>
              </tr>
              <?php foreach ($status->transactions as $transactions): ?>
              <tr>
                    <td><?= h($transactions->id) ?></td>
                    <td><?= h($transactions->employee_id) ?></td>
                    <td><?= h($transactions->department_id) ?></td>
                    <td><?= h($transactions->company_id) ?></td>
                    <td><?= h($transactions->date) ?></td>
                    <td><?= h($transactions->basic_salary) ?></td>
                    <td><?= h($transactions->domestic_allowance) ?></td>
                    <td><?= h($transactions->housing_allowance) ?></td>
                    <td><?= h($transactions->transport_allowance) ?></td>
                    <td><?= h($transactions->utility_allowance) ?></td>
                    <td><?= h($transactions->living_in_allowance) ?></td>
                    <td><?= h($transactions->medical_allowance) ?></td>
                    <td><?= h($transactions->entertainment_allowance) ?></td>
                    <td><?= h($transactions->other_allowance) ?></td>
                    <td><?= h($transactions->gross) ?></td>
                    <td><?= h($transactions->pension_deduction) ?></td>
                    <td><?= h($transactions->other_deduction) ?></td>
                    <td><?= h($transactions->salary_advance) ?></td>
                    <td><?= h($transactions->drivers_allowance) ?></td>
                    <td><?= h($transactions->leave_allowance) ?></td>
                    <td><?= h($transactions->bar_account) ?></td>
                    <td><?= h($transactions->union_due) ?></td>
                    <td><?= h($transactions->ctcs) ?></td>
                    <td><?= h($transactions->arrears) ?></td>
                    <td><?= h($transactions->ileya_xmas_bonus) ?></td>
                    <td><?= h($transactions->end_of_year_bonus) ?></td>
                    <td><?= h($transactions->service_charge) ?></td>
                    <td><?= h($transactions->personal_loan) ?></td>
                    <td><?= h($transactions->surcharge) ?></td>
                    <td><?= h($transactions->net_pay) ?></td>
                    <td><?= h($transactions->total_deduction) ?></td>
                    <td><?= h($transactions->paye) ?></td>
                    <td><?= h($transactions->tax_amount) ?></td>
                    <td><?= h($transactions->status_id) ?></td>
                    <td><?= h($transactions->created) ?></td>
                    <td><?= h($transactions->modified) ?></td>
                      <td class="actions text-right">
                      <?= $this->Html->link(__('View'), ['controller' => 'Transactions', 'action' => 'view', $transactions->id], ['class'=>'btn btn-info btn-xs']) ?>
                      <?= $this->Html->link(__('Edit'), ['controller' => 'Transactions', 'action' => 'edit', $transactions->id], ['class'=>'btn btn-warning btn-xs']) ?>
                      <?= $this->Form->postLink(__('Delete'), ['controller' => 'Transactions', 'action' => 'delete', $transactions->id], ['confirm' => __('Are you sure you want to delete # {0}?', $transactions->id), 'class'=>'btn btn-danger btn-xs']) ?>
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
