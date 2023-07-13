<?php

namespace SoftyanSolutions\LayoutSoft\Components;

use Illuminate\Contracts\Support\Htmlable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Str;
use Illuminate\View\Component;

class ChartOverview extends Component implements Htmlable {

    protected string | Htmlable | null $description = null;

    protected ?string $resultChart = null;

    protected ?string $icon = null;

    protected ?string $iconColor = null;

    final public function __construct(string | Htmlable $description, ?string $resultChart = null)
    {
        $this->description($description);
        $this->resultChart($resultChart);
    }

    public static function make(string | Htmlable $description, string | Htmlable $result): static
    {
        return app(static::class, ['description' => $description, 'resultChart' => $result]);
    }

    public function icon(?string $icon): static
    {
        $this->icon = $icon;

        return $this;
    }

    public function getIcon(): string | null
    {
        return $this->icon;
    }

    public function iconColor(?string $color): static
    {
        $this->iconColor = $color;

        return $this;
    }

    public function getIconColor(): string | null
    {
        return $this->iconColor;
    }

    public function description(string | Htmlable | null $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getDescription(): string | Htmlable | null
    {
        return $this->description;
    }    

    public function resultChart(string | Htmlable | null $result): static
    {
        $this->resultChart = $result;

        return $this;
    }

    public function getResultChart(): string | Htmlable | null
    {
        return $this->resultChart;
    }

    public function toHtml(): string
    {
        return $this->render()->render();
    }

    public function render(): View
    {
        return view('layout-soft::components.chart-overview', $this->data());
    }

}

