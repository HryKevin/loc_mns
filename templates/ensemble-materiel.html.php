<!-- MAIN -->
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
        <button class="button-material-index" id="allMaterials">Tout le matériel</button>
        <button class="button-loan-index" id="loanMaterials">En location</button>
        <button class="button-available-index" id="availableMaterials">Disponible</button>
        <button class="button-repair-index" id="brokenMaterials">En panne</button>

      </div>
      <div class="manage-container">
        <a href="/?page=ajouter-materiel">Ajouter du matériel <img src="assets/img/circles.svg" alt="logo gérer" /></a>
      </div>
    </div>
    <!-- DIV TAB -->
    <div class="container-all-material">
      <div class="scroll-bar">
        <table id="myTable">
          <thead class="thead-background">
            <tr>
              <th>Nom</th>
              <th>Description</th>
              <th>Numéro de série</th>
              <th>Marque</th>
              <th>Dimension écran</th>
              <th>Processeur</th>
              <th>Mémoire</th>
              <th>RAM</th>
              <th>Catégorie</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($materials as $material) : ?>
              <td><?= $material['name_material'] ?></td>
              <td><?= $material['description'] ?></td>
              <td><?= $material['serial_number'] ?></td>
              <td><?= $material['name_brand'] ?></td>
              <td><?= $material['screen-size'] ?></td>
              <td><?= $material['processor']?></td>
              <td><?= $material['storage_memory']?></td>
              <td><?= $material['ram']?></td>

              <td><?= $material['name_category'] ?></td>
              <td class="flex">
                <button class="flex-button"><a href="<?= '/?page=modifier-materiel&id=' . $material['id_material'] ?>"><img class="button-crud-users" src="assets/img/pen-writing-6.svg" />
                    Modifier</a></button></li>
                <button class="flex-button"><a href="<?= '/?page=supprimer-materiel&id=' . $material['id_material'] ?>"><img class="button-crud-users" src="assets/img/trash.svg" />
                    Supprimer</a></button></li>
                    <button class="flex-button"><a href="<?= '/?page=louer-materiel&id=' . $material['id_material'] ?>"><img
                          class="button-crud-users" src="assets/img/basket-shopping.svg" />
                        Louer</a></button>

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