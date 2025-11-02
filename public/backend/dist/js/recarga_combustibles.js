document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchTable');
    const table = document.getElementById('example1');
    const tbody = table.querySelector('tbody');
    const rows = tbody.querySelectorAll('tr');
    
    searchInput.addEventListener('keyup', function() {
        const searchTerm = this.value.toLowerCase().trim();
        
        rows.forEach(function(row) {
            const text = row.textContent.toLowerCase();
            row.style.display = text.includes(searchTerm) ? '' : 'none';
        });
    });
});