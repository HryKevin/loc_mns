brandSelect.addEventListener("change", function () {
  const brandId = brandSelect.value;

  fetch("ajax.php?ajax=json.model&brand_id=" + brandId)
    .then(response => response.json())
    .then(data => {
      modelSelect.disabled = false;
      modelSelect.innerHTML = '<option value="">Sélectionner un Modèle</option>';
      data.models.forEach(function (model) {
        const option = document.createElement("option");
        option.value = model.id;
        option.textContent = model.name;
        modelSelect.appendChild(option);
      });
    });
});
