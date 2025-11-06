document.addEventListener('DOMContentLoaded', function() {
    // --- DOM Elements ---
    const mainImage = document.getElementById('mainImage');
    const selectedColorDisplay = document.getElementById('selectedColor');
    const selectedSizeDisplay = document.getElementById('selectedSize');
    const qtyInput = document.getElementById('quantityInput');
    const qtyMinus = document.getElementById('qtyMinus');
    const qtyPlus = document.getElementById('qtyPlus');
    const addToCartBtn = document.getElementById('addToCartBtn');
    const copyLinkBtn = document.getElementById('copyLinkBtn');


    // 1. Image Thumbnail Gallery Logic
    document.querySelectorAll('.thumbnail-item img').forEach(thumb => {
        thumb.addEventListener('click', function() {
            document.querySelectorAll('.thumbnail-item').forEach(item => item.classList.remove('active'));
            this.closest('.thumbnail-item').classList.add('active');
            
            // Simple image swap logic (assumes placeholder images follow a pattern)
            // You would replace this with logic to fetch the correct high-res image based on thumbnail source.
            mainImage.src = this.src.replace('100/100', '600/600'); 
        });
    });

    // 2. Color Selection
    document.querySelectorAll('.color-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.color-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            selectedColorDisplay.textContent = this.getAttribute('data-color');
            // TODO: In a production app, trigger an AJAX call to check stock/update image based on color selection
        });
    });

    // 3. Size Selection
    document.querySelectorAll('.size-btn').forEach(button => {
        button.addEventListener('click', function() {
            document.querySelectorAll('.size-btn').forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            selectedSizeDisplay.textContent = this.getAttribute('data-size');
            // TODO: In a production app, trigger an AJAX call to check stock based on size selection
        });
    });

    // 4. Quantity Controls
    if (qtyMinus) {
        qtyMinus.addEventListener('click', function() {
            let currentVal = parseInt(qtyInput.value);
            if (currentVal > parseInt(qtyInput.min)) {
                qtyInput.value = currentVal - 1;
            }
        });
    }

    if (qtyPlus) {
        qtyPlus.addEventListener('click', function() {
            let currentVal = parseInt(qtyInput.value);
            if (currentVal < parseInt(qtyInput.max)) {
                qtyInput.value = currentVal + 1;
            }
        });
    }
    
    // Ensure quantity input enforces min/max
    if (qtyInput) {
        qtyInput.addEventListener('change', function() {
            let currentVal = parseInt(this.value);
            const min = parseInt(this.min);
            const max = parseInt(this.max);
            if (isNaN(currentVal) || currentVal < min) {
                this.value = min;
            } else if (currentVal > max) {
                this.value = max;
            }
        });
    }

    // 5. Add to Cart Logic (Simulation)
    if (addToCartBtn) {
        addToCartBtn.addEventListener('click', function() {
            const color = selectedColorDisplay.textContent;
            const size = selectedSizeDisplay.textContent;
            const quantity = qtyInput.value;

            // Visual Feedback
            const originalText = addToCartBtn.innerHTML;
            addToCartBtn.disabled = true;
            addToCartBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i> Adding...';
            
            // Simulate Cart API Call (Replace this setTimeout with your actual fetch/AJAX request)
            setTimeout(() => {
                const cartBadge = document.querySelector('.cart-badge');
                if (cartBadge) {
                    let currentCount = parseInt(cartBadge.textContent || '0');
                    // Update cart badge visually
                    cartBadge.textContent = currentCount + parseInt(quantity); 
                }
                
                alert(`${quantity}x Premium Cotton T-Shirt (${color}, ${size}) added to cart! (Simulation)`);

                // Reset button state
                addToCartBtn.innerHTML = '<i class="fas fa-check me-2"></i> Added!';
                setTimeout(() => {
                    addToCartBtn.innerHTML = originalText;
                    addToCartBtn.disabled = false;
                }, 1000);

            }, 1000);
        });
    }

    // 6. Review Star Rating Input Logic
    const reviewForm = document.getElementById('reviewForm');
    if (reviewForm) {
        const reviewStars = reviewForm.querySelectorAll('.star-rating-input i');
        const reviewRatingInput = reviewForm.querySelector('input[name="rating"]');

        reviewStars.forEach(star => {
            star.addEventListener('click', function() {
                const rating = parseInt(this.getAttribute('data-rating'));
                reviewRatingInput.value = rating;

                reviewStars.forEach(s => {
                    const sRating = parseInt(s.getAttribute('data-rating'));
                    if (sRating <= rating) {
                        s.classList.remove('far');
                        s.classList.add('fas', 'text-warning');
                    } else {
                        s.classList.remove('fas', 'text-warning');
                        s.classList.add('far');
                    }
                });
            });
        });
        
        // 7. Review Form Submission Simulation
        reviewForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Basic validation check
            if (!reviewRatingInput.value) {
                alert('Please select a rating!');
                return;
            }
            
            // Simulate API submission
            alert('Review submitted successfully! (Simulation)');
            
            // Close modal and reset form
            var reviewModal = bootstrap.Modal.getInstance(document.getElementById('reviewModal'));
            reviewModal.hide();
            this.reset();
        });
    }
    
    // 8. Copy Link Button Logic (Share Modal)
    if (copyLinkBtn) {
        copyLinkBtn.addEventListener('click', function() {
            const linkInput = this.closest('.input-group').querySelector('input');
            
            // Use fallback method for clipboard access compatibility
            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(linkInput.value).then(() => {
                    copyLinkBtn.textContent = 'Copied!';
                }).catch(err => {
                     console.error('Could not copy text: ', err);
                });
            } else {
                // Fallback for older browsers or restricted environments
                linkInput.select();
                try {
                    document.execCommand('copy');
                    copyLinkBtn.textContent = 'Copied!';
                } catch (err) {
                    console.error('Fallback copy failed: ', err);
                }
            }
            
            setTimeout(() => {
                copyLinkBtn.textContent = 'Copy';
            }, 1500);
        });
    }

});