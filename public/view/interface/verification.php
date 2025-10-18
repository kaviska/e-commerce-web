<div class="text-center mt-5">
    <div style="border-radius: 200px; height: 200px; width: 200px; background: #F8FAF5; margin: 0 auto;">
        <?php
        if (isset($_GET['status']) && $_GET['status'] === 'Success') {
            echo '  <i class="checkmark right-icon">✓</i>';
        } else {
            echo '<i class="bi bi-x-lg right-icon" style="color:red"></i>';
        }
        ?>
    </div>
    
    <h1 class="alg-text-yellow custom-h1">
        <?php
        echo isset($_GET['status']) ? htmlspecialchars($_GET['status']) : 'Unknown';
        ?>
    </h1>
    <p class="custom-p">
        <?php
        echo isset($_GET['error']) ? htmlspecialchars($_GET['error']) : '';
        ?>
    </p>
</div>
<div class="text-center mt-4">
    <a href="home">
    <button class="btn btn-primary px-5">
        <i class="bi bi-arrow-left-circle-fill arrow-icon"></i>Home
    </button>
    </a>
   
</div>
