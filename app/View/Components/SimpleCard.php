<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SimpleCard extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */

    public $title;
    public $old_price;
    public $new_price;
    public $discount;
    public $image;  
    public $link; //the link to detail product

    public function __construct($title, $price, $discount, $image, $link)
    {
        $this->title = $title;
        $this->old_price= floatval($price);
        $this->discount = floatval($discount);
        $this->image = $image;
        $this->link = $link;
        if($discount !=0 || $discount != null) {
            $this->new_price = round( (100-$discount)/100*$this->old_price, 2);
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.simple-card');
    }
}
