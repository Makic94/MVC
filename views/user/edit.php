<h1>User Edit</h1>

<?php 
var_dump($this->user);
?>
<form method="post" action="<?php echo URL; ?>user/editSave/<?php echo $this->user[0]['userid']; ?>">
<label>Login</label><input type="text" name="login" id="login" value="<?php echo $this->user[0]['login'];?>"><br>
<label>Password</label><input type="text" name="password" id="password"><br>
<label>Role</label>
        <select id="role" name="role">
            <option value="default" <?php if($this->user[0]['role']=='default') echo 'selected';?>>Default</option>
            <option value="admin" <?php if($this->user[0]['role']=='admin') echo 'selected';?>>Admin</option>
        </select><br>
<label>&nbsp</label><input type="submit">

</form>