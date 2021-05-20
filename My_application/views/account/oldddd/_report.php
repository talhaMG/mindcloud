<div class="form-body">
<!-- 
    <div class="row">
        <a class='btn btn-primary pull-left' href="<?=la('course_quiz/add/?course_id='.$form_data['course']['course_id'])?>" style='margin-bottom: 10px;'>Add new Question</a>

        <a class='btn btn-danger pull-right' id='course_question_delete' data-course_id='<?=$form_data['course']['course_id']?>' style='margin-bottom: 10px;'>Delete All Question</a>
    </div>
 -->
<table id="example" class="table table-striped table-bordered table-hover dataTable no-footer" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>S#</th>
            <th>Order ID</th>
            <th>Course Name</th>
            <th>Total Marks</th>
            <th>Obtained Marks</th>
            <th>Average</th>
            <th>Grade</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $i=1;
        if(isset($this->_list_data['courses']) AND array_filled($this->_list_data['courses'])) : 
            foreach($this->_list_data['courses'] as $key=>$value) :
                if(isset($value) AND array_filled($value)) : 
                    foreach($value as $k2=>$v2) :
        ?>
        <tr id='row-<?=$k2?>'>
            <td><?=$i?></td>
            <td>#INV-000<?=$v2['item_order_id']?></td>
            <td><?=$v2['course_name']?></td>
            <td><?=$v2['item_total_marks']?></td>
            <td><?=$v2['item_obtained_marks']?></td>
            <td><?=$v2['item_avg']?>%</td>
            <td><?=(empty($v2['item_grade']) ? '-' : $v2['item_grade'])?></td>
           
        </tr>
        <? 
                    $i++;
                    endforeach;
                endif;
            endforeach;
        endif;
        ?>

    </tbody>
</table>

</div>