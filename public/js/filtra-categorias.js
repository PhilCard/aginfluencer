function filterCategories(categoriesIds) {
    const allCategories = document.querySelectorAll('.category');
    allCategories.forEach(category => {
        category.style.display = 'none';
    });

    categoriesIds.forEach(id => {
        const categorySelected = document.getElementById(`cate-${id}`);
        if (categorySelected) {
            categorySelected.style.display = 'block';
        }
    });
}

function showAllCategories() {
    const allCategories = document.querySelectorAll('.category');
    allCategories.forEach(category => {
        category.style.display = 'block';
    });
}

function toggle(category) {
    const toggle = document.getElementById('toggle');
    toggle.className = 'toggle-container ' + category;
}

window.onload = function () {
    filterCategories([36, 37, 38, 45, 46, 47, 58, 60, 62, 63, 66, 69, 72, 75, 78]);

    //calcula desconto
};