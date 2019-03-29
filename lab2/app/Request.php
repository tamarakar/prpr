<?php

namespace App;

class Request extends BaseModel
{
    protected $fillable = ['client_id', 'service_id'];

    public function service()
    {
        return $this->belongsTo('App\Service');
    }

    public function client()
    {
        return $this->belongsTo('App\Client');
    }
}
