<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_teacher');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/teacher/create/' , array('class' => 'form-horizontal form-groups-bordered validate','id'=>'add' , 'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" value="" autofocus>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('birth_day');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="birthday" value="" data-start-view="2">
						</div> 
					</div>
                                        <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('joining_date');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control datepicker" name="join_date" value="" data-start-view="2">
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('gender');?></label>
                        
						<div class="col-sm-5">
							<select name="sex" class="form-control">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="male"><?php echo get_phrase('male');?></option>
                              <option value="female"><?php echo get_phrase('female');?></option>
                          </select>
						</div> 
					</div>
                            
                            
                            
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('blood_group');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="blood_group" value="" >
						</div> 
					</div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('religion');?></label>
                        
						<div class="col-sm-5">
							<select name="religion" class="form-control">
                              <option value=""><?php echo get_phrase('select');?></option>
                              <option value="male"><?php echo get_phrase('muslim');?></option>
                              <option value="female"><?php echo get_phrase('hindu');?></option>
                              <option value="female"><?php echo get_phrase('buddhist');?></option>
                              <option value="female"><?php echo get_phrase('christian');?></option>
                              <option value="female"><?php echo get_phrase('other');?></option>
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
							<input type="text" class="form-control" name="designation" value="" >
						</div> 
					</div>
                            
                            
                                        <div class="form-group">
                                            
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('qualification');?></label>
                                            <div class="col-sm-5">
                                                <select name="qualification" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('BA');?>"><?php echo get_phrase('BA');?></option>
                                                    <option value="<?php echo get_phrase('BA (Hons)');?>"><?php echo get_phrase('BA (Hons)');?></option>
                                                    <option value="<?php echo get_phrase('MA');?>"><?php echo get_phrase('MA');?></option>
                                                    <option value="<?php echo get_phrase('Bsc');?>"><?php echo get_phrase('Bsc');?></option>
                                                    <option value="<?php echo get_phrase('MSC');?>"><?php echo get_phrase('MSC');?></option>
                                                    <option value="<?php echo get_phrase('BCom');?>"><?php echo get_phrase('BCom');?></option>
                                                    <option value="<?php echo get_phrase('MCom');?>"><?php echo get_phrase('MCom');?></option>
                                                   
                                                </select>
						</div>  
					</div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('previous_experiences');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="prev_ex" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="" >
						</div> 
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="" >
						</div> 
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-5">
                                                    <input type="text" class="form-control email" name="email"  value="" data-validate="required">
                                                        <br>
                                                        <input type="button" value="Check Availability">
                                                        <span class="nav"></span>
                                                        <span class="av"></span>
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" value="" >
						</div> 
					</div>
                            <div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                        
						<div class="col-sm-5">
							<select name="t_status" class="form-control">
                              
                              <option value="<?php echo get_phrase('available');?>"><?php echo get_phrase('available');?></option>
                              <option value="<?php echo get_phrase('unavailable');?>"><?php echo get_phrase('not_availables');?></option>
                              
                          </select>
						</div> 
					</div>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('photo');?></label>
                        
						<div class="col-sm-5">
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
									<img src="http://placehold.it/200x200" alt="...">
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
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info"><?php echo get_phrase('add_teacher');?></button>
						</div>
					</div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
</div>