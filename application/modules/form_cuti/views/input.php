<!-- BEGIN PAGE CONTAINER-->
  <div class="page-content"> 
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
    
      <div id="container">
        <div class="row">
        <div class="col-md-12">
          <div class="grid simple">
            <div class="grid-title no-border">
              <h4><?php echo lang('form'); ?> <span class="semi-bold"><a href="<?php echo site_url('form_cuti')?>"><?php echo lang('form_cuti_subheading'); ?></a></span></h4>
            </div>
            <div class="grid-body no-border">
              <?php
                $att = array('class' => 'form-no-horizontal-spacing', 'id' => 'formaddcuti');
                echo form_open('form_cuti/add', $att);
               ?>
                <div class="row column-seperation">
                  <div class="col-md-5">
                    <h4><?php echo lang('emp_info') ?></h4>
                    <?php 
                      $sess_id = $this->session->userdata('user_id');
                      //$cur_sess = date('Y');

                      //$sisa_cuti = $user->hak_cuti;
                     ?>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('name') ?></label>
                      </div>
                      <div class="col-md-9">
                        <?php if(is_admin()){
                        $style_up='class="select2" style="width:100%" id="emp_id" onChange="getUp()"';
                            echo form_dropdown('emp',$users,'',$style_up);
                        }else{?>
                        <select name="emp" id="emp" class="form-control" style="width:100%">
                              <option value="<?php echo get_nik($sess_id)?>"><?php echo get_name($sess_id)?></option>
                        </select>
                        <?php } ?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right">NIK</label>
                      </div>
                      <div class="col-md-9">
                        <input name="no" id="nik" type="text"  class="form-control" placeholder="NIK" value="<?php echo (!empty($user_info['EMPLID']))?$user_info['EMPLID']:$sess_id; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('start_working') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="seniority_date" id="seniority_date" type="text"  class="form-control" placeholder="Lama Bekerja" value="<?php echo (!empty($user_info['SENIORITYDATE']))?dateIndo($user_info['SENIORITYDATE']):'-'; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('dept_div') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="organization" id="organization" type="text"  class="form-control" placeholder="Organization" value="<?php echo (!empty($user_info['ORGANIZATION']))?$user_info['ORGANIZATION']:'-'; ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('position') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="position" id="position" type="text"  class="form-control" placeholder="Jabatan" value="<?php echo (!empty($user_info['POSITION']))?$user_info['POSITION']:'-' ?>" disabled="disabled">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('cuti_remain') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="sisa_cuti" id="sisa_cuti" type="text"  class="form-control" placeholder="Sisa Cuti" value="<?php echo $sisa_cuti ?>" disabled="disabled">
                      </div>
                    </div>
                    
                  </div>
                  <div class="col-md-7">
                    <h4><?php echo lang('cuti_input_subheading') ?></h4>
                    <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('year') ?></label>
                      </div>
                      <div class="col-md-9">
                        <select id="tahuncuti" class="select2" style="width:100%">
                          <?php if ($comp_session > 0) { ?>
                              <?php foreach ($comp_session as $cs) : ?>
                                <option value="<?php echo $cs->year; ?>"><?php echo $cs->year; ?></option>
                              <?php endforeach; ?>                      
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-8 pull-right label label-danger" style="margin: 10px 30px 10px 0px;">
                        <p>Pengajuan permohonan cuti dilakukan 2(dua) minggu sebelumnya</p>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('start_cuti_date') ?></label>
                      </div>
                      <div class="col-md-3">
                        <div id="datepicker_start" class="input-append date success no-padding">
                          <input type="text" class="form-control" name="start_cuti">
                          <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                        </div>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label text-center">s/d</label>
                      </div>
                      <div class="col-md-3">
                        <div id="datepicker_end" class="input-append date success no-padding">
                          <input type="text" class="form-control" name="end_cuti">
                          <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span> 
                        </div>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('count_day') ?></label>
                      </div>
                      <div class="col-md-2">
                        <input id="jml_hari" type="text"  class="form-control" placeholder="Jml. Hari"disabled="disabled">
                        <input type="hidden" name="jml_cuti" id="jml_cuti" value="">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('reason') ?></label>
                      </div>
                      <div class="col-md-9">
                        <select name="alasan_cuti" id="alasan_cuti" class="select2" style="width:100%">
                          <?php if (!empty($alasan_cuti)) { ?>
                              <?php for ($i=0;$i<sizeof($alasan_cuti);$i++) : ?>
                                <option value="<?php echo $alasan_cuti[$i]['HRSLEAVETYPEID']; ?>"><?php echo $alasan_cuti[$i]['DESCRIPTION']; ?></option>
                              <?php endfor; ?>                      
                          <?php } else {?>
                                <option value="0">No Data</option>
                            <?php } ?>
                        </select> 
                      </div>
                    </div>
                    
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo 'Remarks' ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="remarks" id="remarks" type="text"  class="form-control" placeholder="remarks">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('replacement') ?></label>
                      </div>
                      <div class="col-md-9">
                      <?php if(is_admin()){
                        $style_up='class="select2" style="width:100%" id="user_pengganti"';
                            echo form_dropdown('user_pengganti',array('Pilih User'=>'- Pilih User -'),'',$style_up);
                        }else{?>
                        <select name="user_pengganti" id="user_pengganti" class="select2" style="width:100%">
                            <?php foreach ($user_pengganti as $key => $up) : ?>
                              <option value="<?php echo $up['ID'] ?>"><?php echo $up['NAME']; ?></option>
                            <?php endforeach;?>
                          </select>
                            <?php }?>
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo 'No. HP' ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="contact" id="contact" type="text"  class="form-control" placeholder="contact">
                      </div>
                    </div>
                    <div class="row form-row">
                      <div class="col-md-3">
                        <label class="form-label text-right"><?php echo lang('addr_cuti') ?></label>
                      </div>
                      <div class="col-md-9">
                        <input name="alamat" id="alamat" type="text"  class="form-control" placeholder="Alamat">
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-actions">
                  <div class="pull-right">
                     <input name='user_id' id='user_id' value='<?php echo $this->session->userdata('user_id'); ?>' type='hidden'>
                    <button class="btn btn-success btn-cons" type="submit"><i class="icon-ok"></i> <?php echo lang('save_button') ?></button>
                    <a href="<?php echo site_url('form_cuti') ?>"><button class="btn btn-white btn-cons" type="button"><?php echo lang('cancel_button') ?></button></a>
                  </div>
                </div>
              <?php echo form_close(); ?>
            </div>
          </div>
        </div>
      </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE -->

  <script type="text/javascript">
    function getUp()
     {
         emp_id = document.getElementById("emp_id").value;
         $.ajax({
             url:"<?php echo base_url();?>form_cuti/get_up/"+emp_id+"",
             success: function(response){
             $("#user_pengganti").html(response);
             },
             dataType:"html"
         });
         return false;
     }
  </script>
