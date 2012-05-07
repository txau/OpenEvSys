<?php global $conf; 
    $username = $user->getUserName();
?>
<h2><?php echo _t('EDIT_USER') . " : <span class='red'> $username </span>" ?></h2>
<br />
<div class="card_list">
    <a class="active" href="<?php get_url('admin','edit_user',null, array('uid'=>$username ) );?> " ><?php echo _t('EDIT_PROFILE') ?></a>
    <a href="<?php get_url('admin','edit_password',null, array('uid'=>$username ) );?> " ><?php echo _t('CHANGE_PASSWORD') ?></a>
</div> 
<div class='panel'>
<?php $fields = shn_form_get_html_fields($user_form);?>
<div class="form-container"> 
<form action='<?php echo get_url('admin','edit_user')?>' method='post'>
        <?php  echo $fields['username']  ?>
        <?php  echo $fields['first_name']  ?>
        <?php  echo $fields['last_name']  ?>
        <?php  echo $fields['organization']  ?>
        <?php  echo $fields['designation']  ?>
        <?php  echo $fields['email']  ?>
        <?php  echo $fields['address']  ?>
        <?php  echo $fields['role']  ?>
        <?php  echo $fields['status']  ?>      
              
 
        <?php  echo $fields['save']  ?>
        <a class="but" href="<?php get_url('admin','user_management' ) ?> " ><?php echo _t('CANCEL') ?></a>
</form>
</div>
</div>
