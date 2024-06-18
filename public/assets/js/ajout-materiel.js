
const categorySelect = document.querySelector("#category");
const brandSelect = document.querySelector("#brand");
const modelSelect = document.querySelector("#model");
  
brandSelect.disabled = true;
modelSelect.disabled = true;

  categorySelect.addEventListener("change", function () {
    const categoryId = categorySelect.value;
    
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

