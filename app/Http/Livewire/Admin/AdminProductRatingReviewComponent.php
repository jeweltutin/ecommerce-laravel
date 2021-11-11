<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Review;
use App\Models\OrderItem;

class AdminProductRatingReviewComponent extends Component
{
    public function deleteRatingReview($order_item_id){
        $selectReview = Review::where('order_item_id',$order_item_id)->first();
        $selectReview->delete();

        $orderItem = OrderItem::find($order_item_id);
        $orderItem->rstatus = false;
        $orderItem->save();

        session()->flash('message', 'Rating and Review deleted Successfully');
    }

    public function render()
    {
        $reviewnratings = Review::orderBy('id','DESC')->paginate(12);
        return view('livewire.admin.admin-product-rating-review-component', compact('reviewnratings'))->layout('layouts.adminbase');
    }
}
