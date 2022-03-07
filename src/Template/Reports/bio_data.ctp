<?php 
  use Cake\I18n\Time;
?>
<style>
td {
  border: 1px solid black;
  margin: 1px;
  padding: 2px;
  width:100%;
}

th{
  border: 1px solid black;
  vertical-align: top;
  text-align: center;
  padding: 2px;
}
</style>

<!-- Main content -->
<section class="invoice">
    <!-- title row -->
    <div class="row">
        <div class="col-xs-12 no-print">
            <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
                <div class="col-md-6">
                    <label class="form-check-label" for="">Braches</label>
                    <?php echo $this->Form->select('branch',$branches,['empty'=>'Select branch','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                    <br>
                    <label class="form-check-label" for="">Cadre</label>
                    <?php echo $this->Form->select('cadres',$cadres,['empty'=>'Select a cadre','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                    <br>
                    <label class="form-check-label" for="">Demartment</label>
                    <?php echo $this->Form->select('department',$depts,['empty'=>'Select a department','title'=> 'Select a department','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>
                </div>
            </form>
        </div>
    </div>
</section>
<section class="invoice">
    <div class="row">
        <div class="col-xs-12">
            <h4 class="">
                <?= h($company->name) ?>
                <?php if($bName){ 
            echo '(' ;
            echo ($bName->name);
            echo ')' ;
          } ?>
            </h4>
            <?php if($cName){ 
          echo $cName->name; 
          } 
        ?>
            BIODATA INFORMATION FOR <?= h(strtoupper($company->date->format('M, Y'))) ?>

        </div>
        <div class="col-xs-12 table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>S/N</th>
                        <th>STAFF<br>NO</th>
                        <th>GRADE</th>
                        <th style="white-space:nowrap;">NAME OF STAFF </th>
                        <th>SALARY</th>
                        <th>GENDER</th>
                        <th>DATE OF BIRTH</th>
                        <th>AGE</th>
                        <th>DATE JOINED</th>
                        <th>TENOR</th>
                        <th>DEPARTMENT</th>
                        <th>STATE OF ORIGIN</th>
                        <th>LOCAL GOVT.</th>
                        <th>DESIGNATION</th>
                        <th>CADRE</th>
                        <th>MARITAL STATUS</th>
                        <th>RELIGION</th>
                        <th>HIGHEST EDUCATION</th>
                        <th>EXPERIENCE</th>
                        <th>OTHER DEPARTMENT</th>
                        <th>NEXT OF KIN</th>
                        <th>WORK DETAILS</th>
                        <th>CHILDREN</th>
                        <th>EDUCATION</th>
                    </tr>

                <?php $empId  = 0 ?>
                <?php foreach ($departments as $department): ?>
                <?php if(count($department->employees) > 0): ?>
                    <!--
                    <tr style="text-align:center">
                        <th colspan="24">
                            <h5> <?= h($department->name); ?> </h5>
                        </th>
                    </tr>-->
                </thead>
                <tbody>
                    <?php foreach ($department->employees as $employee): $empId++;?>             
                    <tr>
                        <td style="text-align:center;width:5px"><?= h($empId) ?></td>
                        <td style="text-align:center"><?= h($employee->staff_no) ?></td>
                        <td style="text-align:center"><?= h($employee->grade->name) ?></td>
                        <td style="text-align:left;"><?= h($employee->name_desc) ?></td>
                        <td><?= $this->Number->precision($employee->salary,2) ?></td>
                        <td><?= h($employee->gender->name) ?></td>
                        <td><?= h($employee->date_of_birth) ?></td>
                        <td><?= h($employee->date_of_birth->diff(new Time())->format('%y years old')) ?></td>
                        <td><?= h($employee->date_joined) ?></td>
                        <td><?= h($employee->date_joined->diff(new Time('-1 day'))->format('%y years %m months and %d days')) ?></td>
                        <td><?= h($department->name) ?></td>
                        <td><?= h($employee->state_of_origin->name) ?></td>
                        <td><?= h($employee->local->name) ?></td>
                        <td><?= h($employee->designation->name) ?></td>
                        <td><?= h($employee->cadre->name) ?></td>
                        <td><?= h($employee->marital_status->name) ?></td>
                        <td><?= h($employee->religion->name) ?></td>
                        <td><?= h($employee->highest_education->name) ?></td>
                        <td><?= h($employee->years_of_experience ? $employee->years_of_experience.' Years' : '') ?></td>
                        <td>
                            <?php foreach($employee->other_departments as $other_department): ?>
                              <p><?= h($other_department->department->name) ?></p>
                            <?php endforeach; ?>
                        </td>
                        <td>
                          <?php if($employee->next_of_kins): ?>
                          <table>
                            <thead>
                              <th>Name</th>
                              <th>Relationship</th>
                            </thead>
                            <tbody>
                            <?php foreach($employee->next_of_kins as $next_of_kin): ?>
                              <tr>
                                <td><?= h($next_of_kin->name) ?></td>
                                <td><?= h($next_of_kin->relationship->name) ?></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>
                          <?php endif;?>                      
                        </td>
                        <td>
                        <?php if($employee->work_details): ?>
                          <table>
                            <thead>
                              <th>SN</th>
                              <th>Organization</th>
                              <th>Demartment</th>
                              <th>Job Title</th>
                              <th>Year</th>
                            </thead>
                            <tbody>
                              <?php $id=0; foreach($employee->work_details as $work): $id++?>
                                <tr>
                                  <td><?= h($id);?>
                                  <td><?= h($work->organization) ?></td>
                                  <td><?= h($work->department) ?></td>
                                  <td><?= h($work->job_title) ?></td>
                                  <td><?= h($work->end_date) ?></td>
                                <tr>
                              <?php endforeach ?>
                            </tbody>
                          </table>
                          <?php endif; ?>
                        </td>
                        <td style="text-align:center"><?= h($employee->children_details ? count($employee->children_details): 'None') ?></td>
                        <td>
                          <!-- eduction -->
                          <?php if($employee->educations): ?>
                          <table>
                            <thead>
                              <th>SN</th>
                              <th>Institution</th>
                              <th>Course of Study</th>
                              <th>Year</th>
                            </thead>
                            <tbody>
                            <?php $id=0; foreach($employee->educations as $education): $id++ ?>
                              <tr>
                                <td><?= h($id) ?></td>
                                <td><?= h($education->institution) ?></td>
                                <td><?= h($education->course_of_study) ?></td>
                                <td><?= h($education->date) ?></td>
                              </tr>
                            <?php endforeach; ?>
                            </tbody>
                          </table>   
                          <?php endif; ?>                   
                        </td>
                    </tr>
                    <?php endforeach ?>
                </tbody>
                <?php endif ?>
                <?php endforeach  ?>
            </table>
        </div>

    </div>
    <!-- /.row -->
</section>
<!-- /.content -->