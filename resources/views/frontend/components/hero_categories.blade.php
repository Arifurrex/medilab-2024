<!-- category for mobile device-->
<div x-data="{ showAll: false }" class="hero__categories__mobile">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul>
        <!-- প্রথম ১০টি ক্যাটাগরি শো -->
        <div>
            @foreach ($categories->take(10) as $category)
            <li><a href="#">{{$category->name}}</a>
                @if ($category->subcategories->isNotEmpty())
                <ul class="subCategory">
                    @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="#">{{ $subcategory->name}}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <ul class="subCategory">
                    <li>no subcategory</li>
                </ul>
                @endif
            </li>
            @endforeach
        </div>

        <!-- বাকিগুলির জন্য একটি ডিভ, যা শো হবে যখন "showAll" true হবে -->
        <div x-show="showAll">
            @foreach ($categories->skip(10) as $category)
            <li><a href="#">{{$category->name}}</a>
                @if ($category->subcategories->isNotEmpty())
                <ul class="subCategory">
                    @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="#">{{ $subcategory->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <ul class="subCategory">
                    <li>no subcategory</li>
                </ul>
                @endif
            </li>
            @endforeach
        </div>

        <!-- আইকন সহ টগল বাটন -->
        <button @click="showAll = !showAll" class="category_showAll_Button">
            <div x-show="!showAll">
                <span class="arrow_carrot-down"></span>
            </div>
            <div x-show="showAll">
                <span class="arrow_carrot-up"></span>
            </div>
        </button>
    </ul>

</div>
<!-- category for mobile device -->

<!-- category for window device-->
<div x-data="{ showAll: false }" class="hero__categories">
    <div class="hero__categories__all">
        <i class="fa fa-bars"></i>
        <span>All departments</span>
    </div>
    <ul>
        <!-- প্রথম ১০টি ক্যাটাগরি শো -->
        <div>
            @foreach ($categories->take(10) as $category)
            <li><a href="#">{{$category->name}}</a>
                @if ($category->subcategories->isNotEmpty())
                <ul class="subCategory">
                    @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="#">{{ $subcategory->name}}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <ul class="subCategory">
                    <li>no subcategory</li>
                </ul>
                @endif
            </li>
            @endforeach
        </div>

        <!-- বাকিগুলির জন্য একটি ডিভ, যা শো হবে যখন "showAll" true হবে -->
        <div x-show="showAll">
            @foreach ($categories->skip(10) as $category)
            <li><a href="#">{{$category->name}}</a>
                @if ($category->subcategories->isNotEmpty())
                <ul class="subCategory">
                    @foreach ($category->subcategories as $subcategory)
                    <li>
                        <a href="#">{{ $subcategory->name }}</a>
                    </li>
                    @endforeach
                </ul>
                @else
                <ul class="subCategory">
                    <li>no subcategory</li>
                </ul>
                @endif
            </li>
            @endforeach
        </div>

        <!-- আইকন সহ টগল বাটন -->
        <button @click="showAll = !showAll" class="category_showAll_Button">
            <div x-show="!showAll">
                <span class="arrow_carrot-down"></span>
            </div>
            <div x-show="showAll">
                <span class="arrow_carrot-up"></span>
            </div>
        </button>
    </ul>

</div>
<!-- category for window device -->
