<?php
//views/mailing_list/add_mailing_list.php
//an add form to add an item to the table
echo '<p></p>';
echo validation_errors();

?>
<h1>Add to Mailing List</h1>
<?=form_open('mailing_list/insert');?>

<?php
$first_name = array(
'name' => 'first_name',
'id' => 'first_name',
);
echo form_label('First Name','first_name') . ': ';
echo form_input($first_name);

$last_name = array(
'name' => 'last_name',
'id' => 'last_name',
);
echo form_label('Last Name','last_name') . ': ';
echo form_input($last_name) . '<br />';

$email = array(
'name' => 'email',
'id' => 'email',
);
echo form_label('Email','email') . ': ';
echo form_input($email) . '<br />';

$address = array(
'name' => 'address',
'id' => 'address',
);
echo form_label('Address','address') . ': ';
echo form_input($faddress) . '<br />';

$zip_postal = array(
'name' => 'zip_postal',
'id' => 'zip_postal',
);
echo form_label('Zip postal','zip_postal') . ': ';
echo form_input($zip_postal) . '<br />';
?>


<?=form_close('');?>