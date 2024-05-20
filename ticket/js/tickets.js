function toggleTheme() {
    document.body.classList.toggle('bg-smoky-black');
    document.body.classList.toggle('text-alabaster');
  
    document.querySelector('header').classList.toggle('bg-smoky-black');
    document.querySelector('h1').classList.toggle('primary-jelly-bean');
    
    document.querySelectorAll('section').forEach(section => {
      section.classList.toggle('bg-smoky-black');
    });
  
    document.querySelectorAll('h2').forEach(h2 => {
      h2.classList.toggle('secondary-red-devil');
    });
  
    document.querySelectorAll('button').forEach(button => {
      button.classList.toggle('accent-blood-animal');
    });
  
    document.querySelectorAll('.ticket').forEach(ticket => {
      ticket.classList.toggle('bg-smoky-black');
    });
  }
  
  document.addEventListener('DOMContentLoaded', function () {
    fetch('get_tickets.php')
      .then(response => response.json())
      .then(data => {
        const ticketsDiv = document.getElementById('tickets');
        data.forEach(ticket => {
          const ticketElement = document.createElement('div');
          ticketElement.classList.add('ticket');
          ticketElement.innerHTML = `
            <h3>${ticket.title}</h3>
            <p>${ticket.description}</p>
            <div class="ticket-meta">
              <span>Status: ${ticket.status}</span>
              <span>Créé le: ${ticket.created_at}</span>
            </div>
          `;
          ticketsDiv.appendChild(ticketElement);
        });
      });
  });
  