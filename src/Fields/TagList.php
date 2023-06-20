<?php

declare(strict_types=1);

namespace Leeto\MoonShineSpatieTags\Fields;

use Illuminate\Database\Eloquent\Model;
use MoonShine\Contracts\Fields\Relationships\HasRelatedValues;
use MoonShine\Contracts\Fields\Relationships\HasRelationship;
use MoonShine\Fields\Select;
use MoonShine\Traits\Fields\WithRelatedValues;

final class TagList extends Select implements HasRelationship, HasRelatedValues
{
    use WithRelatedValues;

    protected static string $view = 'tag-list::fields.tags';

    public function indexViewValue(Model $item, bool $container = true): string
    {
        return $item->{$this->relation()}?->implode(
            fn ($item) => view('moonshine::ui.badge', [
                    'color' => 'purple',
                    'value' => $item->{$this->resourceTitleField()} ?? false,
                    'margin' => true,
                ]
            )->render(),
            ''
        ) ?? '';
    }

    public function save(Model $item): Model
    {
        $values = $this->requestValue()
            ? explode(',', $this->requestValue())
            : [];

        $item->syncTags($values);

        return $item;
    }
}
