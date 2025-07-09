// Sidebar JavaScript
$(document).ready(function() {
    // Ensure sidebar is always visible
    function ensureSidebarVisibility() {
        var sidebar = $('.sidebar-container');
        if (sidebar.length > 0) {
            sidebar.show();
            sidebar.css('display', 'block');
        }
    }

    // Initialize sidebar
    ensureSidebarVisibility();

    // Add click handlers for menu items
    $('.sidebar-menu .nav-stacked li a').click(function(e) {
        // Remove active class from all menu items
        $('.sidebar-menu .nav-stacked li').removeClass('active');
        // Add active class to clicked item
        $(this).parent().addClass('active');
    });

    // Handle responsive behavior
    $(window).resize(function() {
        ensureSidebarVisibility();
    });

    // Add hover effects
    $('.sidebar-menu .nav-stacked li a').hover(
        function() {
            $(this).css('transform', 'translateX(5px)');
        },
        function() {
            $(this).css('transform', 'translateX(0)');
        }
    );

    // Debug function to check if sidebar is loaded
    function debugSidebar() {
        console.log('Sidebar elements found:', $('.sidebar-container').length);
        console.log('Sidebar visible:', $('.sidebar-container').is(':visible'));
        console.log('Sidebar display:', $('.sidebar-container').css('display'));
    }

    // Run debug on load
    debugSidebar();
});

// Fallback function to ensure sidebar is loaded
function loadSidebar() {
    var sidebarContainer = $('.sidebar-container');
    if (sidebarContainer.length === 0) {
        console.log('Sidebar not found, attempting to reload...');
        location.reload();
    }
}

// Call loadSidebar after a short delay
setTimeout(loadSidebar, 1000); 