<x-moonshine::form.input
    :attributes="$element->attributes()->merge([
        'id' => $element->id(),
        'placeholder' => $element->label() ?? '',
        'name' => $element->name(),
        'x-data' => 'select()',
        'data-search-enabled' => $element->isSearchable(),
        'data-remove-item-button' => $element->isNullable(),
        'value' => implode(',', array_filter(
            $element->values(),
            static fn($label, $value) => $element->isSelected($item, $value),
            ARRAY_FILTER_USE_BOTH
        ))
    ])"
/>
