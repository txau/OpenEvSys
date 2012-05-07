<?php if( acl_vp_entity_add_is_allowed() ){?>
<a class="but" href="<?php echo get_url('events','add_victim',null,array('eid'=>$event_id)) ?>"><?php echo _t('ADD_VICTIM')?></a>
<?php } ?>
<br />
<br />
<?php if(!isset($vp_list)){ ?>
    <div class="notice">
    <?php echo _t('THERE_IS_NO_INFORMATION_ABOUT_VICTIMS_AND_PERPETRATORS_YET__YOU_SHOULD_ADD_SOME') ?>
    </div>
<?php }else{ ?>
<form action="<?php get_url('events','delete_act')?>" method="post">
<table class="view">
    <thead>
        <tr>
			<td width='16px'><input type='checkbox' onchange='$("input.delete_act").attr("checked",this.checked)' /></td>
            <td><?php echo _t('INITIAL_DATE') ?></td>
            <td><?php echo _t('VICTIM_NAME') ?></td>
            <td><?php echo _t('TYPE_OF_ACT') ?></td>
			<td width='16px'><input type='checkbox' onchange='$("input.delete_inv").attr("checked",this.checked)' /></td>
            <td><?php echo _t('PERPETRATOR_NAME_S_') ?></td>
            <td><?php echo _t('INVOLVEMENT') ?></td>
        </tr>
    </thead>
    <tbody>	
    <?php foreach($vp_list as $record){ 
            $class = ($act->act_record_number==$record['act_record_number'])?' active ':'';
    ?>
        <tr class='<?php echo $class ?>'>
            <?php if($skip != $record['act_record_number']){ ?>
            <?php $odd = ($i++%2==1) ? "odd " : '' ; ?>
			<td rowspan=<?php echo ($record['inv_count']==0)?1:$record['inv_count']; ?> class="<?php echo $odd.$class ?>">
                <input name="acts[]" type='checkbox' value='<?php echo $record['act_record_number'] ?>' class='delete_act'/>
            </td>
            <td rowspan=<?php echo ($record['inv_count']==0)?1:$record['inv_count']; ?> class="<?php echo $odd.$class ?>">
                <?php echo $record['initial_date'] ?>
            </td>
            <td rowspan=<?php echo ($record['inv_count']==0)?1:$record['inv_count']; ?> class="<?php echo $odd.$class ?>">
                <a href="<?php get_url('events','vp_list',null,array('act_id'=>$record['act_record_number'],'type'=>'victim')) ?>"><?php echo $record['vname']?></a>
            </td>
            <td rowspan=<?php echo ($record['inv_count']==0)?1:$record['inv_count']; ?> class="<?php echo $odd.$class ?>">
                <a href="<?php get_url('events','vp_list',null,array('act_id'=>$record['act_record_number'],'type'=>'act')) ?>"><?php echo get_mt_term($record['type_of_act'])?></a>
            </td>
            <?php
                    $skip = $record['act_record_number']; 
                } ?>
            <?php $class .= ($inv->involvement_record_number == $record['involvement_record_number'] && $record['involvement_record_number']!='')?' sub_active':''; ?>
			<td class="<?php echo $odd.$class ?>">
			<?php if($record['involvement_record_number'] != null){ ?>
                <input name="invs[]" type='checkbox' value='<?php echo $record['involvement_record_number'] ?>' class='delete_inv'/>
			<?php }else echo "&nbsp;" ?>
            </td>
            <td class="<?php echo $odd.$class ?>">
                <a href="<?php get_url('events','vp_list',null,array('inv_id'=>$record['involvement_record_number'],'type'=>'perter')) ?>"><?php echo $record['pname']?></a>
            </td>
            <td class="<?php echo $odd.$class ?>">
                <a href="<?php get_url('events','vp_list',null,array('inv_id'=>$record['involvement_record_number'],'type'=>'inv')) ?>"><?php echo get_mt_term($record['degree_of_involvement'])?></a>
            </td>			
        </tr>
    <?php } ?>
		<tr class='actions'>
            <td colspan='8'><input type='submit' name='delete' value='<?php echo _t('DELETE') ?>' /></td>
        </tr>		
    </tbody>
</table>
</form>
<?php } ?>