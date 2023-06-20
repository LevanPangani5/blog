<?php 
   include 'partials/header.php';
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Add User</h2>
        <div class="alert__message error">
            <p>This is an Error message</p>
        </div>
        <form action="">
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" placeholder="First Name">
                <input type="text" name="" placeholder="Last Name">
                <input type="email" name="" placeholder="Email">
                <input type="password" name="" placeholder="Create Password">
                <input type="password" name="" placeholder="Confirm Password">
                <select>
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
                <div class="form__control">
                    <label for="avatar">User avatar</label>
                    <input type="file" name="" id="avatar">
                </div>
            
            <button type="submit" class="btn">Add User</button>
        </form>
    </div>
</section>

<?php 
   include '../partials/footer.php';
?>
