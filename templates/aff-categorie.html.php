<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-materials">
        <div class="top-container-materials"></div>
        <div class="container-materials">
            <div class="handle-materials">
                <div class="filters">
                    <a href="/?page=categories"><button class="button-material-index button-materials">Toutes les
                            catégories</button></a>
                    <!-- Ajoutez d'autres filtres si nécessaire -->
                </div>
                <div class="add-materials">
                    <a href="/?page=ajouter-materiel">Ajouter un nouveau matériel&nbsp;<img src="assets/img/circles.svg"
                            alt="logo gérer" /></a>
                </div>
            </div>
            <div class="container-table-materials scroll-bar">
                <table class="show_materials" id="tableMaterials">
                    <thead>
                        <tr>
                            <th>Nom du matériel</th>
                            <th>Description</th>
                            <th>Numéro de série</th>
                            <th>Date d'achat</th>
                            <th>Taille d'écran</th>
                            <th>Processeur</th>
                            <th>Stockage</th>
                            <th>RAM</th>
                            <th>Modèle</th>
                            <th>Marque</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($materials as $material): ?>
                            <tr>
                                <td><?= htmlspecialchars($material['name_material'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['description'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['serial_number'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['date_purchase'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['screen-size'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['processor'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['storage_memory'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['ram'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['name_model'] ?? '') ?></td>
                                <td><?= htmlspecialchars($material['name_brand'] ?? '') ?></td>
                                <td>
                                    <ul>
                                        <li><button><a
                                                    href="<?= '/?page=modifier-materiel&id=' . htmlspecialchars($material['id_material']) ?>"><img
                                                        class="button-crud-materials" src="assets/img/pen-writing-6.svg" />
                                                    Modifier</a></button></li>
                                        <li><button><a
                                                    href="<?= '/?page=supprimer-materiel&id=' . htmlspecialchars($material['id_material']) ?>"><img
                                                        class="button-crud-materials" src="assets/img/trash.svg" />
                                                    Supprimer</a></button></li>
                                    </ul>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <!-- Pagination -->
            <div class="pagination" id="pagination">
                <nav aria-label="Page navigation">
                    <ul class="pagination justify-content-center">
                        <!-- Bouton pour revenir à la première page -->
                        <li class="page-item first-page">
                            <a class="page-link"
                                href="<?= '/?page=materiel&id=' . htmlspecialchars($idCategory) . '&pagination=1' ?>"
                                aria-label="First">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <!-- Bouton pour revenir à la page précédente -->
                        <li class="page-item previous-page">
                            <a class="page-link"
                                href="<?= '/?page=materiel&id=' . htmlspecialchars($idCategory) . '&pagination=' . ($currentPage - 1) ?>"
                                aria-label="Previous">
                                <span aria-hidden="true">&lt;</span>
                            </a>
                        </li>
                        <?php
                        // Générer les liens de pagination
                        for ($i = 1; $i <= $nbPages; $i++) {
                            $paginationURL = '/?page=materiel&id=' . htmlspecialchars($idCategory) . '&pagination=' . $i;
                            ?>
                            <li class="page-item <?= $i == $currentPage ? 'active' : '' ?>">
                                <a class="page-link" href="<?= $paginationURL ?>"><?= $i ?></a>
                            </li>
                        <?php } ?>
                        <!-- Bouton pour avancer d'une page -->
                        <li class="page-item next-page">
                            <a class="page-link"
                                href="<?= '/?page=materiel&id=' . htmlspecialchars($idCategory) . '&pagination=' . ($currentPage + 1) ?>"
                                aria-label="Next">
                                <span aria-hidden="true">&gt;</span>
                            </a>
                        </li>
                        <!-- Bouton pour aller à la dernière page -->
                        <li class="page-item last-page">
                            <a class="page-link"
                                href="<?= '/?page=materiel&id=' . htmlspecialchars($idCategory) . '&pagination=' . $nbPages ?>"
                                aria-label="Last">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<script src="./assets/js/utilisateurs.js"></script>
<script src="./assets/js/main.js"></script>