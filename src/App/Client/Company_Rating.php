<?php

/*
 * This file is part of the Slim API skeleton package
 *
 * Copyright (c) 2016-2017 Mika Tuupola
 *
 * Licensed under the MIT license:
 *   http://www.opensource.org/licenses/mit-license.php
 *
 * Project home:
 *   https://github.com/tuupola/slim-api-skeleton
 *
 */

namespace App;

use Spot\EntityInterface as Entity;
use Spot\EventEmitter;
use Spot\MapperInterface as Mapper;
use Tuupola\Base62;

class Company_Rating extends \Spot\Entity
{
    protected static $table = "company_rating";

    public static function fields()
    {
        return [
            "rating_id" => ["type" => "integer", "unsigned" => true, "primary" => true, "autoincrement" => true],
            "user_id" => ["type" => "integer", "unsigned" => true], 
            "company_id" => ["type" => "integer", "unsigned" => true],
            "rating" => ["type" => "float", "unsigned" => true],
           
            ];
    }

    

    public static function relations(Mapper $mapper, Entity $entity) {
        return [

        'Company' => $mapper->belongsTo($entity, 'App\Company', 'company_id'),
        'User' => $mapper->belongsTo($entity, 'App\User', 'user_id')


        ];
    }
}
