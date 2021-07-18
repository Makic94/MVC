<?php

require_once('../libs/Form.php');

if(isset($_REQUEST['run'])) {
$form = new Form();

$form   ->post('name')
        ->post('age')
        ->post('gender');

$a = $form->fetch();
$b = $form->fetch('age');

print_r($a);
echo $b;
}
?>
<form action="?run" method="post">
    Name<input type="text" name="name"><br>
    Age<input type="text" name="age"><br>
        Gender<select name="gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
        </select>
    <input type="submit">
</form>