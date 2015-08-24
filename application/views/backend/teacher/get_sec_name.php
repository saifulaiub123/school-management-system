<option value="0"><?php echo get_phrase('select');?></option>
    <?php 
        $section = $this->db->get_where('section' , array('class_id'=>$class_id,'dep_id'=>$dep_id))->result_array();
        
        ?>
      <option value="0">No Section</option>;
        
        <?php 
        foreach($section as $row):
    ?>
        <option value="<?php echo $row['sec_id'];?>"><?php echo $row['sec_name'];?> </option>
													
                                                   
    <?php
            endforeach;
    ?>