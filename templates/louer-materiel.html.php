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
                        <label for="id_localisation">Localisation :</label>
                        <select name="loan[id_localisation]" id="id_localisation" required>
                            <!-- Remplir les options depuis la base de données -->
                            <?php
                            $locations = $dbh->query("SELECT * FROM localisation")->fetchAll();
                            foreach ($locations as $location) {
                                echo "<option value=\"{$location['id_localisation']}\">{$location['name_localisation']}</option>";
                            }
                            ?>
                        </select>
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
            </div>
        </div>
    </div>
</div>
