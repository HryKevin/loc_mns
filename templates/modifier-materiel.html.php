 <div class="container-main-material">
   <!-- BARRE GRISE -->
   <div class="top-container-material"> <a href="/?page=ensemble-materiel"><img src="./assets/img/arrow-return.svg"></a>
     <div class="top-txt-container-material"><a href="/?page=materiels">Matériels </a> / <a href="/?page=ensemble-materiel"> Tous les équipements </a>/ Modifier un matériel</div>
   </div>
   <!-- CONTAINER GLOBAL -->
   <div class="container-material">
     <div class="flex-container">

       <div class="container-form-inscription">
         <form class="form-update-materiel" method="POST">

           <div>

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

             <div class="flex">
               <label for="description">Description :</label>
               <textarea class="border-none" name="material[description]" id="firstname_update" placeholder="Description" rows="5" cols="40" required><?= $material['description'] ?></textarea>
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
               <label for="name_brand">Marque :</label>
               <input type="text" name="material[name_brand]" id="datePurchase" value="<?= $material['name_brand'] ?>" placeholder="Date d'achat" >
               <?php if (isset($errors) && !empty($errors['material']['name_brand'])) : ?>
                 <div class="errors-inscr">
                   <?= $errors['material']['name_brand'] ?>
                 </div>
               <?php endif; ?>
             </div>

             <div>
               <label for="date_purchase">Dimension :</label>
               <input type="text" name="material[screen_size]" id="datePurchase" value="<?= $material['screen_size'] ?>" placeholder="Date d'achat" required>
               <?php if (isset($errors) && !empty($errors['material']['screen_size'])) : ?>
                 <div class="errors-inscr">
                   <?= $errors['material']['screen_size'] ?>
                 </div>
               <?php endif; ?>
             </div>

             <label for="name_category">Catégorie :</label>
             <input type="text" name="material[name_category]" id="datePurchase" value="<?= $material['name_category'] ?>" placeholder="Date d'achat" required>
             <?php if (isset($errors) && !empty($errors['material']['name_category'])) : ?>
               <div class="errors-inscr">
                 <?= $errors['material']['name_category'] ?>
               </div>
             <?php endif; ?>
           </div>

           <?php if ($material['name_category'] === 'Laptop' || $material['name_category'] === 'Tablette') : ?>

             <div>
               <label for="processor">Processeur :</label>
               <input type="text" name="material[processor]" id="datePurchase" value="<?= $material['processor'] ?>" placeholder="Date d'achat" required>
               <?php if (isset($errors) && !empty($errors['material']['processor'])) : ?>
                 <div class="errors-inscr">
                   <?= $errors['material']['processor'] ?>
                 </div>
               <?php endif; ?>
             </div>

             <div>
               <label for="storage_memory">Mémoire :</label>
               <input type="text" name="material[storage_memory]" id="datePurchase" value="<?= $material['storage_memory'] ?>" placeholder="Date d'achat" required>
               <?php if (isset($errors) && !empty($errors['material']['storage_memory'])) : ?>
                 <div class="errors-inscr">
                   <?= $errors['material']['storage_memory'] ?>
                 </div>
               <?php endif; ?>
             </div>

             <div>
               <label for="ram">RAM :</label>
               <input type="text" name="material[ram]" id="datePurchase" value="<?= $material['ram'] ?>" placeholder="Date d'achat" required>
               <?php if (isset($errors) && !empty($errors['material']['ram'])) : ?>
                 <div class="errors-inscr">
                   <?= $errors['material']['ram'] ?>
                 </div>
               <?php endif; ?>
             </div>
           <?php endif; ?>

           <div>
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
     </div>
     <div class="img-div"> <img src="./assets/img/update-material.svg" alt=""></div>
   </div>
 </div>
 </div>
