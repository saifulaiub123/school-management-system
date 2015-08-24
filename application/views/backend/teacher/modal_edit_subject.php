<?php 
$edit_data		=	$this->db->get_where('subject' , array('subject_id' => $param1) )->result_array();
foreach ( $edit_data as $row):
?>
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-primary" data-collapsed="0">
        	<div class="panel-heading">
            	<div class="panel-title" >
            		<i class="entypo-plus-circled"></i>
					<?php echo get_phrase('edit_subject');?>
            	</div>
            </div>
			<div class="panel-body">
                <?php echo form_open('admin/subject/do_update/'.$row['subject_id'] , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('name');?></label>
                    <div class="col-sm-5 controls">
                        <input type="text" class="form-control" name="name" value="<?php echo $row['name'];?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('class');?></label>

                    <div class="col-sm-5">
                        <select name="class_id" id="class_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                         <option value=""><?php echo get_phrase('select');?></option>
                         <?php 
                            $classes = $this->db->get('class')->result_array();
                            foreach($classes as $row):
                         ?>
                        <option value="<?php echo $row['class_id'];?>">
                            <?php echo $row['name'];?>
                        </option>

                        <?php
                                endforeach;
                        ?>
                        </select>
                    </div> 
                </div>
                            
                            <!--Added Group List-->
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('group');?></label>
                        
                                <div class="col-sm-5">
                                    <select name="dep_id" id="dep_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="0"><?php echo get_phrase('no_group');?></option>
                                        <option value="1"><?php echo get_phrase('science');?></option>
                                        <option value="2"><?php echo get_phrase('arts');?></option>
                                        <option value="3"><?php echo get_phrase('commerce');?></option>
                                           
                                </select>
                                </div> 
                            </div>
                            
                            <!--End Group List-->
                            
                            <!--Added section list-->
                            <div class="form-group">
                                <label for="field-2" class="col-sm-3 control-label"><?php echo get_phrase('section');?></label>
                        
                                <div class="col-sm-5">
                                    <select name="sec_id" id="sec_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                                </div> 
			  </div>
                <div class="form-group">
                    <label class="col-sm-3 control-label"><?php echo get_phrase('teacher');?></label>
                    <div class="col-sm-5 controls">
                        <select name="teacher_id" class="form-control">
                            <option value=""></option>
                            <?php 
                            $teachers = $this->db->get('teacher')->result_array();
                            foreach($teachers as $row2):
                            ?>
                                <option value="<?php echo $row2['teacher_id'];?>"
                                    <?php if($row['teacher_id'] == $row2['teacher_id'])echo 'selected';?>>
                                        <?php echo $row2['name'];?>
                                            </option>
                            <?php
                            endforeach;
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-5">
                        <button type="submit" class="btn btn-info"><?php echo get_phrase('edit_subject');?></button>
                    </div>
                 </div>
        		</form>
            </div>
        </div>
    </div>
</div>

<?php
endforeach;
?>



