
			<!----CREATION FORM STARTS---->
			<div class="tab-pane box" id="add" style="padding: 5px">
            <?php echo form_open(base_url() . 'index.php?admin/invoice/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo get_phrase('invoice_informations');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label"><?php echo get_phrase('student');?></label>
                                    <div class="col-sm-10">
<!--                                        <select name="student_id" class="form-control" style="" >
                                            <?php 
                                            $this->db->order_by('class_id','asc');
                                            $students = $this->db->get('student')->result_array();
                                            foreach($students as $row):
                                            ?>
                                                <option value="<?php echo $row['student_id'];?>">
                                                    class <?php echo $this->crud_model->get_class_name($row['class_id']);?> -
                                                    roll <?php echo $row['roll'];?> -
                                                    <?php echo $row['name'];?>
                                                </option>
                                            <?php
                                            endforeach;
                                            ?>
                                        </select>-->
                                        
                                        
                                        <table cellpadding="0" cellspacing="0" border="0" class="table class_selector">
                        <thead>
                            <tr>
                                <th><?php echo get_phrase('class');?></th>
                                <th><?php echo get_phrase('group');?></th>
                                <th><?php echo get_phrase('section');?></th>
                                <!--<th>Date</th>-->
                                <th><?php echo get_phrase('student');?></th>
                    
                            </tr>
                        </thead>
                        
                        <tr>
                             <form method="post" action="<?php echo base_url();?>index.php?admin/<?php echo $target_function ?>" class="form">
                            <td>
                                <select name="class_id" id="class_id" class="form-control" required data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
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
                            </td>
                            <td>
                                <select name="dep_id" id="dep_id" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="0"><?php echo get_phrase('no_group');?></option>
                                        <option value="1"><?php echo get_phrase('science');?></option>
                                        <option value="2"><?php echo get_phrase('arts');?></option>
                                        <option value="3"><?php echo get_phrase('commerce');?></option>
                                           
                                </select></td>
                            <td>
                                <select name="sec_id" id="sec_id" class="form-control sec_id" data-validate="required"
                                        data-message-required="<?php echo get_phrase('value_required');?>" >
                                        <option value=""><?php echo get_phrase('select');?></option>
                                            
                                </select>
                            </td>
                            <td>
                                <select name="student_id" id="student_id" class="form-control" required data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                    <option value=""><?php echo get_phrase('select');?></option>
                                                     
                                </select>

                            </td>
                            <!--<td align="center"><input type="submit" value="<?php echo get_phrase($btn_name);?>" class="btn btn-info"/></td>-->
                        </tr>
                             </form>
                        
                        
                    </table>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('invoice_type');?></label>
                                    <div class="col-sm-9">
                                         <select name="title" id="title" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                            <option value=""><?php echo get_phrase('select');?></option>
                                            <option value="monthly_fee"><?php echo get_phrase('monthly_fee');?></option>
                                            <option value="exam_fee"><?php echo get_phrase('exam_fee');?></option>
                                            <option value="annual_fee"><?php echo get_phrase('annual_fee');?></option>
                                            <option value="transport"><?php echo get_phrase('transport');?></option>
                                            <option value="sports"><?php echo get_phrase('sports');?></option>
                                            <option value="festival"><?php echo get_phrase('festival');?></option>
                                            
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('description');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('date');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="datepicker form-control" name="date"/>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="panel panel-default panel-shadow" data-collapsed="0">
                            <div class="panel-heading">
                                <div class="panel-title"><?php echo get_phrase('payment_informations');?></div>
                            </div>
                            <div class="panel-body">
                                
                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('total');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount"
                                            placeholder="<?php echo get_phrase('enter_total_amount');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('payment');?></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="amount_paid"
                                            placeholder="<?php echo get_phrase('enter_payment_amount');?>"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('status');?></label>
                                    <div class="col-sm-9">
                                        <select name="status" class="form-control">
                                            <option value="paid"><?php echo get_phrase('paid');?></option>
                                            <option value="unpaid"><?php echo get_phrase('unpaid');?></option>
                                            <option value="partial"><?php echo get_phrase('partial');?></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label"><?php echo get_phrase('method');?></label>
                                    <div class="col-sm-9">
                                        <select name="method" class="form-control">
                                            <option value="cash"><?php echo get_phrase('cash');?></option>
                                            <option value="check"><?php echo get_phrase('check');?></option>
                                            <option value="card"><?php echo get_phrase('card');?></option>
                                        </select>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-5">
                                <button type="submit" class="btn btn-info"><?php echo get_phrase('add_invoice');?></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php echo form_close();?>
			</div>