<p class="wf-approve-sp">
  <?php
  if(!empty($td->user_app_lv1) && $td->is_app_lv1 == 0 && get_nik($sess_id) == $td->user_app_lv1){?>
    <div class="btn btn-success btn-cons" id="" type="" data-toggle="modal" data-target="#submitModalLv1" ><i class="icon-ok"></i>Submit</div>
    <span class="semi-bold"></span><br/>
    <span class="small"></span><br/>
    <span class="semi-bold"><?php echo get_name($td->user_app_lv1)?></span><br/>
    <span class="small"></span><br/>
    <span class="semi-bold"><?php echo '('.get_user_position($td->user_app_lv1).')'?></span>
  <?php }elseif(!empty($td->user_app_lv1) && $td->is_app_lv1 == 1){
  echo ($td->app_status_id_lv1 == 1)?"<img class=approval-img src=$approved>": (($td->app_status_id_lv1 == 2) ? "<img class=approval-img src=$rejected>"  : (($td->app_status_id_lv1 == 3) ? "<img class=approval-img src=$pending>" : "<span class='small'></span><br/>"));?>
    <span class="small"></span><br/>
    <span class="small"></span><br/>
    <span class="semi-bold"><?php echo get_name($td->user_app_lv1)?></span><br/>
    <span class="small"><?php echo dateIndo($td->date_app_lv1)?></span><br/>
    <span class="semi-bold"><?php echo '('.get_user_position($td->user_app_lv1).')'?></span>
  <?php }else{?>
    <span class="small"></span><br/>
    <span class="small"></span><br/>
    <span class="small"></span><br/>
    <span class="semi-bold"></span><br/>
    <span class="semi-bold"><?php echo (!empty($td->user_app_lv1))?get_name($td->user_app_lv1):'';?></span><br/>
    <span class="small"></span><br/>
    <span class="semi-bold"><?php echo (!empty($td->user_app_lv1))?'('.get_user_position($td->user_app_lv1).')':'';?></span>
  <?php } ?>
</p>