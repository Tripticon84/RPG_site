async function changeLogList() {
  const logInput = document.getElementById("logAction");
  const input = logInput.options[logInput.selectedIndex].value;

  const res = await fetch("logs_script.php?action=" + input);
  const data = await res.text();
  const logs = JSON.parse(data);

  html = "<table class='table'>";

  if (input == "pages")
    html +=
      "<tr><th>IP</th><th>Date</th><th>Heure</th><th>Page</th><th>De</th></tr>";
  else 
    html += "<tr><th>IP</th><th>Date</th><th>Heure</th><th>Status</th></tr>";

  for (let i = 0; i < logs.length; i++) {
    if (logs[i][0] !== "" || logs[i][0] == null) {
    html += "<tr>";
    html += `<td>${logs[i][0]}</td>`;
    html += `<td>${logs[i][1]}</td>`;
    html += `<td>${logs[i][2]}</td>`;
    html += `<td>${logs[i][3]}</td>`;
    input == "pages" ? (html += `<td>${logs[i][4]}</td>`) : "";
    html += "</tr>";
    }
  }

  html += "</table>";

  const div = document.getElementById("result");
  div.innerHTML = html;
}

async function deleteLogList() {
  const logInput = document.getElementById("logAction");
  const input = logInput.options[logInput.selectedIndex].value;

  const res = await fetch("logs_delete.php?action=" + input);

  changeLogList();
}