


<option value=""><?php echo get_phrase('select');?></option>
    <?php 

        foreach($students as $row):
    ?>
        <option value="<?php echo $row['student_id'];?>"><?php echo $row['name'];?> </option>
	                                        
    <?php
            endforeach;
    ?>