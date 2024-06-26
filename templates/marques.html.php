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
                        <h3>Nouvelle marque</h3>
                        <div class="card-button">
                            <a href="/?page=ajouter-categorie">
                                <button>
                                    Ajouter une marque
                                    <img src="assets/img/chevron-white.svg">
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <?php foreach ($brands as $brand): ?>
                <div class="card-category">
                    <img class="img-card-allcategory" src="<?= htmlspecialchars($brand['image']) ?>"
                        alt="<?= htmlspecialchars($brand['name_brand']) ?>">
                    <?php if (isset($_SESSION['user_id']) && $userRole === 'Admin'): ?>
                        <div class="handleCategory"><a href="/?page=modifier-marque&id=<?= $brand['id_brand'] ?>"><img
                                    src="/assets/img/pen-writing-6.svg"></a>
                            <img src="/assets/img/trash.svg">
                        </div>
                    <?php endif; ?>


                    <div class="card-body-category">
                        <h3><?= htmlspecialchars($brand['name_brand']) ?></h3>
                        <div class="card-button">
                            <a href="/?page=aff-marque&id=<?= $brand['id_brand'] ?>">
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