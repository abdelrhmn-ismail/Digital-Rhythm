/**
 * Admin Panel Helper Functions
 */

function toggleStatus(entity, id, type) {
    const url = `/admin/${entity}/${id}/toggle-${type}`;
    
    fetch(url, {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Optional: Show toast message instead of reload
            location.reload();
        } else {
            alert(data.message || 'An error occurred');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('An error occurred while toggling status');
    });
}

function toggleFeatured(entity, id) {
    toggleStatus(entity, id, 'featured');
}

function toggleActive(entity, id) {
    toggleStatus(entity, id, 'active');
}
