<!-- MAIN -->
<div class="container-main-index">
    <div class="container-main-add-users">
        <div class="top-container-add-users"></div>
        <div class="container-add-users">
            <div class="container-form-inscription">
                <form class="form-inscription" method="POST" action="">
                    <div>
                        <label for="name_material">Nom du matériel :</label>
                        <input type="text" name="material[name_material]" id="name_material" value="<?= htmlspecialchars($material['name_material'] ?? '') ?>" placeholder="Nom du matériel" readonly>
                    </div>
                    <div>
                        <label for="description">Description :</label>
                        <input type="text" name="material[description]" id="description" value="<?= htmlspecialchars($material['description'] ?? '') ?>" placeholder="Description du matériel" readonly>
                    </div>
                    <div>
                        <label for="serial_number">Numéro de série :</label>
                        <input type="text" name="material[serial_number]" id="serial_number" value="<?= htmlspecialchars($material['serial_number'] ?? '') ?>" placeholder="Numéro de série" readonly>
                    </div>
                    <div>
                        <label for="start_date">Date de début :</label>
                        <input type="date" name="loan[start_date]" id="start_date" required>
                    </div>
                    <div>
                        <label for="end_date">Date de fin :</label>
                        <input type="date" name="loan[end_date]" id="end_date" required>
                    </div>
                    <div>
                        <label for="name_localisation">Localisation :</label>
                        <input type="text" name="loan[name_localisation]" id="localisation" required>
                    </div>
                    <div>
                        <label for="comments">Commentaires :</label>
                        <textarea name="loan[comments]" id="comments" placeholder="Ajouter des commentaires (facultatif)"></textarea>
                    </div>
                    <div class="submit-inscription">
                        <input type="hidden" name="loan[id_materiel]" value="<?= htmlspecialchars($_GET['id'] ?? '') ?>">
                        <input type="submit" name="submit" value="Louer">
                    </div>
                </form>

                <!-- Affichage des périodes de location déjà réservées -->
                <?php if (!empty($periods)) : ?>
                    <div class="existing-periods">
                        <h3>Périodes de location déjà réservées :</h3>
                        <ul>
                            <?php foreach ($periods as $period) : ?>
                                <li>Du <?= htmlspecialchars(date('d/m/Y', strtotime($period['date_loan']))) ?> 
                                    au <?= htmlspecialchars(date('d/m/Y', strtotime($period['date_return']))) ?>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
