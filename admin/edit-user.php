<?php 
   include 'partials/header.php';
?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Edit User</h2>
        
        <form action="">
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" placeholder="First Name">
                <input type="text" name="" placeholder="Last Name">
                <select>
                    <option value="0">Author</option>
                    <option value="1">Admin</option>
                </select>
               <button type="submit" class="btn">Update User</button>
        </form>
    </div>
</section>

<?php 
   include '../partials/footer.php';
?>