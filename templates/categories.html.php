

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
                    <div class="img-card-allcategory"></div>
                    <div class="card-body-category">
                        <h3><?= htmlspecialchars($category['name_category']) ?></h3>
                        <div class="card-button">
                            <button>
                                <a href="/?page=aff-categorie&id=<?= $category['id_category'] ?>">Voir</a>
                                <img src="assets/img/chevron-white.svg">
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>