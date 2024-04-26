async function searchCampaigns() {
  const searchInput = document.getElementById("search");
  const s = searchInput.value;

  const sortInput = document.getElementById("sort");
  const sort = sortInput.value;

  const orderInput = document.getElementById("order");
  const order = orderInput.value;

  const res = await fetch(
    "workshop_search.php" + "?search=" + s + "&sort=" + sort + "&order=" + order
  );
  const data = await res.text();

  const campaigns = JSON.parse(data);

  let html;

  for (let i = 0; i < campaigns.length; i++) {
    const campaign = campaigns[i];
    html += '<div class="card" style="width: 18rem; height:fit-content">';
    html += `<img src="/image/campagnes/${campaign.logo}" class="card-img-top" alt="Image de couverture" style="height:11rem" />`;
    html += '<div class="card-body">';
    html += `<h5 class="card-title">${campaign.nom}</h5>`;
    html += `<h6 class="card-subtitle ms-2 text-secondary">${campaign.pseudo}</h6>`;
    html += `<p class="card-text overflow-auto" style="height: 6rem;">${campaign.description}</p>`;
    html += `<a href="workshop_script.php?create=${campaign.id_camp}" class="btn btn-primary">Créer une partie</a>`;
    html += "</div>";
    html += "</div>";
  }

  const div = document.getElementById("result");
  div.innerHTML = html;
}
