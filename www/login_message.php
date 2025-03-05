<main>
    <div class="container">
        <h4>
            <?php
            if (isset($_GET['message'])) {
                $message = $_GET['message'];
                switch ($message) {
                    case 'wrongpassword':
                        echo '<p class="error">Incorrect password. Please try again.</p>';
                        break;
                    case 'emptyfields':
                        echo '<p class="error">Please fill in all fields.</p>';
                        break;
                    case 'usernotfound':
                        echo '<p class="error">User not found. Please check your email.</p>';
                        break;
                    case 'notsubmitted':
                        echo '<p class="error">Form not submitted. Please try again.</p>';
                        break;
                    default:
                        echo '<p class="error">An unknown error occurred. Please try again.</p>';
                        break;
                }
            }
            ?>
        </h4>
    </div>
</main>