<?php
//hämta användarens profilinformation från databasen och lagra det i variabeln $user
 include "get_profile.php"; ?>
<!-- formuläret för att uppdatrea användarens profil -->
<form action="index.php" method="POST">
    Real Name:<input type="text" name="realname"
    value="<?php echo $user['realname']; ?>">
    Email:<input type="email" name="email"
    value="<?php echo $user['email']; ?>">
   Location: <input type="text" name="location"
    value="<?php echo $user['location']; ?>">
   Bio: <textarea name="bio"><?php echo $user['bio']; ?></textarea>
     <!-- ändra lönen här, max 10 siffror -->
   Salary: <input type="text"
    name="salary"
    value="<?php echo $user['salary']; ?>"
    pattern="[0-9]{1,10}"
    maxlength="10">

    Preference:<select name="preference"> <!-- dropdown för preferens -->

    <option value="1" <?php if($user['preference']==1) echo "selected"; ?>>Man</option>
    <option value="2" <?php if($user['preference']==2) echo "selected"; ?>>Woman</option>
    <option value="3" <?php if($user['preference']==3) echo "selected"; ?>>Both</option>
    <option value="4" <?php if($user['preference']==4) echo "selected"; ?>>Other</option>
    <option value="5" <?php if($user['preference']==5) echo "selected"; ?>>All</option>

</select>

<!-- knappen för att skicka formuläret och uppdatera profilen -->
<input type="submit" name="update_profile" value="Update Profile">

</form>


<!--hanterar uppdateringen av profilen när formuläret skickas-->
<?php include "update_profile.php"; ?>