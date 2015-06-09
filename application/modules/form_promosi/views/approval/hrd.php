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
                <h4>Form Pengajuan <span class="semi-bold"><a href="<?php echo site_url('form_promosi')?>">Promosi</a></span></h4>
              </div>
              <div class="grid-body no-border">
                <?php
                $att = array('class' => 'form-no-horizontal-spacing', 'id' => '');
                echo form_open('form_promosi/do_approve_hrd/'.$this->uri->segment(3), $att);
                if($form_promosi->num_rows()>0){
                  foreach($form_promosi->result() as $row):
                    $approval_id = $row->approval_status_id;
                  $note_hrd = $row->note_hrd;
                ?>
                  <div class="row column-seperation">
                    <div class="col-md-5">
                      <h4>Informasi karyawan</h4>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">NIK</label>
                          
                        </div>
                        <div class="col-md-9">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo get_nik($row->user_id)?>"  disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Nama</label>
                        </div>
                        <div class="col-md-9">
                          <input name="name" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo get_name($row->user_id)?>"  disabled="disabled">
                        </div>
                      </div>          
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Unit Bisnis</label>
                        </div>
                        <div class="col-md-9">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Bussiness Unit Lama" value="<?php echo get_bu_name(substr($row->old_bu,0,2))?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Dept/Bagian</label>
                        </div>
                        <div class="col-md-9">
                            <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Bussiness Unit Lama" value="<?php echo get_organization_name($row->old_org)?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Jabatan</label>
                        </div>
                        <div class="col-md-9">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Bussiness Unit Lama" value="<?php echo get_position_name($row->old_pos)?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-3">
                          <label class="form-label text-right">Tanggal Pengangkatan</label>
                        </div>
                        <div class="col-md-9">
                          <input name="form3LastName" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo (!empty($row_info['SENIORITYDATE']))?dateIndo($row_info['SENIORITYDATE']):'-'?>"  disabled="disabled" >
                        </div>
                      </div>
                      
                      
                    </div>
                    <div class="col-md-7">
                      <h4>Promosi Yang Diajukan</h4>
                      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Unit Bisnis Baru</label>
                        </div>
                        <div class="col-md-8">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo get_bu_name(substr($row->new_bu,0,2))?>" disabled="disabled">
                        </div>
                      </div>

                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Dept/Bagian Baru</label>
                        </div>
                        <div class="col-md-8">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo get_organization_name($row->new_org)?>" disabled="disabled">
                        </div>
                      </div>

                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Jabatan Baru</label>
                        </div>
                       <div class="col-md-8">
                          <input name="nik" id="form3LastName" type="text"  class="form-control " placeholder="Nama" value="<?php echo get_position_name($row->new_pos)?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Tgl. Pengangkatan</label>
                        </div>
                        <div class="col-md-8">
                          <input type="text" class="form-control" name="date_promosi" value="<?php echo dateIndo($row->date_promosi)?>" disabled="disabled">
                        </div>
                      </div>
                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Alasan Pengangkatan</label>
                        </div>
                        <div class="col-md-8">
                          <textarea name="alasan" id="alasan" type="text"  class="form-control" placeholder="Alasan Pengangkatan" disabled="disabled"><?php echo $row->alasan?></textarea>
                        </div>
                      </div>

                      <?php if(!empty($row->approval_status_id)){?>
                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Approval Status HRD</label>
                        </div>
                        <div class="col-md-8">
                          <input name="alamat_cuti" id="alamat_cuti" type="text"  class="form-control" placeholder="Nama" value="<?php echo $row->approval_status; ?>" disabled="disabled">
                        </div>
                      </div>
                      <?php } ?>

                      <?php if(!empty($row->note_hrd)){?>
                      <div class="row form-row">
                        <div class="col-md-4">
                          <label class="form-label text-left">Note (hrd): </label>
                        </div>
                        <div class="col-md-8">
                          <textarea name="notes_hrd" class="custom-txtarea-form" disabled="disabled"><?php echo $row->note_hrd ?></textarea>
                        </div>
                      </div>
                      <?php } ?>

                     <?php if($row->is_approved == 1 && is_admin()){?>
                        <div class="row form-row">
                          <div class="col-md-6">
                            &nbsp;
                          </div>
                          <div class="col-md-6">
                            <div class='btn btn-info btn-small' class="text-center" title='Edit Approval' data-toggle="modal" data-target="#notapprovepromosiModal"><i class='icon-edit'> Edit Approval</i></div>
                          </div>
                        </div>
                      <?php } ?>
                      
                    </div>
                </div>
                <div class="form-actions text-center">
                    <!-- <div class="col-md-12 text-center"> -->
                      <div class="row wf-cuti">
                        <div class="col-md-6">
                          <p>Yang mengajukan</p>
                          <p class="wf-approve-sp">
                            <span class="semi-bold"><?php echo get_name($row->user_id)?></span><br/>
                            <span class="small"><?php echo dateIndo($row->created_on)?></span><br/>
                          </p>
                        </div>
                        <div class="col-md-6">
                          <p>Menyetujui</p>
                          <p class="wf-approve-sp">
                            <?php 
                            $approved = assets_url('img/approved_stamp.png');
                            $rejected = assets_url('img/rejected_stamp.png');
                            if($row->is_approved == 1 && is_admin() == false){
                            echo ($row->approval_status_id == 1)? "<img class=approval_img src=$approved>":(($row->approval_status_id == 2) ? "<img class=approval_img src=$rejected>":'');?><br/>
                            <span class="semi-bold"><?php echo get_name($row->user_approved)?></span><br/>
                            <span class="small"><?php echo dateIndo($row->date_approved)?></span><br/>
                            <?php }elseif($row->is_approved == 1 && is_admin() == true){
                            echo ($row->approval_status_id == 1)? "<img class=approval_img src=$approved>":(($row->approval_status_id == 2) ? "<img class=approval_img src=$rejected>":'');?><br/>
                            <span class="semi-bold"><?php echo get_name($row->user_approved)?></span><br/>
                            <span class="small"><?php echo dateIndo($row->date_approved)?></span><br/>
                            
                            <?php }else{?>
                            <div class="btn btn-success btn-cons" data-toggle="modal" data-target="#notapprovepromosiModal"><i class="icon-ok"></i>Submit</div>
                            <p class="">...............................</p>
                            <?php } ?>
                          </p>
                        </div>
                      </div>
                    <!-- /div> -->
                  </div>

              <?php endforeach;}?>
              </form>
              </div>
            </div>
          </div>
        </div>
              
    
      </div>
    
  </div>  
  <!-- END PAGE -->

  <!-- Edit approval promosi Modal -->
