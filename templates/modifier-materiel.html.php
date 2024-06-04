 <div class="container-main-material">
   <!-- BARRE GRISE -->
   <div class="top-container-material"> <a href="/?page=ensemble-materiel"><img src="./assets/img/arrow-return.svg"></a> <div class="top-txt-container-material"><a href="/?page=materiels">Matériels </a> / <a href="/?page=ensemble-materiel"> Tous les équipements </a>/ Modifier un matériel</div></div>
   <!-- CONTAINER GLOBAL -->
   <div class="container-material">
     <div class="flex-container">

       <div class="container-form-inscription">
         <form class="form-update-materiel" method="POST">
           <div>
             <label for="name_material">Nom :</label>
             <input type="text" name="material[name_material]" id="lastname_update" value="<?= $material['name_material'] ?>" placeholder="Nom" required>
             <!--Message d'erreur -->
             <?php if (isset($errors) && !empty($errors['material']['name_material'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['name_material'] ?>
               </div>
             <?php endif; ?>
           </div>
           <div>
             <label for="description">Description :</label>
             <input type="text" name="material[description]" id="firstname_update" value="<?= $material['description'] ?>" placeholder="Description" required>
             <?php if (isset($errors) && !empty($errors['material']['description'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['description'] ?>
               </div>
             <?php endif; ?>
           </div>
           <div>
             <label for="serial_number">Numéro de série:</label>
             <input type="text" name="material[serial_number]" id="serialNumber" value="<?= $material['serial_number'] ?>" placeholder="Numéro de série" required>
             <?php if (isset($errors) && !empty($errors['material']['serial_number'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['serial_number'] ?>
               </div>
             <?php endif; ?>
           </div>


           <div>
             <label for="date_purchase">Date achat :</label>
             <input type="date" name="material[date_purchase]" id="datePurchase" value="<?= $material['date_purchase'] ?>" placeholder="Date d'achat" required>
             <?php if (isset($errors) && !empty($errors['material']['date_purchase'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['date_purchase'] ?>
               </div>
             <?php endif; ?>
           </div>

           <div>
             <label for="date_purchase">Date achat :</label>
             <input type="date" name="material[date_purchase]" id="datePurchase" value="<?= $material['date_purchase'] ?>" placeholder="Date d'achat" required>
             <?php if (isset($errors) && !empty($errors['material']['date_purchase'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['date_purchase'] ?>
               </div>
             <?php endif; ?>
           </div>
           <div class="submit-inscription">
             <input type="submit" name="submit" value="Modifier">
             <?php if (isset($success) && !empty($success)) : ?>
               <div class="success-inscr">
                 <?= $success ?>
               </div>
             <?php endif; ?>
           </div>

         </form>
       </div>
       <div > <img src="./assets/img/update-material.svg" alt=""></div>
     </div>
   </div>
 </div>