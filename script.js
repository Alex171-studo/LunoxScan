function searchManga() {
    const input = document.getElementById('searchInput').value.toLowerCase();
    const slides = document.getElementsByClassName('slide');
    
    let found = false;

    for (let i = 0; i < slides.length; i++) {
        const mangaTitle = slides[i].querySelector('img').alt.toLowerCase();
        if (mangaTitle.includes(input)) {
            slides[i].style.display = 'block';
            found = true;
        } else {
            slides[i].style.display = 'none';
        }
    }

    if (!found) {
        alert('Aucun manga trouvé.');
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const mangas = [
        'Naruto',
        'One Piece',
        'Dragon Ball',
        'Attack on Titan',
        'My Hero Academia',
        'Death Note'
    ];

    const searchInput = document.querySelector('input[name="query"]');
    const suggestionsBox = document.getElementById('suggestions');
    let suggestion = '';

    searchInput.addEventListener('keyup', function(event) {
        const query = this.value.toLowerCase();
        suggestionsBox.innerHTML = ''; // Effacer les suggestions précédentes
        suggestion = '';

        if (query.length === 0) {
            return; // Ne rien faire si le champ est vide
        }

        const filteredMangas = mangas.filter(manga => manga.toLowerCase().startsWith(query));

        if (filteredMangas.length > 0) {
            suggestion = filteredMangas[0]; // Prendre la première suggestion
            this.value = query;
            showSuggestion(query, suggestion);
        }

        filteredMangas.forEach(manga => {
            const suggestionItem = document.createElement('div');
            suggestionItem.textContent = manga;
            suggestionItem.classList.add('suggestion-item');
            suggestionItem.addEventListener('click', function() {
                searchInput.value = manga; // Remplir le champ de recherche
                suggestionsBox.innerHTML = ''; // Effacer les suggestions
                searchInput.form.submit(); // Soumettre le formulaire
            });
            suggestionsBox.appendChild(suggestionItem);
        });
    });

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Tab' && suggestion !== '') {
            event.preventDefault(); // Empêcher le comportement par défaut
            this.value = suggestion; // Compléter avec la suggestion
            suggestionsBox.innerHTML = ''; // Effacer les suggestions
        }
    });

    function showSuggestion(query, suggestion) {
        searchInput.value = query; // Garder la saisie de l'utilisateur
        const remainder = suggestion.slice(query.length); // Partie restante de la suggestion
        const displayValue = query + remainder;
        searchInput.setAttribute('placeholder', displayValue); // Afficher la suggestion comme placeholder
    }
});

