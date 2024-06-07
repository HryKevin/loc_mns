

<!-- MAIN -->
<div class="container-main-material">
    <!-- BARRE GRISE -->
    <div class="top-container-material"></div>
    <!-- CONTAINER GLOBAL -->
    <div class="container-material">
        <!-- GERER -->
        <div class="manage-container"><a href="/">Gérer <img src="assets/img/circles.svg" alt="logo gérer" /></a></div>
        <!-- DIV CARDS -->
        <div class="container-cards-category">
            <?php foreach ($categories as $category): ?>
                <div class="card-category">
                        <img class="img-card-allcategory" src="<?= htmlspecialchars($category['image']) ?>"
                            alt="<?= htmlspecialchars($category['name_category']) ?>">
                    
                    <div class="card-body-category">
                        <h3><?= htmlspecialchars($category['name_category']) ?></h3>
                        <div class="card-button">
                            <a href="/?page=aff-categorie&id=<?= $category['id_category'] ?>">
                            <button>
                                Voir
                                <img src="assets/img/chevron-white.svg">
                            </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>