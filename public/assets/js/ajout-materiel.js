
const categorySelect = document.querySelector("#category");
const brandSelect = document.querySelector("#brand");
const modelSelect = document.querySelector("#model");
const processorField = document.querySelector("#processor").closest('div');
const storageMemoryField = document.querySelector("#storageMemory").closest('div');
const ramField = document.querySelector("#ram").closest('div');

brandSelect.disabled = true;
modelSelect.disabled = true;
  // Fonction pour afficher/masquer les champs
  function toggleFields(category) {
    if (category === "Laptop" || category === "Tablette") {
        processorField.style.display = "";
        storageMemoryField.style.display = "";
        ramField.style.display = "";
    } else {
        processorField.style.display = "none";
        storageMemoryField.style.display = "none";
        ramField.style.display = "none";
    }
}

toggleFields("");


  categorySelect.addEventListener("change", function () {
    const categoryId = categorySelect.value;
       // Récupérer le nom de la catégorie sélectionnée
       const selectedCategory = categorySelect.options[categorySelect.selectedIndex].text;

       // Afficher ou masquer les champs en fonction de la catégorie
       toggleFields(selectedCategory);
    if (categoryId) {
      console.log(categoryId);
      // Active la sélection de marque et désactiver la sélection de modèle
      brandSelect.disabled = false;
      modelSelect.disabled = true;
      modelSelect.innerHTML =
        '<option value="">Sélectionner un Modèle</option>';

      // Charge les marques pour la catégorie sélectionnée
      fetch("ajax.php?ajax=json.brand&categoryId="+ categoryId)
        .then((response) => response.json())
        .then((data) => {
          console.log(data);
          brandSelect.innerHTML =
            '<option value="">Sélectionner une Marque</option>';
          data.brands.forEach(function (brand) {
            brandSelect.innerHTML +=
              '<option value="' +
              brand.id_brand +
              '">' +
              brand.name_brand +
              "</option>";
          });
        });
    } else {
      // Désactive les sélections de marque et de modèle
      brandSelect.disabled = true;
      modelSelect.disabled = true;
      brandSelect.innerHTML =
        '<option value="">Sélectionner une Marque</option>';
      modelSelect.innerHTML =
        '<option value="">Sélectionner un Modèle</option>';
    }
  });

  brandSelect.addEventListener("change", function () {
    const brandId = brandSelect.value;

    if (brandId) {
      // Active la sélection de modèle
      modelSelect.disabled = false;

      // Charge les modèles pour la marque sélectionnée
      fetch("ajax.php?ajax=json.model&brandId="+ brandId)
        .then((response) => response.json())
        .then((data) => {
          modelSelect.innerHTML =
            '<option value="">Sélectionner un Modèle</option>';
          data.models.forEach(function (model) {
            modelSelect.innerHTML +=
              '<option value="' +
              model.id_model +
              '">' +
              model.name_model +
              "</option>";
          });
        });
    } else {
      // Désactive la sélection de modèle
      modelSelect.disabled = true;
      modelSelect.innerHTML =
        '<option value="">Sélectionner un Modèle</option>';
    }
  });

