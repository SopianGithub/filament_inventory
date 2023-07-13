<?php

namespace SoftyanSolutions\LayoutSoft\Components;

use Closure;
use Illuminate\Contracts\Support\Htmlable;
use Filament\Support\Components\ViewComponent;
use Filament\Tables\Table;
use Filament\Widgets\Widget;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

class CardChart extends ViewComponent
{
    protected string $view = 'layout-soft::components.card-chart';

    protected string | Htmlable $title;

    protected array $components = [];

    /**
     * @param array|int|null $columnSpan
     * @param \Livewire\Component[]|\Illuminate\View\Component[]|Components\Grid\Row|\Livewire\Component|\Illuminate\View\Component|HtmlString|Closure|null $schema
     */
    public function __construct(string | Htmlable $title)
    {
        $this->title($title);
    }

    public static function make(string | Htmlable $title): static
    {
        $result = app(static::class, ['title' => $title]);

        // $result->configure();

        return $result;
    }


    public function schema(array|\Livewire\Component|\Illuminate\View\Component|\SolutionForest\GridLayoutPlugin\Components\Grid|string|Closure $schema): static
    {
        if (is_array($schema)) {
            foreach ($schema as $item) {
                $this->addElement($item);
            }
        }
        return $this;
    }

    public function title(string | Htmlable $title): static
    {
        $this->title = $title;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    protected function addElement(\Livewire\Component|\Illuminate\View\Component|\SolutionForest\GridLayoutPlugin\Components\Grid|string|Closure $component): static
    {
        array_push($this->components, $component);

        return $this;
    }

    public function getComponents(): ?array
    {
        return array_map(function ($component) {
            if (
                $component instanceof Table ||
                $component instanceof Widget ||
                $component instanceof HtmlString ||
                is_null($component)
            ) {
                return $component;
            } else {
                return $component->render();
            }
        }, $this->components);
    }
}
