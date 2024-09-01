document.addEventListener('DOMContentLoaded', function() {
    const mangas = [
        'Start Rising Dragon of today',
        'Naruto',
        'One Piece',
        'Dragon Ball',
        'Attack on Titan',
        'My Hero Academia',
        'Death Note'
    ];

    const searchInput = document.querySelector('input[name="query"]');
    const suggestionsBox = document.getElementById('suggestions');

    searchInput.addEventListener('keyup', function() {
        const query = this.value.toLowerCase();
        suggestionsBox.innerHTML = ''; // Effacer les suggestions précédentes

        if (query.length === 0) {
            return; // Ne rien faire si le champ est vide
        }

        const filteredMangas = mangas.filter(manga => manga.toLowerCase().includes(query));

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

        if (filteredMangas.length === 0) {
            suggestionsBox.innerHTML = '<div class="no-suggestion">Aucune suggestion trouvée</div>';
        }
    });

    searchInput.addEventListener('keydown', function(event) {
        if (event.key === 'Tab' && suggestionsBox.children.length > 0) {
            event.preventDefault(); // Empêcher le comportement par défaut
            searchInput.value = suggestionsBox.children[0].textContent; // Compléter avec la première suggestion
            suggestionsBox.innerHTML = ''; // Effacer les suggestions
        }
    });
});

