<?php

namespace App\Model;
use Illuminate\Database\Eloquent\Model;

class SupportTickets extends Model
{
    protected $table = 'support_tickets';
    protected $fillable =
        [

            'id',
            'user_id',
            'country_id',
            'agent_id',
            'admin_id',
            'image',
            'message',
        ];
    public function user_tickets()
    {
        return $this->belongsTo('App\User','user_id','id' );
    }
    public function ticket_agent()
    {
        return $this->belongsTo('App\Model\Agent','agent_id','id' );
    }
    public function ticket_country()
    {
        return $this->belongsTo('App\Model\Country','country_id','id' );
    }
    public function ticket_main_country()
    {
        return $this->belongsTo('App\Model\Country','main_country_id','id' );
    }
}