
<?php 
$parent_information	=	$this->db->get_where('parent' , array('parent_id' => $param1) )->result_array();
foreach($parent_information as $row):
	$student_id		=	$row['student_id'];

?>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title">
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('add_form');?>
            	</div>
            </div>
			<div class="panel-body">
				
                <?php echo form_open('admin/parent/do_update/'.$row['parent_id'].'/'.$param3 , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('parent_of');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" readonly
                            	value="<?php echo $this->db->get_where('student', array('student_id'=>$student_id))->row()->name;?>">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="name" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>" 
                            	value="<?php echo $row['name'];?>">
						</div>
					</div>
                    
					<div class="form-group">
						<label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('email');?></label>
						<div class="col-sm-5">
							<input type="text" class="form-control" name="email" 
                            	value="<?php echo $row['email'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('password');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="password" value="">
						</div>
					</div>
					
					<div class="form-group">
                                            
                                            <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('relation_with_student');?></label>
                                            <div class="col-sm-5">
                                                <select name="relation_with_student" class="form-control">
                                                    <option value=""><?php echo get_phrase('select');?></option>
                                                    <option value="<?php echo get_phrase('father');?>" <?php if($row['relation_with_student'] == get_phrase('father'))echo 'selected';?>><?php echo get_phrase('father');?></option>
                                                    <option value="<?php echo get_phrase('mother');?>" <?php if($row['relation_with_student'] == get_phrase('mother'))echo 'selected';?>><?php echo get_phrase('mother');?></option>
                                                    <option value="<?php echo get_phrase('brother');?>" <?php if($row['relation_with_student'] == get_phrase('brother'))echo 'selected';?>><?php echo get_phrase('brother');?></option>
                                                    <option value="<?php echo get_phrase('sister');?>" <?php if($row['relation_with_student'] == get_phrase('sister'))echo 'selected';?>><?php echo get_phrase('sister');?></option>
                                                    <option value="<?php echo get_phrase('grandfather');?>" <?php if($row['relation_with_student'] == get_phrase('grandfather'))echo 'selected';?>><?php echo get_phrase('grandfather');?></option>
                                                    <option value="<?php echo get_phrase('grandmother');?>" <?php if($row['relation_with_student'] == get_phrase('grandmother'))echo 'selected';?>><?php echo get_phrase('grandmother');?></option>
                                                    <option value="<?php echo get_phrase('uncle');?>" <?php if($row['relation_with_student'] == get_phrase('uncle'))echo 'selected';?>><?php echo get_phrase('uncle');?></option>
                                                    <option value="<?php echo get_phrase('aunt');?>" <?php if($row['relation_with_student'] == get_phrase('aunt'))echo 'selected';?>><?php echo get_phrase('aunt');?></option>
                                                   
                                                </select>
						</div>  
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('phone');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="phone" value="<?php echo $row['phone'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('address');?></label>
                        
						<div class="col-sm-5">
							<input type="text" class="form-control" name="address" value="<?php echo $row['address'];?>">
						</div>
					</div>
					
					<div class="form-group">
						<label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('profession');?></label>
                        
						<div class="col-sm-5">
							<select name="profession" class="form-control">
                                                            <option value=""><?php echo get_phrase('select');?></option>
                                                            <option value="<?php echo get_phrase('business');?>" <?php if($row['profession'] == get_phrase('business'))echo 'selected';?>><?php echo get_phrase('business');?></option>
                                                            <option value="<?php echo get_phrase('service_holder');?>" <?php if($row['profession'] == get_phrase('service_holder'))echo 'selected';?>><?php echo get_phrase('service_holder');?></option>
                                                        </select>
						</div>
					</div>
                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-default"><?php echo get_phrase('edit_parent');?></button>
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