<div class="modal fade" id="notapprovepromosiModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" id="modaldialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Approval Form promosi</h4>
      </div>
      <p class="error_msg" id="MsgBad" style="background: #fff; display: none;"></p>
      <div class="modal-body">
        <form class="form-no-horizontal-spacing" method="POST" action="<?php echo site_url('form_promosi/update_approve_hrd/'.$this->uri->segment(3))?>">
            <div class="row form-row">
              <div class="col-md-12">
                <label class="form-label text-left">Status Approval </label>
              </div>
              <div class="col-md-12">
                <div class="radio">
                  <?php 
                  if($approval_status->num_rows() > 0){
                    foreach($approval_status->result() as $app){
                      $checked = ($app->id <> 0 && $app->id == $approval_id) ? 'checked = "checked"' : '';
                      ?>
                  <input id="app_status<?php echo $app->id?>" type="radio" name="app_status" value="<?php echo $app->id?>" <?php echo $checked?>>
                  <label for="app_status<?php echo $app->id?>"><?php echo $app->title?></label>
                  <?php }}else{?>
                  <input id="app_status" type="radio" name="app_status" value="0">
                  <label for="app_status">No Data</label>
                    <?php } ?>
                </div>
              </div>
            </div>
            <div class="row form-row">
              <div class="col-md-12">
                <label class="form-label text-left">Note (HRD) : </label>
              </div>
              <div class="col-md-12">
                <textarea name="note_hrd" class="custom-txtarea-form" placeholder="Note supervisor isi disini"><?=$note_hrd?></textarea>
              </div>
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="icon-remove"></i>&nbsp;<?php echo lang('close_button')?></button> 
        <button type="submit"  class="btn btn-success btn-cons"><i class="icon-ok-sign"></i>&nbsp;<?php echo lang('save_button')?></button>
      </div>
        <?php echo form_close()?>
    </div>
  </div>
</div>
<!--end edit modal--> 