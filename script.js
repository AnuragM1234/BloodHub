document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const query = document.getElementById('searchInput').value;
    fetchResults(query);
});

function fetchResults(query) {
    fetch('search.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ query: query })
    })
    .then(response => response.json())
    .then(data => {
        displayResults(data);
    })
    .catch(error => console.error('Error:', error));
}

function displayResults(data) {
    const resultsContainer = document.getElementById('results');
    resultsContainer.innerHTML = '';

    data.forEach((item, index) => {
        if (index < 5) { // Limit the number of displayed entries to 5
            const resultItem = document.createElement('div');
            resultItem.className = 'result-item';
            resultItem.innerHTML = `
                <p><strong>Name:</strong> ${item.name}</p>
                <p><strong>Blood Type:</strong> ${item.blood_type}</p>
                <p><strong>Location:</strong> ${item.location}</p>
                <p><strong>Contact:</strong> ${item.contact}</p>
            `;
            resultsContainer.appendChild(resultItem);
        }
    });
}
