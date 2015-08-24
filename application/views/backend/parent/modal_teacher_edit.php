<?php 
$edit_data		=	$this->db->get_where('teacher' , array('teacher_id' => $param1) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_teacher');?>
            	</div>
            </div>
			<div class="panel-body">
                    <?php echo form_open('admin/teacher/do_update/'.$row['teacher_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top', 'enctype' => 'multipart/form-data'));?>
                        		
                                <div class="form-group">
                                <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                                
                                <div class="col-sm-5">
                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                        <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                            <img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" alt="...">
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
                                    <input type="text" class="datepicker form-control" name="join_date" value="<?php echo $row['join_date'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                                <div class="col-sm-5">
                                    <select name="sex" class="form-control">
                                    	<option value="male" <?php if($row['sex'] == 'male')echo 'selected';?>><?php echo get_phrase('male');?></option>
                                    	<option value="female" <?php if($row['sex'] == 'female')echo 'selected';?>><?php echo get_phrase('female');?></option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                                    <div class="col-sm-5">
							<input type="text" class="form-control" name="blood_group" value="<?php echo $row['blood_group'];?>" >
                                    </div> 
					</div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                        
						<div class="col-sm-5">
							<select name="religion" class="form-control">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="<?php echo get_phrase('muslim');?>" <?php if($row['religion'] == get_phrase('muslim'))echo 'selected';?>><?php echo get_phrase('muslim');?></option>
                              <option value="<?php echo get_phrase('hindu');?>" <?php if($row['religion'] == get_phrase('hindu'))echo 'selected';?>><?php echo get_phrase('hindu');?></option>
                              <option value="<?php echo get_phrase('buddhist');?>" <?php if($row['religion'] == get_phrase('buddhist'))echo 'selected';?>><?php echo get_phrase('buddhist');?></option>
                              <option value="<?php echo get_phrase('christian');?>" <?php if($row['religion'] == get_phrase('christian'))echo 'selected';?>><?php echo get_phrase('christian');?></option>
                              <option value="<?php echo get_phrase('other');?>" <?php if($row['religion'] == get_phrase('other'))echo 'selected';?>><?php echo get_phrase('other');?></option>
                          </select>
						</div> 
					</div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('nationality');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="nationality" value="Bangladeshi" >
						</div> 
                            </div>
                            
                            <div class="form-group">
                                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('designation');?></label>

                                    <div class="col-sm-5">
                                            <input type="text" class="form-control" name="designation" value="<?php echo $row['designation'];?>" >
                                    </div> 
                            </div>
                            
                            
                            <div class="form-group">

                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('qualification');?></label>
                                <div class="col-sm-5">
                                    <select name="qualification" class="form-control">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                        <option value="<?php echo get_phrase('BA');?>" <?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('BA');?></option>
                                        <option value="<?php echo get_phrase('BA (Hons)');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('BA (Hons)');?></option>
                                        <option value="<?php echo get_phrase('MA');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('MA');?></option>
                                        <option value="<?php echo get_phrase('Bsc');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('Bsc');?></option>
                                        <option value="<?php echo get_phrase('MSC');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('MSC');?></option>
                                        <option value="<?php echo get_phrase('BCom');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('BCom');?></option>
                                        <option value="<?php echo get_phrase('MCom');?>"<?php if($row['qualification'] == get_phrase('BA'))echo 'selected';?> ><?php echo get_phrase('MCom');?></option>

                                    </select>
                                    </div>  
                            </div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('previous_experiences');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="prev_ex" value="<?php echo $row['prev_ex'];?>" >
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
                                <label class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="email" value="<?php echo $row['email'];?>"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>"/>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>

                                            <div class="col-sm-5">
                                                <select name="t_status" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('available');?>" <?php if($row['t_status'] == get_phrase("available"))echo 'selected';?>><?php echo get_phrase('available');?></option>
                                                    <option value="<?php echo get_phrase('unavailable');?>" <?php if($row['t_status'] == get_phrase("unavailable"))echo 'selected';?>><?php echo get_phrase('not_available');?></option>
                                                </select>
                                            </div> 
					</div>
                            
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_teacher');?></button>
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