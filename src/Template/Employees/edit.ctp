<?php

/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Employee $employee
 */

//debug($user);

?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Employee
        <small><?php echo __('Edit'); ?></small>
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
            <!-- general form elements -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title"><?php echo __('Form'); ?></h3>
                    <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
                        <div class="col-md-10">
                            <?php

                            echo '<h4 style="color:red">Please make sure you save before changing the values below or change it befor editing as this will cause the page to refresh!</h4><br>';
                            echo '<div class="col-md-12 col-xs-12">';
                            echo '<div class="col-md-3 col-xs-6">';
                            echo $this->Form->control('addressCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $addressCount]);
                            echo '</div>';
                            echo '<div class="col-md-3 col-xs-6">';
                            echo $this->Form->control('workCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $workCount]);
                            echo '</div>';
                            echo '<div class="col-md-3 col-xs-6">';
                            echo $this->Form->control('childCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $childCount]);
                            echo '</div >';
                            echo '<div class="col-md-3 col-xs-6">';
                            echo $this->Form->control('educationCount', ['type' => 'number', 'onChange' => 'document.getElementById("empForm").submit();', 'value' => $educationCount]);
                            echo '</div>';
                            echo '</div>';
                            ?>
                        </div>
                    </form>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <?php echo $this->Form->create($employee, ['role' => 'form', 'id' => 'emp']); ?>
                <div class="box-body">
                    <?php
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<h3>Bio-Data Information</h3>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('staff_no');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('first_name');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('last_name');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('other_name');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('gender_id', ['options' => $genders]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('marital_status_id', ['options' => $maritalStatuses]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('state_of_origin_id', ['options' => $stateoforigins]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('local_id', ['label' => 'LGA']);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('religion_id', ['options' => $religions]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('home_town');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('physical_posture_id', ['options' => $physicalPostures]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('highest_education_id', ['options' => $highestEducations, 'empty' => 'Highest Education']);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('years_of_experience', ['type' => 'number',]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('branch_id', ['options' => $branches]);
                    echo '</div>';
                    /*
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('designation_id', ['options' => $designations]);
                        echo '</div>';*/
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('grade_id', ['options' => $grades]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('department_id', ['options' => $departments]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('cadre_id', ['options' => $cadres]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('email');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('reporting_to');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('name_of_spouse');
                    echo '</div>';
                    if ($user['role_id'] == 1) {
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('user_id', ['options' => $users, 'empty' => 'Please assign a user']);
                        echo '</div>';
                    }
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('date_of_birth', ['minYear' => 1900]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('date_joined', ['minYear' => 1900]);
                    echo '</div>';
                    echo '</div>';

                    //Address Information
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Address Information</h3>';
                    echo '<p><b>Please increase the Address Count at the top to add more than one address</b></p>';
                    for ($i = 0; $i < $addressCount; $i++) {
                        echo '<div class="col-md-12 col-xs-12">';
                        echo '<div class="col-md-1 col-xs-1">';
                        echo $i + 1;
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('addresses.' . $i . '.address_type_id', ['options' => $addressTypes]);
                        echo '</div>';
                        echo '<div class="col-md-8 col-xs-12">';
                        echo $this->Form->control('addresses.' . $i . '.id');
                        echo $this->Form->control('addresses.' . $i . '.name', ['label' => 'Address']);
                        echo '</div>';

                        echo '</div>';
                    }
                    echo '</div>';

                    //Next of Kin Information                                                
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Next Of Kin Information</h3>';
                    echo $this->Form->control('next_of_kins.0.id');
                    echo '<div class="col-md-2 col-xs-12">';
                    echo $this->Form->control('next_of_kins.0.name');
                    echo '</div>';
                    echo '<div class="col-md-2 col-xs-12">';
                    echo $this->Form->control('next_of_kins.0.relationship_id', ['options' => $relationships]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('next_of_kins.0.address');
                    echo '</div>';
                    echo '<div class="col-md-2 col-xs-12">';
                    echo $this->Form->control('next_of_kins.0.phone');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('next_of_kins.0.email');
                    echo '</div>';
                    echo '</div>';

                    //Work Details Information
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<div class="col-md-10 col-xs-12">';
                    echo '<h3>Work History Information</h3>';
                    echo '<p><b>Please increase the Work Count at the top to add more</b></p>';
                    echo '</div>';
                    for ($w = 0; $w < $workCount; $w++) {
                        echo '<div class="col-md-12 col-xs-12">';
                        //echo '<hr>';
                        echo '<div>';
                        echo $w + 1;
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.id');
                        echo $this->Form->control('work_details.' . $w . '.organization');
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.department');
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.job_title');
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.job_class');
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.start_date', ['day' => false, 'minYear' => 1900]);
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('work_details.' . $w . '.end_date', ['minYear' => 1900]);
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';

                    //Children Information
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Children Information</h3>';
                    echo '<p><b>Please increase the child count above to add children</b></p>';
                    for ($i = 0; $i < $childCount; $i++) {
                        echo '<div class="col-md-12 col-xs-12">';
                        echo '<div class="col-md-1 col-xs-12">';
                        echo $i + 1 . '.';
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('children_details.' . $i . '.id');
                        echo $this->Form->control('children_details.' . $i . '.name');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('children_details.' . $i . '.date_of_birth', ['minYear' => 1900]);
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('children_details.' . $i . '.gender_id', ['options' => $genders]);
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';

                    //Education Information
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Education Information</h3>';
                    echo '<p><b>Should be qualifications obtained within the last 10 years, increase Education Count above to add more</b></p>';
                    for ($e = 0; $e < $educationCount; $e++) {
                        echo '<div class="col-md-12 col-xs-12">';
                        echo '<div class="col-md-1">';
                        echo $e + 1;
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('educations.' . $e . '.id');
                        echo $this->Form->control('educations.' . $e . '.institution');
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-12">';
                        echo $this->Form->control('educations.' . $e . '.highest_education_id', ['options' => $highestEducations]);
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('educations.' . $e . '.course_of_study');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('educations.' . $e . '.date', ['minYear' => 1900]);
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';

                    //Other Department Information
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Other  Information</h3>';
                    echo '<p><b>1. What other department(s) can you work effectively within the organization?</b></p>';
                    for ($od = 0; $od < $otherDepartmentCount; $od++) {
                        echo '<div class="col-md-12 col-xs-12">';
                        echo '<div class="col-md-1">';
                        echo $od + 1;
                        echo '</div>';
                        echo '<div class="col-md-2 col-xs-11">';
                        echo $this->Form->control('other_departments.' . $od . '.id');
                        echo $this->Form->control('other_departments.' . $od . '.department_id', ['options' => $departments, 'empty' => 'Other department', 'label' => 'Other Department']);
                        echo '</div>';
                        echo '<div class="col-md-9 col-xs-12">';
                        echo $this->Form->control('other_departments.' . $od . '.comment', ['label' => 'Comment/Reason']);
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                    echo '<div class="col-md-12 col-xs-12">';
                    echo $this->Form->control('contribution', ['label' => ' 2. In what unique ways can you contribute to fulfiling the Company\'s vision?']);
                    echo '</div>';
                    //Payroll Information                        
                    echo '<div class="col-md-12 col-xs-12">';
                    echo '<hr>';
                    echo '<h3>Payment Information</h3>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('bank_id', ['options' => $banks]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('acct_no');
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('service_charge_bank', ['options' => $serviceCharges]);
                    echo '</div>';
                    echo '<div class="col-md-3 col-xs-12">';
                    echo $this->Form->control('service_charge_number');
                    echo '</div>';
                    if (in_array($user['role_id'], [1, 2, 3])) {
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('salary');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('housing_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('housing_upfront');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('utility_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('transport_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('domestic_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('tax_number');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('tax_paid_to_date');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('pension_no');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('medical_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('entertainment_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('other_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('car_loan');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('car_loan_rep');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('salary_advance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('salary_advance_rep');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('salary_advance_paid');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('salary_advance_inst');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('drivers_allowance');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('bro_cics');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('personal_loan');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('pers_loan_rep');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('pers_loan_paid');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('pers_loan_inst');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('car_loan_inst');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('car_loan_paid');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('whl_cics');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('pension_control');
                        echo '</div>';
                        echo '<div class="col-md-3 col-xs-12">';
                        echo $this->Form->control('tax_relief');
                        echo '</div>';
                        echo '</div>';
                    }
                    echo '<div class="col-md-12 col-xs-12">';
                    echo $this->Form->submit(__('Save'));
                    echo $this->Form->end();
                    echo '</div>';
                    ?>
                </div>
                <!-- /.box-body -->
                <?php  ?>
                <?php  ?>
            </div>
            <!-- /.box -->
        </div>
    </div>
    <!-- /.row -->
</section>

<?php $this->start('scriptBottom'); ?>
<script>
    $(function() {

        var formUrl = "<?php echo $this->Url->build(['controller' => 'Employees', 'action' => 'ajax']); ?>";
        //get the value of state of origing
        var state_id = $('#state-of-origin-id').val();

        //set the value to loading...

        /*
        $('#local-id').html(`<option value="-1">Loading...</option>`);
        //send an ajax request 
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: formUrl,
            data: {
                data: state_id
            },
            beforeSend: function(xhr) { // Add this line
                xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                //console.log(xhr);
            },
            success: function(status) {
                //console.log(status);
                //remove the value loading on success                
                $('#local-id option[value="-1"]').remove();
                $.each(status, function(key, value) {
                    $("#local-id").append($('<option></option>').val(value.id).html(value.name));
                });
            },
            error: function(xhr, textStatus, error) {
                console.log(xhr);
                console.log(textStatus);
                console.log(error);
            }
        });*/
        /**/
        $('#state-of-origin-id').change(function(e) {
            var stateId = $('#state-of-origin-id option:selected').val();
            e.preventDefault()

            console.log(stateId)
            //make an api call to locals controller and return the related locals 
            //serialize form data 
            var formData = stateId;
            //get form action 


            //change the value to loading...
            $('#local-id').html(`<option value="-1">Loading...</option>`);

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: formUrl,
                data: {
                    data: stateId
                },
                beforeSend: function(xhr) { // Add this line
                    xhr.setRequestHeader('X-CSRF-Token', $('[name="_csrfToken"]').val());
                    //console.log(xhr);
                },
                success: function(status) {
                    //remove the value loading on success                
                    $('#local-id option[value="-1"]').remove();
                    $.each(status, function(key, value) {
                        $("#local-id").append($('<option></option>').val(value.id).html(value.name));
                        //set slected value from employee data 
                        $("#local-id option[value='<?php echo $employee->local_id ?>']").attr('selected', 'selected');
                    });
                },
                error: function(xhr, textStatus, error) {
                    console.log(xhr);
                    console.log(textStatus);
                    console.log(error);
                }
            });

        });
        /*
        $('#state-of-origin-id').on('change', function() {
            var id = $(this).val();
            console.log(id);
            var targeturl = "<?php echo $this->Url->build(['controller' => 'Employees', 'action' => 'ajax']); ?>" + '.json';
            console.log(targeturl);

            console.log($('#local-id').val([]));

            if (id == '1') {
                $('#local-id').html(`<option value="-1">Select State</option>`);
            } else {
                $("#divLoading").addClass('show');
                $('#state').html(`<option value="-1">Select State</option>`);
                $.ajax({
                    type: 'post',
                    url: targeturl,
                    data: 'id=' + id + '&type=state',
                    dataType: 'json',
                    success: function(result) {
                        // $("#divLoading").removeClass('show');
                        // $('#state').append(result);
                    }
                });
            }
        });*/
    })
</script>
<?php $this->end(); ?>