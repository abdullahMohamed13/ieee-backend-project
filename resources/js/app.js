import 'bootstrap';
import '../css/app.css';

// Simple JavaScript for LuxStay functionality
document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuButton = document.querySelector('[data-bs-toggle="collapse"]');
    if (mobileMenuButton) {
        mobileMenuButton.addEventListener('click', function() {
            const target = document.querySelector(this.getAttribute('data-bs-target'));
            if (target) {
                target.classList.toggle('show');
            }
        });
    }

    // Filter panel toggle for mobile
    window.toggleMobileFilters = function() {
        const mobileFilters = document.getElementById('mobile-filters');
        if (mobileFilters) {
            mobileFilters.classList.toggle('d-none');
        }
    };

    // Price range slider
    const priceRange = document.getElementById('price-range');
    if (priceRange) {
        priceRange.addEventListener('input', function() {
            const priceDisplay = document.getElementById('price-display');
            if (priceDisplay) {
                priceDisplay.textContent = '$0 – $' + this.value + '+';
            }
        });
    }

    // Hotel image gallery
    window.changeMainImage = function(src, element) {
        const mainImage = document.getElementById('main-image');
        if (mainImage) {
            mainImage.src = src;
            
            // Update active thumbnail
            document.querySelectorAll('.thumbnail-img').forEach(img => {
                img.classList.remove('border-primary');
            });
            element.classList.add('border-primary');
        }
    };

    // Form validation
    const forms = document.querySelectorAll('.needs-validation');
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        });
    });

    // Auto-hide alerts after 5 seconds
    const alerts = document.querySelectorAll('.alert');
    alerts.forEach(alert => {
        setTimeout(() => {
            const bsAlert = new bootstrap.Alert(alert);
            if (bsAlert) {
                bsAlert.close();
            }
        }, 5000);
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });
});