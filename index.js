function filterShop(category) {
            const products = document.querySelectorAll('.product-card');
            const buttons = document.querySelectorAll('.filter-btn');

            // Update button state
            buttons.forEach(btn => {
                btn.classList.remove('active');
                if(btn.getAttribute('onclick').includes(category)) btn.classList.add('active');
            });

            // Filter logic
            products.forEach(product => {
                if (category === 'all' || product.dataset.category === category) {
                    product.style.display = "flex";
                } else {
                    product.style.display = "none";
                }
            });
        }
        function openTerms() { document.getElementById('termsModal').style.display = "block"; }
function closeTerms() { document.getElementById('termsModal').style.display = "none"; }