<!-- MAIN -->
<div class="container-main-material">
    <!-- BARRE GRISE -->
    <div class="top-container-material"></div>
    <!-- CONTAINER GLOBAL -->
    <div class="container-material">

        <!-- DIV CARDS -->
        <div class="container-cards-category">
            <?php if (isset($_SESSION['user_id']) && $userRole === 'Admin'): ?>
            <div class="card-category">
                <img class="img-card-allcategory" src="/assets/img/add.png" alt="Nouvelle catégorie">
                <div class="card-body-category">
                    <h3>Nouvelle catégorie</h3>
                    <div class="card-button">
                        <a href="/?page=ajouter-categorie">
                            <button>
                                Ajouter une catégorie
                                <img src="assets/img/chevron-white.svg">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>

            <?php foreach ($categories as $category): ?>
                <div class="card-category">
                    <img class="img-card-allcategory" src="<?= htmlspecialchars($category['image']) ?>"
                        alt="<?= htmlspecialchars($category['name_category']) ?>">
                        <?php if (isset($_SESSION['user_id']) && $userRole === 'Admin' ): ?>
                        <div class="handleCategory"><a href="/?page=modifier-categorie&id=<?= $category['id_category']  ?>"><img src="/assets/img/pen-writing-6.svg"></a>
                        <img src="/assets/img/trash.svg"></div>
                        <?php endif;?>
                        

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