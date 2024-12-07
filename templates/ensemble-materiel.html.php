<!DOCTYPE html>
    <div class="container-main-material">
        <!-- BARRE GRISE -->
        <div class="top-container-material">
            <a href="/?page=materiels"><img src="./assets/img/arrow-return.svg"></a>
            <div class="top-txt-container">
                <a href="/?page=materiels">Matériels </a> / Tous les équipements
            </div>
        </div>
        <!-- CONTAINER GLOBAL -->
        <div class="container-material">
            <!-- GERER -->
            <div>
                <div class="buttons-filter-material">
                    <?php if ($user_role_id == 1) : ?>
                        <button class="button-material-index" id="allMaterials">Tout le matériel</button>
                        <button class="button-loan-index" id="loanMaterials">En location</button>
                        <button class="button-available-index" id="availableMaterials">Disponible</button>
                        <button class="button-repair-index" id="brokenMaterials">En panne</button>
                        <div class="manage-container">
                            <a href="/?page=ajouter-materiel">Ajouter un matériel <img src="assets/img/circles.svg" alt="logo gérer" /></a>
                            <a href="/?page=ajouter-materiels">Ajouter plusieurs matériels <img src="assets/img/circles.svg" alt="logo gérer" /></a>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- DIV TAB -->
            <div class="container-all-material">
                <div class="scroll-bar">
                    <table id="myTable">
                        <thead class="thead-background">
                            <tr>
                                <th>Nom</th>
                                <th></th>
                                <th>Description</th>
                                <?php if ($user_role_id == 1) : ?>
                                    <th>Numéro de série</th>
                                    <th>Marque</th>
                                    <th>Dimension</th>
                                    <th>Processeur</th>
                                    <th>Mémoire</th>
                                    <th>RAM</th>
                                    <th>Catégorie</th>
                                <?php endif; ?>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($materials as $material) : ?>
                                <tr>
                                    <td><?= $material['name_material'] ?></td>
                                    <td><img width="40px" src="<?= $material['image'] ?>"></td>
                                    <td><?= $material['description'] ?></td>
                                    <?php if ($user_role_id == 1) : ?>
                                        <td><?= $material['serial_number'] ?></td>
                                        <td><?= $material['name_brand'] ?></td>
                                        <td><?= $material['screen_size'] ?></td>
                                        <td><?= $material['processor'] ?></td>
                                        <td><?= $material['storage_memory'] ?></td>
                                        <td><?= $material['ram'] ?></td>
                                        <td><?= $material['name_category'] ?></td>
                                    <?php endif; ?>
                                    <td class="flex">
                                        <!-- Boutons pour l'administrateur -->
                                        <?php if ($user_role_id == 1) : ?>
                                            <button class="flex-button">
                                                <a href="<?= '/?page=modifier-materiel&id=' . $material['id_material'] ?>">
                                                    <img class="button-crud-users" src="assets/img/pen-writing-6.svg" /> Modifier
                                                </a>
                                            </button>
                                            <button class="flex-button">
                                                <a href="<?= '/?page=supprimer-materiel&id=' . $material['id_material'] ?>">
                                                    <img class="button-crud-users" src="assets/img/trash.svg" /> Supprimer
                                                </a>
                                            </button>
                                        <?php endif; ?>
                                        
                                        <!-- Bouton Louer affiché uniquement si le matériel est disponible pour la location -->    
                                        <?php if (isAvailableForRent($material)) : ?>
                                            <button class="flex-button">
                                                <a href="<?= '/?page=louer-materiel&id=' . $material['id_material'] ?>">
                                                    <img class="button-crud-users" src="assets/img/basket.png" /> Louer
                                                </a>
                                            </button>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/materiel.js"></script>