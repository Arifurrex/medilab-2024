<ul class="navbar">
    <li class="nav-item" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
        <a href="#" class="category-link" @click.prevent="open = !open">Category 1</a>
        <ul x-show="open || window.innerWidth > 768" class="subcategory-list" x-cloak>
            <li><a href="#">Subcategory 1.1</a></li>
            <li><a href="#">Subcategory 1.2</a></li>
            <li><a href="#">Subcategory 1.3</a></li>
        </ul>
    </li>
    <li class="nav-item" x-data="{ open: false }" @mouseenter="open = true" @mouseleave="open = false">
        <a href="#" class="category-link" @click.prevent="open = !open">Category 2</a>
        <ul x-show="open || window.innerWidth > 768" class="subcategory-list" x-cloak>
            <li><a href="#">Subcategory 2.1</a></li>
            <li><a href="#">Subcategory 2.2</a></li>
            <li><a href="#">Subcategory 2.3</a></li>
        </ul>
    </li>
</ul>
