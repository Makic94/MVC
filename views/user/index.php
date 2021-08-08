<h1>User</h1>

<form method="post" action="<?php echo URL; ?>user/create">
<label>Login</label><input type="text" name="login" id="login"><br>
<label>Password</label><input type="text" name="password" id="password"><br>
<label>Role</label>
        <select id="role" name="role">
            <option value="default">Default</option>
            <option value="admin">Admin</option>
        </select><br>
<label>&nbsp</label><input type="submit">

</form>
<hr>
<table>
<?php
foreach($this->userList as $key=>$value)
    {
        echo "<tr>";
        echo "<td>".$value['userid']."</td>";
        echo "<td>".$value['login']."</td>";
        echo "<td>".$value['role']."</td>";
        echo "<td><a href='".URL."user/edit/".$value['userid']."'>Edit</a> <a href='".URL."user/delete/".$value['userid']."'>Delete</a></td>";
        echo "</tr>";
    }
?>
</table>