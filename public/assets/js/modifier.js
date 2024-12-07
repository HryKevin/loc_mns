document.addEventListener('DOMContentLoaded', function() {
  const categorySelect = document.querySelector("#category");
  const brandSelect = document.querySelector("#brand");
  const modelSelect = document.querySelector("#model");

  brandSelect.disabled = true;
  modelSelect.disabled = true;

  // Fonction pour charger les marques en fonction de la catégorie sélectionnée
  categorySelect.addEventListener("change", function () {
    const categoryId = categorySelect.value;

    if (categoryId) {
      // Active la sélection de marque et désactive la sélection de modèle
      brandSelect.disabled = false;
      modelSelect.disabled = true;
      modelSelect.innerHTML = '<option value="">Sélectionner un Modèle</option>';

      // Charge les marques pour la catégorie sélectionnée via AJAX
      fetch(`ajax.php?ajax=json.brand&categoryId=${categoryId}`)
        .then(response => response.json())
        .then(data => {
          brandSelect.innerHTML = '<option value="">Sélectionner une Marque</option>';
          data.brands.forEach(function (brand) {
            brandSelect.innerHTML += `<option value="${brand.id_brand}">${brand.name_brand}</option>`;
          });
        })
        .catch(error => console.error('Erreur lors du chargement des marques:', error));
    } else {
      // Réinitialise si aucune catégorie n'est sélectionnée
      brandSelect.disabled = true;
      modelSelect.disabled = true;
      brandSelect.innerHTML = '<option value="">Sélectionner une Marque</option>';
      modelSelect.innerHTML = '<option value="">Sélectionner un Modèle</option>';
    }
  });

  // Fonction pour charger les modèles en fonction de la marque sélectionnée
  brandSelect.addEventListener("change", function () {
    const brandId = brandSelect.value;

    if (brandId) {
      // Active la sélection de modèle
      modelSelect.disabled = false;

      // Charge les modèles pour la marque sélectionnée via AJAX
      fetch(`ajax.php?ajax=json.model&brandId=${brandId}`)
        .then(response => response.json())
        .then(data => {
          modelSelect.innerHTML = '<option value="">Sélectionner un Modèle</option>';
          data.models.forEach(function (model) {
            modelSelect.innerHTML += `<option value="${model.id_model}">${model.name_model}</option>`;
          });
        })
        .catch(error => console.error('Erreur lors du chargement des modèles:', error));
    } else {
      // Réinitialise si aucune marque n'est sélectionnée
      modelSelect.disabled = true;
      modelSelect.innerHTML = '<option value="">Sélectionner un Modèle</option>';
    }
  });
});
