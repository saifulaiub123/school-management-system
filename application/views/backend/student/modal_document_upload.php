

<?php //echo $this->session->userdata('class_id') ?>
<?php echo form_open('admin/doc_upload/upload', array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
                
   
    <!--<div class="form-group">-->
<!--            <label for="field-1" class="col-sm-3 control-label"><?php //echo get_phrase('photo');?></label>

            <div class="col-sm-5">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 100px; height: 100px;" data-trigger="fileinput">
                                    <img src="<?php //echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px"></div>
                            <div>
                                    <span class="btn btn-white btn-file">
                                            <span class="fileinput-new">Select File</span>
                                            <span class="fileinput-exists">Change</span>
                                            <input type="file" name="userfile" accept="image/*">
                                    </span>
                                    <a href="#" class="btn btn-orange fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                    </div>
            </div>-->
        <?php $acc=array(" ","student","teacher","parent","staff"); 
        
        ?>
        
        <input type="hidden" name="acc_type" value="<?php echo $acc[$param2] ?>" />
        <input type="hidden" name="role" value="<?php echo $param2 ?>" />
        <input type="hidden" name="user_id" value="<?php echo $param1 ?>" />
       
    
    <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('document_type');?></label>
        
        <div class="col-sm-5">
                <select name="doc_type" id="doc_type" class="form-control" data-validate="required" data-message-required="<?php echo get_phrase('value_required');?>">
                                        <option value="transfer_certificate"><?php echo get_phrase('transfer_certificate');?></option>
                                        <option value="character_certificate"><?php echo get_phrase('character_certificate');?></option>
                                        <option value="domicile"><?php echo get_phrase('domicile');?></option>
                                        <option value="application"><?php echo get_phrase('application');?></option>
                                           
                </select>
        </div>
       
    </div>
        <div class="form-group">
        <label for="field-1" class="col-sm-3 control-label"><?php echo get_phrase('select_document');?></label>
        <div class="col-sm-5">
            <input type="file" name="userfile" id="fileToUpload">
        </div>
        
    </div>
    
     <div class="form-group">
        <div class="col-sm-offset-3 col-sm-5">
            <input type="submit" class="btn btn-info" value="<?php echo get_phrase('upload_file');?>" name="submit">

        </div>
    </div>





<table class="table datatable" id="table_export">
    <thead>
        <tr>
            <th><div><?php echo get_phrase('document_type');?></div></th>
            <th><div><?php echo get_phrase('document_name');?></div></th>
            <th><div><?php echo get_phrase('upload_date');?></div></th>
            <th class="span3"><div><?php echo get_phrase('option');?></div></th>
            

        </tr>
    </thead>
    <tbody>
        <?php 
//        echo $param1;
        $document	=	$this->db->order_by('doc_type','ASC')->get_where('document' , array('role'=>$param2,'user_id'=>$param1))->result_array();
                foreach($document as $row):
                    
                
        ?>
       
        <tr>
            <td><?php echo $row['doc_type'];?></td>
            
            <td><a href="<?php echo base_url().$row['file_location']?>"><?php echo $row['file_name'];?></a></td>
            <td><?php echo $row['date'];?></td>
            <td>
                <a class="btn btn-info tn-primary btn-sm" href="<?php echo base_url().$row['file_location']?>"><?php echo get_phrase('download');?></a>
                <a class="btn btn-danger tn-primary btn-sm" href="<?php echo base_url();?>index.php?admin/doc_upload/delete/<?php echo $row['id'].'/'.$param1.'/'.$param2;?>"><?php echo get_phrase('delete');?></a><!-- $param1= user_id -->
            </td>
           <!--$param1 = user_id-->
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>