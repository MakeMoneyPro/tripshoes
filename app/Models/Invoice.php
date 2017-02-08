<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Invoice extends Model implements Transformable
{
    use TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table= 'tbl_invoice';
    protected $fillable = [
        'number_invoice', 'booking_id', 'user_id', 'ticket_id', 'number_tickets', 'ticker_price', 'promo', 'total_cost', 'date_created', 'date_modified', 'status', 'credit_card_id',
    ];
    /* Get all from Booking.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function bookings()
    {
        return $this->belongsTo('App\Models\Booking','booking_id');
    }
    /* Get all from Ticket.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function tickets()
    {
        return $this->belongsTo('App\Models\Ticket','ticket_id');
    }
    /* Get all from CreditCard.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function creditcard()
    {
        return $this->belongsTo('App\Models\CreditCard','credit_card_id');
    }
    /* Get all from User.
     *
     * @return \Illuminate\Database\Eloquent\Relations\belongsTo
     */
    public function users()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }
}
