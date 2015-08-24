
<div class="<?php echo $this->session->flashdata('class_type');?>" role='alert'><?php echo $this->session->flashdata('flash_message');?></div>
<div class="row">
	<div class="col-md-12">
    
    	<!------CONTROL TABS START------>
		<ul class="nav nav-tabs bordered">
			<li class="active">
            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
					<?php echo get_phrase('noticeboard_list');?>
                    	</a></li>
			<!--<li>
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_noticeboard');?>
                    	</a></li>-->
		</ul>
    	<!------CONTROL TABS END------>
        
	
		<div class="tab-content">
            <!----TABLE LISTING STARTS-->
            <div class="tab-pane box active" id="list">
                <table cellpadding="0" cellspacing="0" border="0" class="table datatable" id="table_export">
                	<thead>
                		<tr>
                    		<th width="5%"><div>#</div></th>
                    		<th width="15%"><div><?php echo get_phrase('title');?></div></th>
                    		<th width="40%"><div><?php echo get_phrase('notice');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($notices as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['notice_title'];?></td>
							<td class="span5"><?php echo $row['notice'];?></td>
							<td><?php echo date('d M,Y', strtotime($row['date']));?></td>
                                                        <!--<td><?php echo $row['date'];?></td>-->
							<td>



                                    <!--View Notice-->
                         
                                    <a href="#" class="btn btn-success btn-primary btn-sm" onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_notice_view/<?php echo $row['notice_id'];?>');">
                                            <i class="entypo-user"></i>
                                            <?php echo get_phrase('View Notice');?>
                                        </a>
                       

                                    <!-- EDITING LINK -->
                              <!--
                                        <a href="#" class="btn btn-info btn-primary btn-sm"  onclick="showAjaxModal('<?php echo base_url();?>index.php?modal/popup/modal_edit_notice/<?php echo $row['notice_id'];?>');">
                                            <i class="entypo-pencil"></i>
                                                <?php echo get_phrase('edit');?>
                                            </a>
                                              -->    
                           
                                    
                                    <!-- DELETION LINK -->
                              <!--
                                        <a href="#" class="btn btn-danger btn-primary btn-sm" onclick="confirm_modal('<?php echo base_url();?>index.php?admin/noticeboard/delete/<?php echo $row['notice_id'];?>');">
                                            <i class="entypo-trash"></i>
                                                <?php echo get_phrase('delete');?>
                                            </a>-->
                                               
                              
                       
        					</td>
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
            <!----TABLE LISTING ENDS--->
            
            
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
                <div class="box-content">
                	<?php echo form_open(base_url() . 'index.php?admin/noticeboard/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('title');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="notice_title" required/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('notice');?></label>
                                <div class="col-sm-5">
                                    <div class="box closable-chat-box">
                                        <div class="box-content padded">
                                                <div class="chat-message-box">
                                                   
                                                <!--<textarea name="notice" id="ttt" rows="5" placeholder="<?php echo get_phrase('add_notice');?>" class="form-control" required></textarea>-->
                                                <textarea name="notice" id="ttt" rows="5" placeholder="<?php echo get_phrase('add_notice');?>" 
                                                          class="jqte-test form-control"
                                                          data-validate="required"
                                                          data-message-required="<?php echo get_phrase('value_required');?>">
                                                </textarea>
                                                
                                               
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('event');?></label>
                                <div class="col-sm-5">

                                    
                                    <div class="radio">
                                        <input type="radio" class="event_true" name="is_event" value="1" required>Yes<br>
                                        <input type="radio" class="event_false" name="is_event" value="0" required>No
                                    </div>
                                    
                                </div>
                            </div>
                    <div class="form-group event_date" style="display:none;">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="create_timestamp"/>
                                </div>
                            </div>

<!--                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('send_sms_to_all');?></label>
                                <div class="col-sm-5">
                                    <select class="form-control" name="check_sms">
                                        <option value="1"><?php echo get_phrase('yes');?></option>
                                        <option value="2"><?php echo get_phrase('no');?></option>
                                    </select>
                                    <br>
                                    <span class="badge badge-primary">
                                        <?php 
                                            if ($active_sms_service == 'clickatell')
                                                echo 'Clickatell ' . get_phrase('activated');
                                            if ($active_sms_service == 'twilio')
                                                echo 'Twilio ' . get_phrase('activated');
                                            if ($active_sms_service == '' || $active_sms_service == 'disabled')
                                                echo get_phrase('sms_service_not_activated');
                                        ?>
                                    </span>
                                </div>
                            </div>-->

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_notice');?></button>
                            </div>
						</div>
                    </form>                
                </div>                
			</div>
			<!----CREATION FORM ENDS-->
            
		</div>
	</div>
</div>



<script>
	$('.jqte-test').jqte();
	
	// settings of status
	var jqteStatus = true;
	$(".status").click(function()
	{
		jqteStatus = jqteStatus ? false : true;
		$('.jqte-test').jqte({"status" : jqteStatus})
	});
</script>

<script>

$(".event_true").click(function(){
    
     //alert($(".event_true").val());
     
     $('.event_date').fadeIn();
    
});
$(".event_false").click(function(){
    
     //alert($(".event_true").val());
     
     $('.event_date').fadeOut();
     
     
     $(".event_date input").val("");
    
});





</script>
