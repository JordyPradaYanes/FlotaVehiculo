// Sidebar JavaScript - Disable OverlayScrollbars
document.addEventListener("DOMContentLoaded", function () {
    // Disable OverlayScrollbars for sidebar
    const sidebar = document.querySelector(".main-sidebar");
    if (sidebar) {
        // Remove OverlayScrollbars if it was initialized
        if (sidebar.OverlayScrollbars) {
            sidebar.OverlayScrollbars().destroy();
        }

        // Prevent OverlayScrollbars from initializing
        sidebar.setAttribute("data-no-overlay-scrollbars", "true");
    }
});
