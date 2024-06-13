<!-- MAIN -->
<div class="container-main-material">
    <!-- BARRE GRISE -->
    <div class="top-container-material"></div>
    <!-- CONTAINER GLOBAL -->
    <div class="container-material">

        <!-- DIV CARDS -->
        <div class="container-cards-category">
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

            <?php foreach ($categories as $category): ?>
                <div class="card-category">
                    <img class="img-card-allcategory" src="<?= htmlspecialchars($category['image']) ?>"
                        alt="<?= htmlspecialchars($category['name_category']) ?>">
                        <div class="handleCategory"><img src="/assets/img/pen-writing-6.svg">
                        <img src="/assets/img/trash.svg"></div>
                        

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