<?php 
$edit_data		=	$this->db->get_where('staff' , array('staff_id' => $param1) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('staff_edit');?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open('admin/staff/do_update/'.$row['staff_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                                
                                <div class="col-sm-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="<?php echo $this->crud_model->get_image_url('staff' , $row['staff_id']);?>" alt="...">
                                        </div>
                                        <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                                        <div>
                                            <span class="btn btn-white btn-file">
                                                <span class="fileinput-new">Select image</span>
                                                <span class="fileinput-exists">Change</span>
                                                <input type="file" name="userfile" accept="image/*">
                                            </span>
                                            <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('birthday');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="birthday" value="<?php echo $row['birthday'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('joining_date');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="datepicker form-control" name="joindate" value="<?php echo $row['joindate'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('position');?></label>
                                <div class="col-sm-5">
                                   
                                    <select name="position" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="office_assistant" <?php if($row['position'] == 'office_assistant')echo 'selected';?>><?php echo get_phrase('office_assistant');?></option>
                                                    <option value="it_administrative" <?php if($row['position'] == 'it_administrative')echo 'selected';?>><?php echo get_phrase('it_administrative');?></option>
                                                    <option value="driver" <?php if($row['position'] == 'driver')echo 'selected';?>><?php echo get_phrase('driver');?></option>
                                                    <option value="accountant" <?php if($row['position'] == 'accountant')echo 'selected';?>><?php echo get_phrase('accountant');?></option>
                                                    <option value="security_guard" <?php if($row['position'] == 'security_guard')echo 'selected';?>><?php echo get_phrase('security_guard');?></option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('salary');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="salary" value="<?php echo $row['salary'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                                <div class="col-sm-5">
                                    <select name="gender" class="form-control">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>"/>
                                </div>
                            </div>
                            
                           
                            
                            
                            <div class="form-group">
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>

                                            <div class="col-sm-5">
                                                <select name="status" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('available');?>" <?php if($row['status'] == get_phrase("available"))echo 'selected';?>><?php echo get_phrase('available');?></option>
                                                    <option value="<?php echo get_phrase('unavailable');?>" <?php if($row['status'] == get_phrase("unavailable"))echo 'selected';?>><?php echo get_phrase('not_available');?></option>
                                                </select>
                                            </div> 
					</div>
                            
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_staff');?></button>
                            </div>
                        </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>