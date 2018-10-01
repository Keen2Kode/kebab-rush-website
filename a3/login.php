<?php require_once("tools.php"); ?>

<?php top_module() ?>

    <main>
        <div class="login">
            <div class="img">
            <ul class="content">
                <li class="details">
                    <p>Login</p>
                    <form action="https://titan.csit.rmit.edu.au/~e54061/wp/processing.php" onsubmit="return formValidate();" method="post" target="_blank">
                        <input type="text" name="email" id="email" class="username info form" placeholder="Enter Username">
                        <span class="emailError"></span>
                        <input type="password" name="password" id="password" class="password info form" placeholder="Enter Password">
                        <span class="passwordError"></span>
                        <input type="submit" class="submit form" value="">
                    </form>
                </li>
                <li class="text">Join the<br>Kebab<br>Family?</li>
            </ul>
        </div>
    </main>

<?php end_module(); ?>