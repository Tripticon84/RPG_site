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

  let html = "";

  for (let i = 0; i < campaigns.length; i++) {
    const campaign = campaigns[i];
    html += '<div class="card me-3 mb-3" style="width: 18rem; height:fit-content">';
    html += `<img src="/image/campagnes/${campaign.logo}.png" class="card-img-top" alt="Image de couverture" style="height:11rem" />`;
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

  EasterEgg(s);
}

async function EasterEgg(searchInput) {
  if (
    searchInput === "Rick Astley" ||
    searchInput === "rick astley" ||
    searchInput === "Rick" ||
    searchInput === "rick" ||
    searchInput === "Astley" ||
    searchInput === "astley" ||
    searchInput === "Never" ||
    searchInput === "never" ||
    searchInput === "Gonna" ||
    searchInput === "gonna" ||
    searchInput === "Give" ||
    searchInput === "give" ||
    searchInput === "You" ||
    searchInput === "you" ||
    searchInput === "Up" ||
    searchInput === "up" ||
    searchInput === "Rickroll" ||
    searchInput === "rickroll" ||
    searchInput === "Rick Roll" ||
    searchInput === "rick roll"
  ) {
    console.log("Rick Astley");
    const div = document.getElementById("result");
    div.innerHTML =
      '<iframe width="1920" height="500" src="https://www.youtube.com/embed/dQw4w9WgXcQ?autoplay=1&controls=0&loop=1&mute=0&rel=0&fs=1&cc_load_policy=0&iv_load_policy=0&modestbranging=0&playsinline=1&playlist=dQw4w9WgXcQ" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';

  }
  if (
    searchInput === "Sananes" ||
    searchInput === "sananes"
  ) {
    console.log("Sananes");
    const div = document.getElementById("result");
    div.innerHTML =
      '<iframe width="1920" height="500" src="https://www.youtube.com/embed/Q0J7k9KB0Z8?autoplay=1&controls=0&loop=1&mute=0&rel=0&fs=1&cc_load_policy=0&iv_load_policy=0&modestbranging=0&playsinline=1&playlist=Q0J7k9KB0Z8" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>';
  }
}

async function displayChat() {
  const chatInput = new URLSearchParams(window.location.search);
  const chatID = chatInput.get("gameID");

  const res = await fetch("chat_get.php?chatID=" + chatID);
  const data = await res.text();
  const messages = JSON.parse(data);

  let html = "";
  const user = messages[0];

  console.log(messages);

  for (let i = 1; i < messages.length; i++) {
    const message = messages[i];

    if (
      message[0] == null ||
      message[0] == "" ||
      message[0] == undefined ||
      message[0] == "\n"
    ) {
    } else {
      if (user !== message[1]) {
        html += "<!-- Message -->";
        html += `<div class="d-flex">`;
        // html += `<img src="https://via.placeholder.com/50" alt="Avatar" class="rounded-circle m-2" width="50px" height="50px">`;
        html += `<div class="bg-body-secondary p-1 me-5 rounded-4 m-2 p-2" style="width: fit-content;">`;
        html += `<div class="fw-bold">${message[1]}</div>`;
        html += `<div>${message[2]}</div>`;
        html += `<div class="text-end text-body-secondary">${message[0]}</div>`;
        html += `</div>`;
        html += `</div>`;
      } else {
        html += "<!-- Message Soit -->";
        html += `<div class="d-flex flex-row-reverse">`;
        html += `<div class="bg-secondary rounded-4 p-2 ms-5 m-2 me-0" style="width: fit-content;">`;
        html += `<div>${message[2]}</div>`;
        html += `<div class="text-end text-body-secondary">${message[0]}</div>`;
        html += `</div>`;
        html += `</div>`;
      }
    }
  }
  const div = document.getElementById("chatResult");
  div.innerHTML = html;
}

function scrollDown() {
  setTimeout(() => {
    const div = document.getElementById("chatResult");
    div.scrollTop = div.scrollHeight;
    
  }, 10);
}

async function sendChat() {
  const chatInput = new URLSearchParams(window.location.search);
  const chatID = chatInput.get("gameID");

  const messageInput = document.getElementById("chatInput");
  const message = messageInput.value;

  if (message === "") return;


  const res = await fetch("chat_send.php", {
    method: "POST",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded",
    },
    body: `chatID=${chatID}&message=${message}`,
  });

  messageInput.value = ""; // Vide le champ de texte

  await displayChat();
  scrollDown();
}
