"use strict";

$(document).ready(function() {
    const jsonProducts = JSON.parse($('#json-products').val());

    // Ordenar produtos por quantidade crescente
    jsonProducts.sort((a, b) => a.quantity - b.quantity);

    const $quantityDisplay = $('#quantity');
    const $sliderFill = $('.slider-fill');
    const $sliderThumb = $('.slider-thumb');
    const $itemIds = $('#item_ids');
    const $priceDisplay = $('#price');
    const $cardToast = $('.card-body.product-info.card-toast');

    const numPackages = jsonProducts.length;
    const intervalPercentage = numPackages > 1 ? 100 / (numPackages - 1) : 0;

    function updateSliderByQuantity(quantity) {
        //console.log("📌 updateSliderByQuantity chamada com:", quantity); //problema está aqui, sempre começa com 100
        const productIndex = jsonProducts.findIndex(product => product.quantity == quantity);
        if (productIndex === -1) return;

        const selectedPackage = jsonProducts[productIndex]; // declara primeiro!
        if (!selectedPackage) return;

        const percentage = productIndex * intervalPercentage;
        $sliderFill.css('width', percentage + '%');
        $sliderThumb.css('left', percentage + '%');

        // Atualizar exibição de quantidade formatada
        $quantityDisplay.text(selectedPackage.quantity_formatted);

        // Atualizar demais campos
        $itemIds.val(selectedPackage.item_ids || '');
        $priceDisplay.text(`$ ${parseFloat(selectedPackage.price).toFixed(2).replace('.', ',')}`);

        if (selectedPackage.discount && selectedPackage.discount > 0) {
            $cardToast.attr('data-card-toast-text', `${selectedPackage.discount}% de Desconto`);
        } else {
            $cardToast.attr('data-card-toast-text', "Aumente a quantidade para desconto");
        }
        
    }

    function initializeSliderByItemId(itemId) {
       //console.log("🚀 initializeSliderByItemId com itemId:", itemId);

    const selectedProduct = jsonProducts.find(product => product.item_ids == itemId);
    if (selectedProduct) {
        //console.log("   ✔ Produto encontrado:", selectedProduct);
        updateSliderByQuantity(selectedProduct.quantity);
    } else if (numPackages > 0) {
        //console.warn("   ❌ Produto não encontrado, caindo no primeiro pacote:", jsonProducts[0].quantity);
        updateSliderByQuantity(jsonProducts[0].quantity);
    }
        
    }

    const currentItemId = $itemIds.val();
    initializeSliderByItemId(currentItemId);

    const handleMouseMove = function(e) {
        //console.log("🖱 handleMouseMove -> quantityIndex:", quantityIndex, "quantity:", jsonProducts[quantityIndex]?.quantity);

        const sliderContainer = $('.slider-container');
        const containerWidth = sliderContainer.width();
        const mouseX = e.pageX || e.touches[0].pageX;
        const percentage = Math.max(0, Math.min(1, (mouseX - sliderContainer.offset().left) / containerWidth));

        const quantityIndex = Math.round(percentage * (numPackages - 1));

        if (quantityIndex >= 0 && quantityIndex < numPackages) {
            const selectedQuantity = jsonProducts[quantityIndex].quantity;
            updateSliderByQuantity(selectedQuantity);
        }
    };

    $sliderThumb.on('mousedown touchstart', function(e) {
        e.preventDefault();
        $(document).on('mousemove touchmove', handleMouseMove);

        $(document).on('mouseup touchend', function() {
            $(document).off('mousemove touchmove', handleMouseMove);
        });
    });
});
