        <section class="invoice no-print">
        <div class="row">      
        <div class="col-xs-6 no-print">
          <form action="<?php echo $this->Url->build(); ?>" method="POST" class='pull-right' id='empForm'>
            <div class="col-md-3" style="width:600px">
            <label class="form-check-label" for="">Braches</label>
                <?php echo $this->Form->select('branch',$branches,['empty'=>'Select branch','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?>  <br>
                <label class="form-check-label" for="">Cadre</label>
                <?php echo $this->Form->select('cadres',$cadres,['empty'=>'Select a cadre','title'=> 'Select a Cadre','rel'=>'tooltip','onChange'=>'document.getElementById("empForm").submit();']);?> <br>               
            </div>
          </form>
        </div>
      <!-- /.col -->
    </div> 
        </section>
<!-- Main content -->
  <section class="invoice">

    <?php echo $this->element('general-summary'); ?>
  </section>
  <!-- /.content -->
 
