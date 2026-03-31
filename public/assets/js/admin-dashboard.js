/* =============================================================================
   Admin Dashboard JavaScript
   OTOBIZ Platform - Dashboard Interactions
   ============================================================================= */

document.addEventListener('DOMContentLoaded', function() {
    initializeNavigation();
    initializeMenuActions();
    initializeResponsive();
});

/**
 * Initialize main navigation
 */
function initializeNavigation() {
    const menuLinks = document.querySelectorAll('.menu-link');
    
    menuLinks.forEach(link => {
        link.addEventListener('click', function() {
            // Remove active class from all items
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked item
            this.closest('.menu-item').classList.add('active');
        });
    });
}

/**
 * Initialize content management card actions
 */
function initializeMenuActions() {
    const cardButtons = document.querySelectorAll('.btn-card');
    
    cardButtons.forEach(button => {
        button.addEventListener('click', function() {
            const page = this.getAttribute('data-page');
            console.log('Navigate to edit page:', page);
            
            // TODO: Implement actual navigation to edit page
            // window.location.href = `/admin/${page}`;
        });
    });
}

/**
 * Initialize responsive menu for mobile
 */
function initializeResponsive() {
    const sidebar = document.querySelector('.dashboard-sidebar');
    
    // Check if we're on mobile
    if (window.innerWidth <= 767) {
        // Sidebar should be hidden by default on mobile
        if (sidebar) {
            sidebar.classList.remove('active');
        }
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 767 && sidebar) {
            sidebar.classList.add('active');
        } else if (window.innerWidth <= 767 && sidebar) {
            sidebar.classList.remove('active');
        }
    });
}

/**
 * Logout confirmation (optional enhancement)
 */
function confirmLogout(event) {
    if (!confirm('Apakah Anda yakin ingin keluar?')) {
        event.preventDefault();
        return false;
    }
}

/**
 * Format timestamp to locale date
 */
function formatTime(date) {
    return new Date(date).toLocaleDateString('id-ID', {
        year: 'numeric',
        month: 'long',
        day: 'numeric',
        hour: '2-digit',
        minute: '2-digit'
    });
}

/**
 * Set active menu based on current page
 */
function setActiveMenuByPage(page) {
    const links = document.querySelectorAll('.menu-link[data-page]');
    
    links.forEach(link => {
        if (link.getAttribute('data-page') === page) {
            link.closest('.menu-item').classList.add('active');
        } else {
            link.closest('.menu-item').classList.remove('active');
        }
    });
}

// Export functions
if (typeof module !== 'undefined' && module.exports) {
    module.exports = {
        initializeNavigation,
        initializeMenuActions,
        initializeResponsive,
        confirmLogout,
        formatTime,
        setActiveMenuByPage
    };
}
