async function searchCampaigns() {
    const searchInput = document.getElementById('search');
    const s = searchInput.value;

    const res = await fetch('workshop_script.php?search=' + s);
    const data = await res.text();

    const div = document.getElementById('result');
    div.innerHTML = data;

    

}