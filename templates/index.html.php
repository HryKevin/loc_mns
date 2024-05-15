

<!-- MAIN -->
    <div class="container-main-index">
      <!-- HAUT DU MAIN -->
      <div class="top-main-index">
        <div class="container-material-index">

          <!-- CONTAINER EQUIPEMENTS -->

          <div class="title-material-index">
            <h2>Equipements</h2>
            <a href="/">Voir plus<img src="assets/img/chevron-down-orange.svg"> </a>
          </div>
          <div><button class="button-material-index">Tout le matériel</button>
            <button class="button-loan-index">En location</button>
            <button class="button-available-index">Disponible</button>
            <button class="button-repair-index">En réparation</button>
          </div>
          <!-- TABLEAU -->
          <div class="scroll-bar">
            <table>
              <thead>
                <tr>
                  <th>Nom</th>
                  <th>Description</th>
                  <th>Numéro de série</th>
                  <th>Date achat</th>
                  <th>Marque</th>
                  <th>Catégorie</th>
                </tr>
              </thead>
              <tbody>
               
                <?php foreach($materials as $material):?>
                <tr>
                  <td><?= $material['name_material'] ?></td>
                  <td><?= $material['description'] ?></td>
                  <td><?= $material['serial_number'] ?></td>
                  <td><?= $material['date_purchase'] ?></td>
                  <td><?= $material['name_brand'] ?></td>
                  <td><?= $material['name_category'] ?></td>
                </tr>
                <?php endforeach; ?>
            </table>
          </div>
        </div>
        <!-- CONTAINER VUE D'ENSEMBLE -->
        <div class="container-overview-index">
          <h2>Vue d’ensemble du parc</h2>
          <div class="roundTest"></div>
        </div>
      </div>
      <!-- BAS DU MAIN -->
      <div class="bottom-main-index">
        <!-- BLOCS  GAUCHE -->
     
          <!-- DEMANDE DE LOCATION -->   
          <div class="request-rental">
          <div class="title-flex-index">
            <h2>Demandes de location</h2>
            <a href="/">Voir plus<img src="assets/img/chevron-down-orange.svg"> </a>
          </div>
          <!-- TABLEAU -->
          <div class="scroll-bar">
            <table>
              <thead>
                <tr>
                  <th>Utilisateur</th>
                  <th>Statut</th>
                  <th>Dates</th>
                  <th>Materiel</th>
                  <th>Catégorie</th>
                  <th>Reçu le</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Nom 1</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 1</td>
                  <td>Catégorie 1</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 2</td>
                  <td>Intervenant</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 2</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 3</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 3</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 4</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 4</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- DEMANDE DE RETOUR -->
        <div class="request-return">
          <div class="title-flex-index">
            <h2>Demande de retour</h2>
            <a href="/">Voir plus<img src="assets/img/chevron-down-orange.svg"> </a>
          </div>
          <div class="scroll-bar">
            <table>
              <thead>
                <tr>
                  <th>Utilisateur</th>
                  <th>Statut</th>
                  <th>Dates</th>
                  <th>Materiel</th>
                  <th>Catégorie</th>
                  <th>Reçu le</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Nom 1</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 1</td>
                  <td>Catégorie 1</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 2</td>
                  <td>Intervenant</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 2</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 3</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 3</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 4</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
                <tr>
                  <td>Nom 4</td>
                  <td>Eleve</td>
                  <td>22/22/20224 - 22/22/2222</td>
                  <td>Marque 3</td>
                  <td>Catégorie 2</td>
                  <td>26/02/2024</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


  </div>
</div>