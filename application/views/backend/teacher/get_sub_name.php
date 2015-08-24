<!--<option value="0"><?php echo get_phrase('select');?></option>-->
    <?php 
        $subject = $this->db->get_where('subject' , array('class_id'=>$class_id,'dep_id'=>$dep_id,'sec_id'=>$sec_id))->result_array();
        
        ?>
      
        
<option value="0"><?php echo get_phrase('no_optional');?></option>
        <?php 
        
        
        foreach($subject as $row):
    ?>
        <option value="<?php echo $row['subject_id'];?>"><?php echo $row['name'];?> </option>
													
                                                   
    <?php
            endforeach;
    ?>