<?php

require_once('../config.php');
require_once('../libs/Form.php');
require_once('../libs/Form/Val.php');
require_once('../libs/Model.php');
require_once('../libs/Database.php');

if(isset($_REQUEST['run'])) {
    try {
        $form = new Form();

$form   ->post('name')
        //->val('minlength',5)

        ->post('age')
        //->val('digit')

        ->post('gender');

        $form->submit();
        echo "Form has passed!";

        $data=$form->fetch();

        $new = new Model();
        $new->insert('person',$data);

    } catch(Exception $e) {
        echo $e->getMessage();
    }
}
?>
<form action="?run" method="post">
    Name<input type="text" name="name" id="name"><br>
    Age<input type="text" name="age" id="age"><br>
        Gender<select name="gender" id="gender">
        <option value="m">Male</option>
        <option value="f">Female</option>
        </select>
    <input type="submit">
</form>